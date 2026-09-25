@extends('layouts.app')

@section('title', 'Empréstimos')

@section('content')

    <div class="dashboard-header">

        <h1>Empréstimos</h1>

        <p>
            Consulte os livros atualmente emprestados e os respectivos usuários.
        </p>

    </div>


    <div class="dashboard-section">

        <div class="section-header">

            <h2>Empréstimos ativos</h2>

        </div>


        @if ($activeLoans->isEmpty())

            <div class="book-item">

                <div class="book-info">

                    <h3>Nenhum empréstimo ativo</h3>

                    <p>
                        Atualmente não existem livros emprestados.
                    </p>

                </div>

            </div>

        @else

            @foreach ($activeLoans as $loan)

                <div class="book-item">

                    <div class="book-info">

                        <h3>{{ $loan->book->title }}</h3>

                        <p>
                            <strong>Usuário:</strong>
                            {{ $loan->user->name }}
                        </p>

                        <p>
                            <strong>E-mail:</strong>
                            {{ $loan->user->email }}
                        </p>

                        <p>
                            <strong>Data do empréstimo:</strong>
                            {{ $loan->loan_date->format('d/m/Y') }}
                        </p>

                        <p>
                            <strong>Data prevista para devolução:</strong>
                            {{ $loan->due_date->format('d/m/Y') }}
                        </p>

                    </div>

                </div>

            @endforeach

        @endif

    </div>


    <div class="dashboard-section">

        <div class="book-actions">

            <a href="{{ route('admin.dashboard') }}" class="btn-secondary-bora">
                Voltar para administração
            </a>

        </div>

    </div>

    <div class="dashboard-section dashboard-history">

        <div class="section-header">

            <h2>Histórico de empréstimos</h2>

        </div>


        @if ($loanHistory->isEmpty())

            <div class="book-item">

                <div class="book-info">

                    <h3>Nenhum empréstimo finalizado</h3>

                    <p>
                        Ainda não existem empréstimos devolvidos.
                    </p>

                </div>

            </div>

        @else

            @foreach ($loanHistory as $loan)

                <div class="book-item">

                    <div class="book-info">

                        <h3>{{ $loan->book->title }}</h3>

                        <p>
                            <strong>Usuário:</strong>
                            {{ $loan->user->name }}
                        </p>

                        <p>
                            <strong>E-mail:</strong>
                            {{ $loan->user->email }}
                        </p>

                        <p>
                            <strong>Data do empréstimo:</strong>
                            {{ $loan->loan_date->format('d/m/Y') }}
                        </p>

                        <p>
                            <strong>Data prevista para devolução:</strong>
                            {{ $loan->due_date->format('d/m/Y') }}
                        </p>

                        <p>
                            <strong>Data da devolução:</strong>
                            {{ $loan->return_at->format('d/m/Y') }}
                        </p>

                        <p>
                            <strong>Status:</strong>
                            Devolvido
                        </p>

                    </div>

                </div>

            @endforeach

        @endif

    </div>
@endsection