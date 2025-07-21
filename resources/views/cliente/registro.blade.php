@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Registro de Cliente</h2>
    <form method="POST" action="{{ route('cliente.registro.guardar') }}">
        @csrf
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Correo:</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contraseña:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Registrarse</button>
    </form>
</div>
@endsection
