@extends('layouts.app')

@section('content')
    <h1>Editar Vendedor</h1>
    
    <form action="{{ route('vendedores.update', $vendedore) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $vendedore->nombre }}" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $vendedore->email }}" required>
        </div>
        <div class="form-group">
            <label>Teléfono:</label>
            <input type="text" name="telefono" class="form-control" value="{{ $vendedore->telefono }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection