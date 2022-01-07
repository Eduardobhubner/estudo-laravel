<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Arr;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
|    // store = convencionado para logica de adição de dados 
|
*/

Route::get('/',[EventoController::class,'index']);
Route::get('/eventos/criar',[EventoController::class,'criar'])->middleware('auth');// middleware - algo que vai acontecer entre o tempo de clicar no botão até msotrar a view
Route::get('/eventos/{id}',[EventoController::class,'show']);
Route::get('/dashboard',[EventoController::class,'dashboard'])->middleware('auth');
Route::get('/eventos/editar/{id}',[EventoController::class,'edit'])->middleware('auth');

Route::post('/eventos/criar',[EventoController::class,'store']);

Route::delete('/eventos/{id}',[EventoController::class,'destroy'])->middleware('auth');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
