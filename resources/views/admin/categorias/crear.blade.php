@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Categorías</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
             Error al ingresar la categoría:<br><br>
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.categorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="CA_Nombre" class="form-label">Nombre:</label>
            <input type="text" name="CA_Nombre" class="form-control" required value="{{ old('CA_Nombre') }}">
        </div>
        <button type="submit" class="btn btn-sm btn-success">Guardar</button>
        <a href="{{ route('admin.categorias.index') }}" class="btn btn-sm btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
