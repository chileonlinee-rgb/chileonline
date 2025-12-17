@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="my-4">Editar Pedido</h1>

    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <!-- Columna Izquierda -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" 
                           value="{{ old('fecha', $pedido->fecha) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Producto</label>
                    <input type="text" class="form-control" name="producto" 
                           value="{{ old('producto', $pedido->producto) }}" required>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" 
                               value="{{ old('cantidad', $pedido->cantidad) }}" min="1" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Precio Unitario</label>
                        <input type="number" step="0.01" class="form-control" name="precio" 
                               value="{{ old('precio', $pedido->precio) }}" required>
                    </div>
                </div>

                  <div class="col-6">
                     <label class="form-label">Delivery</label>
                     <input type="text" class="form-control" name="delivery" 
                               value="{{ old('delivery', $pedido->delivery) }}" required>
                  
                </div>
            </div>

            <!-- Columna Derecha -->
        <div class="form-group">
            <label>Turno:</label>
            <select name="turno" class="form-control" required>
                @foreach($turno as $turnos)
                    <option value="{{ $turnos }}" {{ $pedido->turno == $turnos ? 'selected' : '' }}>
                        {{ ucfirst($turnos) }}
                    </option>
                @endforeach
            </select>
        </div>
             <div class="form-group">
            <label>Zona:</label>
            <select name="zona" class="form-control" required>
                @foreach($zona as $zonas)
                    <option value="{{ $zonas }}" {{ $pedido->zona == $zonas ? 'selected' : '' }}>
                        {{ ucfirst($zonas) }}
                    </option>
                @endforeach
            </select>
        </div>
                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                   <input type="text" class="form-control" name="nombre_cliente" 
                               value="{{ old('cliente', $pedido->nombre_cliente) }}" min="1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Telefono Cliente</label>
                   <input type="text" class="form-control" name="telefono_cliente" 
                               value="{{ old('cliente', $pedido->telefono_cliente) }}" min="1" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Vendedora</label>
                  <input type="text" class="form-control" name="nombre_vendedora" 
                               value="{{ old('nombre_vendedora', $pedido->nombre_vendedora) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Telefono Vendedora</label>
                   <input type="text" class="form-control" name="telefono_vendedora" 
                               value="{{ old('vendedora', $pedido->telefono_vendedora) }}" min="1" required>
                </div>
                <div class="mb-3">
        <div class="form-group">
            <label>Repartidor:</label>
            <select name="repartidor" class="form-control" required>
                @foreach($repartidores as $repartidor)
                    <option value="{{ $repartidor->nombre }}" {{ $pedido->repartidor == $repartidor ? 'selected' : '' }}>
                        {{ ucfirst($repartidor->nombre) }}
                    </option>
                @endforeach
            </select>
        </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <textarea class="form-control" name="direccion" rows="2">{{ old('direccion', $pedido->direccion) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Observacion</label>
                    <textarea class="form-control" name="observacion" rows="2">{{ old('observacion', $pedido->observacion) }}</textarea>
                </div>
                  <div class="form-group">
            <label>Status:</label>
            <select name="status" class="form-control" required>
                @foreach($statu as $status)
                    <option value="{{ $status }}" {{ $pedido->status == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>
            </div>
        <br>

       <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection