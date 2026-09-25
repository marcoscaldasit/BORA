@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="dashboard-header">

        <h1>Dashboard</h1>

        <p>
            Visão geral e gerenciamento do sistema BORA.
        </p>

    </div>


    {{-- Indicadores --}}

    <div class="admin-stats">

        <div class="admin-stat-card">

            <div class="admin-stat-icon">
                📚
            </div>

            <div class="admin-stat-info">

                <span class="admin-stat-value">
                    {{ $totalBooks }}
                </span>

                <span class="admin-stat-label">
                    Livros cadastrados
                </span>

            </div>

        </div>


        <div class="admin-stat-card">

            <div class="admin-stat-icon">
                🗂️
            </div>

            <div class="admin-stat-info">

                <span class="admin-stat-value">
                    {{ $totalCategories }}
                </span>

                <span class="admin-stat-label">
                    Categorias
                </span>

            </div>

        </div>


        <div class="admin-stat-card">

            <div class="admin-stat-icon">
                👥
            </div>

            <div class="admin-stat-info">

                <span class="admin-stat-value">
                    {{ $totalUsers }}
                </span>

                <span class="admin-stat-label">
                    Usuários
                </span>

            </div>

        </div>


        <div class="admin-stat-card">

            <div class="admin-stat-icon">
                📖
            </div>

            <div class="admin-stat-info">

                <span class="admin-stat-value">
                    {{ $activeLoans }}
                </span>

                <span class="admin-stat-label">
                    Empréstimos ativos
                </span>

            </div>

        </div>


        <div class="admin-stat-card">

            <div class="admin-stat-icon">
                ✓
            </div>

            <div class="admin-stat-info">

                <span class="admin-stat-value">
                    {{ $availableBooks }}
                </span>

                <span class="admin-stat-label">
                    Livros disponíveis
                </span>

            </div>

        </div>

    </div>


    {{-- Gerenciamento do acervo --}}

    <div class="dashboard-section">

        <div class="section-header">

            <h2>Gerenciamento do acervo</h2>

        </div>


        <div class="admin-action-card">

            <div class="admin-action-info">

                <h3>Livros</h3>

                <p>
                    Adicione, edite, exclua e consulte os livros
                    cadastrados no acervo.
                </p>

            </div>

            <div class="book-actions">

                <a href="/books" class="btn-bora">
                    Gerenciar livros
                </a>

            </div>

        </div>


        <div class="admin-action-card">

            <div class="admin-action-info">

                <h3>Categorias</h3>

                <p>
                    Gerencie as categorias utilizadas para organizar
                    o acervo.
                </p>

            </div>

            <div class="book-actions">

                <a href="/categories" class="btn-bora">
                    Gerenciar categorias
                </a>

            </div>

        </div>

    </div>


    {{-- Empréstimos --}}

    <div class="dashboard-section">

        <div class="section-header">

            <h2>Empréstimos</h2>

        </div>


        <div class="admin-action-card">

            <div class="admin-action-info">

                <h3>Empréstimos e devoluções</h3>

                <p>
                    Consulte os livros atualmente emprestados,
                    usuários responsáveis e o histórico de devoluções.
                </p>

            </div>

            <div class="book-actions">

                <a href="{{ route('admin.loans') }}" class="btn-bora">
                    Ver empréstimos
                </a>

            </div>

        </div>

    </div>

@endsection