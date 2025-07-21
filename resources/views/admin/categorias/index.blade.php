@extends('layouts.admin')

@section('content')
<div class="container mt-2">
    <h2>Categorías</h2>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-warning mb-3">
        <i class="fas fa-arrow-left"></i>
    </a>
    <a href="{{ route('admin.categorias.crear') }}" class="btn bt-ms btn-outline-success mb-3">
       <i class="fa fa-plus"></i> Agregar
    </a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th style="width: 20%; text-align:center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->CA_Id }}</td>
                    <td>{{ $categoria->CA_Nombre }}</td>
                    <td style="text-align:center;">
                        <a href="{{ route('admin.categorias.edit', $categoria->CA_Id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.categorias.destroy', $categoria->CA_Id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
