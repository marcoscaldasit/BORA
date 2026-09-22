<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - BORA</title>

    <link rel="stylesheet" href="{{ asset('css/bora.css') }}">
</head>

<body>

    <nav class="navbar-bora">
        <a href="/books">Livros</a>
        <a href="/categories">Categorias</a>
    </nav>

    <main class="container-bora">
        @yield('content')
    </main>

</body>
</html>