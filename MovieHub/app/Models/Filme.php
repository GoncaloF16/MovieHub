<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function favoritos()
    {
        return $this->belongsToMany(User::class, 'favoritos')->withTimestamps();
    }
    
}
