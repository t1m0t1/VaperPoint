@extends('layouts.default')

@section('contenido')
    <div class="container-sm color2 shadow-lg border mt-5">
        <div class="row mb-3 color3">
            <h5 class="text-start text-light m-1">Listado de Categorias</h5>
          </div>

          <div class="d-grid d-md-flex justify-content-md-end mb-3">
            <a href="{{route('categoriaCreate')}}" class="btn btn-success bi bi-plus"> Nueva Categoria</a>
        </div>
        <div class="table-responsive-lg">
            <table class="table table-bordered  table-primary table-hover">
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
                            <div class="d-flex justify-content-center">
                                <a href="{{route('categoriaEdit' , ['CategoriaID' => $categoria->CategoriaID])}}" class="btn btn-success bi bi-pencil-square me-3"></a>
                                
                                <form action="{{route('categoriaDestroy' , ['CategoriaID' => $categoria->CategoriaID])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger bi bi-x-square"></button>
                                </form>
                            </div>    
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