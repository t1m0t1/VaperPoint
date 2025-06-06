<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /*
         TODO Abel
         - Buscador por nombre y descripcion. ✓
         - filtros por categoria y ordenar por precio de mayor a menor .✓
         - Nuevo y editar producto se realicen desde un modal y no redireccionando a otra vista.✓
         */

        $productos = Producto::query();
        if($request->categoriaBuscada != null){
           $productos = $productos->where('CategoriaID', $request->categoriaBuscada);
        }
        if($request->filtroPrecios != null){
            $productos = $productos->orderBy('Precio', $request->filtroPrecios);
        }
        if($request->productoBuscado != null){
            $productos = $productos->where('Nombre', 'LIKE', '%'.$request->productoBuscado.'%')->orWhere('Descripcion', 'LIKE', '%'.$request->productoBuscado.'%');
        }
        $categorias = Categoria::orderBy('Nombre')->get();
        
        $productos = $productos->paginate(10);
        $productos->appends([
            'productoBuscado' => $request->productoBuscado,
            'categoriaBuscada' => $request->categoriaBuscada,
            'filtroPrecios' => $request->filtroPrecios
        ]);

        return view('configuracion.producto.productoListar', 
        [
            'productos' => $productos,
            'categorias' => $categorias,
            /* 'categoriaBuscada' => $categoriaBuscada */
        ])->with([
            'productoBuscado' => $request->productoBuscado,
            'categoriaBuscada' => $request->categoriaBuscada,
            'filtroPrecios' => $request->filtroPrecios
        ]);
    }

    public function catalogo($categoriaID)
    {
        /* TODO Mati T cambiar estetica de tarjetas*/
        return view('catalogo.productoCatalogo', ["categoriaID" => $categoriaID]);
    }

    /**
     * Show the form for creating a new resource.
     */
    /* Funcion create sin utilidad */
    public function create()
    {
        $categorias = Categoria::all();
        return view('configuracion.producto.productoAlta', ['categorias'=>$categorias]);
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
            'Descripcion' => 'nullable|max:500',
            'CategoriaID' => 'required',
            'Importado' => 'nullable',
            'Imagen' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $producto = new Producto();
        $producto->Nombre = $validated['Nombre'];
        $producto->Cantidad = $validated['Cantidad'];
        $producto->Precio = $validated['Precio'];
        $producto->Descripcion = $validated['Descripcion'];
        $producto->CategoriaID = $validated['CategoriaID'];
        $producto->Importado = $validated['Importado'] ?? null;
        $producto->Imagen = $validated['Imagen'] ?? null;

        if($request->hasFile("Imagen")){
            /* $categoria = Categoria::find($producto->CategoriaID);
            $fileName = time().$producto->Nombre. '.' . request()->Imagen->getClientOriginalExtension();
            request()->Imagen->move(public_path('images/productos/'.$producto->categoria->Nombre.'/'), $fileName);
            $producto->Imagen = $fileName; */
            $imagen = $request->file('Imagen');
            $extension = $imagen->extension();
            $imageName = Str::uuid() . '.' . $extension;
            $path = $imagen->storeAs('imagenes/productos/'.$producto->categoria->Nombre, $imageName, 'public');
            $producto->Imagen = $path;
        }

        $producto->save();

        return response('Producto Creado Exitosamente', 200);

    }

    /**
     * Display the specified resource.
     */
    public function show($ProductoID)
    {
        try {
            $producto = Producto::find($ProductoID);
            $producto->categoriaNombre = $producto->categoria->Nombre;
            return response($producto, 200);
        } catch (Exception $e) {
            Log::info('<<<< ERROR Controllers\ProductoController.php@show >>>>');
            Log::error($e->getMessage());
            Log::error($e->getTrace());
            Log::info('<<<< FIN ERROR Controllers\ProductoController.php@show >>>>');
            return response('Error metodo show', 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ProductoID)
    {
        
        /* return view('configuracion.producto.producto.productoModificar', ['categorias'=>$categorias]); */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $productoId)
    {
        $validated = $request->validate([
            'Nombre' => 'required|max:100|min:3',
            'Cantidad' => 'required|max:3',
            'Precio' => 'required',
            'Descripcion' => 'nullable|max:500',
            'CategoriaID' => 'required',
            'Importado' => 'nullable',
            'Imagen' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);
        try {
            DB::beginTransaction();
            $producto = Producto::find($productoId);
            $producto->Nombre = $validated['Nombre'];
            $producto->Cantidad = $validated['Cantidad'];
            $producto->Precio = $validated['Precio'];
            $producto->Descripcion = $validated['Descripcion'];
            $producto->CategoriaID = $validated['CategoriaID'];
            $producto->Importado = $validated['Importado'] ?? null;
            

            if($request->hasFile("Imagen")){
                if($producto->Imagen){
                    Storage::delete('public/'.$producto->Imagen);
                }
                /* $categoria = Categoria::find($producto->CategoriaID);
                $fileName = time().$producto->Nombre. '.' . request()->Imagen->getClientOriginalExtension();
                request()->Imagen->move(public_path('images/productos/'.$producto->categoria->Nombre.'/'), $fileName);
                $producto->Imagen = $fileName; */
                $imagen = $request->file('Imagen');
                $extension = $imagen->extension();
                $imageName = Str::uuid().'.'.$extension;
                $path = $imagen->storeAs('imagenes/productos/'.$producto->categoria->Nombre, $imageName, 'public');
                $producto->Imagen = $path;
            }

            $producto->save();
            DB::commit();
        } catch (Exception $e) {
            Log::info('ProductoController function update');
            Log::info('Error: '+ $e);
            DB::rollBack();
        }
        return response('Producto Editado Correctamente', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
