@extends('layouts.app')

@section('title', 'Meu perfil')

@section('content')

    <div class="dashboard-header">

        <h1>Meu perfil</h1>

        <p>
            Consulte e atualize as informações da sua conta.
        </p>

    </div>


    @if (session('success'))

        <div class="alert-success">

            {{ session('success') }}

        </div>

    @endif


    <div class="dashboard-section">

        <div class="section-header">

            <h2>Informações pessoais</h2>

        </div>


        <form method="POST" action="{{ route('profile.update') }}">

            @csrf
            @method('PUT')


            <div class="form-group">

                <label for="name">
                    Nome
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    required
                >

                @error('name')

                    <p class="form-error">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            <div class="form-group">

                <label for="email">
                    E-mail
                </label>

                <input
                    type="email"
                    id="email"
                    value="{{ $user->email }}"
                    disabled
                >

                

            </div>


            <div class="form-group">

                <label>
                    Data de cadastro
                </label>

                <input
                    type="text"
                    value="{{ $user->created_at->format('d/m/Y') }}"
                    disabled
                >

            </div>


            <div class="book-actions">

                <button type="submit" class="btn-bora">
                    Salvar alterações
                </button>

                <a href="/dashboard" class="btn-secondary-bora">
                    Voltar
                </a>

            </div>

        </form>

    </div>

@endsection