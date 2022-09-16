<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtrosRubro extends Model
{
    protected $table = 'otros_rubros';
    protected $primaryKey = 'rubroID';
    protected $fillable = [
        'fk_cotizacionID', 'fk_rubrosCotizacionID', 'cantidad', 'costo', 'margen', 'precio', 'iva',
        'precioFinal' 
    ];
}
