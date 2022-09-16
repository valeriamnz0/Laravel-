<?php

use Illuminate\Database\Seeder;

use App\TipoProyecto;

class TipoProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoArticulos = [
            'Alarma de robo' => 'AR',
            'Alarma Incendio' => 'AI',
            'Audio' => 'AU',
            'Cableado estructurado' => 'CB',
            'Cerca electrica' => 'CE',
            'Circuito Cerrado de TV' => 'CC',
            'Computación' => 'CM',
            'Control de Acceso' => 'CA',
            'Domótica' => 'DO',
            'Routing & Switching' => 'RS',
        ];

        foreach ($tipoArticulos as $key => $value) {
            $tipo = new TipoProyecto(
                [
                    'nombre' => $key,
                    'disminutivo' => $value
                ]
            );
            $tipo->save();
        }
    }
}
