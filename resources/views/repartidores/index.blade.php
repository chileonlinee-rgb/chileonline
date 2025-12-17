@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Repartidores</h1>
    <a href="{{ route('repartidores.create') }}" class="btn btn-success mb-3">Nuevo Repartidor</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th> 
                <th>Zona</th>
                <th>Vehículo</th>
               
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($repartidores as $repartidor)
            <tr>
                <td>{{ $repartidor->nombre }}</td>
                <td>{{ $repartidor->email }}</td>
                <td>{{ $repartidor->telefono }}</td>
                <td>{{ $repartidor->zona }}</td>
                <td>{{ ucfirst($repartidor->vehiculo_type) }}</td>
                <td>
                    <a href="{{ route('repartidores.show', $repartidor) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('repartidores.edit', $repartidor) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('repartidores.destroy', $repartidor) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar repartidor?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    {{ $repartidores->links() }}
@endsection