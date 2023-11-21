<?php

namespace App\Http\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;

class ProductoModificar extends Component
{

    public $Nombre, $Precio, $Cantidad, $Descripcion, $Categoria;
    public $categorias;
    public $mostrar = false;
    public $listeners = [
        'emitMostraModalEditProducto' => 'mostrarModal',
        'cerrarModal'
    ];
    
    public function mount()
    {
        $this->categorias = Categoria::orderby('Nombre')->get();
    }


    public function render()
    {
        return view('livewire.producto.producto-modificar');
    }

    public function mostrarModal(Producto $producto)
    {
        $this->mostrar = true;
        /* dd($producto); */
        $this->Nombre = $producto->Nombre;
        $this->Precio = $producto->Precio;
        $this->Cantidad = $producto->Cantidad;
        $this->Descripcion = $producto->Descripcion;
        $this->Categoria = $producto->Categoria;

    }

    public function cerrarModal()
    {
        $this->mostrar = false;
    }

    

}
