@extends('layouts.app')

@section('title', $book->title)

@section('content')

    <div class="card-bora">

        <div class="page-header">
            <div>
                <h1>{{ $book->title }}</h1>
                <p>Detalhes do livro</p>
            </div>

            <a href="/books/{{ $book->id }}/edit" class="btn-secondary-bora">
                Editar
            </a>
        </div>

        <div class="book-details">

            <p>
                <strong>Autor:</strong>
                {{ $book->author }}
            </p>

            <p>
                <strong>Categoria:</strong>
                {{ $book->category->name }}
            </p>

            <p>
                <strong>ISBN:</strong>
                {{ $book->isbn ?? '-' }}
            </p>

            <p>
                <strong>Status:</strong>
                Disponível
            </p>

            <div class="form-group">
                <strong>Sinopse:</strong>

                <p>
                    {{ $book->synopsis ?? 'Nenhuma sinopse cadastrada.' }}
                </p>
            </div>

        </div>

        <a href="/books" class="btn-secondary-bora">
            Voltar
        </a>

    </div>

@endsection