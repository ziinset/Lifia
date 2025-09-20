<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UpdateUserPremiumStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Set jonathanarya79@gmail.com as premium
        User::where('email', 'jonathanarya79@gmail.com')->update(['is_premium' => true]);
        
        // Set goldi@gmail.com as non-premium (default is already false)
        User::where('email', 'goldi@gmail.com')->update(['is_premium' => false]);
        
        // For all other users, set random premium status for demonstration
        User::whereNotIn('email', ['jonathanarya79@gmail.com', 'goldi@gmail.com'])
            ->get()
            ->each(function ($user) {
                $user->update(['is_premium' => rand(0, 1) == 1]);
            });
    }
}
