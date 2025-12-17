<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repartidor extends Model
{
    protected $fillable = ['nombre', 'email', 'telefono', 'zona', 'vehiculo_type'];
}
