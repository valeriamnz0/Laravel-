<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProyecto extends Model
{
    protected $primaryKey = 'tipoProyectoID';

    public function proyectos()
    {
        return $this->belongsToMany('App\proyecto');
    }
}
