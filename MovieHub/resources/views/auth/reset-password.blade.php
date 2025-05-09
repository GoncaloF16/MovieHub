@extends('layouts.auth_layout')

@section('content')

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-lg border-0 rounded-4 p-4" style="max-width: 480px; width: 100%;">
        <div class="card-body">
            <h3 class="text-center mb-3 fw-bold">Definir Nova Palavra-passe</h3>
            <p class="text-muted text-center mb-4">
                Por favor, introduza a sua nova palavra-passe abaixo para concluir a recuperação da conta.
            </p>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ request()->route('token') }}">

                <div class="form-floating mb-3">
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ request()->email }}" readonly>
                    <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3 position-relative">
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" required placeholder="Nova palavra-passe">
                    <label for="password">Nova palavra-passe</label>

                    <button type="button"
                           class="position-absolute top-50 end-0 translate-middle-y me-3 border-0 bg-transparent toggle-password"
                            data-target="password" tabindex="-1">
                        <i class="bi bi-eye"></i>
                    </button>

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3 position-relative">
                    <input id="password_confirmation" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password_confirmation" required placeholder="Confirmar palavra-passe">
                    <label for="password">Confirmar palavra-passe</label>

                    <button type="button"
                            class="position-absolute top-50 end-0 translate-middle-y me-3 border-0 bg-transparent toggle-password"
                            data-target="password_confirmation" tabindex="-1">
                        <i class="bi bi-eye"></i>
                    </button>

                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">Atualizar Palavra-passe</button>
            </form>
        </div>
    </div>
</div>

@endsection
