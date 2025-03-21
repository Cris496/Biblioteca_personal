<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AutoresController;


Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/autores', function () {
    return view('autores.index');
});
Route::get('/autores/create',[AutoresController::class,'create']);
*/
Route::resource('autores', AutoresController::class);

