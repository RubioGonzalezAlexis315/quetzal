@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h2>¡Gracias por tu compra!</h2>
    <p>Tu pedido #{{ $pedido->PE_Id }} ha sido registrado con éxito.</p>
    <p>Total pagado: <strong>${{ number_format($pedido->PE_Total, 2) }}</strong></p>
    <a href="{{ route('tienda.index') }}" class="btn btn-primary mt-3">Volver a la tienda</a>
</div>
@endsection
