<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function genero(){
        return $this->belongsTo(Genero::class, 'generos_id', 'id');
    }
    public function actores(){
        return $this->belongsToMany(Actor::class,'pelicula_actores','peliculas_id','actores_id');
    }

    public function directores(){
        return $this->belongsToMany(Actor::class,'pelicula_directores','peliculas_id','directores_id');
    }
}
