@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Carrito de compras</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (count($carrito) > 0)
        <form action="{{ route('tienda.actualizarCarrito') }}" method="POST">
            @csrf
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($carrito as $id => $item)
                        @php
                            $subtotal = $item['precio'] * $item['cantidad'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td class="text-center"><img src="{{ asset('storage/productos/' . $item['imagen']) }}" alt="" width="60"></td>
                            <td>{{ $item['nombre'] }}</td>
                            <td>${{ number_format($item['precio'], 2) }}</td>
                            <td>
                                <input type="number" name="cantidades[{{ $id }}]" value="{{ $item['cantidad'] }}" min="1" class="form-control" style="width: 80px;">
                            </td>
                            <td>${{ number_format($subtotal, 2) }}</td>
                            <td>
                                <a href="{{ route('tienda.quitarProducto', $id) }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mb-3">
                <strong>Total: ${{ number_format($total, 2) }}</strong>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Actualizar cantidades</button>
                <a href="{{ route('tienda.finalizarPedido') }}" class="btn btn-success">Finalizar pedido</a>
            </div>
        </form>
    @else
        <p>No hay productos en el carrito.</p>
    @endif
</div>
@endsection
