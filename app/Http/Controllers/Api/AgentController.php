<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agent;
use Illuminate\Support\Facades\Hash;


class AgentController extends Controller
{
    public function registerAgent(Request $request) {

        $validatedData = $request->validate([
            'avatar' => 'sometimes|mimes:png,gif,jpeg',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
            'first_name' => 'required|string|max:60',
            'last_name' => 'required|string|max:60',
            'phone' => 'required|string|unique:agents',
            'alternative_number' => 'nullable|string|unique:agents',
            'gender' => 'nullable|in:male,female',
            ]);

        $payload = $validatedData;
        // $payload['password'] = Hash::make($request['password']);
        $agent = Agent::create([
            // 'first_name' => $validatedData['first_name'],
            // 'last_name' => $validatedData['last_name'] ,
            'phone' => $validatedData['phone'],
            'alternative_number' => isset($validatedData['alternative_number']) ? $validatedData['alternative_number'] : null ,
            // 'email' => $validatedData['email'],
            'gender' => $validatedData['gender']
        ]);

       $user =  $agent->user()->create([
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
            // throw $th;
        }

        return response()->json([
            'message' => 'Agent Account Created, Please check your mail to verify your Account',
            'data' => $agent
    ], 201);
    }
}
