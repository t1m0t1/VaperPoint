<?php

namespace App\Http\Livewire\Producto;

use Livewire\Component;

class ProductoModificar extends Component
{
    public $mostrar = false;
    public $listeners = [
        'emitMostraModalEditProducto' => 'mostrarModal',
    ];

    public function render()
    {
        return view('livewire.producto.producto-modificar');
    }

    public function mostrarModal()
    {
        $this->mostrar = true;
    }

}
