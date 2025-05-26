@extends('layouts.admin_layout')

@section('content')
    <br>
    <h5> Detalhes do Utilizador: {{ $user->name }} </h5> <br>

    <form id="updateMovieForm" method="POST" action="{{ route('admin.users.update') }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required name="name" value="{{ $user->name }}" type="text" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input disabled name="email" value="{{ $user->email }}" type="email" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="user_type" class="form-label">Tipo de Utilizador</label>
            <select class="form-select" id="user_type" name="user_type" required>
                <option value="0" {{ $user->user_type == 0 ? 'selected' : '' }}>Utilizador</option>
                <option value="1" {{ $user->user_type == 1 ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#confirmUpdateModal">
            Atualizar
        </button>
    </form>
    <br>
    <div class="modal fade" id="confirmUpdateModal" tabindex="-1" aria-labelledby="confirmUpdateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-dark text-white rounded-top-4">
                    <h5 class="modal-title" id="confirmUpdateModalLabel">Confirmar atualização</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Tens a certeza que queres atualizar os dados do utilizador <strong>{{ $user->name }}</strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-warning" id="confirmUpdateButton">Sim, atualizar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
