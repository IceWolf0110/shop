<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'app.home')->name('home');

require __DIR__.'/auth.php';
