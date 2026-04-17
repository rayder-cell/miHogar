<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\Admin\ProyectoAdminController;
use App\Http\Controllers\Admin\AsesorAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ContactoController;

// Página principal
Route::get('/', [ProyectoController::class, 'index']);

// Páginas públicas
Route::get('/proyectos', [ProyectoController::class, 'lista'])->name('proyectos.index');
Route::get('/proyectos/{id}', [ProyectoController::class, 'show'])->name('proyectos.show');
Route::get('/asesores', [AsesorController::class, 'index'])->name('asesores.index');
Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

// Contacto
Route::post('/contacto/enviar', [ContactoController::class, 'enviar'])->name('contacto.enviar');
Route::post('/contacto/verificar', [ContactoController::class, 'verificar'])->name('contacto.verificar');

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
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('proyectos', ProyectoAdminController::class);
    Route::resource('asesores', AsesorAdminController::class);
});

use Illuminate\Support\Facades\Artisan;

Route::get('/migrar-todo-ya', function () {
    try {
        // Esto creará todas las tablas desde cero
        Artisan::call('migrate', ['--force' => true]);
        return "Tablas creadas con éxito: " . Artisan::output();
    } catch (\Exception $e) {
        return "Error al migrar: " . $e->getMessage();
    }
});
// chat flotante
Route::post('/contacto/chat', [ContactoController::class, 'chat'])->name('contacto.chat');

require __DIR__.'/auth.php';