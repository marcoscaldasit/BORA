@extends('layouts.app')

@section('title', 'Confirmar empréstimo')

@section('content')

    <div class="form-card card-bora">

        <h1>Confirmar empréstimo</h1>

        <p>
            Confira os dados do empréstimo antes de confirmar.
        </p>

        <div class="book-details">

            <p>
                <strong>Livro:</strong>
                {{ $book->title }}
            </p>

            <p>
                <strong>Autor:</strong>
                {{ $book->author }}
            </p>

            <p>
                <strong>Categoria:</strong>
                {{ $book->category->name }}
            </p>

            <p>
                <strong>Data do empréstimo:</strong>
                {{ now()->format('d/m/Y') }}
            </p>

            <p>
                <strong>Devolução prevista:</strong>
                {{ now()->addDays(14)->format('d/m/Y') }}
            </p>

        </div>

        <div class="book-actions">

            <a href="/books/{{ $book->id }}"
               class="btn-secondary-bora">
                Voltar
            </a>

            <form method="POST"
                  action="/books/{{ $book->id }}/loan/confirm"
                  style="display: inline;">

                @csrf

                <button type="submit" class="btn-bora">
                    Confirmar empréstimo
                </button>

            </form>

        </div>

    </div>

@endsection