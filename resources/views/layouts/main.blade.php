<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- css da aplicação --}}
    <link rel="stylesheet" href="/css/styles.css">
    {{-- fonte do google --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    {{-- css do Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <li class="navbar-item">
                        <a href="/" class="nav-link">Entrar</a>
                    </li>
                    <li class="navbar-item">
                        <a href="/" class="nav-link">Cadastrar</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    {{-- yield vai mudar o conteudo dinamicamente --}}
    @yield('content')
    <footer>
        <p>balanzera @copy; 2021 - Aprendendo laravel</p>
    </footer>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>
