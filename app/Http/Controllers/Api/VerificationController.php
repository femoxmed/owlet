<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Access\AuthorizationException;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api')->only('');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }



    public function verify(Request $request) {

        auth()->loginUsingId($request->route('id'));

        if($request->route('id') != $request->user()->getKey()) {
            throw new AuthorizationException;
        }

        if($request->user()->hasVerifiedEmail()) {
            return response(['message' => 'Already Verifield']);
        }

        if($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        //send welcome as Agent Email

        return response(['message' => 'Successfully Verified']);
    }

    public function resend(Request $request)
    {
        // auth()->login($request->email);

        if ($request->user()->hasVerifiedEmail()) {
            return response(['message' => 'Already verified']);
        }

        $request->user()->sendEmailVerificationNotification();

        if ($request->wantsJson()) {
            return response(['message' => 'Email Sent']);
        }

        return response(['message' => 'Email Sent']);

    }


}
