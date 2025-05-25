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
        $request->validate([
            'userName' => 'required|string|max:200',
            'password' => 'required|string'
        ]);

        $credenciales = [
            'userName' => $request->userName,
            'password' => $request->password
        ];

        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();
            return redirect(route('home'));
        }

        return back()->with('error', 'Usuario o Contraseña Incorrectos');    

    }

    public function desconectarUsuario(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/');
    }

    public function changePasswordform()
    {
        return view('auth.cambiarContraseña');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|max:15|alpha_num|confirmed'
        ]);
        if(Hash::check($request->current_password, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->route('home')->with('success', 'Contraseña Cambiada Correctamente'); 
        }
        return back()->with('error', 'Contraseña Incorrecta');
    }
}
