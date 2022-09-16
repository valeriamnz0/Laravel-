<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cotizacion extends Model
{
    protected $primaryKey = 'cotizacionID';

    public function user()
    { // Con el user en singular
        return $this->belongsTo('App\User');
    }

    public function proyecto()
    {
        return $this->belongsTo('App\proyecto', 'fk_proyectoID');
    }

    public function agendainstalacions()
    {
        return $this->hasMany('App\agendaInstalacion');
    }

    public function articulos()
    {
        return $this->belongsToMany(articulo::class, CotizacionArticulo::class,
            'fk_cotizacionID', 'fk_articuloID')->withPivot('precioFinal');
    }

    public function rubros()
    {
        return $this->belongsToMany(RubrosCotizacion::class, OtrosRubro::class,
            'fk_rubrosCotizacionID', 'fk_cotizacionID')->withPivot('precioFinal');
    }

    protected $fillable = [
        'codigoCotizacion', 'exonerado', 'fecha', 'aprobado', 'compraDolar', 'ventaDolar', 'notas',
        'fk_userID', 'fk_proyectoID'
    ];
}
