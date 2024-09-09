@extends('layouts.default')

@section('contenido')
<div class="container">
    <div class="card w-100 mb-3 mt-5">
        <h3 class="text-center">INGRESO</h3>
        <form action="{{route('validarIngreso')}}" method="POST">
            @csrf
            <label for="">Nombre de Usuario</label>
            <input type="text" name="userName">
            
            <label for="">Contraseña</label>
            <input type="password" name="password">
            
            <button>Ingresar</button>
        </form>
    </div>
</div>
@endsection