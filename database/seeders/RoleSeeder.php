<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'superadmin',
                'display_name' => 'Super Admin', // optional
                'description' => 'User is allowed to manage all apps', // optional
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ],

            [
                'id' => 2,
                'name' => 'investor',
                'display_name' => 'Investor', // optional
                'description' => 'This is investor', // optional
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ],

        ];

        Role::insert($data);
    }
}
