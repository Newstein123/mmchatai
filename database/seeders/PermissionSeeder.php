<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'create users',
            'view users',
            'edit users',
            'delete users',
            'ban users',
            'create customers',
            'view customers',
            'edit customers',
            'delete customers',
            'ban customers',
            'view setting',
            'view permissions',
            'edit permissions',
            'edit general setting',
            'view general setting',
            'view account setting',
            'edit account setting'
        ];

        foreach($permissions as $permission) {
            $given_permission = Permission::create(['name' => $permission]);
            $given_permission->assignRole('super-admin');
        }
    }
}
