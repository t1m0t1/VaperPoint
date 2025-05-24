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
        Schema::create('VentaHistorico', function (Blueprint $table) {
            $table->id("VentaHistoricoID");
            $table->foreignId('VentaID')->references('VentaID')->on('Venta');
            $table->foreignId('ProductoID')->references('ProductoID')->on('Producto');
            $table->bigInteger('Cantidad');
            $table->float('Precio')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('VentaHistoricos');
    }
};
