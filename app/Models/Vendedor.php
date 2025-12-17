<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
protected $fillable = ['nombre', 'email', 'telefono'];

public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'nombre_vendedora', 'nombre');
    }

    public function entregas()
    {
        return $this->hasMany(Entrega::class, 'vendedor', 'nombre');
    }
}
