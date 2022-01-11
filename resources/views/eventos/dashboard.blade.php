@extends('layouts.main')

@section('title', 'dashboard')

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-eventos-container">
        @if (count($eventos) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações
                        <th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/eventos/{{ $evento->id }}">{{ $evento->title }}</a></td>
                            <td>{{ count($evento->users) }}</td>
                            <td><a href="/eventos/editar/{{ $evento->id }}" class="btn btn-info edit-btn">
                                    <ion-icon name="create"></ion-icon>Editar
                                </a>
                                <form action="eventos/{{ $evento->id }}" method="POST">
                                    @csrf
                                    @method('DELETE'){{-- informa que o post é um delete --}}
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash"></ion-icon>Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não tem eventos criados, Que tal criar um? <a href="/eventos/criar">Criar um evento</a></p>
        @endif
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Eventos que estou participando</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-eventos-container">
        @if (count($eventosComoParticipante) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações
                        <th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventosComoParticipante as $evento)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/eventos/{{ $evento->id }}">{{ $evento->title }}</a></td>
                            <td>{{ count($evento->users) }}</td>
                            <td>
                                <form action="eventos/sair/{{ $evento->id }}" method="POST">
                                    @csrf
                                    @method('DELETE'){{-- informa que o post é um delete --}}
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash"></ion-icon>Sair do evento
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não esta participando de nenhum evento. <a href="/">Veja todos os eventos</a></p>

        @endif
    </div>


@endsection
