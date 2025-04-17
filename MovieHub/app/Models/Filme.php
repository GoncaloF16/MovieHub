<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $table = 'filmes';

    protected $fillable = [
        'titulo',
        'capa',
        'sinopse',
        'imdb_rating',
        'trailer',
        'duracao',
        'lancamento',
        'genero',
        'realizador'
    ];
}
