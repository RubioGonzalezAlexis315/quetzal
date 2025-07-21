@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Iniciar Sesión</h2>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form method="POST" action="{{ route('cliente.login') }}">
        @csrf
        <div class="mb-3">
            <label>Correo:</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contraseña:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Entrar</button>
        <a href="{{ route('cliente.registro') }}" class="btn btn-primary">
            Registrar
        </a>
    </form> 
</div>
@endsection
