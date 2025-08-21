@extends('layouts.default')

@section('contenido')
<div class="container col-6 px-3">
        <div class="card py-4">
            <h3 class="text-center">Registro</h3>
            @if($errors->any())
                <div class="d-flex justify-content-center">
                    <p class="text-danger">Errores</p>
                    <ul>
                        @foreach ($errors->all() as $e)
                        <li class="text-danger">{{$e}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="w-full">
                <form action="{{route('guardarUsuario')}}" method="POST" class="d-flex flex-column">
                    @csrf
                    <div class="d-flex flex-column justify-items-center aling-items-center">
                        <label for="" class="align-self-center">Nombre Usuario</label>
                        <input type="text" name="userName" class="align-self-center col-10">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="" class="align-self-center">Nombre</label>
                        <input type="text" name="nombre" class="align-self-center col-10">
                        <label for="" class="align-self-center">Apellido</label>
                        <input type="text" name="apellido" class="align-self-center col-10">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="" class="align-self-center">Contraseña</label>
                        <input type="password" name="password" class="align-self-center col-10">
                        <label for="" class="align-self-center">Repetir Contraseña</label>
                        <input type="password" class="align-self-center col-10">
                    </div>
                    <div>
                        <button class="col-4 align-self-center mt-3">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection