@extends('layouts.fe_master')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Página não encontrada</h2>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/fallbackimage.png') }}" alt="404 Not Found" class="img-fluid mb-4">
                <p>Desculpe, a página que está a procurar não existe.</p>
                <a href="{{ url('/') }}" class="btn btn-primary">Voltar para a página inicial</a>
                <br> <br>
            </div>
        </div>
    </div>
@endsection
