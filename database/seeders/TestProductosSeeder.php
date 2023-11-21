<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestProductosSeeder extends Seeder
{
    static $productos = array(
        [
            'Nombre' => 'dotaio v2 carbon edicion',
            'Cantidad' => 5,
            'Descripcion' => 'Suicide Mods vuelve a la carga más fuerte que nunca, junto a The Vaping Bogan, Orca Vape y la colaboración del modder Monarchy Vapes, para traernos un increíble diseño, elegante a la par que cómodo como nos tiene acostumbrado la marca, además de incorporar un depósito Ether Boro como complemento. ',
            'Imagen' => 'dotaio-v2-carbon-edicion-limitada-by-dotmod.jpg',
            'Precio' => 25.5,
            'Importado' => 0,
            'CategoriaID' => 2,
        ],[
            'Nombre' => 'Pod Kit Argus P1S by Voopoo',
            'Cantidad' => 5,
            'Descripcion' => 'Desde el 20 de Noviembre hasta el 1 de Diciembre, cada día promoción de 2 dispositivos a ¡MITAD DE PRECIO! Si quieres estar informado síguenos en nuestro Instagram para no perdértelas. Exclusivo Online.

            Voopoo nos presenta su nuevo dispositivo, Pod Argus P1S, el hermano mayor del ya conocido Argus Pod P1. Este dispositivo cuenta con una batería interna de gran capacidad, 800mAh, que le permite alcanzar una potencia máxima de 25W, además de un diseño futurista que te dejara embelesado.',
            'Imagen' => 'kit-luxe-x-by-vaporesso.jpg',
            'Precio' => 25.5,
            'Importado' => 0,
            'CategoriaID' => 2,
        ]
    );
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::$productos as $p) {
            $producto = new Producto();
            /* dd($p); */
            $producto = $p;
            $producto->save();            
        }
    }
}
