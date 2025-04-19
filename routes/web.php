<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoresController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Página principal pública
Route::get('/', function () {
    return view('welcome');
});

// Sistema de autenticación
Auth::routes(['register' => true]); // Habilitar registro

// Grupo de rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    // Dashboard principal
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home'); // Alias para compatibilidad
    
    // Rutas para manejo de archivos de libros
    Route::get('/libros/{libro}/ver-epub', [LibroController::class, 'verEpub'])->name('libros.ver.epub');
    Route::get('/libros/{libro}/descargar-epub', [LibroController::class, 'descargarEpub'])->name('libros.descargar.epub');
    Route::get('/libros/{libro}/ver-pdf', [LibroController::class, 'verPdf'])->name('libros.ver.pdf');
    Route::get('/libros/{libro}/descargar-pdf', [LibroController::class, 'descargarPdf'])->name('libros.descargar.pdf');

    // CRUDs protegidos
    Route::resource('libros', LibroController::class);
    Route::resource('prestamos', PrestamoController::class);
    Route::resource('autores', AutoresController::class);
});

// Si necesitas algunas rutas públicas (por ejemplo, para ver información de libros)
// Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
// Route::get('/libros/{libro}', [LibroController::class, 'show'])->name('libros.show');