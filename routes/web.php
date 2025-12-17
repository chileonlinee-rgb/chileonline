<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
Route::resource('items', ItemController::class);

Route::resource('pedidos', PedidoController::class);
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RepartidorController;
use App\Http\Controllers\VendedorController;

Route::resource('pedidos', PedidoController::class);
Route::resource('repartidores', RepartidorController::class);
Route::resource('vendedores', VendedorController::class);

use App\Http\Controllers\EntregaController;
Route::get('/vendedores/{vendedor}', [VendedorController::class, 'show'])->name('vendedores.show');
Route::resource('entregas', EntregaController::class);
Route::get('/vendedores/{vendedor}/detalle', [VendedorController::class, 'show'])->name('vendedores.detalle');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::put('/actualizarRepartidor', [PedidoController::class, 'actualizarRepartidor'])
    ->name('actualizarRepartidor');
Auth::routes();
use App\Http\Controllers\ProductoController;

Route::resource('productos', ProductoController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::post('/entregas/export', [EntregaController::class, 'export'])->name('entregas.export');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('item', [App\Http\Controllers\PedidoController::class, 'updateItem'])->name('updateItem');