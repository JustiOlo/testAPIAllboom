<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Instaciar la clase, que es un controlador
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Rutas Justa Prueba
//Este te devuelve un post por su id
Route::get('/posts/{id}', [PostController::class , 'pruebaAPI1'])->where('id', '[0-9]+');
//Este crea un post
Route::post('/posts', [PostController::class , 'pruebaAPI2']);
//Este te devuelve el usuario por su id
Route::get('/user/{id}', [PostController::class , 'pruebaAPI3'])->where('id', '[0-9]+');
//Este te devuelve los usuarios por su nombre
Route::get('/user/{name}', [PostController::class , 'pruebaAPI4'])->where('name', '[A-Za-z]+');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
