@extends('layouts.admin_layout')

@section('content')
    <br>
    <h5> Detalhes do Filme: {{ $movie ->titulo }} </h5> <br>

<form method="POST" action="{{route('admin.movie.update')}}">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $movie ->id }}">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Título</label>
        <input required name="titulo" value="{{ $movie ->titulo }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Capa</label>
        <input name="capa" value="{{ $movie ->capa }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Trailer</label>
        <input required name="trailer" value="{{ $movie ->trailer }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Duração</label>
        <input required name="duracao" value ="{{ $movie ->duracao }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Lançamento</label>
        <input required name="lancamento" value ="{{ $movie ->lancamento }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Género</label>
        <input required name="genero" value ="{{ $movie ->genero }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Realizador</label>
        <input required name="realizador" value ="{{ $movie ->realizador }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Sinopse</label>
        <input required name="sinopse" value ="{{ $movie ->sinopse }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Rating IMDB</label>
        <input required name="imdb_rating" value ="{{ $movie ->imdb_rating }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
        <button type="submit" class="btn btn-warning">Atualizar</button>
    </form>

@endsection
