<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->updateOrInsert(
            ['correo' => 'inmobiliariamihogar25@gmail.com'],
            [
                'dni'        => '00000000',
                'correo'     => 'inmobiliariamihogar25@gmail.com',
                'contrasena' => Hash::make('123456'),
                'nombre'     => 'Admin',
            ]
        );
    }
}