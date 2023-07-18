<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
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

// reset password
Route::controller(NewPasswordController::class)->group(function () {
    Route::get('/reset-password/{token}', 'create')->name('password.reset');
    Route::post('/reset-password', 'store')->name('password.reset.store');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['checkRole:admin']], function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
            Route::get('/admin/student', 'student')->name('admin.student');
            Route::get('/admin/classes', 'classes')->name('admin.classes');
        });
    });
});

// admin
Route::get('/admin/student', function () {
    return view('admin.students.index', [
        'title' => 'Data Siswa | Perpus Digital',
        'currentNav' => 'student'
    ]);
});
Route::get('/admin/classes', function () {
    return view('admin.classes.index', [
        'title' => 'Data Kelas | Perpus Digital',
        'currentNav' => 'course'
    ]);
});
