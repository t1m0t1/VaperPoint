<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('configuracion.producto.categoria.categoriaListar', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('configuracion.producto.categoria.categoriaAlta');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nombre' => 'required|unique:Categoria|max:100',
        ]);

        $categoria = new Categoria();
        $categoria->Nombre = $validated['Nombre'];
        $categoria->save();
        
        return redirect()->route('categoriaIndex');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($categoriaID)
    {
        $categoria = Categoria::find($categoriaID);

        return view('configuracion.producto.categoria.categoriaModificar')->with(['categoria'=>$categoria]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($CategoriaID,Request $request)
    { 
        $validated = $request->validate([
            'Nombre' => 'required|unique:Categoria,Nombre,'.$request->CategoriaID.',CategoriaID|max:100',
        ]);

        $categoria = Categoria::find($CategoriaID);
        $categoria->Nombre = $validated['Nombre'];
        $categoria->save();
        
        return redirect()->route('categoriaIndex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoriaID)
    {
        $categoria = Categoria::find($categoriaID);
        $categoria -> delete();
        return redirect()->route('categoriaIndex');
    }
}
