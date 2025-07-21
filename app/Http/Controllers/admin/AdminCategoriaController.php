<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pro_categoria;
use Illuminate\Http\Request;

class AdminCategoriaController extends Controller
{
    public function index()
    {
        $categorias = pro_categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function crear()
    {
        return view('admin.categorias.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'CA_Nombre' => 'required|string|max:255',
        ]);

        pro_categoria::create([
            'CA_Nombre' => $request->CA_Nombre,
        ]);

        return redirect()->route('admin.categorias.index')
            ->with('success', 'Categoría creada.');
    }

    public function edit($id)
    {
        $categoria = pro_categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'CA_Nombre' => 'required|string|max:255',
        ]);

        $categoria = pro_categoria::findOrFail($id);
        $categoria->update([
            'CA_Nombre' => $request->CA_Nombre,
        ]);

        return redirect()->route('admin.categorias.index')
            ->with('success', 'Categoría actualizada.');
    }

    public function destroy($id)
    {
        $categoria = pro_categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('admin.categorias.index')
            ->with('success', 'Categoría eliminada.');
    }
}