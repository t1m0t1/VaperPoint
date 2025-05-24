<?php

namespace App\Http\Livewire\Venta;

use App\Models\Producto;
use Livewire\Component;

class VentaNueva extends Component
{
    public $mostrarModal = false;

    public $listeners = [
        'mostrarModal',
        'cerrarModal'
    ];

    public function render()
    {
        $productos = Producto::orderBy("Nombre")->paginate(10);
        return view('livewire.venta.venta-nueva',["productos" => $productos]);
    }

    public function mostrarModal()
    {
        $this->mostrarModal= true;
    }

    public function cerrarModal()
    {
        $this->mostrarModal= false;
    }
}
