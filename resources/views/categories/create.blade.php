@extends('layouts.app')

@section('title', 'Nova Categoria')

@section('content')

<div class="card-bora form-card">

    <h1>Nova Categoria</h1>
    <p>Cadastre uma nova categoria para organizar os livros.</p>

    @if ($errors->any())
        <div class="error-bora">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/categories">
        @csrf

        <div class="form-group">
            <label for="name">Nome da categoria</label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Ex.: Ficção"
            >
        </div>

        <button type="submit" class="btn-bora">
            Cadastrar
        </button>

        <a href="/categories" class="btn-secondary-bora">
            Cancelar
        </a>
    </form>

</div>

@endsection