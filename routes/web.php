<?php

use App\Livewire\SendMessage;
use App\Livewire\UserList;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/user-list', UserList::class)
    ->middleware(['auth'])
    ->name('user.list');

Route::get('/users/{user}', SendMessage::class)
    ->middleware(['auth'])
    ->name('send.message');

require __DIR__ . '/auth.php';
