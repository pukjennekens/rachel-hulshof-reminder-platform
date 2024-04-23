<?php

use Illuminate\Support\Facades\Route;

Route::view('/login', 'pages.auth.login')
    ->name('login')
    ->middleware('guest');

Route::view('/', 'pages.dashboard')
    ->name('dashboard')
    ->middleware('auth');

Route::view('/weight', 'pages.weight')
    ->name('weight')
    ->middleware('auth');

Route::view('/water', 'pages.water')
    ->name('water')
    ->middleware('auth');

Route::view('/notifications', 'pages.notifications')
    ->name('notifications')
    ->middleware('auth');

Route::view('/help', 'pages.help')
    ->name('help')
    ->middleware('auth');
    
Route::view('/admin', 'pages.admin.dashboard')
    ->name('admin.dashboard')
    ->middleware('auth', 'is-admin');