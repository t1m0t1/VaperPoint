<?php

namespace App\Http\Livewire\Producto;

use App\Models\Producto;
use Livewire\Component;

class ProductoCatalogo extends Component
{
    public function render()
    {
        $productos = Producto::orderBy('Nombre')->simplePaginate(9);
        return view('livewire.producto.producto-catalogo', ['productos'=> $productos]);
    }
}
