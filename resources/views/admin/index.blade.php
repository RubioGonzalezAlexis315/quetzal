@extends('layouts.login')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-sm border-0" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <h3 class="mb-4 text-center">Iniciar Sesión</h3>
            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="AD_Correo" class="form-label">Correo:</label>
                    <input type="email" name="AD_Correo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="AD_Contraseña" class="form-label">Contraseña:</label>
                    <input type="password" name="AD_Contraseña" class="form-control" required>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-sm btn-success">Ingresar</button>
                </div>
            </form>
        </div>
    </div>               
</div>
@endsection
