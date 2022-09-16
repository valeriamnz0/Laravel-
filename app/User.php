<?php

namespace App;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use CanResetPassword, Notifiable;
    
    public function proyectos()
    {
        return $this->hasMany('App\proyecto','fk_usersID');
    }

    public function cotizacions() {
        return $this->hasMany('App\cotizacion');
    }

    protected $fillable = [
        'name', 'email', 'provincia', 'canton', 'distrito', 'identificacion', 'telefono', 'otraSenia', 'password', 'fk_rolID'
    ];

    protected $primaryKey = 'userID';

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function agendaVisita()
    {
        return $this->belongsToMany('App\agendaVisita');
    }
}
