<?php

use App\Http\Controllers\AccountBalanceController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/balance', [AccountBalanceController::class, 'show'])->name('balance.show');
    Route::put('/balance', [AccountBalanceController::class, 'update'])->name('balance.update');
    Route::get('/balance/history', [AccountBalanceController::class, 'history'])->name('balance.history');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
