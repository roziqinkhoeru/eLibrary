<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $book = Book::where('type', 'offline')->count();
        $ebook = Book::where('type', 'online')->count();
        $borrow = Transaction::where('status', 'pinjam')->count();
        $student = Student::count();
        $categories = Category::withCount('books')->get();
        // dd($categories);
        $statisticClassBorrow = Transaction::select(DB::raw('count(*) as total, grade'))
            ->join('students', 'students.nis', '=', 'transactions.student_id')
            ->join('class_schools', 'class_schools.id', '=', 'students.class_school_id')
            ->whereYear('transactions.created_at', date('Y'))
            ->groupBy('grade')
            ->get();

        $statisticTopClassBorrow = Transaction::select(DB::raw('count(*) as total, class_schools.name, class_schools.major'))
            ->join('students', 'students.nis', '=', 'transactions.student_id')
            ->join('class_schools', 'class_schools.id', '=', 'students.class_school_id')
            ->whereYear('transactions.created_at', date('Y'))
            ->groupBy('class_schools.name', 'class_schools.major')
            ->orderBy('total', 'desc')
            ->get();

        $studentTopBorrow = Transaction::select(DB::raw('count(*) as total, students.name as student_name, students.nis, class_schools.name as class_name, class_schools.major'))
            ->join('students', 'students.nis', '=', 'transactions.student_id')
            ->join('class_schools', 'class_schools.id', '=', 'students.class_school_id')
            ->whereYear('transactions.created_at', date('Y'))
            ->groupBy('students.name', 'students.nis')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        $data = [
            'title' => 'Dashboard Admin | Perpus Digital',
            'currentNav' => 'dashboard',
            'currentNavChild' => 'dashboard',
            'book' => $book,
            'ebook' => $ebook,
            'borrow' => $borrow,
            'student' => $student,
            'studentTopBorrow' => $studentTopBorrow,
            'statisticClassBorrow' => $statisticClassBorrow,
            'statisticTopClassBorrow' => $statisticTopClassBorrow,
            'categories' => $categories,
        ];
        return view('admin.dashboard', $data);
    }
}
