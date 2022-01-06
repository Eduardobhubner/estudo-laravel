<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Ter acesso ao controle de model - eventos

use App\Models\Evento;
use Illuminate\Console\Scheduling\Event;

class EventoController extends Controller
{
    //
    public function index()
    {

        $search = request('search');

        if ($search) {
            // Vai procurar se contem a palavra que a gente procurou no titulo
            $eventos = Evento::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $eventos = Evento::all();
        }

        return view('welcome', ['eventos' => $eventos, 'search' => $search]);
    }

    public function criar()
    {

        return view('eventos.criar');
    }

    public function store(Request $request)
    {

        $evento = new Evento;


        $evento->title = $request->titulo;
        $evento->data = $request->data;
        $evento->descricao = $request->descricao;
        $evento->cidade = $request->cidade;
        $evento->privado = $request->privado;
        $evento->items = $request->items;


        // receber arquivo do form
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // recebe imagem
            $requestImagem = $request->image;
            // recebe extensão do arquivo
            $extension = $requestImagem->extension();
            // cripgrafa nome com tech md5 e contatena com a extensão
            $imagemNome = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;
            // salva na pasta 
            $requestImagem->move(public_path('img/events'), $imagemNome);
            // adiciona ao objeto instanciado do modelo
            $evento->imagem = $imagemNome;
        }

        // função para salvar o objeto instanciado no bd
        $evento->save();

        // retorna para a rota junto com uma mensagem(key=value)
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {

        $evento = Evento::findOrFail($id);

        return view('eventos.show', ['evento' => $evento]);
    }
}
