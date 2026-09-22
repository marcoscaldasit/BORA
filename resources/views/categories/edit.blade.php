@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('content')

<div class="card-bora form-card">

    <h1>Editar Categoria</h1>
    <p>Altere as informações da categoria.</p>

    @if ($errors->any())
        <div class="error-bora">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        method="POST"
        action="/categories/{{ $category->id }}"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome da categoria</label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $category->name) }}"
            >
        </div>

        <button type="submit" class="btn-bora">
            Salvar alterações
        </button>

        <a href="/categories" class="btn-secondary-bora">
            Cancelar
        </a>
    </form>

</div>

@endsection