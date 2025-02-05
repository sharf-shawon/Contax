<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //User Permissions
        Permission::create(['name' => 'user.index']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.delete']);

        //Card Permissions
        Permission::create(['name' => 'card.index']);
        Permission::create(['name' => 'card.create']);
        Permission::create(['name' => 'card.edit']);
        Permission::create(['name' => 'card.delete']);
        Permission::create(['name' => 'card.register']);

        //Permission Permissions
        Permission::create(['name' => 'permission.index']);
        Permission::create(['name' => 'permission.create']);
        Permission::create(['name' => 'permission.edit']);
        Permission::create(['name' => 'permission.delete']);

        //Role Permissions
        Permission::create(['name' => 'role.index']);
        Permission::create(['name' => 'role.create']);
        Permission::create(['name' => 'role.edit']);
        Permission::create(['name' => 'role.delete']);

        //Profile Permissions
        Permission::create(['name' => 'profile.index']);
        Permission::create(['name' => 'profile.edit']);
        Permission::create(['name' => 'profile.delete']);
        //

        //Create Super Admin Role and Assign My account to it
        Role::create(['name' => 'Super Admin']);
        User::find(1)->assignRole('Super Admin');

        //Create Admin Role and Assign all permissions to it
        Role::create(['name' => 'Admin']);
        Role::find(2)->syncPermissions(Permission::all()->pluck('name'));
        User::find(2)->assignRole('Admin');
    }
}
