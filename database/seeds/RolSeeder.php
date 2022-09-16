<?php

use App\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoUser = [
            'Admin',
            'Vendedor',
            'Instalador',
            'Cliente'
        ];

        foreach ($tipoUser as $key) {
            $rol = new Rol(
                [
                    'descripcion' => $key,
                ]
            );
            $rol->save();
        }
    }
}
