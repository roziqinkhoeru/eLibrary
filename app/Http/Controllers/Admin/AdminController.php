<?php

namespace App\Http\Controllers\Admin;

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
        $students = Student::with('class')
            ->join('transactions', 'transactions.student_id', '=', 'students.nis')
            ->where('transactions.status', '==', 'pinjam')
            ->get();

        dd($students);
        $data = [
            'title' => 'Data Siswa | Perpus Digital',
            'currentNav' => 'student'
        ];

        return view('admin.students.index', $data);
    }
}
