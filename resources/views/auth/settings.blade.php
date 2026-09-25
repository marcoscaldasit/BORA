@extends('layouts.app')

@section('title', 'Ajustes')

@section('content')

    <div class="dashboard-header">

        <h1>Ajustes</h1>

        <p>
            Gerencie as configurações da sua conta.
        </p>

    </div>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="dashboard-section">

        <div class="section-header">
            <h2>Segurança</h2>
        </div>

        <form method="POST" action="{{ route('settings.password.update') }}">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label for="current_password">
                    Senha atual
                </label>

                <input type="password" id="current_password" name="current_password" required>

                @error('current_password')
                    <p class="form-error">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div class="form-group">

                <label for="password">
                    Nova senha
                </label>

                <input type="password" id="password" name="password" required>

                @error('password')
                    <p class="form-error">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div class="form-group">

                <label for="password_confirmation">
                    Confirmar nova senha
                </label>

                <input type="password" id="password_confirmation" name="password_confirmation" required>

            </div>

            <div class="book-actions">

                <button type="submit" class="btn-bora">
                    Alterar senha
                </button>

                <a href="{{ route('profile') }}" class="btn-secondary-bora">
                    Voltar
                </a>

            </div>

        </form>

    </div>


@endsection