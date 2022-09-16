<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agendaVisita extends Model
{
    protected $fillable=['fk_clienteID','name','fk_vendedorID','ubicacion','fechaHora'];
    public function user()
    {
        return $this->hasMany('App\User');
    }


    protected $primaryKey = 'agendaID';
}
