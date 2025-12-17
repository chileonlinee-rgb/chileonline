<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
    Schema::create('entregas', function (Blueprint $table) {
         $table->id();
    $table->date('fecha');
    $table->string('producto');
    $table->decimal('precio', 10, 2);
    $table->decimal('comision', 10, 2);
    $table->string('vendedor');
    $table->timestamps();
    
    $table->foreign('vendedor')
          ->references('nombre')
          ->on('vendedors')
          ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};
