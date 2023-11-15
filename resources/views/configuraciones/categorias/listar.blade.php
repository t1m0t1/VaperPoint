@extends('configuraciones.layout.app')

@section('contenido')
    <div class="container m-8">
        <h1 class="text-center fw-bold">CATEGORIAS</h1>

       
        <a class="btn btn-primary bi bi-plus-square-fill" href="{{route('categoriaCreate')}}">Nuevo Categoria</a>

    

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria)
                <tr>
                    <td>
                        {{$categoria->Nombre}}
                    </td>
                    <td>
                        <button class="btn btn-success bi bi-pencil-square"></button>
                        <button class="btn btn-danger bi bi-x-square"></button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center fw-bold" colspan="2">SIN DATOS</td> 
                </tr>    
                @endforelse
            </tbody>
            
        </table>
    </div>
@endsection