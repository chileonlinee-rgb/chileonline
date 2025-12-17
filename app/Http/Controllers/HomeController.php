<?php

namespace App\Http\Controllers;
use Carbon\Carbon;


use App\Models\Pedido;
use App\Models\Repartidor;
use App\Models\Vendedor;
use App\Models\Entrega;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 public function index()
    {
        $horachile = now(); // Hora de Chile
        $horachile = Carbon::now()->format('d-m-Y H:i');

    $fechaActual = now()->format('Y-m-d');
    $totalPrecio = Pedido::sum('precio');
    $totalDelivery = Pedido::sum('delivery');

        $estadisticas = [
            'pedidos_hoy' => Pedido::whereDate('created_at', today())->count(),
           
            'repartidores' => Repartidor::count(),
            'entregasbodega' => Entrega::count(),
            'vendedores' => Vendedor::count()
        ];

        $pedidos = Pedido::with(['vendedor', 'repartidor'])
            ->latest()
            ->take(10)
            ->get();
        $repartidores = Repartidor::all();
        $vendedores = Vendedor::all();
        $entregas = Entrega::all();
        $entregashoy = Entrega::whereDate('fecha', Carbon::today())->get();
        $totalComision = Entrega::sum('comision'); // Suma total de comisiones
         $totalComisionDelivery = Pedido::sum('comision'); // Suma total de comisiones

         
        return view('home', compact('entregashoy','totalComisionDelivery','entregas','totalComision','estadisticas', 'pedidos','repartidores','fechaActual','totalDelivery','totalPrecio','vendedores'));
    }


    

}
