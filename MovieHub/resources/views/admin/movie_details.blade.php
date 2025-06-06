@extends('layouts.admin_layout')

@section('content')
    <br>
    <h5> Detalhes do Filme: {{ $movie->titulo }} </h5> <br>

    <form id="updateMovieForm" method="POST" action="{{ route('admin.movie.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $movie->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Título</label>
            <input required name="titulo" value="{{ $movie->titulo }}" type="text" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Capa</label>
            <input name="capa_file" type="file" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Trailer</label>
            <input required name="trailer" value="{{ $movie->trailer }}" type="text" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Duração</label>
            <input required name="duracao" value ="{{ $movie->duracao }}" type="text" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Lançamento</label>
            <input required name="lancamento" value ="{{ $movie->lancamento }}" type="text" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Género</label>
            <input required name="genero" value ="{{ $movie->genero }}" type="text" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Realizador</label>
            <input required name="realizador" value ="{{ $movie->realizador }}" type="text" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="sinopse" class="form-label">Sinopse</label>
            <textarea required name="sinopse" class="form-control" id="sinopse" rows="5">{{ old('sinopse', $movie->sinopse) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Rating IMDB</label>
            <input required name="imdb_rating" value ="{{ $movie->imdb_rating }}" type="text" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
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
                    Tens a certeza que queres atualizar os dados do filme? <strong>{{ $movie->titulo }}</strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-warning" id="confirmUpdateButton">Sim, atualizar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
