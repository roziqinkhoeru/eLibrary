<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controller\Admin\StudentController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\TransactionController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth
Route::controller(LoginController::class)->group(function () {
    // auth admin
    Route::get('/admin/login', 'adminLogin')->name('admin.login');
    Route::post('/admin/login', 'adminAuthenticate')->name('admin.login.authenticate');
    Route::get('/logout', 'logout')->name('logout');

    // auth student
    Route::get('/login', 'login')->name('login');
});

// forgot password
Route::controller(PasswordResetLinkController::class)->group(function () {
    // admin forgot password
    Route::get('/admin/forgot-password', 'adminCreate')->name('admin.forgot.password.create');
    Route::post('/admin/forgot-password', 'adminStore')->name('admin.forgot.password.store');
});

Route::get('/forgot-password', function () {
    return view('auth.forgotPassword', ['title' => 'Lupa Password | Perpus Digital', 'ptSection' => '54px',]);
});

// reset password
Route::controller(NewPasswordController::class)->group(function () {
    Route::get('/reset-password/{token}', 'create')->name('password.reset');
    Route::post('/reset-password', 'store')->name('password.reset.store');
});

Route::get('/admin/book', function () {
    return view('admin.book.index', [
        'title' => 'Buku Perpustakaan | Perpus Digital',
        'currentNav' => 'book'
    ]);
});
Route::get('/admin/ebook', function () {
    return view(
        'admin.book.ebook',
        [
            'title' => 'E-Book | Perpus Digital',
            'currentNav' => 'book'
        ]
    );
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['checkRole:admin']], function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
            Route::get('/admin/classes', 'classes')->name('admin.classes');
        });
        Route::controller(StudentController::class)->group(function () {
            Route::get('/admin/student', 'student')->name('admin.student');
            Route::get('/admin/student/data', 'getStudent')->name('admin.student.data');
        });
        Route::controller(TransactionController::class)->group(function () {
            Route::get('/admin/transaction', 'transaction')->name('admin.transaction');
            Route::get('/admin/transaction/data', 'getTransaction')->name('admin.transaction.data');
        });
        Route::controller(BookController::class)->group(function () {
            Route::get('/admin/book', 'book')->name('admin.book');
            Route::get('/admin/book/data', 'getBook')->name('admin.book.data');
        });
    });
});

// admin
Route::get('/admin/book/create', function () {
    return view('admin.book.addBook', [
        'title' => 'Tambah Buku | Perpus Digital',
        'currentNav' => 'book'
    ]);
});
// Route::get('/admin/student', function () {
//     return view('admin.students.index', [
//         'title' => 'Data Siswa | Perpus Digital',
//         'currentNav' => 'student'
//     ]);
// });
// Route::get('/admin/classes', function () {
//     return view('admin.classes.index', [
//         'title' => 'Data Kelas | Perpus Digital',
//         'currentNav' => 'course'
//     ]);
// });
