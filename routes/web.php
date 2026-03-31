<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\Admin\ProyectoAdminController;
use App\Http\Controllers\Admin\AsesorAdminController;

// Página principal con proyectos
Route::get('/', [ProyectoController::class, 'index']);

// Páginas públicas
Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
Route::get('/proyectos/{id}', [ProyectoController::class, 'show'])->name('proyectos.show');
Route::get('/asesores', [AsesorController::class, 'index'])->name('asesores.index');
Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

// Dashboard de Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Panel de administración
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.proyectos.index');
    });
    Route::resource('proyectos', ProyectoAdminController::class);
    Route::resource('asesores', AsesorAdminController::class);
});

require __DIR__.'/auth.php';