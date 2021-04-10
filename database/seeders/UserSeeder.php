<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
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
        // Default credentials
        \App\Models\User::insert([
            [
                'id' => 1,
                'name' => 'Superadmin',
                'email' => 'superadmin@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123123123'), // password
                'gender' => 'male',
                'active' => 1,
                'remember_token' => Str::random(10)
            ],
            [
                'id' => 2,
                'name' => 'Investor',
                'email' => 'investor@investor.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123123123'), // password
                'gender' => 'male',
                'active' => 1,
                'remember_token' => Str::random(10)
            ]

        ]);
    }
}
