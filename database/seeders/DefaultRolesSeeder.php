<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DefaultRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=DefaultRolesSeeder
     */
    public function run(): void
    {
        Role::create(['name' => 'super admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'employee']);
    }
}
