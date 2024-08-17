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
        Schema::create('Producto', function (Blueprint $table) {
            $table->id('ProductoID');
            $table->string('Nombre', 100);
            $table->bigInteger('Cantidad');
            $table->text('Descripcion')->nullable();
            $table->string('Imagen')->nullable();
            $table->float('Precio')->nullable();
            $table->foreignId('SubCategoriaID')->references('SubCategoriaID')->on('SubCategoria');
            $table->foreignId('CategoriaID')->references('CategoriaID')->on('Categoria');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Producto');
    }
};
