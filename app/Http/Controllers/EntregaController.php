<?php

namespace App\Http\Controllers;
use App\Models\Vendedor;
use App\Models\Entrega;
use Illuminate\Http\Request;

class EntregaController extends Controller {
    // Mostrar todas las entregas
    public function index(Request $request) {
       $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date'
        ]);

        $entregas = Entrega::select('vendedor')
            ->selectRaw('SUM(comision) as total_comision')
            ->when($request->filled('start_date'), function($query) use ($request) {
                $query->whereDate('fecha', '>=', $request->start_date);
            })
            ->when($request->filled('end_date'), function($query) use ($request) {
                $query->whereDate('fecha', '<=', $request->end_date);
            })
            ->with('vendedor')
            ->groupBy('vendedor')
            ->orderBy('total_comision', 'desc')
            ->get();

        return view('entrega.index', compact('entregas'));
    }

    // Mostrar formulario de creación
    public function create() {
         $vendedores = Vendedor::all();
        return view('entrega.create', compact('vendedores'));
    }

    // Guardar nueva entrega
    public function store(Request $request) {
        

        Entrega::create($request->all());
        return redirect()->route('entregas.index')->with('success', 'Entrega creada.');
    }

    // Mostrar formulario de edición
    public function edit(Entrega $entrega) {
        return view('entregas.edit', compact('entrega'));
    }

    // Actualizar entrega
    public function update(Request $request, Entrega $entrega) {
        $request->validate([
            'fecha' => 'required|date',
            'producto' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'comision' => 'required|numeric|min:0',
            'vendedor' => 'required|string|max:255'
        ]);

        $entrega->update($request->all());
        return redirect()->route('entregas.index')->with('success', 'Entrega actualizada.');
    }

    // Eliminar entrega
    public function destroy(Entrega $entrega) {
        $entrega->delete();
        return redirect()->route('entregas.index')->with('success', 'Entrega eliminada.');
    }
}

