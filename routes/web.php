<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controller\Admin\StudentController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
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


// Auth
Route::controller(LoginController::class)->group(function () {
    // auth admin
    Route::get('/admin/login', 'adminLogin')->name('admin.login');
    Route::post('/admin/login', 'adminAuthenticate')->name('admin.login.authenticate');
    Route::get('/logout', 'logout')->name('logout');

    // auth student
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.authenticate');
});

// forgot password
Route::controller(PasswordResetLinkController::class)->group(function () {
    // admin forgot password
    Route::get('/admin/forgot-password', 'adminCreate')->name('admin.forgot.password.create');
    Route::post('/admin/forgot-password', 'adminStore')->name('admin.forgot.password.store');

    // student
    Route::get('/forgot-password', 'create')->name('password.request');
    Route::post('/forgot-password', 'store')->name('password.store');
});

// reset password
Route::controller(NewPasswordController::class)->group(function () {
    Route::get('/reset-password/{token}', 'create')->name('password.reset');
    Route::post('/reset-password', 'store')->name('password.reset.store');
});

Route::group(['middleware' => ['auth']], function () {
    // student
    Route::group(['middleware' => ['checkRole:student']], function () {
        Route::get('/', function () {
            return view('admin.dashboard', [
                'title' => 'Dashboard | Perpus Digital',
                'currentNav' => 'dashboard',
                'currentNavChild' => 'dashboard',
            ]);
        });
    });

    // Admin
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
            Route::get('/admin/book/category/data', 'getCategories')->name('admin.book.category.data');
            Route::get('/admin/ebook', 'ebook')->name('admin.ebook');
            Route::get('/admin/ebook/data', 'getEbook')->name('admin.ebook.data');
            Route::get('/admin/book/create', 'create')->name('admin.book.create');
            Route::post('/admin/book', 'store')->name('admin.book.store');
            Route::delete('/admin/book/{book:id}', 'destroy')->name('admin.book.destroy');
        });
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/admin/category', 'index')->name('admin.category');
            Route::get('/admin/category/create', 'create')->name('admin.category.create');
            Route::post('/admin/category', 'store')->name('admin.category.store');
            Route::get('/admin/category/{category:slug}/edit', 'edit')->name('admin.category.edit');
            Route::put('/admin/category/{category:slug}', 'update')->name('admin.category.update');
            Route::delete('/admin/category/{category:slug}', 'destroy')->name('admin.category.destroy');
        });
    });
});

// Route::get('/admin/student', function () {
//     return view('admin.students.index', [
//         'title' => 'Data Siswa | Perpus Digital',
//         'currentNav' => 'student'
//         'currentNavChild' => 'student',
//     ]);
// });
// Route::get('/admin/classes', function () {
//     return view('admin.classes.index', [
//         'title' => 'Data Kelas | Perpus Digital',
//         'currentNav' => 'course'
//         'currentNavChild' => 'course',
//     ]);
// });
