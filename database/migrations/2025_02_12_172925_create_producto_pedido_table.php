<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('producto_pedido', function (Blueprint $table) {
    $table->id();
    $table->foreignId('producto_id')->constrained();
    $table->foreignId('pedido_id')->constrained();
    $table->integer('cantidad');
    $table->decimal('precio_unitario', 10, 2);
    $table->decimal('comision_unitario', 5, 2);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_pedido');
    }
};
