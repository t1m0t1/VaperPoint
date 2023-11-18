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
            'CategoriaID' => 'required',
            'Importado' => 'nullable'
        ]);
        $producto = new Producto();
        $producto->Nombre = $validated['Nombre'];
        $producto->Cantidad = $validated['Cantidad'];
        $producto->Precio = $validated['Precio'];
        $producto->CategoriaID = $validated['CategoriaID'];
        $producto->save();

        /* Producto::create($request->all()); */
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
        //
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
