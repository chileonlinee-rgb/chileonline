@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Entrega</h1>
    <form action="{{ route('entregas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Producto</label>
            <input type="text" name="producto" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Precio ($)</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Comisión ($)</label>
            <input type="number" step="0.01" name="comision" class="form-control" required>
        </div>
       <div class="form-group">
            <label for="nombre_vendedora">Nombre de la Vendedora</label>
            <select name="vendedor" class="form-control" required>
            <option value="">-- Seleccione un Vendedor --</option>
            @foreach($vendedores as $vendedor)
                <option value="{{ $vendedor->nombre }}" {{ old('vendedor') == $vendedor->id ? 'selected' : '' }}>
                    {{ $vendedor->nombre }} 
                </option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection