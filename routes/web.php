<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::resource('libros', App\Http\Controllers\LibrosController::class);
Route::resource('generos', App\Http\Controllers\GenerosController::class);