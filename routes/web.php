<?php

use App\Http\Controllers\AnioAcademicoController;
use App\Http\Controllers\GradoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('anio_academico', [AnioAcademicoController::class, 'create'])->name('anio_academico.crear');
Route::post('anio_academico/guardar', [AnioAcademicoController::class, 'store'])->name('anio_academico.guardar');

Route::get('grado', [GradoController::class, 'create'])->name('grado.crear');
Route::post('grado/guardar', [GradoController::class, 'store'])->name('grado.guardar');
