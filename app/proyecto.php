<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'fk_usersID');
    }

    public function tipoproyecto()
    {
        return $this->belongsTo('App\TipoProyecto', 'fk_tipoProyectoID');
    }

    public function cotizacions()
    {
        return $this->hasMany('App\cotizacion', 'fk_proyectoID');
    }

    protected $fillable = [
        'codigoProyecto', 'tipo', 'fk_usersID', 'fk_tipoProyectoID', 'completada', 'comentarios'
    ];

    protected $primaryKey = 'proyectoID';
}
