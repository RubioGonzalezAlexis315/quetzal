<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cli_cliente_info extends Model
{
    protected $table = 'cli_cliente_info';
    protected $primaryKey = 'CL_Id';
    public $timestamps = false; 


    public function pedidos() {
        return $this->hasMany(PedidoInfo::class, 'CL_Id');
    }
    public function calificaciones() {
        return $this->hasMany(Calificacion::class, 'CL_Id');
    }
    public function comentarios() {
        return $this->hasMany(Comentario::class, 'CL_Id');
    }


}


