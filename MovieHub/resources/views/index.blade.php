@extends('layouts.fe_master')
@section('content')

<div class="container mt-3">
    <div class="d-flex align-items-center mb-4 w-60">

        <h3 class="mb-0 flex-grow-1 text-center">Filmes em Destaque</h3>

    </div>

        @if($filmes->isEmpty())
            <div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
                <p class="text-center mt-4">Nenhum filme encontrado.</p>
            </div>
        @else
            <div class="row justify-content-center">
                @foreach($filmes as $filme)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card movie-card position-relative">
                            @auth
                                <form action="{{ route('filmes.favorito', $filme->id) }}" method="POST"
                                    class="favorito-form position-absolute top-0 end-0 m-2">
                                    @csrf
                                    <button type="submit" class="btn p-1 m-0 favorito-icon">
                                        <span class="material-icons {{ auth()->user()->favoritos->contains($filme->id) ? 'text-danger' : 'text-white' }}">
                                            favorite
                                        </span>
                                    </button>
                                </form>
                            @endauth

                            <a href="{{ route('movie.show', $filme->titulo) }}">
                                <img src="{{ Str::startsWith($filme->capa, ['http://', 'https://']) ? $filme->capa : asset('storage/' . $filme->capa) }}" class="card-img-top" alt="{{ $filme->titulo }}">
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

