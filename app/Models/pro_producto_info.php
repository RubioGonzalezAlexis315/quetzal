<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pro_producto_info extends Model
{
    protected $table = 'pro_producto_info';
    protected $primaryKey = 'PR_Id';
    public $timestamps = false;

    protected $fillable = [
        'PR_Nombre',
        'PR_Descripcion',
        'PR_Precio',
        'PR_Categoria',
        'PR_Vistas',
        'PR_Imagen',     
    ];

    public function categoria()
    {
         return $this->belongsTo(pro_categoria::class, 'PR_Categoria', 'CA_Id');
    }

    public function comentarios()
    {
        return $this->hasMany(cli_comentarios::class, 'CM_Producto', 'PR_Id');
    }

    public function calificaciones()
    {
        return $this->hasMany(pro_calificacion::class, 'CF_Producto', 'PR_Id');
    }


}