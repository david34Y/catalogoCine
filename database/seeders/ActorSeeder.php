<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('actores')->insert([
            'id' => '1',
            'paises_id' => '3',
            'nombres' => 'Mike',
            'apellidos' => 'Longaniza',

        ]);
        DB::table('actores')->insert([
            'id' => '2',
            'paises_id' => '4',
            'nombres' => 'Karen',
            'apellidos' => 'Dejo',
        ]);
    }
}
