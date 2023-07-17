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
        'title' => 'Login'
    ]);
});
Route::get('/admin/forgot-password', function () {
    return view('admin.auth.forgotPassword', [
        'title' => 'Lupa Password'
    ]);
});
Route::get('/admin/reset-password', function () {
    return view('admin.auth.resetPassword', [
        'title' => 'Reset Password'
    ]);
});

// admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard', [
        'title' => 'Dashboard Admin',
        'currentNav' => 'dashboard'
    ]);
});
