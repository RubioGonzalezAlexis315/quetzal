@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Nuevo Producto</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
           Error al ingresar el producto:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario de producto --}}
    <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="PR_Nombre" class="form-label">Nombre del producto</label>
            <input type="text" name="PR_Nombre" class="form-control" value="{{ old('PR_Nombre') }}" required>
        </div>

        <div class="mb-3">
            <label for="PR_Descripcion" class="form-label">Descripción</label>
            <textarea name="PR_Descripcion" class="form-control" rows="4" required>{{ old('PR_Descripcion') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="PR_Precio" class="form-label">Precio</label>
            <input type="number" step="0.01" name="PR_Precio" class="form-control" value="{{ old('PR_Precio') }}" required>
        </div>

        <div class="mb-3">
            <label for="PR_Vistas" class="form-label">Vistas</label>
            <input type="number" name="PR_Vistas" class="form-control" value="{{ old('PR_Vistas', 0) }}" required>
        </div>

        <div class="mb-3">
            <label for="PR_Categoria" class="form-label">Categoría</label>
            <select name="PR_Categoria" class="form-select" required>
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->CA_Id }}" {{ old('PR_Categoria') == $categoria->CA_Id ? 'selected' : '' }}>
                        {{ $categoria->CA_Nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="PR_Imagen" class="form-label">Imagen del producto</label>
            <input type="file" name="PR_Imagen" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-sm btn-success">Guardar</button>
        <a href="{{ route('admin.productos.index') }}" class="btn btn-sm btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
