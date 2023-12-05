<?php

namespace App\Http\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;

class ProductoModificar extends Component
{

    public $nombre, $precio, $cantidad, $descripcion, $categoria, $imagen, $rutaImagen;
    public Producto $producto;
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

    public function mostrarModal($productoID)
    {   
        $this->producto = Producto::find($productoID);
        
        $this->nombre = $this->producto->Nombre;
        $this->precio = $this->producto->Precio;
        $this->cantidad = $this->producto->Cantidad;
        $this->descripcion = $this->producto->Descripcion;
        $this->categoria = $this->producto->CategoriaID;
        $this->imagen = $this->producto->Imagen;
        $this->rutaImagen = $this->producto->categoria->Nombre;
        $this->mostrar = true;

    }

    public function cerrarModal()
    {
        $this->mostrar = false;
    }

    

}
