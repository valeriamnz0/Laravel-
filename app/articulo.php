<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articulo extends Model
{
    public function tipoarticulo()
    {
        return $this->hasMany('App\TipoArticulo');
    }

    public function cotizaciones()
    {
        return $this->belongsToMany(cotizacion::class, CotizacionArticulo::class,
            'fk_articuloID', 'fk_cotizacionID')->withPivot('precio');
    }

    protected $fillable = [
        'codigo', 'proveedor', 'costo', 'marca', 'nombre', 'unidadMedida', 'fk_tipoArticuloID',
    ];

    protected $primaryKey = 'articuloID';
}
