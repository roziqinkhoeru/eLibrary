<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'grade' => 'X',
                'major' => 'Teknik Komputer Jaringan',
                'name' => 'X TKJ 1',
            ],
            [
                'grade' => 'X',
                'major' => 'Teknik Komputer Jaringan',
                'name' => 'X TKJ 2',
            ],
            [
                'grade' => 'XI',
                'major' => 'Teknik Komputer Jaringan',
                'name' => 'XI TKJ',
            ],
            [
                'grade' => 'XII',
                'major' => 'Teknik Komputer Jaringan',
                'name' => 'XII TKJ',
            ],
            [
                'grade' => 'X',
                'major' => 'Asisten Keperawatan',
                'name' => 'X AK 1',
            ],
            [
                'grade' => 'X',
                'major' => 'Asisten Keperawatan',
                'name' => 'X AK 2',
            ],
            [
                'grade' => 'XI',
                'major' => 'Asisten Keperawatan',
                'name' => 'XI AK',
            ],
            [
                'grade' => 'XII',
                'major' => 'Asisten Keperawatan',
                'name' => 'XII AK',
            ],
        ];

        foreach ($classes as $class) {
            \App\Models\ClassSchool::create($class);
        }
    }
}
