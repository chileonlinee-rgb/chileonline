
@extends('layouts.app')

@section('content')
@if (auth()->user()->role_id == 1) 
<html>
<head>
    <title>Reporte de Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
        .total-box {
            background-color: #e9ecef;
            padding: 1rem;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container py-5">
       
            <div class="row">   
                <div class="col-md-12"> 
                <a href="{{ route('pedidos.create') }}" class="btn btn-success mb-4">
                            <i class="fas fa-plus"></i> Nuevo Pedido
                        </a>
                </div>
        <div class="card shadow-lg">
         
         
          
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Filtro de Pedidos</h3>
            </div>
 
            
            <div class="card-body">
                <form method="GET" action="{{ route('pedidos.index') }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Fecha Inicio</label>
                            <input type="date" name="start_date" 
                                   class="form-control" 
                                   value="{{ request('start_date') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fecha Fin</label>
                            <input type="date" name="end_date" 
                                   class="form-control" 
                                   value="{{ request('end_date') }}">
                        </div>
                        <div class="col-md-3">
                            <label>Vendedora</label>
                            <select name="vendedora" class="form-select">
                                <option value="">Todas</option>
                                @foreach($vendedoras as $vendedora)
                                    <option value="{{ $vendedora }}" 
                                        {{ request('vendedora') == $vendedora ? 'selected' : '' }}>
                                        {{ $vendedora }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-funnel"></i> Filtrar
                            </button>
                        </div>
                        
    
                    </div>
                </form>
            </div>

            @if($pedidos->isNotEmpty())
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                        <th>Fecha</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <th>Delivery</th>
                                        <th>Total</th>
                                        <th>Comision</th>
                                        <th>Status</th>
                                        <th>Turno Reparto</th>
                                        <th>Sector</th>
                                        <th>Cliente</th>
                                        <th>Teléfono Cliente</th>
                                        <th>Dirección</th>
                                        <th>Vendedora</th>
                                        <th>Teléfono Vendedora</th>
                                        <th>Observaciones</th>
                                        <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pedidos as $pedido)
                                <tr>
                                    <td>{{ $pedido->fecha }}</td>
                        <td>{{ $pedido->producto }}</td>
                       
                        <td>${{ $pedido->cantidad}}</td>
                       
                        <td>${{ $pedido->precio}}</td>
                        <td>{{ $pedido->delivery }}</td>
                        
                        <td>{{ $pedido->precio + $pedido->delivery }}</td>
                        <td>{{ $pedido->comision}}</td>
                        <td>{{ $pedido->status}}</td>
                        <td>{{ $pedido->turno_reparto}}</td>
                        <td>{{ $pedido->sector}}</td>
                        <td>{{ $pedido->nombre_cliente}}</td>
                        <td>{{ $pedido->telefono_cliente}}</td>
                        <td>{{ $pedido->direccion}}</td>
                        <td>{{ $pedido->nombre_vendedora }}</td>
                        <td>{{ $pedido->telefono_vendedora }}</td>
                        <td>{{ $pedido->observacion }}</td>
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="total-box mt-4">
                        <h4 class="mb-0 text-end">
                            Total de Pedidos: {{ $pedidos->count() }}</h4>
                        <h4 class="mb-0 text-end">
                        </h4>
                    </div>
                    <div class="total-box mt-4">
                        <h4 class="mb-0 text-end">
                            Total Comision: ${{ number_format($totalGeneral, 2) }}
                        </h4>
                    </div>
                </div>
            @else
                <div class="card-body">
                    <div class="alert alert-warning mb-0">
                        No se encontraron pedidos en el rango seleccionado
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>
</body>
</html>
@endif

@endsection