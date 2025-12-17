@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Repartidor</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $repartidore->nombre }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $repartidore->email }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $repartidore->telefono }}</p>
            <p class="card-text"><strong>Vehículo:</strong> {{ ucfirst($repartidore->vehiculo_type) }}</p>
            <a href="{{ route('repartidores.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection