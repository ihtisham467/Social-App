<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('request/{receiver_id}', [\App\Http\Controllers\ConnectController::class, 'request'])->name('connects.request');
    Route::get('accept/{sender_id}', [\App\Http\Controllers\ConnectController::class, 'accept'])->name('connects.accept');
});

require __DIR__.'/auth.php';
