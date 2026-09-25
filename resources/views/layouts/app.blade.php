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

        <div class="navbar-left">

            <a href="/">
                BORA
            </a>

            @if (auth()->check())

                <a href="/books">
                    Acervo
                </a>

                @if (auth()->user()->role === 'admin')

                    <a href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>

                @else

                    <a href="/dashboard">
                        Dashboard
                    </a>

                @endif

            @endif

        </div>


        <div class="navbar-right">

            @if (auth()->check())

                <div class="profile-menu">

                    <button type="button" class="profile-button">
                        <span class="profile-icon">👤</span>
                    </button>

                    <div class="profile-dropdown">

                        <div class="profile-dropdown-user">
                            {{ auth()->user()->name }}
                        </div>

                        <div class="profile-dropdown-divider"></div>

                        <a href="{{ route('profile') }}">
                            Perfil
                        </a>

                        <a href="{{ route('settings') }}">
                            Ajustes
                        </a>

                        <div class="profile-dropdown-divider"></div>

                        <form method="POST" action="/logout">

                            @csrf

                            <button type="submit">
                                Sair
                            </button>

                        </form>

                    </div>

                </div>

            @else

                <a href="/login">
                    Entrar
                </a>

                <a href="/register">
                    Cadastrar
                </a>

            @endif

        </div>

    </nav>


    <main class="container-bora">
        @yield('content')
    </main>

</body>

</html>