@extends('layouts.app')

@section('title', 'Editar Livro')

@section('content')

    <div class="card-bora form-card">

        <h1>Editar Livro</h1>
        <p>Altere as informações do livro.</p>

        @if ($errors->any())
            <div class="error-bora">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/books/{{ $book->id }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Título</label>

                <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}">
            </div>

            <div class="form-group">
                <label for="author">Autor</label>

                <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}">
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>

                <input type="text" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}">
            </div>
            

            <div class="form-group">
                <label for="category_id">Categoria</label>

                <select id="category_id" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-bora">
                Salvar alterações
            </button>

            <a href="/books" class="btn-secondary-bora">
                Cancelar
            </a>

        </form>

    </div>

@endsection