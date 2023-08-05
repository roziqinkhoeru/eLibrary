<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CustomDate;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Transaction;
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

    public function fines()
    {
        $data = [
            'title' => 'Data Denda Siswa | Admin Perpus Digital',
            'currentNav' => 'student',
            'currentNavChild' => 'fines',
        ];

        return view('admin.students.fines', $data);
    }

    public function getFines(Request $request)
    {
        $fines = Student::withSum(['transactions' => function ($query) use ($request) {
            $query->where('status', 'kembali')
                ->where('penalty', '>', 0)
                ->whereMonth('return_date', $request->finesMonth)
                ->whereYear('return_date', $request->finesYear);
        }], 'penalty')
            ->with('class_school:id,name')
            ->whereHas('transactions', function ($query) use ($request) {
                $query->where('status', 'kembali')->where('penalty', '>', 0)
                    ->whereMonth('return_date', $request->finesMonth)
                    ->whereYear('return_date', $request->finesYear);
            })
            ->orderBy('class_school_id', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        return ResponseFormatter::success(
            [
                'fines' => $fines
            ],
            'Data transaksi berhasil diambil'
        );
    }

    public function finesPrint(Request $request)
    {
        $fines = Student::withSum(['transactions' => function ($query) use ($request) {
            $query->where('status', 'kembali')
                ->where('penalty', '>', 0)
                ->whereMonth('return_date', $request->month)
                ->whereYear('return_date', $request->year);
        }], 'penalty')
            ->with('class_school:id,name')
            ->whereHas('transactions', function ($query) use ($request) {
                $query->where('status', 'kembali')->where('penalty', '>', 0)
                    ->whereMonth('return_date', $request->month)
                    ->whereYear('return_date', $request->year);
            })
            ->orderBy('class_school_id', 'asc')
            ->orderBy('name', 'asc')
            ->get();
        $finesMonth = $request->month;
        $finesYear = $request->year;
        $finesMonthText = CustomDate::bulanDariAngka($finesMonth);

        $data = [
            'title' => "Rekap Denda Siswa Perpustakaan Per $finesMonthText $finesYear",
            'finesMonth' => $finesMonthText,
            'finesYear' => $finesYear,
            'fines' => $fines
        ];

        return view('admin.students.printFines', $data);
    }
}
