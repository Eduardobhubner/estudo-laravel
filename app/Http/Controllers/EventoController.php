<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    //
    public function index(){

        $arr = [10,20,30,40,50];

        return view('contato',['numero'=>8,'arr'=>$arr,'nome'=>'Eduardo']);

    }

    public function criar(){

        return view('eventos.criar');

    }
}
