@extends('layouts.app')

@section('title', 'Cadastro')

@section('content')

<div class="card-bora form-card">

    <h1>Criar conta</h1>
    <p>Cadastre-se para utilizar o BORA.</p>

    <form method="POST" action="/register">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>

            <input
                type="text"
                id="name"
                name="name"
                placeholder="Digite seu nome"
            >
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>

            <input
                type="email"
                id="email"
                name="email"
                placeholder="Digite seu e-mail"
            >
        </div>

        <div class="form-group">
            <label for="password">Senha</label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Digite sua senha"
            >
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar senha</label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Digite a senha novamente"
            >
        </div>

        <button type="submit" class="btn-bora">
            Criar conta
        </button>

    </form>

</div>

@endsection