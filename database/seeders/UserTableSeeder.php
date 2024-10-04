<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $createNewUsersPermission = Permission::create(['name' => 'create new Users']);
        $addUserToCustomerPermission = Permission::create(['name' => 'add user to customer']);

        $adminRole->givePermissionTo($createNewUsersPermission);
        $adminRole->givePermissionTo($addUserToCustomerPermission);

        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin-password')
        ]);

        $adminUser->assignRole($adminRole);
    }
}
