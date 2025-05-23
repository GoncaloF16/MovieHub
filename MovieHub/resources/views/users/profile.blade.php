@extends('layouts.fe_master')

@section('content')
    <div class="container my-4">
        <div class="row g-4 align-items-center">
            <div class="col-md-6">
                <form method="POST" enctype="multipart/form-data" action="{{ route('user.update') }}">
                    @csrf
                    @method('PUT')

                    <h5 class="mb-3">Perfil</h5>
                    <img class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;"
                        src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/defaultuser.png') }}"
                        alt="Imagem do Utilizador">

                    <div class="mb-3">
                        <label class="form-label">Imagem</label>
                        <input name="image" type="file" class="form-control">
                        @error('image')
                            <small class="text-danger">Formato Inválido</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input required name="name" value="{{ $user->name }}" type="text" class="form-control">
                        @error('name')
                            <small class="text-danger">Nome Inválido</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input disabled name="email" value="{{ $user->email }}" type="text" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-warning">Atualizar</button>
                </form>
            </div>

            <div class="col-md-6 d-flex flex-column pt-2">
                <div class="card flex-grow-1">
                    <div class="card-header border-0 bg-transparent">
                        <h6 class="text-muted fw-light mb-0">Filmes Favoritados por Mês</h6>
                    </div>
                    <div class="chart-card-body d-flex flex-column">
                        <canvas id="graficoFavoritos" data-labels='@json($favoritosPorMes->keys())'
                            data-values='@json($favoritosPorMes->values())' style="flex-grow: 1; max-height: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
