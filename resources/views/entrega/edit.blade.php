@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Entrega</h1>
    <form action="{{ route('entregas.update', $entrega->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Fecha</label>
            <input type="date" name="fecha" class="form-control" value="{{ $entrega->fecha }}" required>
        </div>
        <div class="form-group">
            <label>Producto</label>
            <input type="text" name="producto" class="form-control" value="{{ $entrega->producto }}" required>
        </div>
        <div class="form-group">
            <label>Precio ($)</label>
            <input type="number" step="0.01" name="precio" class="form-control" value="{{ $entrega->precio }}" required>
        </div>
        <div class="form-group">
            <label>Comisión ($)</label>
            <input type="number" step="0.01" name="comision" class="form-control" value="{{ $entrega->comision }}" required>
        </div>
        <div class="form-group">
            <label>Vendedor</label>
            <input type="text" name="vendedor" class="form-control" value="{{ $entrega->vendedor }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection