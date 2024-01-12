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
        Schema::table('peliculas', function (Blueprint $table) {
            //
            // Agregamos el campo codigo_alpha2 que soporta 45 caracteres, debajo del campo nombre
            $table->float('precio')->nullable()->after('duracion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peliculas', function (Blueprint $table) {
            //
            $table->dropColumn('precio');
        });
    }
};
