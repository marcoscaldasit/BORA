@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="card-bora form-card">

        <h1>Entrar</h1>
        <p>Acesse sua conta no BORA.</p>

        @if ($errors->any())
            <div class="error-bora">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="form-group">
                <label for="email">E-mail</label>

                <input type="email" id="email" name="email" placeholder="Digite seu e-mail">
            </div>

            <div class="form-group">
                <label for="password">Senha</label>

                <input type="password" id="password" name="password" placeholder="Digite sua senha">
            </div>

            <button type="submit" class="btn-bora">
                Entrar
            </button>

        </form>

    </div>

@endsection