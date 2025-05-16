<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function crearUsuario()
    {
        return view('auth.registro');
    }

    public function guardarUsuario(Request $request)
    {
        $request->validate([
            'userName' => 'required|unique:users',
            'nombre' => 'required|min:3|max:100',
            'apellido' => 'required|min:3|max:100',
            'password' => 'required|min:8|max:16'
        ]);
        $user = new User;
        $user->userName = $request->userName;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->password = Hash::make($request->password);
        
        $user->save();

        Auth::login($user);
        return redirect(route('home'));
    }

    public function validarIngresoUsuario(Request $request)
    {
        //TODO: validacion de datos

        $credenciales = [
            'userName' => $request->userName,
            'password' => $request->password
        ];

        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();
            return redirect(route('home'));
        }else{
            return redirect(route('login'))->with('error', 'Usuario o Contraseña Incorrectos');
        }

    }

    public function desconectarUsuario(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/');
    }
}
