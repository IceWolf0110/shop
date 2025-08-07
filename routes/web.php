<?php

//use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'app.home')->name('home');
Volt::route('show-boxes', 'app.show-boxes')->name('show-boxes');

