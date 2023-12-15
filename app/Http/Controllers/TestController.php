<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() 
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('test.productoTestListado', ['productos' => $productos, 'categorias' => $categorias]);
        
    }

    public function edit($productoID)
    {
        $producto = Producto::find($productoID);
        $categoria = Categoria::find($producto->CategoriaID);
        return response()->json($data = [$producto, $categoria]);
    }
}
