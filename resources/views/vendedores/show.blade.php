@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Detalle de Comisiones: {{ $vendedor->nombre }}</h3>
        </div>
        
        <div class="card-body">
            <div class="alert alert-success">
                <h4>Total Comisiones Activas: ${{ number_format($totalComision, 2) }}</h4>
            </div>

            <h4>Pedidos Activos</h4>
            <div class="table-responsive mb-4">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Comisión</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->fecha->format('d/m/Y') }}</td>
                            <td>{{ $pedido->producto }}</td>
                            <td>{{ $pedido->cantidad }}</td>
                            <td>${{ number_format($pedido->total, 2) }}</td>
                            <td>${{ number_format($pedido->comision, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h4>Entregas</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Comisión</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($entregas as $entrega)
                        <tr>
                            <td>{{ $entrega->fecha->format('d/m/Y') }}</td>
                            <td>{{ $entrega->producto }}</td>
                            <td>${{ number_format($entrega->precio, 2) }}</td>
                            <td>${{ number_format($entrega->comision, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection