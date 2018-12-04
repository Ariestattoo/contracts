<?php

use App\Models\Permission;
use Hyn\Tenancy\Database\Connection;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    public function run()
    {
        $this->addRolesAndPermissions();
    }

    private function addRolesAndPermissions()
    {
        // create permissions for an admin
        $adminPermissions = collect(['create user', 'edit user', 'delete user'])->map(function ($name) {
            return Permission::create(['name' => $name]);
        });
        // add admin role
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($adminPermissions);

        // add a default user role
        Role::create(['name' => 'user']);
    }
}