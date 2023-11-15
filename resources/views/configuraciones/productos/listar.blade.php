@extends('configuraciones.layout.app')

@section('contenido')
    <div class="container m-6">
        <h1 class="text-center fw-bold">PRODUCTOS</h1>

        <a href="{{route('productoCreate')}}" class="btn btn-primary bi bi-plus-square-fill"> Nuevo Producto</a>

    
       

        <table class="table table-hover">
            <thead class="grid">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                
                @forelse ($productos as $producto)
                    <tr>
                        <td>
                            <img src="" alt="">
                            {{$producto->Nombre}}
                        </td>
                        <td>{{$producto->categoria->Nombre}}</td>
                        <td>{{$producto->Precio}}</td>
                        <td>{{$producto->Cantidad}}</td>
                        <td>{{$producto->Descripcion}}</td>
                        <td>
                            <button class="btn btn-success bi bi-pencil-square"></button>
                            <button class="btn btn-danger bi bi-x-square"></button>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td class="text-center fw-bold" colspan="7">SIN DATOS</td> 
                </tr>    
                @endforelse
            </tbody>
        </table>
    </div>
@endsection