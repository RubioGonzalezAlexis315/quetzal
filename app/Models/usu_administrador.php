<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class usu_administrador extends Authenticatable
{
    use Notifiable;

    protected $table = 'usu_administrador';
    protected $primaryKey = 'AD_Id';
    public $timestamps = false;

    protected $fillable = [
        'AD_Nombre',
        'AD_Correo',
        'AD_Contraseña',
        'AD_Alta',
    ];

    protected $hidden = [
        'AD_Contraseña',
    ];

    public function getAuthPassword()
    {
        return $this->AD_Contraseña;
    }

    public function getAuthIdentifierName()
    {
        return 'AD_Correo';
    }
}
