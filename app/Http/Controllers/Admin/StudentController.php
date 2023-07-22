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
        $students = Student::with('class_school:id,name', 'user:student_id,email')
            ->join('transactions', 'transactions.student_id', '=', 'students.nis')
            ->where('transactions.status', 'pinjam')
            ->select('students.*', DB::raw('count(transactions.id) as transaction_id'))
            ->groupBy('students.nis')
            ->get();

        return ResponseFormatter::success(
            [
                'students' => $students
            ],
            'Data Siswa Berhasil Diambil'
        );
    }
}
