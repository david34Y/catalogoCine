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
        Schema::create('cliente_peliculas', function (Blueprint $table) {
            $table->foreignId('clientes_id')->references('id')->on('clientes');
            $table->foreignId('peliculas_id')->references('id')->on('peliculas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente_peliculas');
    }
};
