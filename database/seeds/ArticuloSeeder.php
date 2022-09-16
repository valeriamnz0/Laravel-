<?php

use App\articulo;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articulo = new articulo([
            'codigo' => '1.00',
            'proveedor' => 'Conexiones',
            'costo' => 183.00,
            'marca' => 'Ubiquiti',
            'nombre' => 'AC Long Range Access Point, PoE ceiling or wall mount',
            'unidadMedida' => 'ea',
            'fk_tipoArticuloID' => 1,
            ]);
            
            $articulo->save();   

        $articulo = new articulo([
            'codigo' => 'DS-2CD1123G0E-I(2.8mm)',
            'proveedor' => 'Lanprosa',
            'costo' => 41.085,
            'marca' => 'HIKVISION',
            'nombre' => 'Camara Domo IP 2MP IR30m lente fijo 2.8-4mm POE IP67 IK10',
            'unidadMedida' => 'ea',
            'fk_tipoArticuloID' => 11,
            ]);
    
            $articulo->save();
    }
}
