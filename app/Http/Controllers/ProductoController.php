<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('configuracion.producto.producto.productoListar', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('configuracion.producto.producto.productoAlta', ['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nombre' => 'required|max:100|min:3',
            'Cantidad' => 'required|max:3',
            'Precio' => 'required',
            'Descripcion' => 'nullable',
            'CategoriaID' => 'required',
            'Importado' => 'nullable',
            'Imagen' => 'nullable|image'
        ]);
        $producto = new Producto();
        $producto->Nombre = $validated['Nombre'];
        $producto->Cantidad = $validated['Cantidad'];
        $producto->Precio = $validated['Precio'];
        $producto->Descripcion = $validated['Descripcion'];
        $producto->CategoriaID = $validated['CategoriaID'];
        $producto->Importado = $validated['Importado'];

        if($request->hasFile("Imagen")){
            $fileName = time().$producto->Nombre. '.' . request()->Imagen->getClientOriginalExtension();
            request()->Imagen->move(public_path('images/productos'), $fileName);
            $producto->Imagen = $fileName;
        }

        $producto->save();

        return redirect()->route('productoIndex');

    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('configuracion.producto.producto.productoModificar', ['categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
