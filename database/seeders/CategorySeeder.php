<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Pola Makan Sehat',
                'slug' => 'pola-makan-sehat',
                'description' => 'Tips dan panduan untuk pola makan sehat dan bergizi',
                'icon' => 'fas fa-apple-alt',
                'color' => '#4E342E',
                'sort_order' => 1,
                'header_type' => 'header',
                'is_active' => true
            ],
            [
                'name' => 'Aktivitas Fisik',
                'slug' => 'aktivitas-fisik',
                'description' => 'Panduan olahraga dan aktivitas fisik untuk kesehatan',
                'icon' => 'fas fa-dumbbell',
                'color' => '#556B2F',
                'sort_order' => 2,
                'header_type' => 'hero-olga',
                'is_active' => true
            ],
            [
                'name' => 'Kesehatan Mental',
                'slug' => 'kesehatan-mental',
                'description' => 'Tips menjaga kesehatan mental dan psikologis',
                'icon' => 'fas fa-brain',
                'color' => '#8B4513',
                'sort_order' => 3,
                'header_type' => 'hero-mental',
                'is_active' => true
            ],
            [
                'name' => 'Perawatan Diri',
                'slug' => 'perawatan-diri',
                'description' => 'Panduan perawatan diri dan self-care',
                'icon' => 'fas fa-spa',
                'color' => '#CD853F',
                'sort_order' => 4,
                'header_type' => 'header1',
                'is_active' => true
            ],
            [
                'name' => 'Gaya Hidup Vegan',
                'slug' => 'gaya-hidup-vegan',
                'description' => 'Panduan menjalani gaya hidup vegan yang sehat',
                'icon' => 'fas fa-leaf',
                'color' => '#228B22',
                'sort_order' => 5,
                'header_type' => 'header',
                'is_active' => true
            ],
            [
                'name' => 'Eco Living',
                'slug' => 'eco-living',
                'description' => 'Tips hidup ramah lingkungan dan berkelanjutan',
                'icon' => 'fas fa-globe-americas',
                'color' => '#2E8B57',
                'sort_order' => 6,
                'header_type' => 'header',
                'is_active' => true
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
