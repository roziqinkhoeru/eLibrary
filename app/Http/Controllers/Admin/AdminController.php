<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin | Perpus Digital',
            'currentNav' => 'dashboard'
        ];
        return view('admin.dashboard', $data);
    }

    public function student()
    {
        $data = [
            'title' => 'Data Siswa | Perpus Digital',
            'currentNav' => 'student'
        ];

        return view('admin.students.index', $data);
    }

    public function getStudent()
    {
        $students = Student::with('class_school:id,name', 'user:student_id,email')
            ->join('transactions', 'transactions.student_id', '=', 'students.nis')
            ->where('transactions.status', "pinjam")
            ->get();
        // dd($students);

        return ResponseFormatter::success([
            'students' => $students
        ],
        'Data Siswa Berhasil Diambil');
    }
}
