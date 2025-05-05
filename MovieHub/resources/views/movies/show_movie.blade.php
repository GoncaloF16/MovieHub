@extends('layouts.fe_master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="{{ $filme->capa }}" alt="{{ $filme->titulo }}" class="img-fluid rounded shadow">
        </div>

        <div class="col-md-8">
            <h2 class="mb-3">{{ $filme->titulo }}</h2>
            <p class="lead">{{ $filme->sinopse }}</p>
            <p><strong>IMDb Rating:</strong> {{ $filme->imdb_rating }}/10</p>
            <br>
            <p><strong>Diretor:</strong> {{ $filme->realizador }}</p>
            <p><strong>Gênero:</strong> {{ $filme->genero }}</p>
            <p><strong>Duração:</strong> {{ $filme->duracao }} minutos</p>
            <p><strong>Lançamento:</strong> {{ $filme->lancamento }}</p>
            <br>
            @auth
            <form action="{{ route('filmes.favorito', $filme->id) }}" method="POST" class="d-flex align-items-center gap-2">
                @csrf
                <span>Adicionar aos favoritos: </span>
                <button type="submit" class="btn btn-favorito">
                    <span class="material-icons {{ auth()->user()->favoritos->contains($filme->id) ? 'text-danger' : '' }}">favorite</span>
                </button>
            </form>
            @endauth
        </div>





    <div class="row mt-5">
        <div class="col-12">
            <div class="ratio ratio-16x9">
                <iframe
                    src="{{ $filme->trailer }}"
                    title="Trailer de {{ $filme->titulo }}"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</div> <br>
@endsection
