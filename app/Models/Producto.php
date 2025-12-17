<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto',
        'precio_compra',
        'precio_venta',
        'cantidad',
        'descripcion',
        'status',
        'comision',
        'proveedor'
    ];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class)
            ->withPivot('cantidad', 'precio_unitario', 'comision_unitario')
            ->withTimestamps();
    }
}