<?php

namespace App\Http\Livewire\Producto;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;
use DB;

class ProductoModificar extends Component
{

    public $nombre, $precio, $cantidad, $descripcion, $categoria;
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

    public function mostrarModal($id)
    {
        try {
            DB::beginTransaction();
            $producto = Producto::find($id);
            $this->nombre = $producto->Nombre;
            $this->precio = $producto->Precio;
            $this->cantidad = $producto->Cantidad;
            $this->descripcion = $producto->Descripcion;
            $this->categoria = $producto->Categoria;
            DB::commit();

            $this->mostrar = true;
        } catch (\Exception $ex) {
            DB::rollback();
            dd($ex);
        }
    }

    public function cerrarModal()
    {
        $this->mostrar = false;
    }

    

}
