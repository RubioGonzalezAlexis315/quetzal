<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pro_categoria extends Model
{
    protected $table = 'pro_categoria';
    protected $primaryKey = 'CA_Id';
    public $timestamps = false;
    
     protected $fillable = [
        'CA_Nombre', 
    ];

    public function productos()
    {
        return $this->hasMany(pro_producto_info::class, 'PR_Categoria', 'CA_Id');
    }
}