@extends('layouts.admin')

@section('content')
<div class="container mt-2">
    <h2 class="text-center mb-4">Panel de Control</h2>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <br><h4>Productos</h4><br>
                </div>
                <div class="icon">
                    <a class="icon" href="{{ route('admin.productos.index') }}">
                        <i class="fas fa-box-open"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <br><h4>Categorías</h4><br>
                </div>
                <a class="icon" href="{{ route('admin.categorias.index') }}">
                    <i class="fas fa-tags"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <br><h4>Pedidos</h4><br>
                </div>
                <a class="icon" href="{{ route('admin.pedidos.index') }}">
                    <i class="fas fa-truck-loading"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <br><h4>Reportes</h4><br>
                </div>
                <a class="icon" href="{{ route('admin.reportes.index') }}">
                    <i class="fas fa-file-alt"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
