<?php

use App\Http\Controllers\AnioAcademicoController;
use App\Http\Controllers\DiaSemanaController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\SeccionController;
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
Route::get('anio_academico/{id}/editar', [AnioAcademicoController::class, 'edit'])->name('anio_academico.edit');
Route::put('anio_academico/{id}', [AnioAcademicoController::class, 'update'])->name('anio_academico.update');
Route::post('anio_academico/guardar', [AnioAcademicoController::class, 'store'])->name('anio_academico.guardar');

Route::get('grado', [GradoController::class, 'create'])->name('grado.crear');
Route::post('grado/guardar', [GradoController::class, 'store'])->name('grado.guardar');

Route::get('seccion', [SeccionController::class, 'create'])->name('seccion.crear');
Route::post('seccion/guardar', [SeccionController::class, 'store'])->name('seccion.guardar');

Route::get('dia_semana', [DiaSemanaController::class, 'create'])->name('dia_semana.crear');
Route::post('dia_semana/guardar', [DiaSemanaController::class, 'store'])->name('dia_semana.guardar');

Route::get('evaluacion', [EvaluacionController::class, 'create'])->name('evaluacion.crear');
Route::post('evaluacion/guardar', [EvaluacionController::class, 'store'])->name('evaluacion.guardar');
