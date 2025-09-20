<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk membuat akun admin default.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@lifia.com'],
            [
                'nama_lengkap' => 'Administrator',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );
    }
}
