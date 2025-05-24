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
        Schema::create('Venta', function (Blueprint $table) {
            $table->id('VentaID');
            $table->float('MontoTotal', 24, 4)->nullable()->nullable();
            $table->dateTime('FechaVenta')->nullable()->nullable();

            $table->unsignedBigInteger('ClienteID')->nullable();
            $table->foreign('ClienteID')->references('ClienteID')->on('Cliente');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Venta');
    }
};
