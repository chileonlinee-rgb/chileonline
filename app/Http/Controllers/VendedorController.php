<?php

namespace App\Http\Controllers;
use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
       $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date'
        ]);

      $vendedores = Vendedor::with(['pedidos' => function($query) use ($request) {
                // Filtra los pedidos por estado "active"
                $query->where('status', 'active');

                // Filtra por fecha de inicio si está presente en la solicitud
                if ($request->filled('start_date')) {
                    $query->whereDate('fecha', '>=', $request->start_date);
                }

                // Filtra por fecha de fin si está presente en la solicitud
                if ($request->filled('end_date')) {
                    $query->whereDate('fecha', '<=', $request->end_date);
                }
            }])
            ->get()
            ->map(function ($vendedor) {
                // Suma las comisiones de los pedidos filtrados
                $vendedor->total_comision = $vendedor->pedidos->sum('comision');
                return $vendedor;
            });

        return view('vendedores.index', compact('vendedores'));
    }

public function create()
{
    return view('vendedores.create');
}

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:vendedors',
        'telefono' => 'nullable|string|max:20'
    ]);

    Vendedor::create($request->all());
    return redirect()->route('vendedores.index')->with('success', 'Vendedor creado correctamente');
}

public function show(Vendedor $vendedore)
{
    return view('vendedores.show', compact('vendedore'));
}

public function edit(Vendedor $vendedore)
{
    return view('vendedores.edit', compact('vendedore'));
}

public function update(Request $request, Vendedor $vendedore)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:vendedors,email,'.$vendedore->id,
        'telefono' => 'nullable|string|max:20'
    ]);

    $vendedore->update($request->all());
    return redirect()->route('vendedores.index')->with('success', 'Vendedor actualizado correctamente');
}

public function destroy(Vendedor $vendedore)
{
    $vendedore->delete();
    return redirect()->route('vendedores.index')->with('success', 'Vendedor eliminado correctamente');
}
}
