<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoArticulo extends Model
{
    //
    public function articulos(){
        return $this->belongsToMany('App\articulo');
    }
    protected $primaryKey = 'tipoArticuloID';
}
