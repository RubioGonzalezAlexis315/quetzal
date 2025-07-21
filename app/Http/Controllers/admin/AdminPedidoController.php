<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ven_pedido_info;
use App\Models\cli_cliente_info;


class AdminPedidoController extends Controller
{
    public function index()
    {
        $pedidos = ven_pedido_info::with('cliente')->orderBy('PE_Alta', 'desc')->get();
        return view('admin.pedidos.index', compact('pedidos'));
    }


    public function cambiarEstatus($id, Request $request)
    {
        $pedido = ven_pedido_info::findOrFail($id);
        $pedido->PE_Estatus = $request->input('estatus');
        $pedido->save();

        return redirect()->route('admin.pedidos.index')->with('success', 'Estatus actualizado.');
    }

}
