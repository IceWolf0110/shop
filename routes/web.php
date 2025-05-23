<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;





Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/product/{id}', [WebController::class, 'detail'])
    ->where('id', '\d+')
    ->name('detail');
