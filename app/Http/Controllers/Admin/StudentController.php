<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function student()
    {
        $data = [
            'title' => 'Data Siswa | Admin Perpus Digital',
            'currentNav' => 'student',
            'currentNavChild' => 'student',
        ];

        return view('admin.students.index', $data);
    }

    public function getStudent()
    {
        $students = Student::with('class_school:id,name', 'user:student_id,email', 'transactions.book:id,title')
            ->with(['transactions' => function ($query) {
                $query->where('status', 'pinjam');
            }])
            ->whereHas('transactions', function ($query) {
                $query->where('status', 'pinjam');
            })
            ->withCount(['transactions' => function ($query) {
                $query->where('status', 'pinjam');
            }])
            ->get();

        return ResponseFormatter::success(
            [
                'students' => $students
            ],
            'Data Siswa Berhasil Diambil'
        );
    }
}
