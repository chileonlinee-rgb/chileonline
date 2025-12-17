@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Listado de Productos</h3>
            <a href="{{ route('productos.create') }}" class="btn btn-light">
                <i class="fas fa-plus"></i> Nuevo Producto
            </a>
        </div>
        
        <div class="card-body">
            @if($productos->isEmpty())
                <div class="alert alert-info">No hay productos registrados</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Producto</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr>
                                <td>{{ $producto->producto }}</td>
                                <td>${{ number_format($producto->precio_compra, 2) }}</td>
                                <td>${{ number_format($producto->precio_venta, 2) }}</td>
                                <td>{{ $producto->cantidad }}</td>
                                <td>
                                    <span class="badge bg-{{ $producto->status == 'activo' ? 'success' : 'secondary' }}">
                                        {{ $producto->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('productos.show', $producto) }}" 
                                       class="btn btn-sm btn-info">
                                        <i class="fas fa-eye">Ver</i>
                                    </a>
                                    <a href="{{ route('productos.edit', $producto) }}" 
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit">Editar</i>
                                    </a>
                                    <form action="{{ route('productos.destroy', $producto) }}" 
                                          method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Eliminar este producto?')">
                                            <i class="fas fa-trash">Eliminar</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $productos->links() }}
            @endif
        </div>
    </div>
</div>
@endsection