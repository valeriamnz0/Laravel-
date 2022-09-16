<?php

use App\agendaVisita;
use Illuminate\Database\Seeder;

class AgendaVisitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $primeraVisita = new agendaVisita([
            'ubicacion' => 'https://goo.gl/maps/m5P2Z66aJEpWReEw8',
            'fechaHora' => '2021-06-26 00:00:00',
            'fk_clienteID' => 2,
            'fk_vendedorID' => 1,
            ]);
    
        $primeraVisita->save();
        
    }
}
