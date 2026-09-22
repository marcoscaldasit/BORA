@extends('layouts.app')

@section('title', 'Livros')

@section('content')

    <div class="card-bora">

        <div class="page-header">
            <div>
                <h1>Livros</h1>
                <p>Gerencie os livros cadastrados no BORA.</p>
            </div>

            <a href="/books/create" class="btn-bora">
                Novo Livro
            </a>
        </div>

        <div class="table-container">
            <table class="table-bora">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Categoria</th>
                        <th>ISBN</th>
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
                                <a href="/books/{{ $book->id }}" class="btn-secondary-bora">
                                    Ver
                                </a>

                                <a href="/books/{{ $book->id }}/edit" class="btn-secondary-bora">
                                    Editar
                                </a>

                                <form method="POST" action="/books/{{ $book->id }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-danger-bora">
                                        Excluirr
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection