<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
use GuzzleHttp\Client;


class LoginController extends Controller
{

    public function me (Request $request)

    {
        try {
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            return response(['user' => auth()->user(),  auth()->user()->userable_type =>  auth()->user()->userable ,'accessToken' => $accessToken]);
        } catch (\Throwable $th) {
           return response()->json(['message' => 'Token Invalid'] , 401);
        }
      

     }


    public function login (Request $request)

    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
            ]);

           $login = auth()->attempt($loginData);
        //    dd($loginData);
            if(!$login) {

                // return response(['message'=> "Invalid Credentials"]);
                return response()->json(['message'=> "Invalid Credentials"], 401);
            }


            // if ( !auth()->user()->email_verified_at ) {
            //     return response()->json(["message" => "Please verify your email"], 401);
            // }


            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            return response(['user' => auth()->user() , auth()->user()->userable_type =>  auth()->user()->userable ,'accessToken' => $accessToken]);

    }


    public function logout ()

    {
        $user = auth()->user()->token();
        $user->revoke();
        return 'logged out'; // modify as per your need

    }





}
