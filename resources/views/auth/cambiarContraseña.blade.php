@extends('layouts.default')
@section('contenido')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session( 'error' ))
        <div class="alert alert-danger" role="alert">
            {{session( 'error' )}}
        </div>
    @endif
    <div class="glass0 py-4 px-3 rounded col-8"> 
        <h1 class="text-white">Cambiar Contraseña</h1>
        <form action="{{route('changePassword')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="current_password" class="form-label text-white">Contraseña actual</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label text-white">Nueva Contraseña</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label text-white">Confirmar Nueva Contraseña</label>
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
        </form>
    </div>    
@endsection
