@extends('layouts.admin_layout')

@section('content')
    <br>
    <h5> Detalhes do Utilizador: {{ $user ->name }} </h5> <br>

<form method="POST" action="{{route('admin.users.update')}}">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $user ->id }}">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nome</label>
        <input required name="name" value="{{ $user ->name }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input disabled name="email" value="{{ $user ->email }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="user_type" class="form-label">Tipo de Utilizador</label>
        <select class="form-select" id="user_type" name="user_type" required>
            <option value="0" {{ $user->user_type == 0 ? 'selected' : '' }}>Utilizador</option>
            <option value="1" {{ $user->user_type == 1 ? 'selected' : '' }}>Admin</option>
        </select>
    </div>

        <button type="submit" class="btn btn-warning">Atualizar</button>
    </form>
    <br>
@endsection
