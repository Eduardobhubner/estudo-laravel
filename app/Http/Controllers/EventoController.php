<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Ter acesso ao controle de model - eventos

use App\Models\Evento;

class EventoController extends Controller
{
    //
    public function index(){


        $eventos = Evento::all();
        return view('welcome',['eventos'=>$eventos]);

    }

    public function criar(){

        return view('eventos.criar');

    }

    public function store(Request $request){

        $evento = new Evento;

        $evento->title = $request->titulo;
        $evento->descricao = $request->descricao;
        $evento->cidade = $request->cidade;
        $evento->privado = $request->privado;

        // função para salvar o objeto instanciado no bd
        $evento->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }



}
