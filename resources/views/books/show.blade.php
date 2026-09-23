@extends('layouts.app')

@section('title', $book->title)

@section('content')

    <div class="card-bora">

        <div class="page-header">

            <div>
                <h1>{{ $book->title }}</h1>

                <p>
                    {{ $book->author }}
                </p>
            </div>

            <div>

                @if (auth()->check() && auth()->user()->role === 'admin')

                    <a href="/books/{{ $book->id }}/edit" class="btn-secondary-bora">
                        Editar
                    </a>

                    <form method="POST" action="/books/{{ $book->id }}" style="display: inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-danger-bora">
                            Excluir
                        </button>

                    </form>

                @endif

            </div>

        </div>


        <div class="book-details">

            <p>
                <strong>Categoria:</strong>
                {{ $book->category->name }}
            </p>

            <p>
                <strong>ISBN:</strong>
                {{ $book->isbn ?? '-' }}
            </p>

            <p>
                <strong>Sinopse:</strong>
            </p>

            <p>
                {{ $book->synopsis ?? 'Nenhuma sinopse cadastrada.' }}
            </p>

            <p>
                <strong>Status:</strong>

                @if ($isBorrowed)

                    <span class="book-status unavailable">
                        Indisponível
                    </span>

                @else

                    <span class="book-status available">
                        Disponível
                    </span>

                @endif

            </p>

        </div>


        <div class="book-actions">

            @if ($isBorrowed)

                <button type="button" class="btn-secondary-bora" disabled>

                    Livro indisponível para empréstimo

                </button>

            @else

                <form method="POST" action="/books/{{ $book->id }}/loan" style="display: inline;">

                    @csrf

                    <button type="submit" class="btn-bora">
                        Solicitar empréstimo
                    </button>

                </form>

            @endif

        </div>

    </div>

@endsection