@extends('layouts.app')

@section('content')
    <h1>Nuevo Repartidor</h1>
    
    <form action="{{ route('repartidores.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label>Teléfono:</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>

        
        </div><div class="form-group">
            <label>Zona:</label>
            <select name="zona" class="form-control" required>
                @foreach($zona as $zonas)
                    <option value="{{ $zonas }}">{{ ucfirst($zonas) }}</option>
                @endforeach
            </select>
        </div>
        
       <div class="form-group">
            <label>Vehículo:</label>
            <select name="vehiculo_type" class="form-control" required>
                @foreach($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo }}">{{ ucfirst($vehiculo) }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection