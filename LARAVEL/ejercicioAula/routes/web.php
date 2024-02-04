<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controlador;
use App\Http\Controllers\ProfesorControlador;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [Controlador::class, 'index'])->name('index');
//Al iniciar la pagina se muestra index desde el controlador
Route::get('alumno/edit/{id}', [Controlador::class, 'edit'] )->name('alumno.edit');
Route::put('alumno/update/{id}', [Controlador::class, 'update'] )->name('alumno.update');
Route::delete('/alumno/{id}', [Controlador::class, 'destroy'])->name('alumno.destroy');
Route::get('alumno/create', [Controlador::class, 'create'] )->name('alumno.create');

Route::post('/alumno/store', [Controlador::class, 'store'])->name('alumno.store');
Route::get('/alumno/alumnomatricula/{alumno}', [Controlador::class, 'alumnomatricula'])->name('alumno.alumnomatricula');
Route::put('/alumno/alumnomatriculaupdate/{alumno}', [Controlador::class, 'alumnomatriculaupdate'])->name('alumno.alumnomatriculaupdate');


Route::get('/index', [ProfesorControlador::class, 'index'])->name('profesor.index');
Route::get('profesor/create', [ProfesorControlador::class, 'create'] )->name('profesor.create');
Route::post('/profesor/store', [ProfesorControlador::class, 'store'])->name('profesor.store');
Route::get('profesor/edit/{id}', [ProfesorControlador::class, 'edit'] )->name('profesor.edit');
Route::put('profesor/update/{id}', [ProfesorControlador::class, 'update'] )->name('profesor.update');