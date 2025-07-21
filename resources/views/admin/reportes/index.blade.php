@extends('layouts.admin')

@section('content')
<div class="container mt-2">
    <h2>Reportes</h2>
    <ul class="nav nav-tabs" id="reportTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="vendidos-tab" data-bs-toggle="tab" data-bs-target="#vendidos" type="button" role="tab">Más Vendidos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="vistos-tab" data-bs-toggle="tab" data-bs-target="#vistos" type="button" role="tab">Más Vistos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="calificados-tab" data-bs-toggle="tab" data-bs-target="#calificados" type="button" role="tab">Mejor Calificados</button>
        </li>
    </ul>

    <div class="tab-content mt-3" id="reportTabsContent">
        {{-- Más Vendidos --}}
        <div class="tab-pane fade show active" id="vendidos" role="tabpanel">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th style="width: 20%; text-align:center;">Top de Venta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($masVendidos as $producto)
                        <tr>
                            <td>{{ $producto->PR_Nombre }}</td>
                            <td class="text-center">{{ $producto->total_vendido }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Mas Visto --}}
        <div class="tab-pane fade" id="vistos" role="tabpanel">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th style="width: 20%; text-align:center;">Vistas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($masVistos as $producto)
                        <tr>
                            <td>{{ $producto->PR_Nombre }}</td>
                            <td class="text-center">{{ $producto->PR_Vistas }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Mejor Calificado --}}
        <div class="tab-pane fade" id="calificados" role="tabpanel">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th style="width: 20%; text-align:center;">Calificación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mejorCalificados as $producto)
                        <tr>
                            <td>{{ $producto->PR_Nombre }}</td>
                            <td class="text-center"> 
                                <i class="fas fa-star text-warning"></i> 
                                {{ number_format($producto->promedio_calificacion, 1) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
