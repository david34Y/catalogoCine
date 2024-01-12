<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('clientes')->insert([
            'id' => '1',
            'nombres' => 'Carlos',
            'apellidos' => 'Mendoza',
            'email' => 'cmendoza@mail.com',
            'password' => Hash::make('123456'),
            'telefono' => '999888777',
        ]);
        DB::table('clientes')->insert([
            'id' => '2',
            'nombres' => 'Karen',
            'apellidos' => 'Linares',
            'email' => 'klinares@mail.com',
            'password' => Hash::make('123456'),
            'telefono' => '66655544',
        ]);
    }
}
