@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Editar Producto</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            Error al modificar el producto:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.productos.update', $producto->PR_Id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="PR_Nombre" class="form-label">Nombre del producto</label>
            <input type="text" name="PR_Nombre" class="form-control" value="{{ old('PR_Nombre', $producto->PR_Nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="PR_Descripcion" class="form-label">Descripción</label>
            <textarea name="PR_Descripcion" class="form-control" rows="4" required>{{ old('PR_Descripcion', $producto->PR_Descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="PR_Precio" class="form-label">Precio</label>
            <input type="number" step="0.01" name="PR_Precio" class="form-control" value="{{ old('PR_Precio', $producto->PR_Precio) }}" required>
        </div>

        <div class="mb-3">
            <label for="PR_Vistas" class="form-label">Vistas</label>
            <input type="number" name="PR_Vistas" class="form-control" value="{{ old('PR_Vistas', $producto->PR_Vistas) }}" required>
        </div>

        <div class="mb-3">
            <label for="PR_Categoria" class="form-label">Categoría</label>
            <select name="PR_Categoria" class="form-select" required>
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->CA_Id }}" {{ old('PR_Categoria', $producto->PR_Categoria) == $categoria->CA_Id ? 'selected' : '' }}>
                        {{ $categoria->CA_Nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="PR_Imagen" class="form-label">Imagen del producto</label>
            @if ($producto->PR_Imagen)
                <div class="mb-2">
                    <img src="{{ asset('storage/productos/' . $producto->PR_Imagen) }}" alt="Imagen actual" width="150">
                </div>
            @endif
            <input type="file" name="PR_Imagen" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-sm btn-warning">Actualizar</button>
        <a href="{{ route('admin.productos.index') }}" class="btn btn-sm btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
