<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- fonte do google --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    {{-- css do Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- css da aplicação --}}
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">Balanzera</a>
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a href="/" class="nav-link">Eventos</a>
                    </li>
                    <li class="navbar-item">
                        <a href="/eventos/criar" class="nav-link">Criar eventos</a>
                    </li>
                    {{-- @guest, remove conteudo caso seja autenticado --}}
                    @guest
                        <li class="navbar-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="navbar-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                    @endguest
                    {{-- @auth, mostra conteudo caso seja autenticado --}}
                    @auth
                        <li class="navbar-item">
                            <a href="/dashboard" class="nav-link">meus eventos</a>
                        </li>
                        <li class="navbar-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="nav-link" 
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Sair') }}
                                </a>
                            </form>
                        </li>
                    @endauth

                </ul>
            </div>
        </nav>
    </header>
    {{-- yield vai mudar o conteudo dinamicamente --}}
    <main>
        <div class="container-fluid">
            <div class="row">
                @if (session('msg'))
                    <p class="msg">{{ session('msg') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
    </main>
    <footer>
        <p>balanzera &copy; 2021 - Aprendendo laravel</p>
    </footer>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>
