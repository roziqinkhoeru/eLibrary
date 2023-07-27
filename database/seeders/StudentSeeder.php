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
                'nis' => '220101', 'class_school_id' => 1, 'name' => 'A. FIRDA GUSTA RIAN TAMA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220102', 'class_school_id' => 1, 'name' => 'A. FAHRUROZY', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220103', 'class_school_id' => 1, 'name' => 'AHMAD MIFTAHUL KHOIR', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220104', 'class_school_id' => 1, 'name' => 'ANDIANSAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220105', 'class_school_id' => 1, 'name' => 'ALVINO KUSUMA PUTRA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220106', 'class_school_id' => 1, 'name' => 'ARI NUR OKTAZA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220107', 'class_school_id' => 1, 'name' => 'BRAYEN HANIFA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220108', 'class_school_id' => 1, 'name' => 'DIDA RISKI IFANSYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220109', 'class_school_id' => 1, 'name' => 'DINA AYU HARTATI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220110', 'class_school_id' => 1, 'name' => 'DITA ABELIA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220111', 'class_school_id' => 1, 'name' => 'FARHAN KUMAYADI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220112', 'class_school_id' => 1, 'name' => 'FERA FEBRIYANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220113', 'class_school_id' => 1, 'name' => 'FIRMAN HIDAYAT', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220114', 'class_school_id' => 1, 'name' => 'GALANG DANUARTA ALFIKRI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220115', 'class_school_id' => 1, 'name' => 'HABIBTURAHMADANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220116', 'class_school_id' => 1, 'name' => 'HANIF IHSAN NURYODA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220117', 'class_school_id' => 1, 'name' => 'HUDA TRI ANDIKA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220129', 'class_school_id' => 2, 'name' => 'AKHMAD PAREL KURNIAWAN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220118', 'class_school_id' => 2, 'name' => 'ILYAS SATI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220119', 'class_school_id' => 2, 'name' => 'IRA APRILIA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220120', 'class_school_id' => 2, 'name' => 'MUHAMMAD WAHYUDIN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220121', 'class_school_id' => 2, 'name' => 'NICKY RAMADHAN LESMANA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220122', 'class_school_id' => 2, 'name' => 'RAMONA RAHAYU VIKTORIA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220123', 'class_school_id' => 2, 'name' => 'RANDU YOPA IBRAHIM', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220124', 'class_school_id' => 2, 'name' => 'REGA FERNANDO', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220125', 'class_school_id' => 2, 'name' => 'RIO UTOMO', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220126', 'class_school_id' => 2, 'name' => 'SEPTI ZULAIKA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220127', 'class_school_id' => 2, 'name' => 'YAZID AL ATSARI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220128', 'class_school_id' => 2, 'name' => 'ZAINUL HAKIM', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220130', 'class_school_id' => 2, 'name' => 'IMELDA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220131', 'class_school_id' => 2, 'name' => 'JOFALIN BADRIANSYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220132', 'class_school_id' => 2, 'name' => 'LAILA ULFA PUTRI UTAMI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220133', 'class_school_id' => 2, 'name' => 'M. RIFQO IRFANI MAULANA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220134', 'class_school_id' => 2, 'name' => 'M. ZAINUDIN MALIK', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220135', 'class_school_id' => 2, 'name' => 'MAULANA IBRAHIM', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220136', 'class_school_id' => 2, 'name' => 'NABILA ESSA RAMADANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220137', 'class_school_id' => 2, 'name' => 'RIDHO ARKA PRATAMA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220138', 'class_school_id' => 2, 'name' => 'YENI MARLINA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210101', 'class_school_id' => 3, 'name' => 'AILIA SALSABILA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210102', 'class_school_id' => 3, 'name' => 'BAHARUDIN JUSUF HABIBI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210103', 'class_school_id' => 3, 'name' => 'BAYU CHAHYA KHUSUMA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210104', 'class_school_id' => 3, 'name' => 'DWI MAULINA ANGGRAINI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210105', 'class_school_id' => 3, 'name' => 'ENGGAR TRI PANGESTU', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210106', 'class_school_id' => 3, 'name' => 'ENJEL KARISTA AMANA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210107', 'class_school_id' => 3, 'name' => 'HASTI ALIYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210108', 'class_school_id' => 3, 'name' => 'HESI DWI LESTARI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210109', 'class_school_id' => 3, 'name' => 'IRWANSYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210110', 'class_school_id' => 3, 'name' => 'M. FADLI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210111', 'class_school_id' => 3, 'name' => 'M. IQBAL HAMDALLAH HERDIN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210112', 'class_school_id' => 3, 'name' => 'MUHAMMAD ABDUH K', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210113', 'class_school_id' => 3, 'name' => 'MUHAMMAD REJA PERMANA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210114', 'class_school_id' => 3, 'name' => 'NABIL AZMY AL-AZIZ', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210115', 'class_school_id' => 3, 'name' => 'NAFIRA PUTRI HERFIANTI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210116', 'class_school_id' => 3, 'name' => 'NISRINA FARY KHAIRUNISA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210117', 'class_school_id' => 3, 'name' => 'RAHMAWATI HANIFAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210118', 'class_school_id' => 3, 'name' => 'RICARD CAHYA MUKTI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210119', 'class_school_id' => 3, 'name' => 'RINA MIRNALIA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210120', 'class_school_id' => 3, 'name' => 'RIZAL ABDULLOH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210121', 'class_school_id' => 3, 'name' => 'ROVI ANJANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210122', 'class_school_id' => 3, 'name' => 'YUGA RIYAN SAPUTRA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210123', 'class_school_id' => 3, 'name' => 'WAHYU HERI IRAWAN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210124', 'class_school_id' => 3, 'name' => 'SRI RAHAYU', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200101', 'class_school_id' => 4, 'name' => 'AYU NEDIA LINDA YANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200102', 'class_school_id' => 4, 'name' => 'EDO MAPATRA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200103', 'class_school_id' => 4, 'name' => 'HABIB DAIFULLAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200104', 'class_school_id' => 4, 'name' => 'IRMA SULISTYA SAPUTRI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200105', 'class_school_id' => 4, 'name' => 'OKTAVIA RAHMAD HANINA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200106', 'class_school_id' => 4, 'name' => 'PUJI AYU LESTARI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200107', 'class_school_id' => 4, 'name' => 'SISKA AGUSTIN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200108', 'class_school_id' => 4, 'name' => 'YULI PURNAMASARI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200109', 'class_school_id' => 4, 'name' => 'AMIN WF', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200110', 'class_school_id' => 4, 'name' => 'ANGGI MEISENI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200111', 'class_school_id' => 4, 'name' => 'CHALISTHA ALFITRI RAMADHANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200112', 'class_school_id' => 4, 'name' => 'DANIA ERMILA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200113', 'class_school_id' => 4, 'name' => 'DENA RIFKI IRFANSYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200114', 'class_school_id' => 4, 'name' => 'DIMAS SANJAYA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200115', 'class_school_id' => 4, 'name' => 'DWI FOTRI NINGSI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200116', 'class_school_id' => 4, 'name' => 'ELFIA ADIANSAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200117', 'class_school_id' => 4, 'name' => 'GEDE ARTHA KURNIAWAN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200118', 'class_school_id' => 4, 'name' => 'GUNTUR ILAHI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200119', 'class_school_id' => 4, 'name' => 'IHSAN RAMADANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200120', 'class_school_id' => 4, 'name' => 'LARAS ANGGRAENI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200121', 'class_school_id' => 4, 'name' => 'MUHAMMAD IQBAL FARY MARZUKI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200122', 'class_school_id' => 4, 'name' => 'NABILA AZZAHRA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200123', 'class_school_id' => 4, 'name' => 'Nanang', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200124', 'class_school_id' => 4, 'name' => 'ROHMAT IQBAL', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200125', 'class_school_id' => 4, 'name' => 'SOLIKHATUN NISA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200126', 'class_school_id' => 4, 'name' => 'YOFI THALITHA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200127', 'class_school_id' => 4, 'name' => 'RISKI KHOIRUL ANAN S.', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220201', 'class_school_id' => 5, 'name' => 'ALIYA FARILIANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220202', 'class_school_id' => 5, 'name' => 'AMDA SYAHROMI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220203', 'class_school_id' => 5, 'name' => 'ANDI NURAHMAN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220204', 'class_school_id' => 5, 'name' => 'ARDIANSYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220205', 'class_school_id' => 5, 'name' => 'AMBAR KINANTI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220206', 'class_school_id' => 5, 'name' => 'ARI NUR OKTAZA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220207', 'class_school_id' => 5, 'name' => 'BUDI HALIF SAMUDIN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220208', 'class_school_id' => 5, 'name' => 'BENIO ANJAS', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220209', 'class_school_id' => 5, 'name' => 'DINDA ANDIN FAULINA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220210', 'class_school_id' => 5, 'name' => 'DITA MURBALIN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220211', 'class_school_id' => 5, 'name' => 'ESTU PRAMONO', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220212', 'class_school_id' => 5, 'name' => 'FERDIANSYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220213', 'class_school_id' => 5, 'name' => 'FIKA MAYLANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220214', 'class_school_id' => 5, 'name' => 'FERI HASYADI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220215', 'class_school_id' => 5, 'name' => 'GILANG PERMANA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220216', 'class_school_id' => 5, 'name' => 'GUSTI ARYA RULIANSYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220217', 'class_school_id' => 5, 'name' => 'HEMA IMANI SASKIA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220218', 'class_school_id' => 5, 'name' => 'KURNIA SARI ANJANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220219', 'class_school_id' => 5, 'name' => 'MURNIA ASELIN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220220', 'class_school_id' => 6, 'name' => 'APRILIA FERIA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220221', 'class_school_id' => 6, 'name' => 'DANDI AHYADI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220222', 'class_school_id' => 6, 'name' => 'EVA YUNDA PURNOMO', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220223', 'class_school_id' => 6, 'name' => 'GEHAN JOHAN FIRMANSYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220224', 'class_school_id' => 6, 'name' => 'HESTIA MAULINA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220225', 'class_school_id' => 6, 'name' => 'IRFAN RIANDI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220226', 'class_school_id' => 6, 'name' => 'JESIKA ESTINA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220227', 'class_school_id' => 6, 'name' => 'KURNIA LILIANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220228', 'class_school_id' => 6, 'name' => 'LAILATUL ISYAIYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220229', 'class_school_id' => 6, 'name' => 'NAKINA RUMI ASYIFA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220230', 'class_school_id' => 6, 'name' => 'SULI ANANDYA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220231', 'class_school_id' => 6, 'name' => 'AQILLA NUR HASSANAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220232', 'class_school_id' => 6, 'name' => 'ULFA NIANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220233', 'class_school_id' => 6, 'name' => 'CECIL AFDONI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220234', 'class_school_id' => 6, 'name' => 'M. ZAINAL', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220235', 'class_school_id' => 6, 'name' => 'MARIA SELINA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220236', 'class_school_id' => 6, 'name' => 'MISKA JUNNYANA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220237', 'class_school_id' => 6, 'name' => 'ZASKIA MUHAROMI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '220238', 'class_school_id' => 6, 'name' => 'VENI YURASI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210201', 'class_school_id' => 7, 'name' => 'AJENG SAFITRI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210202', 'class_school_id' => 7, 'name' => 'ANAN KRISNA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210203', 'class_school_id' => 7, 'name' => 'DARMA IRWANSYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210204', 'class_school_id' => 7, 'name' => 'DWI SINTIA PANGESTU', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210205', 'class_school_id' => 7, 'name' => 'ENGGAR FAIRA ASNANDA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210206', 'class_school_id' => 7, 'name' => 'ENIANA URILIA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210207', 'class_school_id' => 7, 'name' => 'DEMIAN JHOSEP RAHARJA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210208', 'class_school_id' => 7, 'name' => 'DEDI JULKARNAIN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210209', 'class_school_id' => 7, 'name' => 'GERHANA ABDULLAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210210', 'class_school_id' => 7, 'name' => 'HABIB BIAN NIRSULA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210211', 'class_school_id' => 7, 'name' => 'IKHWAN JAKIYAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210212', 'class_school_id' => 7, 'name' => 'EMUHAMMAD ABDUL FIKRI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210213', 'class_school_id' => 7, 'name' => 'MIRAI HANNA JOELIN', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210214', 'class_school_id' => 7, 'name' => 'JHOSEVINE OKTA FINARI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210215', 'class_school_id' => 7, 'name' => 'ERVINA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210216', 'class_school_id' => 7, 'name' => 'JEFRIAN ELINAI BOBE', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210217', 'class_school_id' => 7, 'name' => 'IREN ANINDA PUSPITA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210218', 'class_school_id' => 7, 'name' => 'ROY ABDULLAH', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210219', 'class_school_id' => 7, 'name' => 'RINA SEMBANG ASTUTI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210220', 'class_school_id' => 7, 'name' => 'KIRANA AFDHANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210221', 'class_school_id' => 7, 'name' => 'KINAN LULYANA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210222', 'class_school_id' => 7, 'name' => 'YOGA PERMANA PUTRA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210223', 'class_school_id' => 7, 'name' => 'DIMAS PRAYOGA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '210224', 'class_school_id' => 7, 'name' => 'YUNDA YUTISA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200201', 'class_school_id' => 8, 'name' => 'AYUNDA RISA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200202', 'class_school_id' => 8, 'name' => 'ENDANG HIRANI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200203', 'class_school_id' => 8, 'name' => 'ERINA NAIBAHO', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200204', 'class_school_id' => 8, 'name' => 'GUSTAVIA JEN YELINDA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200205', 'class_school_id' => 8, 'name' => 'OKTA KURNIA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200206', 'class_school_id' => 8, 'name' => 'TIKA FISTIN SAFIRA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200207', 'class_school_id' => 8, 'name' => 'YOHANA FENINDI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200208', 'class_school_id' => 8, 'name' => 'FRANSISKA EMMANUEL', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200209', 'class_school_id' => 8, 'name' => 'MUTIA NABILA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200210', 'class_school_id' => 8, 'name' => 'LUTFIA HASSAN FAURIA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200211', 'class_school_id' => 8, 'name' => 'VIRA ANYA SULFI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200212', 'class_school_id' => 8, 'name' => 'ZAKI FRANSEBI', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
            ],
            [
                'nis' => '200213', 'class_school_id' => 8, 'name' => 'ULMIATUL HUSNA', 'address' => 'Sumatera', 'gender' => 'L', 'phone_number' => '081234567890', 'date_of_birth' => '2000-01-01', 'profile_picture' => 'img/profile.jpg',
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
                'role_id' => 2,
                'student_id' => $student['nis'],
            ];

            User::create($user);
        }
    }
}
