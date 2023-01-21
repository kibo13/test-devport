<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageAController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ AuthController::class, 'index' ])->name('home');
Route::post('register', [ AuthController::class, 'register' ])->name('register');
Route::get('/page-a/{token}', [ PageAController::class, 'index' ])->name('a.index');
