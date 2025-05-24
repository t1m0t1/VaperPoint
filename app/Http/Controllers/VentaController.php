<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use App\Models\VentaHistorico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    
    public function index()
    {
        $ventas = Venta::orderBy("FechaVenta")->paginate(10);
        return view('venta.ventaListar', ["ventas" => $ventas]);
    }
    
    public function nuevaVenta(){
        $productos = Producto::select(['ProductoID', 'Nombre', 'Cantidad', 'CategoriaID', 'Imagen', 'Precio'])->where('Cantidad','>', 0)->orderBy("Nombre")->with('categoria')->get();

        return view('venta.ventaAlta', ["productos" => $productos]);
    }

    public function generarVenta(Request $request){
        $validated = $request->validate(
        [
            "productos" => 'nullable',
            "montoTotal" => 'required|numeric|min:1',
        ]);
        
        $arrayProductos = json_decode($validated['productos']);
        try {
            DB::beginTransaction();
            $nuevaVenta = Venta::create([
                "MontoTotal" => $validated['montoTotal'],
                "FechaVenta" => Carbon::now(),
                "ClienteID" => $validated['ClienteID'] ?? null,
            ]);

            foreach ($arrayProductos as $producto) {
                VentaHistorico::create([
                    "VentaID" => $nuevaVenta->VentaID,
                    "ProductoID" => $producto->ItemVentaID,
                    "Cantidad" => $producto->Cantidad,
                    "Precio" => $producto->Precio,
                ]);
            }
            DB::commit();
            return redirect('/venta/listar');
        } catch (\Exception $ex) {
            DB::rollBack();
            dd($ex);
        }

    }

    public function modificarVenta(Request $request, int $ventaID){
        $venta = Venta::find($ventaID)->with('ventaDetalles');
        $productos = Producto::orderBy("Nombre")->paginate(10);
        return view('venta.ventaModificar', ["productos" => $productos]);
    }

    public function guardarModificacioines(Request $request){

    }

    public function eliminarVenta(int $ventaID){

    }

}
