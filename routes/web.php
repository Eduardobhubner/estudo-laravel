<?php

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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/contato', function () {

    $arr = [10,20,30,40,50];

    return view('contato',['numero'=>8,'arr'=>$arr,'nome'=>'Eduardo']);
});
