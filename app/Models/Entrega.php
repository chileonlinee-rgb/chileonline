<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
 

    protected $fillable = [
        'fecha', 'producto', 'precio', 'comision', 'vendedor'
    ];
    
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'vendedor', 'nombre');
    }
}
