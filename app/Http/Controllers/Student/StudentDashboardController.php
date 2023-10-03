<?php

namespace App\Http\Controllers\Student;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Transaction;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Perpus Digital',
        ];

        return view('user.home', $data);
    }

    public function profile()
    {
        $user = Auth::user();
        $profile = Student::with('user')
            ->where('nis', $user->student_id)->first();
        $data = [
            'title' => 'Profil Saya | Perpus Digital',
            'active' => 'account',
            'profile' => $profile
        ];

        return view('user.profile.myAccount', $data);
    }

    public function getProfile()
    {
        $user = Auth::user();
        $profile = User::with('student')->where('id', $user->id)->first();

        if ($user) {
            return ResponseFormatter::success($profile, 'Data profile berhasil diambil');
        }
        return ResponseFormatter::error(null, 'Data profile tidak ada', 404);
    }

    public function getBookProfile()
    {
        // $transactions = Transaction::with('book:id,title,cover,category_id,author', 'book.category:id,name')
        //     ->where('student_id', Auth::user()->student_id)
        //     ->where('status', 'pinjam')
        //     ->get();
        $transactions = Transaction::with(['book:id,title,cover,category_id,author,publisher', 'book.category:id,name'])
            ->select('id', 'status', 'start_date', 'end_date', 'student_id', 'book_id', DB::raw('DATEDIFF(NOW(),end_date) * 2000 as penalty'), DB::raw('DATEDIFF(end_date,NOW()) as penalty_day'))
            ->where('status', 'pinjam')
            ->where('student_id', Auth::user()->student_id)
            ->orderBy('end_date', 'asc')
            ->get();
        // dd($transactions);
        return ResponseFormatter::success([
            'transactions' => $transactions
        ], 'Data peminjaman berhasil diambil');
    }

    public function getTransactionHistory()
    {
        $transactions = Transaction::with('book:id,title,cover,category_id,author,publisher', 'book.category:id,name')
            ->where('student_id', Auth::user()->student_id)
            ->where('status', 'kembali')
            ->get();

        return ResponseFormatter::success([
            'transactions' => $transactions
        ], 'Data peminjaman berhasil diambil');
    }

    public function changePassword(Request $request)
    {
        $rules = [
            'old_password' => 'required|min:8',
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
                    "Gagal mengubah password",
                    400,
                )
                : back()->with(['error' => $validator->errors()]);
        }

        $user = User::find(Auth::user()->id);

        // Memeriksa kecocokan password lama
        if (Hash::check($request->old_password, $user->password)) {
            // Password lama cocok

            $user->password = Hash::make($request->password);
            $user->save();

            // Mengembalikan respon yang sesuai
            return $request->ajax()
                ? ResponseFormatter::success([
                    'message' => 'Password berhasil diubah',
                ], 'Password berhasil diubah')
                : back()->with(['success' => 'Password berhasil diubah']);
        } else {
            // Password lama tidak cocok

            // Mengembalikan respon dengan pesan kesalahan
            return $request->ajax()
                ? ResponseFormatter::error([
                    'error' => 'Password lama tidak cocok',
                ], 'Password lama tidak cocok', 400)
                : back()->with(['error' => 'Password lama tidak cocok']);
        }
    }

    public function updatePhotoProfile(Request $request)
    {
        $user = Auth::user();
        $student = $user->student;
        $rules = [
            'profileImage' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ResponseFormatter::error(
                [
                    'error' => $validator->errors()->first(),
                ],
                "Photo profile tidak sesuai",
                400
            );
        }

        try {
            DB::beginTransaction();
            // check if photo profile is default
            if ($student->profile_picture != 'img/profile.jpg') {
                // Delete file photo profile before
                $exists = Storage::disk('public')->exists($student->profile_picture);
                if ($exists) {
                    Storage::disk('public')->delete($student->profile_picture);
                }
            }
            $profile_picture = $request->file('profileImage');
            $profile_picture_path = $profile_picture->store('img', 'public');

            $updateUser = $student->where('nis', $student->nis)->update([
                'profile_picture' => $profile_picture_path,
            ]);

            if (!$updateUser) {
                throw new Exception('Gagal memperbarui data foto profil.');
            }

            DB::commit();
            $profile_picture_update = student::where('nis', $student->nis)->first()->profile_picture;

            return ResponseFormatter::success(
                [
                    'profile_picture' => $profile_picture_update,
                ],
                'Berhasil mengubah photo profile'
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error(
                [
                    'error' => $e->getMessage(),
                ],
                $e->getMessage(),
                400
            );
        }
    }
}
