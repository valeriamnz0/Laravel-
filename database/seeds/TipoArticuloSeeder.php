<?php

use Illuminate\Database\Seeder;

use App\TipoArticulo;

class TipoArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoArticulos = [
            'Antena',
            'Audio',
            'Batería',
            'Botonera',
            'Cable de alarma',
            'Cable HDMI',
            'Cable UTP',
            'Cable UTP EXT',
            'Caja plexo',
            'Cámara análoga',
            'Cámara IP',
            'Cerca eléctrica',
            'Conectores',
            'Contacto magnético',
            'Disco duro',
            'Equipos de instalación',
            'Fuente de poder',
            'Gabinete',
            'Grabador análogo',
            'Incendio',
            'Interfaz',
            'Mano de obra',
            'Mantenimiento',
            'Módulos',
            'Otros',
            'Panel de alarma',
            'Pantalla',
            'Patch Panel',
            'Regleta',
            'Relays',
            'Rótula',
            'Sensor de movimiento',
            'Sensor de ruptura',
            'Sensor de temperatura',
            'Sirenas',
            'Switch',
            'Tarjetas',
            'Transformador',
            'UPS',
            'Video Portero'
        ];

        foreach ($tipoArticulos as $key) {
            $tipo = new TipoArticulo(
                [
                    'descripcion' => $key,
                ]
            );
            $tipo->save();
        }
    }
}
