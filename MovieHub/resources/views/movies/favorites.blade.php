@extends('layouts.fe_master')

@section('content')
    <div class="container py-3 mt-1">
        <h2 class="text-center mb-4">Meus Favoritos</h2>

        @if ($filmes->isEmpty())
            <p class="text-center">Não tens filmes favoritos ainda.</p>
        @else
            <div class="table-responsive">
                <table class="table table-hover shadow-sm" id="favoritesTable">
                    <tbody>
                        @foreach ($filmes as $filme)
                            <tr class="clickable-row" data-href="{{ route('movie.show', $filme->titulo) }}">
                                <td class="align-middle" style="border: none;">
                                    <img src="{{ Str::startsWith($filme->capa, ['http://', 'https://']) ? $filme->capa : asset('storage/' . $filme->capa) }}"
                                        class="img-fluid rounded" style="width: 120px; height: 180px; object-fit: cover;"
                                        alt="{{ $filme->titulo }}">
                                </td>
                                <td class="align-middle" style="border: none;">
                                    {{ $filme->titulo }}
                                </td>
                                <td class="align-middle" style="border: none;">
                                    <form action="{{ route('filmes.favorito', $filme->id) }}" method="POST"
                                        class="remove-favorite-form">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-danger btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 32px; height: 32px; padding: 0;">
                                            <span class="material-icons" style="font-size: 20px;">remove</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
