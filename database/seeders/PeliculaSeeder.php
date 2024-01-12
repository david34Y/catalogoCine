<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        DB::table('peliculas')->insert([
            'id' => '1',
            'generos_id' => '1',
            'nombre' => 'El Resplandor',
            'sinopsis' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos sequi, quo dolores officia cum hic perferendis esse omnis blanditiis explicabo a, exercitationem nesciunt. Sapiente laboriosam cum non libero perferendis pariatur.',
            'duracion' => '1:55:30',
        ]);

        DB::table('peliculas')->insert([
            'id' => '2',
            'generos_id' => '3',
            'nombre' => 'Interstellar',
            'sinopsis' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos sequi, quo dolores officia cum hic perferendis esse omnis blanditiis explicabo a, exercitationem nesciunt. Sapiente laboriosam cum non libero perferendis pariatur.',
            'duracion' => '2:25:30',
        ]);
    }
}
