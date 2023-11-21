<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatergoriaSeeder extends Seeder
{
    static $categorias = [
        'Liquido',
        'Mod',
        'Atomizador',
        'Resistencia',
        'Accesorio',
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
