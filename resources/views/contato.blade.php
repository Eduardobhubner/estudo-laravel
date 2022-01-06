   {{-- determinar de qual layout você esta extendendo o conteudo --}}
   @extends('layouts.main')

   @section('title', 'Contato')

   @section('content')

       <h1>Fazendo um teste, Contato!</h1>

       @foreach ($eventos as $evento)
           <p>{{ $evento->descricao }}</p>
           <p>{{ $evento->cidade }}</p>
           <p>{{ $evento->privado }}</p>


           @if ($evento->privado == 0 )
               <p>Evento liberado</p>
           @else
               <p>Evento Privado</p>
           @endif

       @endforeach

   @endsection
