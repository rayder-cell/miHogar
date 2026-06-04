<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\Admin\ProyectoAdminController;
use App\Http\Controllers\Admin\AsesorAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Admin\TestimonioAdminController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\ReclamacionController;               // ← NUEVO
use App\Http\Controllers\Admin\ReclamacionAdminController;    // ← NUEVO

// Página principal
Route::get('/', [ProyectoController::class, 'index']);

// Páginas públicas
Route::get('/proyectos', [ProyectoController::class, 'lista'])->name('proyectos.index');
Route::get('/proyectos/{id}', [ProyectoController::class, 'show'])->name('proyectos.show');
Route::get('/asesores', [AsesorController::class, 'index'])->name('asesores.index');
Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');
Route::get('/buscar', [BuscadorController::class, 'buscar'])->name('buscar');

// Páginas legales
Route::get('/condiciones-de-uso', fn() => view('legales.condiciones'))->name('condiciones');
Route::get('/politicas-de-privacidad', fn() => view('legales.privacidad'))->name('privacidad');
Route::get('/financiamiento', fn() => view('legales.financiamiento'))->name('financiamiento');
Route::get('/libro-de-reclamaciones', fn() => view('legales.reclamaciones'))->name('reclamaciones');

// Contacto y reclamaciones con rate limiting (máx 5 intentos por minuto)
Route::middleware(['throttle:5,1'])->group(function () {
    Route::post('/contacto/enviar',    [ContactoController::class,    'enviar']   )->name('contacto.enviar');
    Route::post('/contacto/verificar', [ContactoController::class,    'verificar'])->name('contacto.verificar');
    Route::post('/contacto/chat',      [ContactoController::class,    'chat']     )->name('contacto.chat');
    Route::post('/libro-de-reclamaciones/enviar', [ReclamacionController::class, 'enviar'])->name('reclamacion.enviar'); // ← NUEVO
});

// Perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Panel de administración
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/',  [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('proyectos',    ProyectoAdminController::class);
    Route::resource('asesores',     AsesorAdminController::class);
    Route::resource('testimonios',  TestimonioAdminController::class);

    // Reclamaciones — solo index y destroy          // ← NUEVO
    Route::get('/reclamaciones',           [ReclamacionAdminController::class, 'index']  )->name('reclamaciones.index');
    Route::delete('/reclamaciones/{reclamacion}', [ReclamacionAdminController::class, 'destroy'])->name('reclamaciones.destroy');
});

require __DIR__.'/auth.php';