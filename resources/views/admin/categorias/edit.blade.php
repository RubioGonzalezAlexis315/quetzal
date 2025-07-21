@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Editar Categoría</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
             Error al modificar la categoría:<br><br>
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.categorias.update', $categoria->CA_Id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="CA_Nombre" class="form-label">Nombre:</label>
            <input type="text" name="CA_Nombre" class="form-control" required value="{{ old('CA_Nombre', $categoria->CA_Nombre) }}">
        </div>
        <button type="submit" class="btn btn-sm btn-warning">Actualizar</button>
        <a href="{{ route('admin.categorias.index') }}" class="btn btn-sm btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
