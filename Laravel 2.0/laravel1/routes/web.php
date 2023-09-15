<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttractionController;
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

Route::get('/', function () {
    return view('welcome');
});


// Ruta para mostrar el formulario de edición de atracción
Route::get('/formulario/{id}', [AttractionController::class, 'edit'])->name('attractions.edit');

// Ruta para actualizar una atracción
Route::put('/editar/{id}', [AttractionController::class, 'update'])->name('attractions.update');

// Ruta para eliminar una atracción
Route::delete('/eliminar/{id}', [AttractionController::class, 'destroy'])->name('attractions.destroy');


Route::get('/listarAtracciones', [AttractionController::class, 'listar'])->name('attractions.index');

Route::get('/registrarTicket', [AttractionController::class, 'formCompra'])->name('attractions.formCompra');

Route::post('/agregar', [AttractionController::class, 'store'])->name('attractions.store');


Route::get('/agregaAtraccion', [AttractionController::class, 'agregar'])->name('attractions.vista');

Route::get('/obtener-atraccion/{id}', [AttractionController::class, 'obtenerAtraccion'])->name('obtener-atraccion');

Route::post('/ventas', [AttractionController::class, 'guardarTicket'])->name('ventas.store');

Route::get('/ventasListar', [AttractionController::class, 'listarVentas'])->name('ventas.listar');