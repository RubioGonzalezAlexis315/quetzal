<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ven_pedido_info extends Model
{
    protected $table = 'ven_pedido_info';
    protected $primaryKey = 'PE_Id'; 
    public $timestamps = false;

    protected $fillable = [
        'PE_Cliente',
        'PE_Fecha',
        'PE_Total',
        'PE_Estatus',
    ];

    public function cliente()
    {
        return $this->belongsTo(cli_cliente_info::class, 'PE_Cliente','CL_Id');
    }

    public function productos()
    {
        return $this->hasMany(ven_pedido_pro::class, 'PP_Pedido');
    }

}
