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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('generos_id')->references('id')->on('generos');
            $table->string('nombre', 45);
            $table->text('sinopsis');
            $table->time('duracion');
            $table->string('foto', 45)->nullable()->default('default.jpg');
            $table->integer('calificacion')->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->char('estado', 1)->default('A')->comment('A:activo | I:inactivo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
