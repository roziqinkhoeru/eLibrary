<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'nis' => '220101', 'class_school_id' => 1, 'name' => 'A. FIRDA GUSTA RIAN TAMA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220102', 'class_school_id' => 1, 'name' => 'A. FAHRUROZY', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220103', 'class_school_id' => 1, 'name' => 'AHMAD MIFTAHUL KHOIR', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220104', 'class_school_id' => 1, 'name' => 'ANDIANSAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220105', 'class_school_id' => 1, 'name' => 'ALVINO KUSUMA PUTRA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220106', 'class_school_id' => 1, 'name' => 'ARI NUR OKTAZA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220107', 'class_school_id' => 1, 'name' => 'BRAYEN HANIFA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220108', 'class_school_id' => 1, 'name' => 'DIDA RISKI IFANSYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220109', 'class_school_id' => 1, 'name' => 'DINA AYU HARTATI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220110', 'class_school_id' => 1, 'name' => 'DITA ABELIA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220111', 'class_school_id' => 1, 'name' => 'FARHAN KUMAYADI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220112', 'class_school_id' => 1, 'name' => 'FERA FEBRIYANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220113', 'class_school_id' => 1, 'name' => 'FIRMAN HIDAYAT', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220114', 'class_school_id' => 1, 'name' => 'GALANG DANUARTA ALFIKRI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220115', 'class_school_id' => 1, 'name' => 'HABIBTURAHMADANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220116', 'class_school_id' => 1, 'name' => 'HANIF IHSAN NURYODA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220117', 'class_school_id' => 1, 'name' => 'HUDA TRI ANDIKA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220129', 'class_school_id' => 2, 'name' => 'AKHMAD PAREL KURNIAWAN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220118', 'class_school_id' => 2, 'name' => 'ILYAS SATI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220119', 'class_school_id' => 2, 'name' => 'IRA APRILIA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220120', 'class_school_id' => 2, 'name' => 'MUHAMMAD WAHYUDIN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220121', 'class_school_id' => 2, 'name' => 'NICKY RAMADHAN LESMANA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220122', 'class_school_id' => 2, 'name' => 'RAMONA RAHAYU VIKTORIA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220123', 'class_school_id' => 2, 'name' => 'RANDU YOPA IBRAHIM', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220124', 'class_school_id' => 2, 'name' => 'REGA FERNANDO', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220125', 'class_school_id' => 2, 'name' => 'RIO UTOMO', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220126', 'class_school_id' => 2, 'name' => 'SEPTI ZULAIKA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220127', 'class_school_id' => 2, 'name' => 'YAZID AL ATSARI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220128', 'class_school_id' => 2, 'name' => 'ZAINUL HAKIM', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220130', 'class_school_id' => 2, 'name' => 'IMELDA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220131', 'class_school_id' => 2, 'name' => 'JOFALIN BADRIANSYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220132', 'class_school_id' => 2, 'name' => 'LAILA ULFA PUTRI UTAMI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220133', 'class_school_id' => 2, 'name' => 'M. RIFQO IRFANI MAULANA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220134', 'class_school_id' => 2, 'name' => 'M. ZAINUDIN MALIK', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220135', 'class_school_id' => 2, 'name' => 'MAULANA IBRAHIM', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220136', 'class_school_id' => 2, 'name' => 'NABILA ESSA RAMADANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220137', 'class_school_id' => 2, 'name' => 'RIDHO ARKA PRATAMA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
            [
                'nis' => '220138', 'class_school_id' => 2, 'name' => 'YENI MARLINA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'template/admin/img/profile.jpg',
            ],
        ];
        $nama = [];
        foreach ($students as $student) {
            Student::create($student);
            $namaArray = explode(' ', $student['name']);
            $namaBelakang = strtolower(end($namaArray));
            if (in_array($namaBelakang, $nama)) {
                $namaBelakang = $namaBelakang . count($nama);
            } else {
                array_push($nama, $namaBelakang);
            }
            $user = [
                'username' => $namaBelakang,
                'email' => $namaBelakang.'@gmail.com',
                'password' => bcrypt('student123'),
                'role_id' => 1,
                'student_id' => $student['nis'],
            ];

            User::create($user);
        }
    }
}
