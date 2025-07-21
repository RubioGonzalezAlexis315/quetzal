@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h2 class="mb-4 text-center">Productos disponibles</h2>

    @foreach($categorias as $categoria)
        <h4 class="mt-4">{{ $categoria->CA_Nombre }}</h4>
        <div class="row">
            @forelse($categoria->productos as $producto)
                <div class="col-md-3 mb-3">
                    <div class="card rounded h-100" >
                        <img src="{{ asset('storage/productos/' . $producto->PR_Imagen) }}" class="card-img-top" alt="{{ $producto->PR_Nombre }}" style="padding: 20px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->PR_Nombre }}</h5>
                            <p class="card-text">${{ number_format($producto->PR_Precio, 2) }}</p>
                            <a href="{{ route('tienda.producto', $producto->PR_Id) }}" class="btn btn-primary">Ver producto</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">No hay productos en esta categoría.</p>
            @endforelse
        </div>
    @endforeach
</div>
@endsection
