@extends('layouts.main')

@section('title', 'dashboard')

@section('content')

<div class="col-md-10 off-set-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
</div>
<div class="col-md-10 off-set-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
    @if(count($eventos) > 0)
    @else 
    <p>Você ainda não tme eventos :( !<a href="/eventos/criar">Criar um evento</a></p>
    @endif
</div>

@endsection

