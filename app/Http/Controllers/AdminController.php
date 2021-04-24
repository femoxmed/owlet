<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'firstname' => 'required|max:60',
                'lastname' => 'required|max:60',
                'email' => 'email|required|unique:users',
                'phone' => 'required|unique:admins',
                'password' => 'required'
            ]
        );

        $admin = Admin::create([
            'firstname' => trim($request->input('firstname')),
            'lastname' => trim($request->input('lastname')),
            'email' => trim($request->input('email')),
            'phone' => trim($request->input('phone'))
        ]);

        $user = new User;
        $user->name = "{$admin->firstname} {$admin->lastname}";
        $user->email = $admin->email;
        $user->password = Hash::make(trim($request->input('password')));

        $admin->user()->save($user);

        session('message', 'Welcome to Maine AutoParts! You can now login to start selling');

        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
