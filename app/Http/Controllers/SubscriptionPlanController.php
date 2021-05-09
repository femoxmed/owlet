<?php

namespace App\Http\Controllers\Api;

use App\SubscriptionPlan;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
{

    public function createPlan(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['string', 'required', 'min:3'],
            'description' => ['string'],
            // 'duration' => ['string' , 'required'],
            'interval' => ['required' ,'string'],
            'amount' => [  'required'],
        ]);

        // dd('Bearer' . ' ' .  config('app.paystack_seckey'),);

        try {
            // $validatedData['currency'] = 'USD';
        //   dd($validatedData);
            // create a plan
  
            $http = new Client();

            $validatedData['amount'] = $validatedData['amount'];
            $response = $http->request(
                                'POST',
                                'https://api.paystack.co/plan',
                                [
                                    'json' => $validatedData,

                                    'headers' => [
                                        'Authorization' => 'Bearer' . ' ' .  config('app.paystack_seckey'),
                                    ]
                                ],
                                // [
                                //     'headers' => [
                                //          'Authorization' => 'Bearer' . ' ' .  config('app.paystack_seckey'),
                                //      ]
                                //     ]
                             );

            // dd($response);

             $body = (string) $response->getBody();
             $response = json_decode($body);
             if($response->status) {
                $subType =  SubscriptionPlan::create((array)$response->data);

                return response()->json([
                    'message' => 'Subscription plan created successfully',
                     'data' => $subType
                ], 201);
             }



        } catch (\Throwable $th) {
            throw $th;
        }

    }


    public function listPlans()
    {

        $plans = [];

        if(auth() && auth()->user()
            && !auth()->user()) {

            $plans =  SubscriptionPlan::all();
        }
     else {

         $plans =  SubscriptionPlan::where(['status' => 1])->get();

        }
        return $plans;

}

}
