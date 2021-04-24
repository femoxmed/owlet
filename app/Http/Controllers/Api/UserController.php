<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\CreateAgentJob;
use App\Jobs\CreateDealerJob;
use App\Dealer;
use App\Agent;
use App\User;

class UserController extends Controller

{


    public function getMorphed() {
        $data = User::where('userable_type', 'App\Dealer')->get();
      return response()->json($data, 200);
    }

    public function registerAgent(RegisterationRequest $request) {

        $payload = $request->validated();
        $payload['password'] = Hash::make($request['password']);
        $user = User::create($payload);

        Dealer::create($payload);

        if (isset($request['avatar'])) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        // CreateDealerJob::dispatchAfterResponse($request->validated(), $user);

        try {
            $this->user->sendEmailVerificationNotification();
        } catch (\Throwable $th) {
            //throw $th;
        }

        return response()->json([
            'message' => 'Account Created, Please check your mail to verify your Account',
            'data' => $user
    ], 201);
    }


}
