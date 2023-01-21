<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageAController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ AuthController::class, 'index' ])->name('home');
Route::post('register', [ AuthController::class, 'register' ])->name('register');

Route::prefix('/page-a')->group(function () {
    Route::get('/history', [ PageAController::class, 'getHistory' ])->name('a.history');
    Route::get('/{token}', [ PageAController::class, 'index' ])->name('a.index');
    Route::post('/generate-link', [ PageAController::class, 'generateLink' ])->name('a.generate.link');
    Route::post('/deactivate-link', [ PageAController::class, 'deactivateLink' ])->name('a.deactivate.link');
});
