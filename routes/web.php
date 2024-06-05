<?php

use Illuminate\Support\Facades\Route;

Route::view('/login', 'pages.auth.login')
    ->name('login')
    ->middleware(['guest', 'check-welcome-page']);

Route::view('/register', 'pages.auth.register')
    ->name('register')
    ->middleware(['guest', 'check-welcome-page']);

Route::get('/logout', function () {
        auth()->logout();
        return redirect()->route('login');
    })
    ->name('logout')
    ->middleware('auth');

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

Route::view('/contact', 'pages.contact')
    ->name('contact')
    ->middleware('auth');

Route::view('/faq', 'pages.faq')
    ->name('faq')
    ->middleware('auth');

Route::view('/apple-day', 'pages.apple-day')
    ->name('apple-day')
    ->middleware('auth');

Route::view('/nutrition-plan', 'pages.nutrition-plan')
    ->name('nutrition-plan')
    ->middleware('auth');
    
Route::view('/admin', 'pages.admin.dashboard')
    ->name('admin.dashboard')
    ->middleware('auth', 'is-admin');

Route::view('/welcome', 'pages.welcome')
    ->name('welcome');

Route::post('/fcm-token', function() {
    if(!auth()->user()) {
        return response()->json(['message' => 'Unauthenticated'], 401);
    }

    $user = auth()->user();
    $user->fcm_token = request('token');
    $user->save();

    return response()->json(['message' => 'Token saved']);
})
    ->name('fcm-token')
    ->middleware('auth');