@extends('layouts.default')

@section('contenido')
@if (session( 'error' ))
    <div class="alert alert-danger" role="alert">
        {{session( 'error' )}}
    </div>
@endif
<div class="container col-6">
    <div class="glass0 w-100 py-4 px-3 rounded">
        <h3 class="text-center fw-bold text-white">INGRESO</h3>
        <form action="{{route('validarIngreso')}}" method="POST" class="d-flex flex-column justify-content-center">
            @csrf
            <label for="" class="text-center text-white">Nombre de Usuario</label>
            <input type="text" name="userName">
            
            <label for="" class="text-center text-white mt-3">Contraseña</label>
            <input type="password" name="password">
            
            <button class="align-self-center mt-3 btn btn-outline-primary col-lg-6">Ingresar</button>
        </form>
    </div>
</div>
@endsection