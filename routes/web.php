<?php

use Illuminate\Support\Facades\Route;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Laravel\Firebase\Facades\Firebase;

Route::view('/login', 'pages.auth.login')
    ->name('login')
    ->middleware('guest');

Route::get('/logout', function () {
        auth()->logout();
        return redirect()->route('login');
    })
    ->name('logout')
    ->middleware('auth');

Route::view('/register', 'pages.auth.register')
    ->name('register')
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

Route::get('/test', function() {
    $message = CloudMessage::fromArray([
        'token' => 'eOGEF77J14UaBO6zcWaH6N:APA91bGv6Jmis2F74Xp2dzoISIBES5Zo5yi_eoPd27qpnzKr-HSIq9hu6KSFKoyOXzAhfiz0xqFZE5Jt-d4eEYO39qSmy5J1QByc0AHYmH6MWKBkvAQ6MCyodDT3pAPQlzRd7Zi4XuYQ',
        'notification' => [
            'title' => 'New Notification',
            'body' => 'This is a notification sent from Kreait\Laravel',
        ]
    ]);

    Firebase::messaging()->send($message);
});