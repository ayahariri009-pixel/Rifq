<?php

use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QRController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/adoptions', [AdoptionController::class, 'index'])->name('adoptions.index');
    Route::get('/adoptions/{animal}', [AdoptionController::class, 'show'])->name('adoptions.show');
    Route::post('/adoptions/{animal}/request', [AdoptionController::class, 'submitRequest'])->name('adoptions.submit');
    Route::get('/my-requests', [AdoptionController::class, 'myRequests'])->name('adoptions.my-requests');
});

Route::get('/scan/{hash}', [QRController::class, 'show'])->name('qr.show');

require __DIR__.'/auth.php';
