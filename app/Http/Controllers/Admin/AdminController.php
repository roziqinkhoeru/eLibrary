<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Student;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
            ->orderBy('grade', 'asc')
            ->get();

        $statisticTopClassBorrow = Transaction::select(DB::raw('count(*) as total, class_schools.name, class_schools.major'))
            ->join('students', 'students.nis', '=', 'transactions.student_id')
            ->join('class_schools', 'class_schools.id', '=', 'students.class_school_id')
            ->whereYear('transactions.created_at', date('Y'))
            ->groupBy('class_schools.name', 'class_schools.major')
            ->orderBy('total', 'desc')
            ->get();

        // $studentTopBorrow = Transaction::select(DB::raw('count(*) as total'), 'students.name as student_name', 'students.nis', 'students.profile_picture', 'class_schools.name as class_name', 'class_schools.major')
        //     ->join('students', 'students.nis', '=', 'transactions.student_id')
        //     ->join('class_schools', 'class_schools.id', '=', 'students.class_school_id')
        //     ->whereYear('transactions.created_at', date('Y'))
        //     ->groupBy('transactions.student_id')
        //     ->orderBy('total', 'desc')
        //     ->limit(5)
        //     ->get();

        $studentTopBorrow = Student::select('students.name as student_name', 'students.nis', 'students.profile_picture')
        ->with('class_school:id,name,major')
        ->withCount(['transactions as total' => function ($query) {
            $query->whereYear('created_at', date('Y'));
        }])
        ->orderBy('total', 'desc')
        ->limit(5)
        ->get();

        $statisticMonthBorrow = Transaction::select(DB::raw('count(*) as total, month(transactions.start_date) as month'))
            ->whereYear('transactions.start_date', date('Y'))
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->keyBy('month');

        $month = range(1, 12);
        $revenueMonth = [];
        foreach ($month as $mnt) {
            $total = 0;
            if (isset($statisticMonthBorrow[$mnt])) {
                $total = $statisticMonthBorrow[$mnt]->total;
            }
            $revenueMonth[$mnt] = $total;
        }

        $data = [
            'title' => 'Dashboard Admin | Admin Perpus Digital',
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
            'revenueMonth' => $revenueMonth,
        ];
        return view('admin.dashboard', $data);
    }

    public function profile()
    {
        $admin = User::with('officer')->where('officer_id', Auth::user()->officer_id)->first();
        $data = [
            'title' => 'Profile Saya | Admin Perpus Digital',
            'currentNav' => 'profile',
            'currentNavChild' => 'profile',
            'admin' => $admin,
        ];

        return view('admin.profile.index', $data);
    }

    public function adminEditPassword()
    {
        $admin = User::with('officer:nip,name')->where('officer_id', Auth::user()->officer_id)->first();
        $data = [
            'title' => 'Edit Password | Admin Perpus Digital',
            'currentNav' => 'profile',
            'currentNavChild' => 'profile',
            'admin' => $admin,
        ];

        return view('admin.profile.editPassword', $data);
    }

    public function adminChangePassword(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // Form salah diisi
            return $request->ajax()
                ? ResponseFormatter::error(
                    [
                        'error' => $validator->errors()->first(),
                    ],
                    'Harap isi form dengan benar',
                    400,
                )
                : back()->with(['error' => $validator->errors()]);
        }

        if (!Hash::check($request->old_password, $user->password)) {
            return $request->ajax()
                ? ResponseFormatter::error(
                    [
                        'error' => 'Password lama tidak sesuai',
                    ],
                    'Password lama tidak sesuai',
                    400,
                )
                : back()->with(['error' => 'Password lama tidak sesuai']);
        }

        $update = User::whereId($user->id)->update([
            'password' => Hash::make($request->password),
        ]);

        if ($update) {
            return $request->ajax()
                ? ResponseFormatter::success(
                    [
                        'redirect' => redirect('/admin/profile')->getTargetUrl(),
                    ],
                    'Update password berhasil',
                ) : redirect('/admin/profile')->with('success', 'Update password berhasil');
        }

        return $request->ajax()
            ? ResponseFormatter::error(
                null,
                'Update password gagal',
                500
            ) : back()->with(['error' => 'Update password gagal']);
    }
}
