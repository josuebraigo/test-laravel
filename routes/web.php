<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Listar
Route::get('/', [EmpleadoController::class, 'list'])->name('empleado.list')->middleware('auth');

//Crear
Route::get('/crear', [EmpleadoController::class, 'create'])->name('empleado.create')->middleware('auth');
Route::post('/crear', [EmpleadoController::class, 'store'])->name('empleado.store');

//Actualizar
Route::get('/editar/{id}', [EmpleadoController::class, 'edit'])->name('empleado.edit')->middleware('auth');
Route::put('/editar/{id}', [EmpleadoController::class, 'update'])->name('empleado.update')->middleware('auth');

//Ver empleado
Route::get('/empleado/{id}', [EmpleadoController::class, 'show'])->name('empleado.view')->middleware('auth');

//Eliminar empleado
Route::get('/eliminar/{id}', [EmpleadoController::class, 'delete'])->name('empleado.delete')->middleware('auth');

//Cambiar estado del empleado
Route::get('/estado/{id}', [EmpleadoController::class, 'changeState'])->name('empleado.state')->middleware('auth');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
