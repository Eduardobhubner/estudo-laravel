   
   {{-- determinar de qual layout você esta extendendo o conteudo  --}}
   @extends('layouts.main')

   @section('title', 'Contato')

   @section('content')

   <h1>Fazendo um teste, Contato!</h1>

    {{-- <img src="/img/img_1.jpg"> --}}

    <p>Nome: {{ $nome }}</p>

    @if ($numero == 8)
        <p>O número é 8 </p>
    @endif

    @for ($i = 0; $i < count($arr); $i++)
        <p>{{ $i }} - {{ $arr[$i] }}</p>
    @endfor


    <!-- Esse é um comentário de teste que vai aparecer no ispecionar do front-end -->
    {{-- Esse é um comentário que não vai aparecer, pode ser usado pra explicar sobre alguma regra de negócio --}}
    @php
        // Aqui pode ser atribuido qualquer featura que ainda o blade do laravel ainda não da
    @endphp

    <a href="/welcome">Ir para o welcome do Laravel</a>

       
   @endsection
   
   