@extends('layouts.app')



@section('content')
    <h1>Crear Nuevo Vendedor</h1>
    
    <form action="{{ route('vendedores.store') }}" method="POST">
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
            <input type="text" name="telefono" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection