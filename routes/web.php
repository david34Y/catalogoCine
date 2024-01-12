<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\PeliculaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [LoginController::class, 'index'])->name('inicio');
Route::post('/auth', [LoginController::class, 'auth'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
/*
Route::get('/shop', [PosController::class, 'index'])->name('pos');
Route::get('/pos/add/{codigo}', [PosController::class, 'agregar'])->name('pos.agregar');
*/
Route::get('/principal', [PrincipalController::class, 'index'])->name('principal');
//Route::get('/principal/eliminar/{id}', [PrincipalController::class, 'eliminar'])->name('principal.eliminar');


Route::get('/peliculas/listar', [PeliculaController::class, 'index'])->name('peliculas.index');
Route::get('/peliculas/nuevo', [PeliculaController::class, 'nuevo'])->name('peliculas.nuevo');
Route::post('/peliculas/guardar', [PeliculaController::class, 'guardar'])->name('peliculas.guardar');
Route::get('/peliculas/detalle/{id}', [PeliculaController::class, 'mostrar'])->name('peliculas.mostrar');
Route::post('/peliculas/editar', [PeliculaController::class, 'editar'])->name('peliculas.editar');
Route::get('/peliculas/eliminar/{id}', [PeliculaController::class, 'eliminar'])->name('peliculas.eliminar');

/*
Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');*/
