<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Ter acesso ao controle de model - eventos

use Illuminate\Console\Scheduling\Event;
use App\Models\Evento;
use App\Models\User;


class EventoController extends Controller
{
    //
    public function index()
    {

        $search = request('search');

        if ($search) {
            // Vai procurar se contem a palavra que a gente procurou no titulo
            $eventos = Evento::where([
                ['title', 'like', '%' . $search . '%']
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

        $user = auth()->user();
        $evento->user_id = $user->id;

        // função para salvar o objeto instanciado no bd
        $evento->save();



        // retorna para a rota junto com uma mensagem(key=value)
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {

        $evento = Evento::findOrFail($id);

        $user = auth()->user();
        $hasUserJoin = false;

        if ($user) {
            $userEvents = $user->eventosComoParticipante->toArray();

            foreach($userEvents as $userEvent){
                if($userEvent['id'] == $id){
                    $hasUserJoin = true;
                }
            }
        }

        //first = primeiro usuário que econtrar, toArray = transformar em array
        $eventOwner = user::where('id', '=', $evento->user_id)->first()->toArray();

        return view('eventos.show', ['evento' => $evento, 'eventOwner' => $eventOwner, 'hasUserJoin' => $hasUserJoin]);
    }

    public function dashboard()
    {

        $user = auth()->user();

        $eventos = $user->eventos;

        $eventoComoParticipante = $user->eventosComoParticipante;

        return view('eventos/dashboard', [
            'eventos' => $eventos,
            'eventosComoParticipante' => $eventoComoParticipante
        ]);
    }

    public function destroy($id)
    {
        // Encontrar id e remover id do bd
        Evento::FindOrFail($id)->delete();

        return redirect('dashboard')->with('msg', 'Evento excluido com sucesso!!');
    }

    public function edit($id)
    {

        $user = auth()->user();
        // Encontrar evento que foi passado do front para o back e consultar no bd
        $event = Evento::findOrFail($id);

        if ($user->id != $event->user_id) {
            return redirect('dashboard')->with('msg', 'não é possível editar evento de terceiro');
        }

        return view('eventos.editar', ['evento' => $event]);
    }

    public function update(Request $request)
    {
        $dados = $request->all();

        // receber arquivo do form
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            // recebe imagem
            $requestImagem = $request->imagem;
            // recebe extensão do arquivo
            $extension = $requestImagem->extension();
            // cripgrafa nome com tech md5 e contatena com a extensão
            $imagemNome = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;
            // salva na pasta 
            $requestImagem->move(public_path('img/events'), $imagemNome);
            // adiciona ao objeto instanciado do modelo
            $dados['imagem'] = $imagemNome;
        }

        // Encontrar id e faz o update id do bd
        Evento::FindOrFail($request->id)->update($dados);

        return redirect('dashboard')->with('msg', 'Evento Editado com sucesso!!');
    }

    public function confirmarEvento($id)
    {

        $user = auth()->user();

        $user->eventosComoParticipante()->attach($id);

        $evento = Evento::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença foi confirmada para o evento: ' . $evento->title);
    }

    public function sairEvento($id)
    {

        $user = auth()->user();

        $user->eventosComoParticipante()->detach($id);

        $evento = Evento::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do evento: ' . $evento->title);
    }
}
