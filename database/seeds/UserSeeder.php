<?php

use App\User;
use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = Admin::create([
            'phone' => '0901234',
        ]);

       $user =  $admin->user()->create([
        'email' => 'elizabethoyekunle47@gmail.com',
        'first_name' => 'Elizabeth',
        'last_name' => 'Oyekunle',
        'email_verified_at' => now(),
        'password' => Hash::make('password')
        ]);


        $admin1 = Admin::create([
            'phone' => '09008',
        ]);

       $user =  $admin1->user()->create([
        'email' => 'femoxmed@gmail.com',
        'first_name' => 'Oluwafemi',
        'last_name' => 'Meduoye',
        'email_verified_at' => now(),
        'password' => Hash::make('password')
        ]);
    }
}
