<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('directores')->insert([
            'id' => '1',
            'paises_id' => '1',
            'nombres' => 'Stephen',
            'apellidos' => 'King',

        ]);
        DB::table('directores')->insert([
            'id' => '2',
            'paises_id' => '2',
            'nombres' => 'Guillermo',
            'apellidos' => 'del Toro',
        ]);
    }
}
