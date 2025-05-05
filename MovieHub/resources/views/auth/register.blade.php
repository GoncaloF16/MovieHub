@extends('layouts.auth_layout')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-lg border-0 rounded-4 p-4" style="max-width: 480px; width: 100%;">
        <div class="card-body">
            <h3 class="text-center mb-4 fw-bold">Criar Conta</h3>

            <form method="POST" action="{{ route('register.user') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input id="name" type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autofocus placeholder="Nome completo">
                    <label for="name">Nome</label>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required placeholder="email@example.com">
                    <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" required placeholder="Palavra-passe">
                    <label for="password">Palavra-passe</label>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-4">
                    <input id="password_confirmation" type="password"
                           class="form-control"
                           name="password_confirmation" required placeholder="Confirmar palavra-passe">
                    <label for="password_confirmation">Confirmar palavra-passe</label>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">Registar</button>
            </form>

            <div class="mt-4 text-center">
                <p class="mb-0">Já tens conta?
                    <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">Entrar</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
