<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'petugas',
                'email' => 'petugas@gmail.com',
                'password' => bcrypt('admin123'),
                'role_id' => 1,
                'officer_id' => '123456789012345678',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
