<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatergoriaSeeder extends Seeder
{
    static $categorias = [
        'Accesorios',
        'Atomizadores',
        'Liquidos',
        'Mods',
        'Pods',
        'Resistencias',
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::$categorias as $c) {
            $categoria = new Categoria();
            $categoria->Nombre = $c;
            $categoria->save();            
        }
    }
}
