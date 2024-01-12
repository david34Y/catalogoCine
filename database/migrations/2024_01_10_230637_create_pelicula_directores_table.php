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
        Schema::create('pelicula_directores', function (Blueprint $table) {
            $table->foreignId('peliculas_id')->references('id')->on('peliculas');
            $table->foreignId('directores_id')->references('id')->on('directores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelicula_directores');
    }
};
