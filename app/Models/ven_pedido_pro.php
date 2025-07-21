<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ven_pedido_pro extends Model
{
    protected $table = 'ven_pedido_pro';
    protected $primaryKey = 'PP_Id'; 
    public $timestamps = false;

    protected $fillable = [
        'PP_Pedido',
        'PP_Producto',
        'PP_Cantidad',
        'PP_Precio'
    ];

    public function producto()
    {
        return $this->belongsTo(pro_producto_info::class, 'PP_Producto');
    }

    public function pedido()
    {
        return $this->belongsTo(ven_pedido_info::class, 'PP_Pedido');
    }
}
