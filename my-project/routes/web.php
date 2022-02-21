<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', [PagesController::class,'index'])->name('index'); *//* 
Route::get('nuevos', [PagesController::class,'nuevos'])->name('nuevos');
Route::get('destacados', [PagesController::class,'destacados'])->name('destacados'); */

Route::get('formChollo', [HomeController::class,'formChollo'])->name("formChollo");
Route::get('editarChollo/{id}', [HomeController::class,'editar'])->name("editar");
Route::put('editarChollo/{id}', [HomeController::class,'update'])->name("update");
Route::delete('eliminar/{id}', [ HomeController::class, 'eliminar' ]) -> name('eliminar');

Route::get('/{filtro?}',[PagesController::class,'index'])->name('index')->where('filtro', 'nuevos|destacados');
    Route::post('crearChollo', [HomeController::class,'crearChollo']) ->name("crearChollo");
    Route::get('chollo/{id}', [PagesController::class,'detalles'])->name("detalles");


/* Route::get('guardar', [PagesController::class,'guardarImagen'])->name('guardar'); */


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



