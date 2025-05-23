<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/product/{id}', [WebController::class, 'detail'])
    ->where('id', '\d+')
    ->name('detail');
