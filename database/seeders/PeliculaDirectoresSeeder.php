<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PeliculaDirectoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pelicula_directores')->insert([
            'peliculas_id' => '1',
            'directores_id' => '1',
        ]);
        DB::table('pelicula_directores')->insert([
            'peliculas_id' => '2',
            'directores_id' => '1',
        ]);

    }
}
