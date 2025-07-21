<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pro_producto_info;
use App\Models\pro_categoria;

class AdminProductoController extends Controller
{
    public function index()
    {
        $productos = pro_producto_info::with('categoria')->get();
        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = pro_categoria::all();
        return view('admin.productos.crear', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'PR_Nombre' => 'required|string|max:255',
            'PR_Descripcion' => 'required|string',
            'PR_Precio' => 'required|numeric|min:0',
            'PR_Categoria' => 'required|exists:pro_categoria,CA_Id',
            'PR_Vistas' => 'required|integer|min:0',
            'PR_Imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'PR_Nombre',
            'PR_Descripcion',
            'PR_Precio',
            'PR_Categoria',
            'PR_Vistas',
        ]);

        if ($request->hasFile('PR_Imagen')) {
            $ruta = $request->file('PR_Imagen')->store('productos', 'public');
            $data['PR_Imagen'] = basename($ruta);
        }

        pro_producto_info::create($data);

        return redirect()->route('admin.productos.index')
            ->with('success', 'Producto creado.');
    }

    public function edit($id)
    {
        $producto = pro_producto_info::findOrFail($id);
        $categorias = pro_categoria::all();
        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'PR_Nombre' => 'required|string|max:255',
            'PR_Descripcion' => 'required|string',
            'PR_Precio' => 'required|numeric|min:0',
            'PR_Categoria' => 'required|exists:pro_categoria,CA_Id',
            'PR_Vistas' => 'required|integer|min:0',
            'PR_Imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $producto = pro_producto_info::findOrFail($id);

        $data = $request->only([
            'PR_Nombre',
            'PR_Descripcion',
            'PR_Precio',
            'PR_Categoria',
            'PR_Vistas',
        ]);

        if ($request->hasFile('PR_Imagen')) {
            if ($producto->PR_Imagen && Storage::disk('public')->exists('productos/' . $producto->PR_Imagen)) {
                Storage::disk('public')->delete('productos/' . $producto->PR_Imagen);
            }

            $ruta = $request->file('PR_Imagen')->store('productos', 'public');
            $data['PR_Imagen'] = basename($ruta);
        }

        $producto->update($data);

        return redirect()->route('admin.productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        pro_producto_info::destroy($id);
        return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado.');
    }
}
