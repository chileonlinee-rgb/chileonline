<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use App\Models\Repartidor;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
      
         $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date'
        ]);

        $query = Pedido::query();

        if ($request->filled('start_date')) {
            $query->whereDate('fecha', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('fecha', '<=', $request->end_date);
        }

         if ($request->filled('vendedora')) {
            $query->where('nombre_vendedora', $request->vendedora);
        }

        $pedidos = $query->orderBy('fecha', 'desc')->get();
        $vendedoras = Pedido::distinct()->pluck('nombre_vendedora');
         $vendedores = Vendedor::all();
        $totalGeneral = $pedidos->where('status', 'active')->sum('comision');

        return view('pedidos.index', compact('pedidos', 'totalGeneral','vendedoras','vendedores'));
    }

    public function create()
    {
        $vendedores = Vendedor::all();
        return view('pedidos.create' , compact('vendedores'));
    }

    public function store(Request $request)
    {
 
        Pedido::create($request->all());
         if (Auth::check()) {
            $user = Auth::user();
          switch ($user->role) {
                case 'admin':
                  return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido creado exitosamente.');

                case 'vendedor':
                   return redirect()->route('home')
                         ->with('success', 'Pedido creado exitosamente.');

                    	  }

        // Si no está autenticado, redirigir al login
        return redirect()->route('login');
            }
     
    }

    public function show(Vendedor $vendedor, Request $request)
{
    $pedidos = $vendedor->pedidos()
        ->when($request->filled('start_date'), function($query) use ($request) {
            $query->whereDate('fecha', '>=', $request->start_date);
        })
        ->when($request->filled('end_date'), function($query) use ($request) {
            $query->whereDate('fecha', '<=', $request->end_date);
        })
        ->orderBy('fecha', 'desc')
        ->get();

    return view('vendedores.detalle', compact('vendedor', 'pedidos'));
}

    public function edit(Pedido $pedido)
    {
        $turno = ['11am', '3pm', '7pm'];
        $zona = ['Norte', 'Sur', 'Centro'];
        $statu = ['active', 'inactive', 'pending'];

          $repartidores = Repartidor::all();
        return view('pedidos.edit', compact('pedido', 'repartidores','turno','zona','statu'));
    }

    public function update(Request $request, Pedido $pedido)
    {
    
      

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido actualizado exitosamente.');
    }

         public function updateItem(Request $request,Pedido $pedido)
            {
                
                $pedido->update([
        'status' => $pedido->status
    ]);

                return redirect()->route('home')
                                ->with('success', 'Estatus actualizado');
            }

 
    public function actualizarRepartidor(Pedido $repartidor)
{
   return $repartidor;
    // Invertir el valor actual
    $repartidor->update([
        'repartidor' => $repartidor->repartidor
    ]);

    return back()->with('success', 'Estado actualizado correctamente');
}

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();

        return redirect()->route('pedidos.index')
                         ->with('success', 'Pedido eliminado exitosamente.');
    }
}