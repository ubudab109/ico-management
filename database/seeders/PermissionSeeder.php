<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class PermissionSeeder extends Seeder
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
                'name' => 'user-index',
                'display_name' => 'List Users', // optional
                'description' => 'List All users', // optional
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ],
            [
                'name' => 'user-edit',
                'display_name' => 'Edit Users', // optional
                'description' => 'List All users', // optional
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ],
            [
                'name' => 'user-update',
                'display_name' => 'Update Users', // optional
                'description' => 'List All users', // optional
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create Users', // optional
                'description' => 'List All users', // optional
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ],
            [
                'name' => 'user-store',
                'display_name' => 'Store Users', // optional
                'description' => 'List All users', // optional
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete Users', // optional
                'description' => 'List All users', // optional
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ],
        ];
        Permission::insert($data);
    }
}
