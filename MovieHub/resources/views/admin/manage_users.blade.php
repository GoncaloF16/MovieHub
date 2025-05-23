@extends('layouts.admin_layout')

@section('content')
    @if (session('add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('add') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('delete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('update'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('update') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-12 px-md-4 pt-4">
                <div class="d-flex align-items-center pb-2 mb-3 border-bottom gap-3 flex-wrap">
                    <h1 class="h2 m-0">Utilizadores</h1>

                    <form action="{{ route('admin.users.list') }}" method="GET"
                        class="d-flex position-relative flex-grow-1" style="min-width: 250px;">
                        <input type="text" name="search" class="form-control pe-5"
                            placeholder="Procurar utilizadores..." value="{{ request('search') }}">
                        <button class="btn position-absolute end-0 top-0 mt-1 me-1 px-2 py-1" type="submit"
                            style="height: calc(100% - 0.5rem);">
                            <span class="material-icons">search</span>
                        </button>
                    </form>

                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary d-flex align-items-center gap-2">
                        <span class="material-icons">arrow_back</span> Voltar
                    </a>

                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-1">
                                            <a href="{{ route('admin.users.show', ['id' => $user->id]) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <button type="button"
                                                class="btn btn-sm btn-danger d-flex align-items-center gap-1"
                                                data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                data-user-name="{{ $user->name }}"
                                                data-delete-url="{{ route('admin.users.delete', $user->id) }}">
                                                <i class="bi bi-trash"></i> Apagar
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Pop Up de Confirmação para o botão de apagar -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-dark text-white rounded-top-4">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminação</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Tens a certeza que queres apagar o utilizador <strong id="modalUserName">...</strong>?<br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form method="POST" id="deleteUserForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Sim, apagar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
