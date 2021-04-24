<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Session;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'email|required',
                'password' => 'required'
            ]
        );

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->intended('/admin');
        }
        else{
            session('error', 'You have entered an invalid email address or password');
            return redirect()->route('login');
        }
    }

    public function resetPassword(Request $request)

    {
        $token = $request->token;
        $email = $request->email;
        // dd($email);
       return view('auth.password.reset', compact('token' , 'email'));
    }


}
