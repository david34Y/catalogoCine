<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelicula_actores', function (Blueprint $table) {
            $table->foreignId('peliculas_id')->references('id')->on('peliculas');
            $table->foreignId('actores_id')->references('id')->on('actores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelicula_actores');
    }
};
