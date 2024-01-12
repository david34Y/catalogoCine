<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('generos')->insert([
            'id' => '1',
            'nombre' => 'Infantil',
        ]);
        DB::table('generos')->insert([
            'id' => '2',
            'nombre' => 'Novelas Juveniles',
        ]);
        DB::table('generos')->insert([
            'id' => '3',
            'nombre' => 'Ciencias',
        ]);
        DB::table('generos')->insert([
            'id' => '4',
            'nombre' => 'Historia',
        ]);
    }
}
