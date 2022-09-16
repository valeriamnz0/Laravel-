<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CotizacionArticulo extends Model
{
    protected $table='cotizacion_articulo';
    public function user(){ // Con el user en singular
        return $this->belongsTo('App\User');
    }

    public function proyecto(){
        return $this->belongsTo('App\proyecto');
    }

    public function agendainstalacions(){
        return $this->hasMany('App\agendaInstalacion');
    }

    protected $fillable = [
        'codigoCotizacion', 'exonerado', 'fecha', 'aprobado', 'compraDolar', 'ventaDolar', 'notas',
        'fk_userID', 'fk_proyectoID'
    ];
}
