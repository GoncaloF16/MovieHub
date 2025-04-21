@extends('layouts.admin_layout')

@section('content')
    <br>
    <h5> Adicionar Filme </h5> <br>

<form method="POST" action="{{route('admin.movie.store')}}">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Título</label>
        <input required name="titulo"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Capa</label>
        <input name="capa"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Trailer</label>
        <input required name="trailer"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Duração</label>
        <input required name="duracao"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Lançamento</label>
        <input required name="lancamento"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Género</label>
        <input required name="genero"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Realizador</label>
        <input required name="realizador" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Sinopse</label>
        <input required name="sinopse"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Rating IMDB</label>
        <input required name="imdb_rating"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

@endsection
