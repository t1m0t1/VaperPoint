<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('Nombre')->paginate(10);
        return view('venta.cliente.clienteListar', [
            'clientes' => $clientes,
        ]);
    }
    
    public function create(){
        return view('venta.cliente.clienteAlta');
    }

    public function store(Request $request){
        $validated = $request->validate(
        [
            "clienteDni" => 'required|numeric|regex:/^\d+$/|min:1|unique:Cliente,DNI',
            "clienteNombre" => 'required|string|max:100',
            "clienteApellido" => 'required|string|max:100',
        ],[
           "clienteDni.required" => "El DNI del cliente es obligatorio.",
            "clienteDni.regex" => "El DNI del cliente solo puede contener números sin puntos ni comas.",
            "clienteDni.unique" => "El DNI del cliente ya está registrado.",
            "clienteNombre.required" => "El nombre del cliente es obligatorio y no puede exceder los 100 caracteres.",
            "clienteApellido.required" => "El apellido del cliente es obligatorio y no puede exceder los 100 caracteres.",
        ]);
        
        try {
            // Formatear los campos para que tengan la primera letra en mayúscula
            $clienteNombre = ucwords(strtolower(trim($validated['clienteNombre'])));
            $clienteApellido = ucwords(strtolower(trim($validated['clienteApellido'])));
            $nuevoCliente = new Cliente();
            $nuevoCliente->DNI = $validated['clienteDni'];
            $nuevoCliente->Nombre = $clienteNombre;
            $nuevoCliente->Apellido = $clienteApellido;
            $nuevoCliente->save();
            
            session()->flash('success', 'Cliente registrado correctamente.'); 
            return redirect()->route('listarCliente');
        } catch (\Exception $ex) {
            Log::error("INICIO ClienteController@store");
            Log::info($ex->getMessage());
            Log::info($ex->getTrace());
            Log::error("FIN ClienteController@store");
        }

    }

    public function edit(Request $request, int $clienteID){

        return view('venta.cliente.clienteModificar', []);
    }

    public function update(Request $request){

    }

    public function destroy(int $clienteID){

    }
}