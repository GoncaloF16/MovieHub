@extends('layouts.fe_master')
@section('content')

<div class="container mt-3">
        <h3 class="text-center mb-4">Filmes em Destaque</h3>
        @if($filmes->isEmpty())
            <p class="text-center mt-4">Nenhum filme encontrado.</p>
        @else
            <div class="row justify-content-center">
                @foreach($filmes as $filme)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card movie-card">
                            <a href="{{ route('movie.show', $filme->titulo) }}">
                                <img src="{{ $filme->capa }}" class="card-img-top" alt="{{ $filme->titulo }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $filme->titulo }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center mt-4">
                    {{ $filmes->appends(request()->except('page'))->links() }}
                </div>
            </div>
        @endif
</div>
@auth
    <a href="{{ route('filmes.favoritos.lista') }}"
        class="btn btn-dark rounded-circle btn-favorito-fixed">
        <span class="material-icons" style="font-size: 22px; color: white;">favorite</span>
    </a>
@endauth
@endsection

