<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;

class TestProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/json/productos.json");
        $productos = json_decode($json);

        foreach ($productos as $value) {

            Producto::create([
                "Nombre" => $value->Nombre,
                "Cantidad" => $value->Cantidad,
                "Imagen" => $value->Imagen,
                "Descripcion" => $value->Descripcion,
                "Precio" => $value->Precio,
                "CategoriaID" => $value->CategoriaID
            ]);

        }
                        
    }
}
