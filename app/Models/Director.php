<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    public $table = 'directores';
    public $timestamps = false;
    public function pais(){
        return $this->belongsTo(Pais::class);
    }
}
