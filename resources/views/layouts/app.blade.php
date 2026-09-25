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

            <a href="/books">
                Acervo
            </a>

            @if (auth()->check())

                <a href="/dashboard">
                    Dashboard
                </a>

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

                        <a href="/preferences">
                            Preferências
                        </a>

                        <a href="{{route('settings')}}">
                            Ajustes
                        </a>


                        @if (auth()->user()->role === 'admin')

                            <div class="profile-dropdown-divider"></div>

                            <a href="/categories">
                                Categorias
                            </a>

                            <a href="/admin">
                                Administração
                            </a>

                        @endif


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