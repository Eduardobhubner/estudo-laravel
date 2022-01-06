@extends('layouts.main')

@section('title', 'criar Evento')

@section('content')

    <div class="offset-md-3 col-md-6" id="evento-criar-container">
        <h1>Crie o seu evento</h1>
        {{-- enctype="multipart/form-data" = possibilita enviar arquivos por form --}}
        <form action="/eventos/criar" method="POST" enctype="multipart/form-data">
            {{-- prevenção de ataques a formulários --}}
            @csrf
            <div class="form-group">
                <label for="image">Imagem:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="titulo">Evento:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="data">Data do evento:</label>
                <input type="date" name="data" id="data" class="form-control" placeholder="Nome do evento">
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
            <div class="form-group">
                <label for="items">idicione items de infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="cadeiras">Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="palco">palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="cerveja gratis">Cerveja grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="open food">Open food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="brindes">Brindes
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar evento">
        </form>
    </div>


@endsection
