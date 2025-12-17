<?php

namespace App\Http\Controllers;
use App\Models\repartidor;
use Illuminate\Http\Request;

class RepartidorController extends Controller
{
   public function index()
{
    $repartidores = Repartidor::latest()->paginate(10);
    return view('repartidores.index', compact('repartidores'));
}

public function create()
{
    $vehiculos = ['moto', 'auto', 'bicicleta'];
    $zona = ['Norte', 'Centro', 'Sur'];
    return view('repartidores.create', compact('vehiculos','zona'));
}

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|max:255',
        'email' => 'required|email|unique:repartidors',
        'zona' => 'required|max:20',
        'telefono' => 'required|max:20',
        'vehiculo_type' => 'required|in:moto,auto,bicicleta'
    ]);

    Repartidor::create($request->all());
    return redirect()->route('repartidores.index')->with('success', 'Repartidor creado');
}

public function show(Repartidor $repartidore)
{
    return view('repartidores.show', compact('repartidore'));
}

public function edit(Repartidor $repartidore)
{
    $vehiculos = ['moto', 'auto', 'bicicleta'];
      $zona = ['Norte', 'Centro', 'Sur'];
    return view('repartidores.edit', compact('repartidore', 'vehiculos','zona'));
}

public function update(Request $request, Repartidor $repartidore)
{
    $request->validate([
        'nombre' => 'required|max:255',
        'email' => 'required|email|unique:repartidors,email,'.$repartidore->id,
        'telefono' => 'required|max:20',
        'vehiculo_type' => 'required|in:moto,auto,bicicleta'
    ]);

    $repartidore->update($request->all());
    return redirect()->route('repartidores.index')->with('success', 'Repartidor actualizado');
}

public function destroy(Repartidor $repartidore)
{
    $repartidore->delete();
    return redirect()->route('repartidores.index')->with('success', 'Repartidor eliminado');
}
}
