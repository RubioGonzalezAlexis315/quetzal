<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ecommerce - Quetzal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <script src="https://kit.fontawesome.com/3bd256dfe3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/main.css">
</head>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #EDEDED;
        }
        h1, h2, h3 {
            font-family: 'Poppins', sans-serif;
        }
    </style>

@php
    $carrito = session('carrito', []);
    $totalProductos = array_sum(array_column($carrito, 'cantidad'));
@endphp

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('tienda.index') }}">Quetzal</a>

            <ul class="navbar-nav ms-auto d-flex">

              @if(session()->has('cliente'))
                <li class="nav-item">
                    <span class="nav-link text-white">Hola, {{ session('cliente')->CL_Nombre }}</span>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cliente.logout') }}" class="nav-link text-danger me-2"><i class="fas fa-sign-out-alt"></i></a>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('cliente.login') }}" class="nav-link text-white me-2">Iniciar sesión</a>
                </li>
            @endif

                @php
                    $carrito = session('carrito', []);
                    $totalProductos = array_sum(array_column($carrito, 'cantidad'));
                    $totalGeneral = 0;
                @endphp

                <div class="dropdown ms-auto">
                    {{-- Mostrar nombre --}}
                    @if(Auth::check())
                        <li class="nav-item me-3 text-white">
                            {{ Auth::user()->CL_Nombre }}
                        </li>
                    @endif


                    <button class="btn btn-sm btn-outline-light dropdown-toggle position-relative" type="button" id="dropdownCarrito" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-shopping-cart"></i>
                        @if($totalProductos > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $totalProductos }}
                            </span>
                        @endif
                    </button>

                    <div class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="dropdownCarrito" style="min-width: 370px; max-height: 400px; overflow-y: auto;">
                        @if(count($carrito) > 0)
                            @foreach ($carrito as $id => $item)
                                @php
                                    $subtotal = $item['precio'] * $item['cantidad'];
                                    $totalGeneral += $subtotal;
                                @endphp

                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div class="me-2">
                                        <strong>{{ $item['nombre'] }}</strong><br>
                                        <small>$ {{ number_format($item['precio'], 2) }} x {{ $item['cantidad'] }}</small><br>
                                        <small class="text-muted">Subtotal: ${{ number_format($subtotal, 2) }}</small>  
                                        <br>
                                        <a href="{{ route('tienda.quitarProducto', $id) }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                    <div class="text-end">
                                        <img src="{{ asset('storage/productos/' . $item['imagen']) }}" alt="img" width="100">
                                        
                                    </div>
                                </div>
                                <hr>
                            @endforeach

                            <div class="text-end mb-3">
                                <strong>Total: ${{ number_format($totalGeneral, 2) }}</strong>
                            </div>

                            <a href="{{ route('tienda.verCarrito') }}" class="btn btn-success w-100 mb-2">🛒 Ver carrito completo</a>                        
                        @else
                            <p class="text-center text-muted">El carrito está vacío.</p>
                        @endif
                    </div>
                </div>
            
            </ul>




           
        </div>
    </nav>

    {{-- Contenido --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
