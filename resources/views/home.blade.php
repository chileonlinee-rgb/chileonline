@extends('layouts.app')

@section('content')
@if (auth()->user()->role_id == 1)

<div class="container">
<div class="row mb-4">
    <div class="col-md-4">
        <h1>Panel de Administración</h1>
    </div>
    <div class="col-md-8 text-end">
         <a href="{{ route('productos.index') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>  Productos
</a>
        <a href="{{ route('repartidores.index') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>  Repartidores
        </a>
        <a href="{{ route('pedidos.index') }}" class="btn btn-warning">
            <i class="bi bi-plus-circle"></i> Pedidos en Domicilios
        </a>
         <a href="{{ route('entregas.index') }}" class="btn btn-warning">
            <i class="bi bi-plus-circle"></i> Pedidos en Bodega
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
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Entregas Bodega Activas</h5>
                <p class="card-text display-4">{{ $estadisticas['entregasbodega'] }}</p>
            </div>
        </div>
    </div>
</div>
{{now()->format('d-m-Y H:i')}}

 
              {{ now()->format('Y-m-d h:i:s') }}
<div class="card">
    <div class="card-header">
       Turno 11am a 3pm
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
                    <th>Repartidor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody >
                @forelse ($pedidos as $pedido)
                @if($pedido->fecha == now()->format('Y-m-d'))
                 @if($pedido->turno_reparto == '11am')
                    <tr 
               
                    >
                        <td >{{ $pedido->fecha }}</td>
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
                         <td>{{ $pedido->repartidor}}</td> 
                       
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
                    </tr>    @endif
                    @endif
                                          
                @empty
                    <tr>
                        <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        Turno 3pm a 7pm
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
                    <th>Repartidor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pedidos as $pedido)
                @if($pedido->fecha == now()->format('Y-m-d'))
                 @if($pedido->turno_reparto == '3pm')
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
                         <td>{{ $pedido->repartidor }}</td> 
                       
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
                      @endif
                    @endif
                                          
                @empty
                    <tr>
                        <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<br>
<br>
<div class="card">
    <div class="card-header">
        Turno 7pm a 10pm
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
                    <th>Repartidor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pedidos as $pedido)
                @if($pedido->fecha == now()->format('Y-m-d'))
                 @if($pedido->turno_reparto == '7pm')
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
                         <td>{{ $pedido->repartidor }}</td> 
                       
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
                      @endif
                    @endif
                                          
                @empty
                    <tr>
                        <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<br>
 <div class="card">
    <div class="card-header">
        Entregas en Bodega
    </div>
  
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Fecha</th>
                <th>Producto</th>
                <th>Precio ($)</th>
                <th>Comisión ($)</th>
                <th>Vendedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entregas as $entrega)
             @if($entrega->fecha == now()->format('Y-m-d'))
            <tr>
                <td>{{ $entrega->fecha }}</td>
                <td>{{ $entrega->producto }}</td>
                <td>{{ number_format($entrega->precio, 2) }}</td>
                <td>{{ number_format($entrega->comision, 2) }}</td>
                <td>{{ $entrega->vendedor }}</td>
                <td>
                    <a href="{{ route('entregas.edit', $entrega->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('entregas.destroy', $entrega->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>

</div>
    <div class="mt-4 bg-light p-3">
        <h4>Total Comisiones Bodega: ${{ number_format($totalComision, 2) }}</h4>
    </div>
     <div class="mt-4 bg-light p-3">
        <h4>Total Comisiones Delivery: ${{ number_format($totalComisionDelivery, 2) }}</h4>
    </div>
@endif
@if (auth()->user()->role_id == 5) 
Hola Bienvenido a Chileonline
Estas en espera de que te Asignen un Rol
@endif


@if (auth()->user()->role_id == 2) 


Hola Repartidor 
<div class="container">
    <div class="card">
    <div class="card-header">
        11am a 3pm
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
                    <th>Teléfo Vendedora</th>
                    <th>Observaciones</th>
                    <th>Repartidor</th>
                    <th>Pago en Bodega</th>
                    <th>Pago del Delivery</th>
                   
                </tr>
            </thead>
            <tbody>
                {{$total=0}}
                 {{$total1=0}}
            @foreach($repartidores as $repartidor)
                @if($repartidor->nombre == auth()->user()->name)
                    @forelse ($pedidos as $pedido)
                        @if($pedido->fecha == now()->format('Y-m-d'))
                           
                                  @if($pedido->turno_reparto == '11am')
                                    @if($repartidor->nombre == $pedido->repartidor)
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
                                            <td>{{ $pedido->repartidor }}</td> 
                                            <td>{{ $total += $pedido->precio}}</td>
                                            <td>{{ $total1 += $pedido->delivery}}</td>
                                        
                                        </tr>  
                                    @endif
                                    
                              
                            @endif
                        @endif  
                                          
                                @empty
                                <tr>
                                    <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                                </tr>
                    @endforelse
                @endif
            @endforeach
                
            </tbody>

        </table>
    </div>
</div>
<br>
 <div class="card">
    <div class="card-header">
        3pm a 7pm
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
                    <th>Teléfo Vendedora</th>
                    <th>Observaciones</th>
                    <th>Repartidor</th>
                     <th>Pago en Bodega</th>
                    <th>Pago del Delivery</th>
                   
                </tr>
            </thead>
            <tbody>
                  {{$total=0}}
                 {{$total1=0}}
            @foreach($repartidores as $repartidor)
                @if($repartidor->nombre == auth()->user()->name)
                    @forelse ($pedidos as $pedido)
                        @if($pedido->fecha == now()->format('Y-m-d'))
                          
                                  @if($pedido->turno_reparto == '3pm')
                                    @if($repartidor->nombre == $pedido->repartidor)
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
                                            <td>{{ $pedido->repartidor }}</td> 
                                            <td>{{ $total += $pedido->precio}}</td>
                                            <td>{{ $total1 += $pedido->delivery}}</td>
                                        
                                        
                                        </tr>  
                                    @endif
                                     @endif
                              
                          
                        @endif  
                                          
                                @empty
                                <tr>
                                    <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                                </tr>
                    @endforelse
                @endif
            @endforeach
                
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
       7pm a 10pm
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
                    <th>Teléfo Vendedora</th>
                    <th>Observaciones</th>
                    <th>Repartidor</th>
                    <th>Pago en Bodega</th>
                    <th>Pago del Delivery</th>
                </tr>
            </thead>
            <tbody>
                  {{$total=0}}
                 {{$total1=0}}
            @foreach($repartidores as $repartidor)
                @if($repartidor->nombre == auth()->user()->name)
                    @forelse ($pedidos as $pedido)
                        @if($pedido->fecha == now()->format('Y-m-d'))
                         
                                  @if($pedido->turno_reparto == '7pm')
                                    @if($repartidor->nombre == $pedido->repartidor)
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
                                            <td>{{ $pedido->repartidor }}</td> 
                                            <td>{{ $total += $pedido->precio}}</td>
                                            <td>{{ $total1 += $pedido->delivery}}</td>
                                        
                                        
                                        </tr>  
                                    @endif
                                     @endif
                              
                          
                        @endif  
                                          
                                @empty
                                <tr>
                                    <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                                </tr>
                    @endforelse
                @endif
            @endforeach
                
            </tbody>
        </table>
    </div>
</div>
</div>

@endif





@if (auth()->user()->role_id == 4) 


<div class="container">
    <div class="row mb-4">
    <div class="col-md-6">
        <h1>Panel de Administración</h1>
    </div>
    <div class="col-md-6 text-end">
       
        <a href="{{ route('pedidos.create') }}" class="btn btn-warning">
            <i class="bi bi-plus-circle"></i>Crear Pedidos
        </a>
        
        
    </div>
</div>
    <div class="card">
    <div class="card-header">
        11am a 3pm
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
                    <th>Teléfo Vendedora</th>
                    <th>Observaciones</th>
                    <th>Repartidor</th>
                    <th>Comision</th>
   
                   
                </tr>
            </thead>
            <tbody>
                {{$total=0}}
                 {{$total1=0}}
            @foreach($vendedores as $vendedor)
                @if($vendedor->nombre == auth()->user()->name)
                    @forelse ($pedidos as $pedido)
                        @if($pedido->fecha == now()->format('Y-m-d'))
                           
                                  @if($pedido->turno_reparto == '11am')
                         
                                    @if($vendedor->nombre == $pedido->nombre_vendedora)
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
                                            <td>{{ $pedido->repartidor }}</td> 
                                            <td>
                                                {{ $total1 += $pedido->comision}}
                                            </td>
                                            
                                        
                                        </tr>  
                                    @endif
                                    
                              
                            @endif
                        @endif  
                                          
                                @empty
                                <tr>
                                    <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                                </tr>
                    @endforelse
                @endif
            @endforeach
                
            </tbody>

        </table>
    </div>
</div>
<br>
 <div class="card">
    <div class="card-header">
        3pm a 7pm
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
                    <th>Teléfo Vendedora</th>
                    <th>Observaciones</th>
                    <th>Repartidor</th>
                     <th>Pago en Bodega</th>
                    <th>Pago del Delivery</th>
                   
                </tr>
            </thead>
            <tbody>
                  {{$total=0}}
                 {{$total1=0}}
             @foreach($vendedores as $vendedor)
                @if($vendedor->nombre == auth()->user()->name)
                    @forelse ($pedidos as $pedido)
                        @if($pedido->fecha == now()->format('Y-m-d'))
                          
                                  @if($pedido->turno_reparto == '3pm')
                                        @if($vendedor->nombre == $pedido->nombre_vendedora)
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
                                            <td>{{ $pedido->repartidor }}</td> 
                                            <td>{{ $total += $pedido->precio}}</td>
                                            <td>{{ $total1 += $pedido->delivery}}</td>
                                        
                                        
                                        </tr>  
                                    @endif
                                     @endif
                              
                          
                        @endif  
                                          
                                @empty
                                <tr>
                                    <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                                </tr>
                    @endforelse
                @endif
            @endforeach
                
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
       7pm a 10pm
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
                    <th>Teléfo Vendedora</th>
                    <th>Observaciones</th>
                    <th>Repartidor</th>
                    <th>Pago en Bodega</th>
                    <th>Pago del Delivery</th>
                </tr>
            </thead>
            <tbody>
                  {{$total=0}}
                 {{$total1=0}}
             @foreach($vendedores as $vendedor)
                @if($vendedor->nombre == auth()->user()->name)
                    @forelse ($pedidos as $pedido)
                        @if($pedido->fecha == now()->format('Y-m-d'))
                         
                                  @if($pedido->turno_reparto == '7pm')
                                        @if($vendedor->nombre == $pedido->nombre_vendedora)
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
                                            <td>{{ $pedido->repartidor }}</td> 
                                            <td>{{ $total += $pedido->precio}}</td>
                                            <td>{{ $total1 += $pedido->delivery}}</td>
                                        
                                        
                                        </tr>  
                                    @endif
                                     @endif
                              
                          
                        @endif  
                                          
                                @empty
                                <tr>
                                    <td colspan="14" class="text-center">No hay pedidos registrados.</td>
                                </tr>
                    @endforelse
                @endif
            @endforeach
                
            </tbody>
        </table>
    </div>
</div><br>
<div class="card">
    <div class="card-header">
        Entregas en Bodega
    </div>
  
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Fecha</th>
                <th>Producto</th>
                <th>Precio ($)</th>
                <th>Comisión ($)</th>
                <th>Vendedor</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($entregas as $entrega)
             @if($entrega->fecha == now()->format('Y-m-d'))
            <tr>
                <td>{{ $entrega->fecha }}</td>
                <td>{{ $entrega->producto }}</td>
                <td>{{ number_format($entrega->precio, 2) }}</td>
                <td>{{ number_format($entrega->comision, 2) }}</td>
                <td>{{ $entrega->vendedor }}</td>
                
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>


</div>
  
</div>

@endif

@endsection
