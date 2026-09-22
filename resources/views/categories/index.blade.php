@extends('layouts.app')

@section('title', 'Categorias')

@section('content')

<div class="card-bora">

    <div class="page-header">
        <div>
            <h1>Categorias</h1>
            <p>Gerencie as categorias dos livros.</p>
        </div>

        <a href="/categories/create" class="btn-bora">
            Nova Categoria
        </a>
    </div>

    <div class="table-container">
        <table class="table-bora">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>

                        <td>
                            <a
                                href="/categories/{{ $category->id }}/edit"
                                class="btn-secondary-bora"
                            >
                                Editar
                            </a>

                            <form
                                method="POST"
                                action="/categories/{{ $category->id }}"
                                style="display: inline;"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-danger-bora"
                                >
                                    Excluir
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