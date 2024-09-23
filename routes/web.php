<?php

use App\Http\Controllers\AgenteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/agentes', [AgenteController::class, 'store'])->name('agentes.store');
    Route::get('/agentes', [AgenteController::class, 'index'])->name('agentes.index');
    Route::get('/agentes/create', [AgenteController::class, 'create'])->name('agentes.create');
});


require __DIR__.'/auth.php';