   {{-- determinar de qual layout você esta extendendo o conteudo --}}
   @extends('layouts.main')

   @section('title', 'home')

   @section('content')


       <div class="col-md-12" id="search-container">
           <h1>Busque um evento</h1>
           <form action="">
               <input type="text" name="search" id="search" class="form-control" placeholder="Procurar">
           </form>
       </div>

       <div class="col-md-12" id="eventos-container">
           <h2>Próximos eventos</h2>
           <p class="subtitle">Veja os eventos dos próximos dias</p>
           <div class="row" id="cards-container">
               @foreach ($eventos as $evento)
                   <div class="col-md-3 card">
                       <img src="img/img_1.jpg" alt="{{ $evento->title }}">
                       <div class="card-body">
                           <p class="card-date">05/01/2022</p>
                           <h5 class="card-title">{{ $evento->title }}</h5>
                           <p class="card-participantes">X participantes</p>
                           <a href="#" class="btn btn-primary">Saber mais</a>
                       </div>
                   </div>
               @endforeach
           </div>
       </div>

   @endsection
