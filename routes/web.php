<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GiftController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// (Protected) routes for the journeys CRUD module
Route::get('/gifts', [GiftController::class, 'index'])->name('gifts.index');
Route::get('/gifts/create', [GiftController::class, 'create'])
    ->middleware('auth')->name('gifts.create');
Route::post('/gifts', [GiftController::class, 'store'])
    ->middleware('auth')->name('gifts.store');
Route::get('/gifts/{gift}', [GiftController::class, 'show'])->name('gifts.show');
Route::get('/gifts/{gift}/edit', [GiftController::class, 'edit'])
    ->middleware('auth')->name('gifts.edit');
Route::patch('/gifts/{gift}', [GiftController::class, 'update'])
    ->middleware('auth')->name('gifts.update');
Route::delete('/gifts/{gift}', [GiftController::class, 'destroy'])
    ->middleware('auth')->name('gifts.destroy');
Route::get('gifts/{gift}/delete', [GiftController::class,'delete'])
    ->middleware('auth')->name('gifts.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
