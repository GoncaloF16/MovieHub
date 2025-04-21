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
            <div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Filmes</h1>
                <div class="d-flex gap-2">
                    <a href="{{route('home')}}" class="btn btn-secondary"> Página Principal </a>
                    <a href="{{route('admin.movie.add')}}" class="btn btn-primary">Adicionar Filme</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movies as $movie)
                            <tr>
                                <td>{{ $movie->id }}</td>
                                <td>{{ $movie->titulo }}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-1">
                                        <a href="{{route('admin.movie.show', ['id' => $movie->id])}}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                        <a href="{{  route('admin.movie.delete', $movie->id ) }}"  class="btn btn-sm btn-danger">Apagar</a>
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
@endsection
