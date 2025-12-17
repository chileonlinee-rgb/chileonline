@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Listado de Vendedores</h1>
            <a href="{{ route('vendedores.create') }}" class="btn btn-primary">Nuevo Vendedor</a>
        </div>
    </div>
   
    
   <!DOCTYPE html>
<html>
<head>
    <title>Reporte de Comisiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3>Reporte de Comisiones por Vendedor</h3>
            </div>
            
            <div class="card-body">
                <form method="GET" action="{{ route('vendedores.index') }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label>Fecha Inicio</label>
                            <input type="date" name="start_date" 
                                   class="form-control" 
                                   value="{{ request('start_date') }}">
                        </div>
                        
                        <div class="col-md-4">
                            <label>Fecha Fin</label>
                            <input type="date" name="end_date" 
                                   class="form-control" 
                                   value="{{ request('end_date') }}">
                        </div>
                        
                        <div class="col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                Filtrar
                            </button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive mt-4">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Vendedor</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Total Comisiones</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendedores as $vendedor)
                            <tr>
                                <td>{{ $vendedor->nombre }}</td>
                                <td>{{ $vendedor->email }}</td>
                                <td>{{ $vendedor->telefono }}</td>
                                <td>${{ number_format($vendedor->total_comision ?? 0, 2) }}</td>
                                <td>
                                    <a href="{{ route('vendedores.detalle', $vendedor) }}" 
                                       class="btn btn-sm btn-info">
                                        Detalle
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     </div>
    </div>
</body>
</html>
@endsection