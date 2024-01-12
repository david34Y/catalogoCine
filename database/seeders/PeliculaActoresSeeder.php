<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeliculaActoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pelicula_actores')->insert([
            'peliculas_id' => '1',
            'actores_id' => '1',
        ]);
        DB::table('pelicula_actores')->insert([
            'peliculas_id' => '2',
            'actores_id' => '1',
        ]);
    }
}
