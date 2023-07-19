<?php

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

// auth admin
Route::get('/admin/login', function () {
    return view('admin.auth.login', [
        'title' => 'Login | Perpus Digital'
    ]);
});
Route::get('/admin/forgot-password', function () {
    return view('admin.auth.forgotPassword', [
        'title' => 'Lupa Password | Perpus Digital'
    ]);
});
Route::get('/admin/reset-password', function () {
    return view('admin.auth.resetPassword', [
        'title' => 'Reset Password | Perpus Digital'
    ]);
});

// admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard', [
        'title' => 'Dashboard Admin | Perpus Digital',
        'currentNav' => 'dashboard'
    ]);
});
Route::get('/admin/book', function () {
    return view('admin.book.index', [
        'title' => 'Buku Perpustakaan | Perpus Digital',
        'currentNav' => 'book'
    ]);
});
Route::get('/admin/ebook', function () {
    return view('admin.book.ebook', [
        'title' => 'E-Book | Perpus Digital',
        'currentNav' => 'book'
    ]);
});
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
