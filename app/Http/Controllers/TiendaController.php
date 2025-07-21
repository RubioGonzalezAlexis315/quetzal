<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pro_categoria;
use App\Models\pro_producto_info;
use App\Models\cli_comentarios;

use App\Models\ven_pedido_info;
use App\Models\ven_pedido_pro;
use Illuminate\Support\Facades\Auth;

class TiendaController extends Controller
{
    public function index()
    {
        $categorias = pro_categoria::with('productos')->get();
        return view('tienda.index', compact('categorias'));
    }

    public function producto($id)
    {
        $producto = pro_producto_info::with(['categoria', 'comentarios.cliente', 'calificaciones'])->findOrFail($id);
        return view('tienda.producto', compact('producto'));
    }


    public function agregarCarrito(Request $request, $id)
    {
        $producto = pro_producto_info::findOrFail($id);

        $carrito = session()->get('carrito', []);

        $cantidad = $request->input('cantidad', 1);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] += $cantidad;
        } else {
            $carrito[$id] = [
                'nombre' => $producto->PR_Nombre,
                'precio' => $producto->PR_Precio,
                'imagen' => $producto->PR_Imagen,
                'cantidad' => $cantidad,
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }


    public function verCarrito()
    {
        $carrito = session()->get('carrito', []);
        return view('tienda.carrito', compact('carrito'));
    }

    public function actualizarCarrito(Request $request)
    {
        $carrito = session()->get('carrito', []);

        foreach ($request->cantidades as $id => $cantidad) {
            if (isset($carrito[$id])) {
                $carrito[$id]['cantidad'] = max(1, intval($cantidad));
            }
        }

        session()->put('carrito', $carrito);

        return redirect()->route('tienda.verCarrito')->with('success', 'Carrito actualizado.');
    }

    public function quitarProducto($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->route('tienda.verCarrito')->with('success', 'Producto eliminado del carrito.');
    }

    public function finalizarPedido()
    {

        if (!session()->has('cliente')) { //autentificación
            return redirect()->route('cliente.login')->with('error', 'Debes iniciar sesión para finalizar tu pedido.');
        }

        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('tienda.verCarrito')->with('error', 'El carrito está vacío.');
        }

        $cliente = session('cliente');

        $pedido = ven_pedido_info::create([
            'PE_Cliente' => $cliente->CL_Id,
            'PE_Alta' => now(),
            'PE_Total' => collect($carrito)->sum(function ($item) {
                return $item['precio'] * $item['cantidad'];
            }),
            'PE_Estatus' => 'pendiente'
        ]);

        foreach ($carrito as $idProducto => $item) {
            ven_pedido_pro::create([
                'PP_Pedido' => $pedido->PE_Id,
                'PP_Producto' => $idProducto,
                'PP_Cantidad' => $item['cantidad'],
                'PP_Precio' => $item['precio'],
                'PP_Alta' => now(),
            ]);
        }

        session()->forget('carrito');
        return view('tienda.finalizado')->with('pedido', $pedido);
    }


}