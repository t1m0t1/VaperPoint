@extends('layouts.default')
@section('contenido')
    <div class="container color2 shadow-lg border h-100 mb-5">
        <div class="row mb-3 color3">
            <h5 class="text-start text-light m-1">Registrar Cliente</h5>
        </div>
        <div class="container mh-75">
            <form action="{{route('generarCliente')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <label for="clienteDni" class="form-label text-light">Dni(*)</label>
                        <input type="text" class="form-control" name="clienteDni" id="clienteDni" value="{{old('clienteDni')}}">
                        @error('clienteDni')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="clienteApellido" class="form-label text-light">Apellido(*)</label>
                        <input type="text" class="form-control" name="clienteApellido" id="clienteApellido" value="{{old('clienteApellido')}}">
                        @error('clienteApellido')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="clienteNombre" class="form-label text-light form-">Nombre(*)</label>
                        <input type="text" class="form-control" name="clienteNombre" id="clienteNombre" value="{{old('clienteNombre')}}">
                        @error('clienteNombre')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="text-center my-4">
                        <button type="submit" class="btn px-5 btn-primary fs-5">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection