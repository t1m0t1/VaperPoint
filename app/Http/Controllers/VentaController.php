<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\VentaHistorico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VentaController extends Controller
{
    
    public function index()
    {
        $ventas = Venta::orderBy("FechaVenta")->paginate(10);
        return view('venta.ventaListar', ["ventas" => $ventas]);
    }
    
    public function create(){
        $productos = Producto::select(['ProductoID', 'Nombre', 'Cantidad', 'CategoriaID', 'Imagen', 'Precio'])->where('Cantidad','>', 0)->orderBy("Nombre")->with('categoria')->get();
        $clientes = Cliente::all();
        return view('venta.ventaAlta', [
            "productos" => $productos,
            "clientes" => $clientes,
        ]);
    }

    public function store(Request $request){
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
            Log::error("INICIO VentaController@generarVenta");
            Log::info($ex->getMessage());
            Log::info($ex->getTrace());
            Log::error("FIN VentaController@generarVenta");
        }

    }

}
