@extends('layouts.default')

@section('contenido')
    <div class="container color2 shadow-lg border mt-5">
      
        <div class="row mb-3 color3">
            <h5 class="text-start text-light m-1">Alta de Producto</h5>
        </div>
      
        <div class="d-grid d-md-flex justify-content-md-end mb-3">
            <a href="{{route('productoCreate')}}" class="btn btn-success bi bi-plus"> Nuevo Producto</a>
        </div>

      <table class="table table-bordered  table-primary table-hover">
          <thead class="grid">
          <tr class="text-center">
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
    </div>
@endsection