<?php

use Illuminate\Support\Facades\Route;
//Instaciar la clase, que es un controlador
use App\Http\Controllers\HomeController;

//Instaciar la clase, que es un controlador
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome ');
});

//Se agregaron rutas de login y register al crear la autenticacion con '--auth' durante la activacion de boostrap
Auth::routes();
//Se agregaron rutas de login y register al crear la autenticacion con '--auth' durante la activacion de boostrap
Route::get('/home', [HomeController::class , 'index'])->name('home');

//hay que decirle a este archivo que cree una nueva ruta: 
//Route::get('/inicio',  [PostController::class , 'index']);

//Cargando mis rutas con las funciones resources 
Route::resource('post', PostController::class)->middleware('auth');
//Es importante saber que estas rutas no puenden ser llamadas si utilizamos un motor de peticiones, como postman 
//Únicamente podremos utilizarlo cuando utilicemos directamente el navegador, sin intermediarios.
