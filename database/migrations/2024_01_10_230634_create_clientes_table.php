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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 45);
            $table->string('apellidos', 45);
            $table->string('email', 45);
            $table->string('password', 255);
            $table->string('foto', 45)->nullable()->default('default.jpg');
            $table->string('telefono', 45)->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->char('estado', 1)->default('A')->comment('A:activo | I:inactivo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
