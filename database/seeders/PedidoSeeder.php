<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pedido;
class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Pedido::factory()->count(50)->create();
    }
}
