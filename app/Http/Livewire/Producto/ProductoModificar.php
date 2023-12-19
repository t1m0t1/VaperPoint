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

    protected $rules = [
        'nombre' => 'required|max:100',
        'precio' => 'required|decimal:2',/*TODO ABEL considerar numeric como validador ya que no siempre va a tener un decimal el precio */
        'cantidad' => 'required', /*TODO ABEL Mas alla de que el input en el front se encuentre validado, en el back hay que validar el tipo de dato ingresado. en este caso es numeric */
        'descripcion' => 'required|max:1000',/* TODO ABEL si bien la base de datos permite almacenar 1000 caracteres, es mejor limitar esta cantidad de caracteres a un numero de 256 a 500 caracteres */
        'categoria' => 'required|exists:Categoria,CategoriaID',
    ];

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


    public function editProducto()
    { 

        $this->validate();
      
        $this->producto->Nombre = $this->nombre;
        $this->producto->Precio = $this->precio;
        $this->producto->Cantidad = $this->cantidad;
        $this->producto->Descripcion = $this->descripcion;
        $this->producto->CategoriaID = $this->categoria;

        $this->producto->save();
        
        $this->mostrar = false;
    }

    public function cerrarModal()
    {
        $this->mostrar = false;
    }

    

}
