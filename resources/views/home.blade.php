<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BORA</title>

    <link rel="stylesheet" href="{{ asset('css/bora.css') }}">

</head>

<body>

    <nav class="navbar-bora">

        <div class="navbar-left">

            <a href="/">
                BORA
            </a>



        </div>


        <div class="navbar-right">

            @if (auth()->check())

                <a href="/dashboard">
                    Dashboard
                </a>

                @if (auth()->user()->role === 'admin')

                    <a href="/categories">
                        Categorias
                    </a>

                @endif

            @else

                <a href="/login">
                    Entrar
                </a>

                <a href="/register">
                    Criar conta
                </a>

            @endif

        </div>

    </nav>


    <main class="container-bora">

        <div class="card-bora">

            <h1>BORA</h1>

            <p>
                Book Organization & Rental Application
            </p>

        </div>


        <div class="dashboard-section">

            <div class="section-header">

                <h2>Acervo</h2>

            </div>


            @if ($books->isEmpty())

                <div class="book-item">

                    <div class="book-info">

                        <h3>Nenhum livro cadastrado.</h3>

                        <p>
                            O acervo ainda não possui livros disponíveis.
                        </p>

                    </div>

                </div>

            @else

                <div class="books-list">

                    @foreach ($books as $book)

                        <div class="book-item">

                            <div class="book-info">

                                <h3>
                                    {{ $book->title }}
                                </h3>

                                <p>
                                    Autor: {{ $book->author }}
                                </p>

                                <p>
                                    Categoria: {{ $book->category->name }}
                                </p>
                                <p>
                                    <strong>Status:</strong>

                                    @if ($book->loans->isEmpty())

                                        <span class="book-status available">
                                            Disponível
                                        </span>

                                    @else

                                        <span class="book-status unavailable">
                                            Indisponível
                                        </span>

                                    @endif
                                </p>
                            </div>

                            <div class="book-actions">

                                <a href="/books/{{ $book->id }}" class="btn-secondary-bora">

                                    Ver livro

                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </div>

    </main>

</body>

</html>