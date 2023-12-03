<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DefaultRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=DefaultRolesSeeder
     */
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Employee']);

        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'assign permission to role']);

        $superAdmin->givePermissionTo(['create role', 'create permission', 'assign permission to role']);
    }
}
