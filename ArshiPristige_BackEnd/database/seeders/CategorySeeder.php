<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Residential Architecture',
                'description' => 'Houses, apartments, and residential buildings',
                'icon' => 'home',
                'color' => '#3B82F6',
            ],
            [
                'name' => 'Commercial Architecture',
                'description' => 'Office buildings, retail spaces, and commercial structures',
                'icon' => 'building',
                'color' => '#10B981',
            ],
            [
                'name' => 'Industrial Architecture',
                'description' => 'Factories, warehouses, and industrial facilities',
                'icon' => 'factory',
                'color' => '#F59E0B',
            ],
            [
                'name' => 'Landscape Architecture',
                'description' => 'Garden design, parks, and outdoor spaces',
                'icon' => 'tree',
                'color' => '#059669',
            ],
            [
                'name' => 'Interior Design',
                'description' => 'Interior spaces, furniture, and decoration',
                'icon' => 'sofa',
                'color' => '#8B5CF6',
            ],
            [
                'name' => 'Urban Planning',
                'description' => 'City planning, master plans, and urban development',
                'icon' => 'map',
                'color' => '#EF4444',
            ],
            [
                'name' => 'Renovation',
                'description' => 'Building renovation and restoration projects',
                'icon' => 'hammer',
                'color' => '#6B7280',
            ],
            [
                'name' => 'Sustainable Design',
                'description' => 'Green building and eco-friendly architecture',
                'icon' => 'leaf',
                'color' => '#84CC16',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
} 