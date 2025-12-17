<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Pedido extends Model
{
    
    use HasFactory;
       protected $fillable = [
            'fecha',
            'producto',
            'cantidad',
            'precio',
            'delivery',
            'total',
            'turno_reparto',
            'sector',
            'nombre_cliente',
            'telefono_cliente',
            'direccion',
            'repartidor',
            'nombre_vendedora',
            'telefono_vendedora',
            'observacion',
            'comision',
            'status',
             'created_at'
    ];

public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'nombre_vendedora', 'nombre');
    }

    // En Pedido.php


public function repartidor()
{
    return $this->belongsTo(Repartidor::class);
}

// En Vendedor.php y Repartidor.php
public function pedidos()
{
    return $this->hasMany(Pedido::class);
}
}
