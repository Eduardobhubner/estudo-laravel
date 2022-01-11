@extends('layouts.main')

@section('title', $evento->title)

@section('content')

    <div class="offset-md-1 col-md-10">
        <div class="row">
            <div id="imagem-container" class="col-md-6">
                <img src="/img/events/{{ $evento->imagem }}" class="img-fluid" alt="{{ $evento->title }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $evento->title }}</h1>
                <p class="evento-cidade">
                    <ion-icon name="pin"></ion-icon>Cidade: {{ $evento->cidade }}
                </p>
                <p class="evento-participante">
                    <ion-icon name="people"></ion-icon>Confirmados: {{ count($evento->users) }}
                </p>
                <p class="evento-owner">
                    <ion-icon name="star"></ion-icon>Dono do evento: {{ $eventOwner['name'] }}
                </p>
                @if (!$hasUserJoin)
                    <form action="/eventos/entrar/{{ $evento->id }}" method="POST">
                        @csrf
                        <a href="/eventos/entrar/{{ $evento->id }}" class="btn btn-primary" id="evento-submit"
                            onclick="event.preventDefault(); this.closest('form').submit();">Confirmar presença</a>
                    </form>
                @else
                    <p class="already-joined-msg">Você já esta participando deste evento!</p>

                @endif


                <h3>O evento conta com:</h3>
                <ul id="items-lista">
                    @foreach ($evento->items as $item)
                        <li>
                            <ion-icon name="play"></ion-icon>{{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="descricao-container" class="col-md12">
                <h3>Sobre o evento:</h3>
                <p class="evento-descricao">{{ $evento->descricao }}</p>
            </div>
        </div>
    </div>


@endsection
