@extends('layouts.main')

@section('title', 'criar Evento')

@section('content')

    <div class="offset-md-3 col-md-6" id="evento-criar-container">
        <h1>Crie o seu evento</h1>
        <form action="/eventos/criar" method="POST">
            {{-- prevenção de ataques a formulários --}}
            @csrf
            <div class="form-group">
                <label for="titulo">Evento:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Nome da cidade">
            </div>
            <div class="form-group">
                <label for="privado">Privado:</label>
                <select type="text" name="privado" id="privado" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea type="text" name="descricao" id="descricao" class="form-control" rows="5"
                    placeholder="falar sobre o evento"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar evento">
        </form>
    </div>


@endsection
