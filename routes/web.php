<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])->name('forgot.password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'reset']);

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/admin/dashboard', [WebController::class, 'adminDashboard'])->name('admin.dashboard');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/', [WebController::class, 'index'])->name('home');

Route::get('/contact', [WebController::class, 'contact'])->name('contact');

Route::get('/product/{id}', [WebController::class, 'detail'])
    ->where('id', '\d+')
    ->name('detail');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
