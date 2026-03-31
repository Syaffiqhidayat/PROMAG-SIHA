<?php

namespace  Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the  database seeds.
     */
    public function run(): void
    {
        // Create Permissions
        Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'view permission']);
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);

        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'view hardware']);
        Permission::create(['name' => 'create hardware']);
        Permission::create(['name' => 'update hardware']);
        Permission::create(['name' => 'delete hardware']);

        Permission::create(['name' => 'view kerusakan']);
        Permission::create(['name' => 'create kerusakan']);
        Permission::create(['name' => 'createid kerusakan']);
        Permission::create(['name' => 'update kerusakan']);
        Permission::create(['name' => 'delete kerusakan']);

        Permission::create(['name' => 'view unit']);
        Permission::create(['name' => 'create unit']);
        Permission::create(['name' => 'createid unit']);
        Permission::create(['name' => 'update unit']);
        Permission::create(['name' => 'delete unit']);        

        Permission::create(['name' => 'view menu']);



        // Create Roles
        $superAdminRole = Role::create(['name' => 'super-admin']); //as super-admin
        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);
        $userRole = Role::create(['name' => 'user']);

        // Lets give all permission to super-admin role.
        $allPermissionNames = Permission::pluck('name')->toArray();

        $superAdminRole->givePermissionTo($allPermissionNames);

        // Let's give few permissions to admin role.
        $adminRole->givePermissionTo(['create role', 'view role', 'update role']);
        $adminRole->givePermissionTo(['create permission', 'view permission']);
        $adminRole->givePermissionTo(['create user', 'view user', 'update user']);
        $adminRole->givePermissionTo(['create hardware', 'view hardware', 'update hardware']);


        // Let's Create User and assign Role to it.

        $superAdminUser = User::firstOrCreate([
                    'email' => 'superadmin@gmail.com',
                ], [
                    'name' => 'Super Admin',
                    'email' => 'superadmin@gmail.com',
                    'password' => Hash::make ('12345678'),
                ]);

        $superAdminUser->assignRole($superAdminRole);


        $adminUser = User::firstOrCreate([
                            'email' => 'admin@gmail.com'
                        ], [
                            'name' => 'Admin',
                            'email' => 'admin@gmail.com',
                            'password' => Hash::make ('12345678'),
                        ]);

        $adminUser->assignRole($adminRole);


        $staffUser = User::firstOrCreate([
                            'email' => 'staff@gmail.com',
                        ], [
                            'name' => 'Staff IT',
                            'email' => 'staff@gmail.com',
                            'password' => Hash::make('12345678'),
                        ]);

        $staffUser->assignRole($staffRole);

        $User = User::firstOrCreate([
                            'email' => 'user@gmail.com',
                        ], [
                            'name' => 'User',
                            'email' => 'user@gmail.com',
                            'password' => Hash::make('12345678'),
                        ]);

        $User->assignRole($userRole);        
    }
}