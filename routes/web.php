<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PageAController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ AuthController::class, 'index' ])->name('home');
Route::get('/page-a/{token}', [ PageAController::class, 'index' ])->name('a.index');
Route::get('/history', [ HistoryController::class, 'index' ])->name('history');
Route::post('/register', [ AuthController::class, 'register' ])->name('register');
Route::post('/generate-link', [ LinkController::class, 'generate' ])->name('generate.link');
Route::post('/deactivate-link', [ LinkController::class, 'deactivate' ])->name('deactivate.link');
Route::post('/imfeelinglucky', [ GameController::class, 'play' ])->name('imfeelinglucky');
