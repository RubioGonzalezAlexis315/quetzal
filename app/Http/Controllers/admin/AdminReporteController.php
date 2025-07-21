<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\pro_producto_info;
use Illuminate\Support\Facades\DB;


class AdminReporteController extends Controller
{
     public function index()
    {
        // Más vendidos
        $masVendidos = pro_producto_info::select('pro_producto_info.PR_Nombre', DB::raw('SUM(ven_pedido_pro.PP_Cantidad) as total_vendido'))
            ->join('ven_pedido_pro', 'pro_producto_info.PR_Id', '=', 'ven_pedido_pro.PP_Producto')
            ->groupBy('pro_producto_info.PR_Nombre')
            ->orderByDesc('total_vendido')
            ->limit(10)
            ->get();

        // Más vistos
        $masVistos = pro_producto_info::orderByDesc('PR_Vistas')->limit(10)->get();

        // Mejor calificados
        $mejorCalificados = pro_producto_info::select('pro_producto_info.PR_Nombre', DB::raw('AVG(pro_calificacion.CF_Calificacion) as promedio_calificacion'))
            ->join('pro_calificacion', 'pro_producto_info.PR_Id', '=', 'pro_calificacion.CF_Producto')
            ->groupBy('pro_producto_info.PR_Nombre')
            ->orderByDesc('promedio_calificacion')
            ->limit(10)
            ->get();

        return view('admin.reportes.index', compact('masVendidos', 'masVistos', 'mejorCalificados'));
    }
}
