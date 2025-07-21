<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cli_comentarios extends Model
{
    
    protected $table = 'cli_comentarios';
    protected $primaryKey = 'CM_Id';

    public function producto()
    {
        return $this->belongsTo(pro_producto_info::class, 'CM_Producto', 'PR_Id');
    }

    public function cliente()
    {
        return $this->belongsTo(cli_cliente_info::class, 'CM_Cliente', 'CL_Id');
    }
    
}
