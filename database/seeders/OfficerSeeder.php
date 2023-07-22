<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $officers = [
            [
                'nip' => '123456789012345678',
                'name' => 'Petugas',
                'job_title' => 'Petugas Perpustakaan',
                'phone_number' => '081234567890',
                'address' => "Dirumah",
                'gender' => 'L',
                'date_of_birth' => '2000-01-01',
                'profile_picture' => 'template/admin/img/profile.jpg',
            ]
        ];

        foreach ($officers as $officer) {
            \App\Models\Officer::create($officer);
        }
    }
}
