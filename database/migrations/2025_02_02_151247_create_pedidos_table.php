<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->date('fecha');
        $table->string('producto');
        $table->integer('cantidad');
        $table->decimal('precio', 8, 2);
        $table->decimal('delivery', 8, 2);
        $table->decimal('total', 8, 2);
        $table->string('turno_reparto');
        $table->string('sector');
        $table->string('nombre_cliente');
        $table->string('telefono_cliente');
        $table->string('direccion');
         $table->string('repartidor');
       $table->string('nombre_vendedora');
        $table->string('telefono_vendedora');
        $table->decimal('comision', 8, 2);
        $table->text('observacion')->nullable();
        $table->enum('status', ['active', 'inactive', 'pending']);
        
        $table->timestamps();

       
     
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
