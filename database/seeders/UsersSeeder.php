<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;
use illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'name' =>'Admin',
            'email' => 'admin@medisonmedia.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Aa123456'), // password
            'remember_token' => Str::random(10),
            ],
            [
                'name' =>'Ernest',
                'email' => 'ernestromen1996@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Aa123456'), // password
                'remember_token' => Str::random(10), 
            ]
        ];

        foreach($users as $user){
            User::create($user);

        }

    }
}
