 {{-- determinar de qual layout você esta extendendo o conteudo --}}
 @extends('layouts.main')

 @section('title', 'home')

 @section('content')


     <div class="col-md-12" id="search-container">
         <h1>Busque um evento</h1>
         <form action="/" method="GET">
             <input type="text" name="search" id="search" class="form-control" placeholder="Procurar">
         </form>
     </div>

     <div class="col-md-12" id="eventos-container">
         @if ($search)
             <h2>Buscando evento por: {{ $search }}</h2>
             <p class="subtitle">Veja os eventos dos próximos dias referente a busca</p>
         @else
             <h2> Todos os eventos({{count($eventos)}})</h2>
             <p class="subtitle">Veja os eventos dos próximos dias</p>
         @endif
         <div class="row" id="cards-container">
             @foreach ($eventos as $evento)
                 <div class="col-md-3 card">
                     <img src="img/events/{{ $evento->imagem }}" alt="{{ $evento->title }}">
                     <div class="card-body">
                         <p class="card-date">{{ date('d/m/y', strtotime($evento->data)) }}</p>
                         <h5 class="card-title">{{ $evento->title }}</h5>
                         <p class="card-participantes">Confirmados: {{count($evento->users)}}</p>
                         <a href="/eventos/{{ $evento->id }}" class="btn btn-primary">Saber mais</a>
                     </div>
                 </div>
             @endforeach
             @if (count($eventos) == 0 && $search)
                 <p>Não foi possível encontrar nenhum evento por: {{$search}}! <a href="/">Ver todos!</a></p>
             @elseif(count($eventos) == 0)
                 <p>Não há eventos disponíveis no momento</p>
             @endif
         </div>
     </div>

 @endsection
