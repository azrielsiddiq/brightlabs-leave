<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // HRD
        User::factory()->create([
            'name' => 'HRD User',
            'email' => 'hrd@example.com',
            'password' => bcrypt('password'),
            'role' => 'hrd',
        ]);

        // Manager
        User::factory()->create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
        ]);

        // Karyawan (10 orang)
           User::factory()->create([
            'name' => 'Karyawan User',
            'email' => 'karyawan@example.com',
            'password' => bcrypt('password'),
            'role' => 'karyawan',
        ]);
    }
}
