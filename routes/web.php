<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
});
// Página de inicio
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard (solo accesible para usuarios autenticados y verificados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas protegidas con permisos para "admin" o "user"
    Route::middleware('can:create-property')->group(function () {        
        Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
        Route::get('/myProperties', [PropertyController::class, 'myProperties'])->name('properties.my');        
        Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');
    });

    Route::middleware('can:update,property')->group(function () {
        Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
        Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
    });

    Route::middleware('can:delete,property')->group(function () {
        Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
    });

    Route::post('/properties/{property}/comments', [CommentController::class, 'store'])
        ->name('comments.store');
});

// Rutas públicas (todos pueden ver las propiedades)
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');

// Cargar rutas de autenticación generadas por Laravel Breeze
require __DIR__.'/auth.php';
