@extends('layouts.app')

@section('title', 'Administração')

@section('content')

    <div class="dashboard-header">

        <h1>Administração</h1>

        <p>
            Gerencie o acervo e os empréstimos do BORA.
        </p>

    </div>


    <div class="dashboard-section">

        <div class="section-header">

            <h2>Gerenciamento do acervo</h2>

        </div>

        <div class="book-item">

            <div class="book-info">

                <h3>Livros</h3>

                <p>
                    Adicione, edite, exclua e consulte os livros cadastrados.
                </p>

            </div>

            <div class="book-actions">

                <a href="/books" class="btn-bora">
                    Gerenciar livros
                </a>

            </div>

        </div>

    </div>


    <div class="dashboard-section dashboard-history">

        <div class="section-header">

            <h2>Empréstimos</h2>

        </div>

        <div class="book-item">

            <div class="book-info">

                <h3>Empréstimos ativos</h3>

                <p>
                    Consulte os empréstimos realizados e os livros atualmente emprestados.
                </p>

            </div>

            <div class="book-actions">

                <a href="{{ route('admin.loans') }}" class="btn-secondary-bora">
                    Ver empréstimos
                </a>

            </div>

        </div>

    </div>

@endsection