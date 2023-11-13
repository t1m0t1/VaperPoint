@extends('configuraciones.layout.app')

@section('contenido')
    <div class="container m-3">
        <h1>CATEGORIAS</h1>

        <button type="button" class="btn btn-primary"> <i class="bi bi-plus-square-fill"> Nuevo</i></button>

    

        <table class="table table-hover">
            <thead class="grid">
            <tr>
                <th scope="col-sm-2">#</th>
                <th scope="col">Nombre</th>
            </tr>
            </thead>
            @forelse ($collection as $item)
                <tbody>
                
                </tbody>
            @empty
                
            @endforelse
            
        </table>
    </div>
@endsection