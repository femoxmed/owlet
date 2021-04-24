<?php

namespace App\Http\Controllers\Api;

use App\Advert;
use App\Dealer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;




class DealerController extends Controller
{


    public function index()
    {

            $users = Dealer::with(['user'])->get();

            return response()->json($users, 200, );
    }


    public function registerDealer(Request $request) {

        $validatedData = $request->validate([
            'avatar' => 'sometimes|mimes:png,gif,jpeg',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
            'first_name' => 'required|string|max:60',
            'last_name' => 'required|string|max:60',
            'company_name' => 'nullable|string|max:60',
            'gender' => 'nullable|in:male,female',
            'is_company' => 'required|boolean',
            'phone' => 'required|string|unique:dealers',
            'alternative_number' => 'nullable|string|unique:dealers',
            ]);

        $payload = $validatedData;
        // $payload['password'] = Hash::make($request['password']);
        $dealer = Dealer::create([
            // 'first_name' => $validatedData['first_name'],
            // 'last_name' => $validatedData['last_name'] ,
            'company_name' => isset($validatedData['company_name']) ? $validatedData['company_name'] : null ,
            'is_company' => $validatedData['is_company'],
            'phone' => $validatedData['phone'],
            'alternative_number' => isset($validatedData['alternative_number']) ? $validatedData['alternative_number'] : null ,
            'email' => $validatedData['email']
        ]);

       $user =  $dealer->user()->create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'] ,
            'email' => $validatedData['email'],
            'password' => Hash::make($request['password'])
        ]);

        if (isset($request['avatar'])) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }

        try {
            $user->sendEmailVerificationNotification();
            //send agent welcome email
        } catch (\Throwable $th) {
            throw $th;
        }


        return response()->json([
            'message' => 'Dealer Account Created, Please check your mail to verify your Account',
            'data' => $dealer
    ], 201);
    }

    public function updateDealer(Request $request) {

        $validatedDataUser = $request->validate([
            'first_name' => 'nullable|string|max:60',
            'last_name' => 'nullable|in:male,female',
    
            ]);

        $validatedData = $request->validate([
            'company_name' => 'nullable|string|max:60',
            'gender' => 'nullable|in:male,female',
            'alternative_number' => 'nullable|string',//|unique:dealers
            ]);
            
            $address = $request->address;
            auth()->user()->update($validatedDataUser);
            $dealer = auth()->user()->userable->update($validatedData);
            if($address) {
               $request->validate([
                    'country' => 'sometimes',
                    'country' => 'required',
                    'longitude' => 'required',
                    'latitude' => 'required',
                    'state' => 'required',
                    'address' => 'required',
                    ]);
                //  return response()->json(!(bool)auth()->user()->address);
                    if ((bool)auth()->user()->address){
                        // dd('ok');
                        (auth()->user())->address->update([
                            'address' => $request->address,
                            'city'=> $request->city,
                            'country'=> $request->country,
                            'lga'=> $request->lga,
                            'surburb'=> $request->surburb,
                            'state'=> $request->state,
                            'postal_code'=> $request->postal_code,
                            'longitude'=> $request->longitude,
                            'latitude'=> $request->latitude,
                        ]);
                    }else {
                 
                         auth()->user()->address()->create([
                            'address' => $request->address,
                            'city'=> $request->city,
                            'country'=> $request->country,
                            'lga'=> $request->lga,
                            'surburb'=> $request->surburb,
                            'state'=> $request->state,
                            'postal_code'=> $request->postal_code,
                            'longitude'=> $request->longitude,
                            'latitude'=> $request->latitude,
                        ]);
                    }

            } 
         
            $user = auth()->user();
            if (isset($request['avatar'])) {
                $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
            }
    
           
            return response()->json([
                'message' => 'Dealer Updated',
                'data' => auth()->user(),
        ], 200);
            }
   


}
