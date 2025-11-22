<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // bikin akun admin default
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'nama_lengkap' => 'Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        // bikin 5 user dummy (role = user)
        User::factory(5)->create([
            'role' => 'user',
        ]);
    }
}
