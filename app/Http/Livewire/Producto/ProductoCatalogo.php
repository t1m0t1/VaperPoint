<?php

namespace App\Http\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;

class ProductoCatalogo extends Component
{
    public $categoria;

    public function mount($categoriaID)
    {
        $this->categoria = Categoria::find($categoriaID);
    }
    public function render()
    {
        $productos = Producto::where("CategoriaID",$this->categoria->CategoriaID)->orderBy('Nombre')
        ->simplePaginate(9);
        return view('livewire.producto.producto-catalogo', ['productos'=> $productos]);
    }
}
