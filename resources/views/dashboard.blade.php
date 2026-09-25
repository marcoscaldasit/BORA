@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="dashboard-header">

        <div>
            <h1>Dashboard</h1>

            <p>
                Olá, {{ auth()->user()->name }}.
            </p>
        </div>

    </div>


    {{-- =========================
         EMPRÉSTIMOS ATUAIS
    ========================= --}}

    <div class="dashboard-section">

        <div class="section-header">
            <h2>Meus livros</h2>
        </div>

        @if ($activeLoans->isEmpty())

            <div class="book-item">

                <div class="book-info">

                    <h3>Você não possui livros emprestados.</h3>

                    <p>
                        Quando você realizar um empréstimo,
                        seus livros aparecerão aqui.
                    </p>

                </div>

            </div>

        @else

            <div class="books-list">

                @foreach ($activeLoans as $loan)

                    <div class="book-item">

                        <div class="book-info">

                            <h3>
                                {{ $loan->book->title }}
                            </h3>

                            <p>
                                Autor: {{ $loan->book->author }}
                            </p>

                            <p>
                                Empréstimo:
                                {{ $loan->loan_date->format('d/m/Y') }}
                            </p>

                            <p>
                                Devolução prevista:
                                {{ $loan->due_date->format('d/m/Y') }}
                            </p>

                        </div>

                        <form method="POST"
                              action="/loans/{{ $loan->id }}/return">

                            @csrf
                            @method('PUT')

                            <button type="submit"
                                    class="btn-bora">
                                Devolver livro
                            </button>

                        </form>

                    </div>

                @endforeach

            </div>

        @endif

    </div>


    {{-- =========================
         HISTÓRICO
    ========================= --}}

    <div class="dashboard-section dashboard-history">

        <div class="section-header">
            <h2>Histórico de empréstimos</h2>
        </div>

        @if ($loanHistory->isEmpty())

            <div class="book-item">

                <div class="book-info">

                    <p>
                        Você ainda não possui empréstimos finalizados.
                    </p>

                </div>

            </div>

        @else

            <div class="books-list">

                @foreach ($loanHistory as $loan)

                    <div class="book-item">

                        <div class="book-info">

                            <h3>
                                {{ $loan->book->title }}
                            </h3>

                            <p>
                                Autor: {{ $loan->book->author }}
                            </p>

                            <p>
                                Empréstimo:
                                {{ $loan->loan_date->format('d/m/Y') }}
                            </p>

                            <p>
                                Devolvido em:
                                {{ $loan->return_at->format('d/m/Y') }}
                            </p>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </div>

@endsection