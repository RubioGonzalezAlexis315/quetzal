@extends('layouts.admin')

@section('content')
<div class="container mt-2">
    <h2>Pedidos</h2>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-warning mb-3">
        <i class="fas fa-arrow-left"></i>
    </a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estatus</th>
                <th class="text-center">Cambiar Estatus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->PE_Id }}</td>
                    <td>{{ $pedido->cliente->CL_Nombre ?? 'Sin nombre' }}</td>
                    <td>{{ $pedido->PE_Alta }}</td>
                    <td>${{ number_format($pedido->PE_Total, 2) }}</td>
                    <td>{{ ucfirst($pedido->PE_Estatus) }}</td>
                    <td class="text-center">
                        <form action="{{ route('admin.pedidos.estatus', $pedido->PE_Id) }}" method="POST">
                            @csrf
                            <select name="estatus" class="form-select form-select-sm d-inline w-auto">
                                <option value="pendiente" {{ $pedido->PE_Estatus == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="pagado" {{ $pedido->PE_Estatus == 'pagado' ? 'selected' : '' }}>Pagado</option>
                                <option value="enviado" {{ $pedido->PE_Estatus == 'enviado' ? 'selected' : '' }}>Enviado</option>
                                <option value="cancelado" {{ $pedido->PE_Estatus == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
