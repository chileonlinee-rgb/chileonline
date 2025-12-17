@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Repartidor</h1>
    
    <form action="{{ route('repartidores.update', $repartidore) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $repartidore->nombre }}" required>
        </div>
        
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $repartidore->email }}" required>
        </div>
        
        <div class="form-group">
            <label>Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="{{ $repartidore->telefono }}" required>
        </div>
        
        <div class="form-group">
            <label>Vehículo:</label>
            <select name="vehiculo_type" class="form-control" required>
                @foreach($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo }}" {{ $repartidore->vehiculo_type == $vehiculo ? 'selected' : '' }}>
                        {{ ucfirst($vehiculo) }}
                    </option>
                @endforeach
            </select>
        </div>
         <div class="form-group">
            <label>Zona:</label>
            <select name="zona" class="form-control" required>
                @foreach($zona as $zonas)
                    <option value="{{ $zonas }}" {{ $repartidore->zona == $zonas ? 'selected' : '' }}>
                        {{ ucfirst($zonas) }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    
</div>
@endsection