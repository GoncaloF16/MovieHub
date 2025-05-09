@extends('layouts.auth_layout')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-lg border-0 rounded-4 p-4" style="max-width: 420px; width: 100%;">
        <div class="card-body">
            <h5 class="text-center mb-4">Recuperar Palavra-passe</h5>
            <p class="text-muted text-center mb-4">
                Insira o seu endereço de email. Irá ser enviado um link para redefinir a palavra-passe.
            </p>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
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

                <button type="submit" class="btn btn-primary w-100 py-2">Enviar link de recuperação</button>
            </form>
        </div>
    </div>
</div>
@endsection
