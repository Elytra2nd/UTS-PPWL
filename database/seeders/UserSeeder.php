<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat User Admin
        $admin = User::create([
            'name' => 'Adminfufufafa',
            'email' => 'adminfufufafa@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin'); // Berikan role admin

        // Buat User Biasa
        $user = User::create([
            'name' => 'yogi',
            'email' => 'yogi@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('user'); // Berikan role user
    }
}
