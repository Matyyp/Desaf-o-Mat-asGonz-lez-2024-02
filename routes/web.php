<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCancionController;
use App\Http\Controllers\AdminGeneroController;
use App\Http\Controllers\AdminAlbumController;
use App\Http\Controllers\AdminArtistaController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\CancionController;

// Rutas públicas
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::resource('/canciones', CancionController::class)->only(['index', 'show'])->parameters([
    'canciones' => 'cancione'
]);


Route::get('/generos', [GeneroController::class, 'index'])->name('generos.index');

// Rutas de administración (protegidas)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('admin/generos', AdminGeneroController::class);
    Route::resource('admin/albums', AdminAlbumController::class);
    Route::resource('admin/artistas', AdminArtistaController::class);
    Route::resource('admin/playlists', PlaylistController::class);
    Route::resource('admin/canciones', AdminCancionController::class, [
        'parameters' => ['canciones' => 'cancione'],
        'except' => ['show'] // Evita crear la ruta 'admin.canciones.show'
    ]);
});
require __DIR__.'/auth.php';
