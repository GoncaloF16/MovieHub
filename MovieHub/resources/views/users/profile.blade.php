@extends('layouts.fe_master')

@section('content')

<form method="POST" enctype="multipart/form-data" action="{{route('user.update')}}">
    @csrf
    @method('PUT')

    <div class="container">
        <br> <h5> Perfil </h5> <br>
        <img  class="img-fluid rounded-circle" style="width: 100px; height: 100px; object-fit: cover;" src="{{ $ourUser->image? asset('storage/' . $ourUser->image) : asset('images/defaultuser.png') }}" alt="Imagem do Utilizador">
        <div class="mb-3">
            <br> <label for="exampleInputEmail1" class="form-label">Imagem</label>
            <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('image')
                Formato Inválido
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required name="name" value="{{ $ourUser ->name }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('Nome')
                Nome Inválido
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input disabled name="email" value="{{ $ourUser ->email }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('Email')
                Email Inválido
            @enderror
        </div>
        <button type="submit" class="btn btn-warning">Atualizar</button>
    </div>
    </form>
@endsection
