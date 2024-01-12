<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    public $table = 'actores';
    public $timestamps = false;
    public function pais(){
        return $this->belongsTo(Pais::class);
    }
}
