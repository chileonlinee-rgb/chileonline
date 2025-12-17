@extends('layouts.app')

@section('content')
<div class="container">
<div class="row mb-4">
    <div class="col-md-6">
        <h1>Panel de Administración</h1>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('repartidores.index') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>  Repartidores
        </a>
        <a href="{{ route('pedidos.index') }}" class="btn btn-warning">
            <i class="bi bi-plus-circle"></i> Pedidos
        </a>
        <a href="{{ route('vendedores.index') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Vendedores
        </a>
    </div>
</div>

<div class="row">
    
    
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Repartidores Activos</h5>
                <p class="card-text display-4">{{ $estadisticas['repartidores'] }}</p>
            </div>
        </div>
    </div>
     <div class="col-md-3 mb-4">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">Pedidos Activos</h5>
                <p class="card-text display-4">{{ $estadisticas['pedidos_hoy'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Vendedores Activos</h5>
                <p class="card-text display-4">{{ $estadisticas['vendedores'] }}</p>
            </div>
        </div>
    </div>
</div>
{{fechaActual}}
              {{ now()->format('d/m/Y/h:m') }}
         
<div class="card">
    <div class="card-header">
        Últimos Pedidos
    </div>
   <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Delivery</th>
                    <th>Total</th>
                    <th>Turno Reparto</th>
                    <th>Sector</th>
                    <th>Cliente</th>
                    <th>Teléfono Cliente</th>
                    <th>Dirección</th>
                    <th>Vendedora</th>
                    <th>Teléfono Vendedora</th>
                    <th>Observaciones</th>
                    <th>Asignar Repartidor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pedidos as $pedido)
                @if($pedido->fecha == date());
                    <tr>
                        <td>{{ $pedido->fecha }}</td>
                        <td>{{ $pedido->producto }}</td>
                       
                        <td>${{ $pedido->cantidad}}</td>
                       
                        <td>${{ $pedido->precio}}</td>
                        <td>{{ $pedido->delivery }}</td>
                        
                        <td>{{ $pedido->precio + $pedido->delivery }}</td>
                        <td>{{ $pedido->turno_reparto}}</td>
                        <td>{{ $pedido->sector}}</td>
                        <td>{{ $pedido->nombre_cliente}}</td>
                        <td>{{ $pedido->telefono_cliente}}</td>
                        <td>{{ $pedido->direccion}}</td>
                        <td>{{ $pedido->nombre_vendedora }}</td>
                       
                        <td>{{ $pedido->telefono_vendedora }}</td>
                        
                        <td>{{ $pedido->observacion }}</td> 
                        <td>
                               
                                        
                                        
                                          
                                                @foreach($repartidores as $repartidor)  
                                                   <form action="{{ route('actualizarRepartidor', $repartidor->nombre) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="repartidor" class="form-control" required>
                                                <option value="">-- Seleccione un Repartidor --</option>
                                                <option value="{{ $repartidor->nombre }}">
                                                    {{ $repartidor->nombre }} 
                                                </option> 
                                                
                                                </select>
                                             
                                                <button type="submit" class="btn btn-primary">Enviar</button> 
                                                </form>
                                               
                                                @endif
                                                @endforeach
                                           
                                          
                                 
                                    
                              </td>
                        <td>
                            <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit">EDITAR</i>
                            </a>
                            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar pedido?')">
                                    <i class="fas fa-trash">ELIMINAR</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection