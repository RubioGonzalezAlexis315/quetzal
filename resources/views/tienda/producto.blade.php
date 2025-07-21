@extends('layouts.app')

@section('content')
<div class="container my-4">
    <a href="{{ route('tienda.index') }}" class="btn btn-primary mb-3">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
    <div class="row">
        {{-- Imagen --}}
        <div class="col-md-5">
            <img src="{{ $producto->PR_Imagen ? asset('storage/productos/' . $producto->PR_Imagen) : 'https://via.placeholder.com/400' }}" class="img-fluid rounded h-100" alt="{{ $producto->nombre }}">
        </div>

        {{-- Detalle --}}
        <div class="col-md-7">
            <h3>{{ $producto->PR_Nombre }}</h3>
            <h2>${{ number_format($producto->PR_Precio, 2) }}</h2>
            <p><strong>Categoría:</strong> {{ $producto->categoria->CA_Nombre }}</p>
            <p><strong>Descripción:</strong> {{ $producto->PR_Descripcion }}</p>

            {{-- Calificación --}}
            <p>
                <strong>Calificación:</strong>
                @if ($producto->calificaciones->count() > 0)
                    {{ number_format($producto->calificaciones->avg('CF_Calificacion'), 1) }} / 5
                @else
                    No calificado aún
                @endif
            </p>

            <form action="{{ route('tienda.agregarCarrito', $producto->PR_Id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" value="1" min="1" class="form-control" style="width: 100px;">
                </div>
                <button type="submit" class="btn btn-success">Agregar al carrito</button>
            </form>
        </div>
    </div>

    {{-- Comentarios --}}
    <div class="row mt-5">
        <div class="col-12">
            <h4>Comentarios</h4>
            @if ($producto->comentarios->count() > 0)
                @foreach ($producto->comentarios as $comentario)
                    <div class="border-bottom mb-3">
                        <p><strong>{{ $comentario->cliente->CL_Nombre }}</strong> dijo:</p>
                        <p>{{ $comentario->CM_Comentario }}</p>
                    </div>
                @endforeach
            @else
                <p>No hay comentarios para este producto.</p>
            @endif
        </div>
    </div>
</div>
@endsection
