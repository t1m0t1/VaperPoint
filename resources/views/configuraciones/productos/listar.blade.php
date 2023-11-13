@extends('configuraciones.layout.app')

@section('contenido')
    <div class="container m-3">
        <h1>PRODUCTOS</h1>

        <button type="button" class="btn btn-primary"> <i class="bi bi-plus-square-fill"> Nuevo</i></button>

    
       

        <table class="table table-hover">
            <thead class="grid">
            <tr>
                <th scope="col-sm-2">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Imagen</th>
                <th scope="col">Categoria</th>
            </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
    </div>
@endsection