@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Detalle del Producto</h3>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información Básica</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Producto:</strong> {{ $producto->producto }}
                        </li>
                        <li class="list-group-item">
                            <strong>Proveedor:</strong> {{ $producto->proveedor }}
                        </li>
                        <li class="list-group-item">
                            <strong>Estado:</strong>
                            <span class="badge bg-{{ $producto->status == 'activo' ? 'success' : 'secondary' }}">
                                {{ $producto->status }}
                            </span>
                        </li>
                    </ul>
                </div>
                
                <div class="col-md-6">
                    <h5>Detalles Financieros</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Precio Compra:</strong> ${{ number_format($producto->precio_compra, 2) }}
                        </li>
                        <li class="list-group-item">
                            <strong>Precio Venta:</strong> ${{ number_format($producto->precio_venta, 2) }}
                        </li>
                        <li class="list-group-item">
                            <strong>Comisión:</strong> {{ $producto->comision }}%
                        </li>
                        <li class="list-group-item">
                            <strong>Cantidad:</strong> {{ $producto->cantidad }}
                        </li>
                    </ul>
                </div>
                
                <div class="col-12 mt-4">
                    <h5>Descripción</h5>
                    <p>{{ $producto->descripcion ?? 'Sin descripción' }}</p>
                </div>
            </div>
            
            <div class="mt-4">
                <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection