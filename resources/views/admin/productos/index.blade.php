@extends('layouts.admin')

@section('content')
<div class="container mt-2">
    <h2>Productos</h2>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-warning mb-3">
        <i class="fas fa-arrow-left"></i>
    </a>
    <a href="{{ route('admin.productos.crear') }}" class="btn bt-ms btn-outline-success mb-3">
       <i class="fa fa-plus"></i> Agregar
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered" id="productos">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th class="text-center">Imagen</th>
                <th style="width: 20%; text-align:center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->PR_Nombre }}</td>
                <td>{{ $producto->categoria->CA_Nombre ?? 'Sin categoría' }}</td>
                <td>${{ $producto->PR_Precio }}</td>
                <td class="text-center">
                    @if($producto->PR_Imagen)
                        <img src="{{ asset('storage/productos/' . $producto->PR_Imagen) }}" width="60">
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('admin.productos.edit', $producto->PR_Id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('admin.productos.destroy', $producto->PR_Id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar producto?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
