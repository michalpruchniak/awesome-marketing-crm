<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin',
        ]);

        $createNewUsersPermission = Permission::create(['name' => 'create new Users']);
        $addNewCustomer = Permission::create(['name' => 'add new customer']);
        $addUserToCustomerPermission = Permission::create(['name' => 'add user to customer']);
        $addNewPassword = Permission::create(['name' => 'add new password']);
        $gotPassword = Permission::create(['name' => 'got password']);
        $manageUsers = Permission::create(['name' => 'manage users']);
        $addActivity = Permission::create(['name' => 'add activity']);
        $showActivities = Permission::create(['name' => 'show activities']);

        $adminRole->givePermissionTo($createNewUsersPermission);
        $adminRole->givePermissionTo($addNewCustomer);
        $adminRole->givePermissionTo($addUserToCustomerPermission);
        $adminRole->givePermissionTo($addNewPassword);
        $adminRole->givePermissionTo($gotPassword);
        $adminRole->givePermissionTo($manageUsers);
        $adminRole->givePermissionTo($addActivity);
        $adminRole->givePermissionTo($showActivities);

        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin-password'),
        ]);

        $adminUser->assignRole($adminRole);
    }
}
