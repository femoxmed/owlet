<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use App\Subscription;
use App\SubscriptionPlan;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;


class SubscriptionController extends Controller
{


    public function index(Request $request) {

        $subscriptions = Subscription::with(['subscription_plan', 'user', 'transaction'])->get();

        return response()->json($subscriptions, 200);
    }


    public function expiredSubscriptions(Request $request) {

        $subscriptions = Subscription::with(['subscription_plan'])->get();

        return response()->json($subscriptions, 200);
    }

    public function validatePaymentData(Request $request) {

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required','email'],
            'address' => ['required', 'string', 'max:255'],
            'subscription_plan_id' => ['required','exists:subscription_plans,id']
        ]);



        $subscriptionPlan = SubscriptionPlan::find($request->subscription_plan_id);
        $user = User::where('email', $request->email)->first();
       
        if($subscriptionPlan && $user) {
            $subscription_rate = $subscriptionPlan->amount;
            $data = [
                'subscription_plan_id' => $subscriptionPlan->id,
                 'amount' => $subscription_rate,
                 'user_id' => $user->id
            ];

            return response()->json(
            $data
            , 200,);
        }
        else {
            return response()->json(['message'=> 'Bad Request'], 400);
        }
    }


    public static function verifyTrx($trx): object
    {
        try {
            $header = ['Authorization' => 'Bearer'." ".config('app.paystack_seckey')];
            // dd($trx);
            $http = new Client();
            // dd( config('app.paystack_verify_url') . $trx);
            $response = $http->request('GET',
             config('app.paystack_verify_url') . $trx , [
                 'headers' => $header
             ]);
            $result = json_decode((string) $response->getBody(), true);

            $response = (object)($result);
            return $response;
        } catch (Exception $e) {
            // dd($e);
            throw new Exception("Error Processing Request", 1);

            return $e;
         }
    }


    //call this as a callback after succesfull payment
    public function process(Request $request) {

        // if query params exist check if transaction exists
        $trx_ref = $request->query('trx_ref');
        $transaction =  Transaction::where('txr_ref', $trx_ref)->first();
        if($transaction) {
           return response()->json(['data' => $transaction, 'message' => 'Transaction has been settled'], 200);
        }

        //verify payment
        $data = $this->verifyTrx($trx_ref);

        if(!$data) {

            return response()->json(['data' => $data, 'message' => 'Transaction can not be verified'], 400);
        }
        else
        {


            // $user->card_detail = $payload->authorization;
            // $user->save();

            $payload = (object)$data->data;
            switch ($payload->status) {
                case 'success':

                    $user = User::where('email', $payload->customer['email'])->first();



                   if($user->card_detail) {
                    $card_detail = json_decode($user->card_detail);

                       try {
                        $url = "https://api.paystack.co/customer/deactivate_authorization";
                           $header = ['Authorization' => 'Bearer'." ".config('app.paystack_seckey'), 'Content-Type' => 'application/json'];
                           $body = ['authorization_code' => $card_detail->authorization_code];
                           // dd($trx);
                           $http = new Client();
                           // dd( config('app.paystack_verify_url') . $trx);
                           $response = $http->request('POST',
                            $url ,  [
                                'headers' => $header
                            ], $body);

                            $user->card_detail = $payload->authorization;
                            $user->save();
                       } catch (Exception $e) {
                           // dd($e);
                           throw new Exception("Error Processing Request", 1);

                           return $e;
                        }
                   }

                   else {
                    $user->card_detail = $payload->authorization;
                    $user->save();
                   }

                $transaction = Transaction::create([
                'description'=> "dca-yearly",
                'amount' => $payload->amount,
                'txr_date'=> $payload->created_at,
                'paid_date'=> $payload->paid_at ,
                'txr_ip'=> '',
                'charged_amount' => $payload->amount / 100,
                'type' => 'debit',
                'acct_number'=> '' ,
                'currency'=> 'NGN',
                'status' => $payload->status,
                'txr_fees' => $payload->amount + $payload->fees ,
                'txr_date' => $payload->created_at,
                'currency' => $payload->currency,
                'paid_date' => $payload->paid_at,
                'card_owner_email' => $payload->metadata['card_owner_email'],
                'txr_ref' => $payload->reference,
                'charged_amount' => ($payload->amount) /100,
                'event_type'=> 'card',
                'user_id' => $payload->metadata['user_id'],
                'merchant_type' => 'paystack'
                ]);

                $plan = SubscriptionPlan::find($payload->metadata['subscription_plan_id']);
                $expired_at;
                switch ($plan->interval) {
                    case 'annually':
                        $expired_at = now()->addDays(365);
                        break;

                        case 'quarterly':
                            $expired_at = now()->addDays(90);
                            break;

                    default:
                    $expired_at = now()->addDays(0);
                        break;
                }

                Subscription::create([
                    'transaction_id' => $transaction->id ,
                    'subscription_plan_id' => $payload->metadata['subscription_plan_id'],
                    'user_id' =>  $payload->metadata['user_id'],
                    'expiry_date' => $expired_at
                ]);

                    return response()->json([
                        'message' => 'subscription credited successfully'
                    ], 201);

                    break;

                    default:

                    return response()->json(['message' => 'transaction cannot be verified'], 403);

                    break;
            }
        }

    }


    //this endpoint is to reauthorize a charge on a subscription that has expired
    public function reAuthorize(Request $request) {

        $validatedData = $request->validate([
            'authorization_code' => 'required',
            'email' => 'required',
            // 'amount' => 'required',
            'subscription_plan_id' => ['required','exists:subscription_plans,id']
        ]);

        $subscription_plan = SubscriptionPlan::find($validatedData['subscription_plan_id']);
        $user = User::where(['email' => $request->email])->firstOrFail();
        $amount = $subscription_plan->amount;

        try {
            $url = "https://api.paystack.co/transaction/charge_authorization";
            $header = ['Authorization' => 'Bearer'." ".config('app.paystack_seckey'), 'Content-Type' => 'application/json'];
            
            $body = array(
            "authorization_code" => $validatedData['authorization_code'],
            "email" => $validatedData['email'],
            "subscription_plan_id" => $validatedData['subscription_plan_id'],
            //divide by 100 the units is in kobo
            "amount" => $amount/100
            );

               $http = new Client();
               $response = $http->request('POST', $url, [
                // 'debug' => TRUE,
                'json' => (object) $body,
                'headers' => $header
              ]);

                $payload = json_decode((string) $response->getBody(), true);
                // dd($result);
                $payload = (object)($payload['data']);
                // return response()->json($payload, 200);

                $transaction = Transaction::create([
                    'currency'=> 'NGN',
                    'txr_ref' => $payload->reference,
                    'amount' => $payload->amount,
                    'description'=> $subscription_plan->name,
                    'txr_date'=> $payload->transaction_date,
                    'paid_date'=> null ,
                    'txr_ip'=> null,
                    'charged_amount' => $payload->amount,
                    'type' => 'debit',
                    'acct_number'=> '' ,
                    'status' => 'success',
                    'txr_fees' => $payload->fees ,
                    'paid_date' => $payload->transaction_date,
                    'card_owner_email' => null,
                    'event_type'=> 'card',
                    'user_id' => $user->id,
                    'merchant_type' => 'paystack'
                    ]);

                    $expired_at = '';
                    switch ($subscription_plan->interval) {
                        case 'annually':
                            $expired_at = now()->addDays(365);
                            break;

                            case 'quarterly':
                                $expired_at = now()->addDays(90);
                                break;

                        default:
                        $expired_at = now()->addDays(0);
                            break;
                    }


                 Subscription::create([
                    'transaction_id' => $transaction->id ,
                    'subscription_plan_id' => $subscription_plan->id,
                    'user_id' =>  $user->id,
                    'expiry_date' => $expired_at
                ]);


                return response()->json(['message' => 'Subscription successful'], 200);
           } catch (Exception $e) {
               // dd($e);
               throw new Exception("Error Processing Request", 1);

               return $e;
            }
    }


    }
