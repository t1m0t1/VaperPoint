@extends('layouts.default')

@section('contenido')
    <div class="container mt-8">
        <h1 class="text-center fw-bold">CATEGORIAS</h1>
        <a class="btn btn-primary bi bi-plus-square-fill" href="{{route('categoriaCreate')}}">Nuevo Categoria</a>
        <div class="table-responsive-lg">
            <table class="table table-striped table-hover">
                <thead>
                <tr class="text-center">
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($categorias as $categoria)
                    <tr>
                        <td class="text-center">
                            {{$categoria->Nombre}}
                        </td>
                        <td class="text-center">
                            <button class="btn btn-success">
                                Editar
                            </button>
                            <button class="btn btn-danger bi bi-x-square">
                                Eliminar
                            </button>
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
    </div>
@endsection