@extends('layouts.app')

@section('title', 'Livros')

@section('content')

    <div class="card-bora">

        <div class="page-header">
            <div>
                <h1>Livros</h1>
                @if (auth()->check() && auth()->user()->role === 'admin')
                    <p>Gerencie os livros cadastrados no BORA.</p>

                @endif
            </div>

            @if (auth()->check() && auth()->user()->role === 'admin')
                <a href="/books/create" class="btn-bora">
                    Adicionar Livro
                </a>

            @endif
        </div>

        <div class="table-container">
            <table class="table-bora">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Categoria</th>
                        <th>ISBN</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->isbn ?? '-' }}</td>
                            <td>
                                @if ($book->loans->isEmpty())

                                    <span class="book-status available">
                                        Disponível
                                    </span>

                                @else

                                    <span class="book-status unavailable">
                                        Indisponível
                                    </span>

                                @endif
                            </td>

                            <td>
                                <a href="/books/{{ $book->id }}" class="btn-bora">
                                    Ver
                                </a>

                                @if (auth()->check() && auth()->user()->role === 'admin')
                                    <a href="/books/{{ $book->id }}/edit" class="btn-bora">
                                        Editar
                                    </a>
                                @endif

                                @if (auth()->check() && auth()->user()->role === 'admin')
                                    <form method="POST" action="/books/{{ $book->id }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-danger-bora">
                                            Excluir
                                        </button>
                                    </form>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection