@extends('layouts.default')

@section('contenido')
<div class="container">
        <div class="card mb-5 mt-5">
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
            <div class="d-flex justify-content-center">
                <form action="{{route('guardarUsuario')}}" method="POST">
                    @csrf
                    <div class="row">
                        <label for="">Nombre Usuario</label>
                        <input type="text" name="userName">
                    </div>
                    <div class="row">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre">
                        <label for="">Apellido</label>
                        <input type="text" name="apellido">
                    </div>
                    <div class="row">
                        <label for="">Contraseña</label>
                        <input type="password" name="password">
                        <label for="">Repetir Contraseña</label>
                        <input type="password">
                    </div>
                    <div>
                        <button>Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection