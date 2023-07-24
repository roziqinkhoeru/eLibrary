<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Student\StudentBookController;
use App\Http\Controllers\Student\StudentDashboardController;
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

// user
Route::controller(StudentBookController::class)->group(function () {
    Route::get('/book', 'book')->name('book');
    Route::get('/book/data', 'getBook')->name('book.data');
    Route::get('/ebook', 'ebook')->name('ebook');
    Route::get('/ebook/data', 'getEbook')->name('ebook.data');
    Route::get('/ebook/download/{book:id}', 'downloadEbook')->name('ebook.download');
});

Route::group(['middleware' => ['auth']], function () {
    // student
    Route::group(['middleware' => ['checkRole:student']], function () {
        Route::controller(StudentDashboardController::class)->group(function () {
            Route::get('/', 'index')->name('dashboard');
        });

        Route::controller(StudentDashboardController::class)->group(function () {
            Route::get('/profile', 'profile')->name('profile');
            // Route::get('/profile/get-dashboard', 'getDashboard')->name('get.dashboard');
            Route::get('/profile/get-profile', 'getProfile')->name('get.profile');
            Route::put('/profile/update-profile', 'updateProfile')->name('update.profile');
            Route::put('/profile/update-photo-profile', 'updatePhotoProfile')->name('update.photo.profile');
            Route::get('/profile/get-books', 'getBookProfile')->name('get.profile.book');
            Route::get('/profile/get-transaction-history', 'getTransactionHistory')->name('get.profile.transaction.history');
            Route::put('/profile/change-password', 'changePassword')->name('profile.change.password');
        });
    });

    // Admin
    Route::group(['middleware' => ['checkRole:admin']], function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
            Route::get('/admin/profile', 'profile')->name('admin.profile');
            Route::get('/admin/profile/edit-password', 'adminEditPassword')->name('admin.edit.password');
            Route::put('/admin/profile/change-password', 'adminChangePassword')->name('admin.change.password');
        });
        Route::controller(StudentController::class)->group(function () {
            Route::get('/admin/student', 'student')->name('admin.student');
            Route::get('/admin/student/data', 'getStudent')->name('admin.student.data');
        });
        Route::controller(TransactionController::class)->group(function () {
            Route::get('/admin/transaction/list', 'listTransaction')->name('admin.list.transaction');
            Route::get('/admin/transaction/list/data', 'getListTransaction')->name('admin.list.transaction.data');
            Route::get('/admin/transaction/history', 'historyTransaction')->name('admin.history.transaction');
            Route::get('/admin/transaction/history/data', 'getHistoryTransaction')->name('admin.history.transaction.data');
            Route::get('/admin/transaction/create', 'create')->name('admin.transaction.create');
            Route::get('/admin/transaction/create/book/data', 'getBookDataCreate')->name('admin.transaction.create.book.data');
            Route::get('/admin/transaction/create/student/data', 'getStudentDataCreate')->name('admin.transaction.create.student.data');
            Route::post('/admin/transaction', 'store')->name('admin.transaction.store');
            Route::get('/admin/transaction/{transaction:id}/return', 'returnBook')->name('admin.transaction.return');
            Route::put('/admin/transaction/{transaction:id}/return', 'updateReturnBook')->name('admin.transaction.return.update');
        });
        Route::controller(BookController::class)->group(function () {
            Route::get('/admin/book', 'book')->name('admin.book');
            Route::get('/admin/book/data', 'getBook')->name('admin.book.data');
            Route::get('/admin/book/category/data', 'getCategories')->name('admin.book.category.data');
            Route::get('/admin/ebook', 'ebook')->name('admin.ebook');
            Route::get('/admin/ebook/data', 'getEbook')->name('admin.ebook.data');
            Route::get('/admin/book/create', 'create')->name('admin.book.create');
            Route::get('/admin/book/{book:id}/edit', 'edit')->name('admin.book.edit');
            Route::put('/admin/book/{book:id}', 'update')->name('admin.book.update');
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

Route::get('/admin/search/{search}', function () {
    $search = request()->search;
    return view('admin.search', [
        'title' => "Search | Admin Perpus Digital",
        'currentNav' => 'search',
        'currentNavChild' => 'search',
        'search' => $search,
    ]);
});
Route::get('/', function () {
    return view('user.home', [
        'title' => 'Perpus Digital',
    ]);
});
