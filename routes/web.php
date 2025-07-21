<?php

use App\Http\Controllers\TiendaController;
use App\Http\Middleware\cliente;

    Route::get('/', [TiendaController::class, 'index'])->name('tienda.index');
    Route::get('/producto/{id}', [TiendaController::class, 'producto'])->name('tienda.producto');

    Route::get('/carrito', [TiendaController::class, 'verCarrito'])->name('tienda.verCarrito');
    Route::post('/carrito/agregar/{id}', [TiendaController::class, 'agregarCarrito'])->name('tienda.agregarCarrito');
    Route::post('/carrito/actualizar', [TiendaController::class, 'actualizarCarrito'])->name('tienda.actualizarCarrito');
    Route::get('/carrito/quitar/{id}', [TiendaController::class, 'quitarProducto'])->name('tienda.quitarProducto');


    Route::get('/pedido/finalizar', [TiendaController::class, 'finalizarPedido'])
    ->name('tienda.finalizarPedido')->middleware(cliente::class);


use App\Http\Controllers\ClienteController;

    Route::get('/cliente/login', [ClienteController::class, 'mostrarLogin'])->name('login');
    Route::post('/cliente/login', [ClienteController::class, 'procesarLogin'])->name('cliente.login');
    Route::get('/cliente/registro', [ClienteController::class, 'mostrarRegistro'])->name('cliente.registro');
    Route::post('/cliente/registro', [ClienteController::class, 'procesarRegistro'])->name('cliente.registro.guardar');
    Route::get('/cliente/logout', [ClienteController::class, 'logout'])->name('cliente.logout');   

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Middleware\administrador;

    Route::get('/admin', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

use App\Http\Controllers\Admin\DashboardController;
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard')->middleware(administrador::class);

use App\Http\Controllers\Admin\AdminProductoController;

Route::middleware(administrador::class)->group(function () {
    Route::get('/admin/productos', [AdminProductoController::class, 'index'])->name('admin.productos.index');
    Route::get('/admin/productos/crear', [AdminProductoController::class, 'create'])->name('admin.productos.crear');
    Route::post('/admin/productos', [AdminProductoController::class, 'store'])->name('admin.productos.store');
    Route::get('/admin/productos/{id}/edit', [AdminProductoController::class, 'edit'])->name('admin.productos.edit');
    Route::put('/admin/productos/{id}', [AdminProductoController::class, 'update'])->name('admin.productos.update');
    Route::delete('/admin/productos/{id}', [AdminProductoController::class, 'destroy'])->name('admin.productos.destroy');
});
use App\Http\Controllers\Admin\AdminPedidoController;
Route::middleware(administrador::class)->group(function () {
    Route::get('/admin/pedidos', [AdminPedidoController::class, 'index'])->name('admin.pedidos.index');
    Route::post('/admin/pedidos/{id}/estatus', [AdminPedidoController::class, 'cambiarEstatus'])->name('admin.pedidos.estatus');
});

use App\Http\Controllers\Admin\AdminReporteController;
Route::middleware(administrador::class)->group(function () {
    Route::get('/admin/reportes', [AdminReporteController::class, 'index'])->name('admin.reportes.index');
});

use App\Http\Controllers\Admin\AdminCategoriaController;
Route::middleware(administrador::class)->group(function () {
    Route::get('/admin/categorias', [AdminCategoriaController::class, 'index'])->name('admin.categorias.index');
    Route::get('/admin/categorias/crear', [AdminCategoriaController::class, 'crear'])->name('admin.categorias.crear');
    Route::post('/admin/categorias', [AdminCategoriaController::class, 'store'])->name('admin.categorias.store');
    Route::get('/admin/categorias/{id}/edit', [AdminCategoriaController::class, 'edit'])->name('admin.categorias.edit');
    Route::put('/admin/categorias/{id}', [AdminCategoriaController::class, 'update'])->name('admin.categorias.update');
    Route::delete('/admin/categorias/{id}', [AdminCategoriaController::class, 'destroy'])->name('admin.categorias.destroy');
});



