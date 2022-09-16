<?php

use App\RubrosCotizacion;
use Illuminate\Database\Seeder;

class RubrosCotizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rubro = new RubrosCotizacion([
            'rubrosCotizacionID' => 1,
            'rubroNombre' => 'Materiales'
            ]);
    
            $rubro->save();

            $rubro = new RubrosCotizacion([
                'rubrosCotizacionID' => 2,
                'rubroNombre' => 'ManoDeObra'
                ]);
        
                $rubro->save();
    }
}
