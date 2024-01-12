<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientePeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('cliente_peliculas')->insert([
            'clientes_id' => '1',
            'peliculas_id' => '1',
        ]);
        DB::table('cliente_peliculas')->insert([
            'clientes_id' => '1',
            'peliculas_id' => '2',
        ]);
    }
}
