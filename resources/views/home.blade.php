@extends('layouts.app')

@section('title', 'Home')

@section('content')

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

                            <a
                                href="/books/{{ $book->id }}"
                                class="btn-bora"
                            >
                                Ver livro
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </div>

@endsection