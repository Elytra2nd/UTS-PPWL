<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Buat role Admin dan User
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Tambahkan permission
        Permission::firstOrCreate(['name' => 'manage_inventory']);
        Permission::firstOrCreate(['name' => 'view_inventory']);

        // Assign permissions ke role
        $adminRole->givePermissionTo(['manage_inventory', 'view_inventory']);
        $userRole->givePermissionTo(['view_inventory']);
    }
}
