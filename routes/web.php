<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoresController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;

// Rutas para manejo de archivos de libros
Route::get('/libros/{libro}/ver-epub', [LibroController::class, 'verEpub'])
     ->name('libros.ver.epub');

Route::get('/libros/{libro}/descargar-epub', [LibroController::class, 'descargarEpub'])
     ->name('libros.descargar.epub');

Route::get('/libros/{id}/ver-pdf', [LibroController::class, 'verPdf'])->name('libros.ver.pdf');
Route::get('/libros/{id}/descargar-pdf', [LibroController::class, 'descargarPdf'])->name('libros.descargar.pdf');
Route::get('/libros/{id}/ver-epub', [LibroController::class, 'verEpub'])->name('libros.ver.epub');
Route::get('/libros/{id}/descargar-epub', [LibroController::class, 'descargarEpub'])->name('libros.descargar.epub');

// Rutas resource para CRUD
Route::resource('libros', LibroController::class);
Route::resource('prestamos', PrestamoController::class);
Route::resource('autores', AutoresController::class);

// Rutas básicas
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});