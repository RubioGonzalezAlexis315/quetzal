<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdministradorSeeder extends Seeder
{
    public function run()
    {
        DB::table('usu_administrador')->insert([
            'AD_Nombre' => 'Administrador',
            'AD_Correo' => 'admin@quetzal.com',
            'AD_Contraseña' => bcrypt('12345a'),
            'AD_Alta' => now(),
        ]);
    }
}
