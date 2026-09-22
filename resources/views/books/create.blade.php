@extends('layouts.app')

@section('title', 'Novo Livro')

@section('content')

    <div class="card-bora form-card">

        <h1>Novo Livro</h1>
        <p>Cadastre um novo livro no BORA.</p>

        @if ($errors->any())
            <div class="error-bora">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/books">
            @csrf

            <div class="form-group">
                <label for="title">Título</label>

                <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Ex.: 1984">
            </div>

            <div class="form-group">
                <label for="author">Autor</label>

                <input type="text" id="author" name="author" value="{{ old('author') }}" placeholder="Ex.: George Orwell">
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>

                <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}" placeholder="Ex.: 9780451524935">
            </div>

            <div class="form-group">
                <label for="synopsis">Sinopse</label>

                <textarea id="synopsis" name="synopsis" rows="6"
                    placeholder="Digite a sinopse do livro...">{{ old('synopsis') }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Categoria</label>

                <select id="category_id" name="category_id">
                    <option value="">Selecione uma categoria</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-bora">
                Cadastrar livro
            </button>

            <a href="/books" class="btn-secondary-bora">
                Cancelar
            </a>

        </form>

    </div>

@endsection