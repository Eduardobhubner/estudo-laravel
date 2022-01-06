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
*/

Route::get('/welcome', function(){
    return view('welcome');
});

Route::get('/',[EventoController::class,'index']);
Route::get('/eventos/criar',[EventoController::class,'criar']);
Route::get('/eventos/{id}',[EventoController::class,'show']);

// requisição post
// store = convencionado para logica de adição de dados 
Route::post('/eventos/criar',[EventoController::class,'store']);
