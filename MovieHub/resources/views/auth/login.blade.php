@extends('layouts.auth_layout')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-lg border-0 rounded-4 p-4" style="max-width: 420px; width: 100%;">
        <div class="card-body">
            <h3 class="text-center mb-4 fw-bold">Iniciar Sessão</h3>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autofocus placeholder="name@example.com">
                    <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3 position-relative">
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" required placeholder="Palavra-passe">
                    <label for="password">Palavra-passe</label>

                    <button type="button"
                            class="position-absolute top-50 end-0 translate-middle-y me-3 border-0 bg-transparent toggle-password"
                            data-target="password" tabindex="-1">
                        <i class="bi bi-eye"></i>
                    </button>

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            Lembrar-me
                        </label>
                    </div>
                    <a href="{{ route('password.request') }}" class="small text-decoration-none">Esqueceste a palavra-passe?</a>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">Entrar</button>
            </form>

            <div class="mt-4 text-center">
                <p class="mb-0">Ainda não tens conta?
                    <a href="{{ route('register') }}" class="fw-semibold text-decoration-none">Registar</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
