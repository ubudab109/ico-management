<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'role_id' => 1,
            'user_id' => 1,
            'user_type' => 'App\Models\User',
        ];

        DB::table('role_user')->insert($data);
    }
}
