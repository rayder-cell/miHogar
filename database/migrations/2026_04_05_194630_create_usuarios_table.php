<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([
            'dni'       => '00000000',
            'correo'    => 'mrayderalfredo@gmail.com',
            'contrasena' => Hash::make('123456'),
            'nombre'    => 'Admin',
        ]);
    }
}