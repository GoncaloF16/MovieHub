@extends('layouts.fe_master')

@section('content')
<div class="container">
    <br> <h2>Meus Favoritos</h2>

    @if ($filmes->isEmpty())
        <p>Não tens filmes favoritos ainda.</p>
    @else
    <div class="container-fluid mt-5 d-flex justify-content-center align-items-center">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Título</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filmes as $filme)
                        <tr>
                            <td class="align-middle">
                                <img src="{{ $filme->capa }}" alt="{{ $filme->titulo }}" class="img-fluid" style="width: 100px; height: auto;">
                            </td>
                            <td>{{ $filme->titulo }}</td>
                            <td >
                                <form action="{{ route('filmes.favorito', $filme->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Remover dos Favoritos</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @endif
</div>
@endsection
