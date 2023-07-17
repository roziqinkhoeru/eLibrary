<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'TKJ',
                'description' => 'Teknik Komputer Jaringan',
            ],
            [
                'name' => 'AK',
                'description' => 'Asisten Keperawatan',
            ],
            [
                'name' => 'umum',
                'description' => 'Umum',
            ]
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
