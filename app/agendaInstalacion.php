<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agendaInstalacion extends Model
{
    protected $fillable=['fk_tecnicoID','fechaHora','ubicacion','fk_cotizacionID'];
    //
    public function cotizacion(){
        return $this->belongsTo('App\cotizacion');
    }

    protected $primaryKey = 'agendaInstalacionID';

}
