<?php

use App\Http\Controllers\AnioAcademicoController;
use App\Http\Controllers\CursoController;
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

Route::resource('anio_academico', AnioAcademicoController::class)->except(['index', 'show']);
Route::resource('grado', GradoController::class)->except(['index', 'show']);
Route::resource('seccion', SeccionController::class)->except(['index', 'show']);
Route::resource('dia_semana', DiaSemanaController::class)->except(['index', 'show']);
Route::resource('evaluacion', EvaluacionController::class)->except(['index', 'show']);
Route::resource('curso', CursoController::class)->except(['index', 'show']);
