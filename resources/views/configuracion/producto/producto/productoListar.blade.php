@extends('layouts.default')

@section('contenido')
    <div class="container color2 shadow-lg border mt-5">
      
        <div class="row mb-3 color3">
            <h5 class="text-start text-light m-1">Listado de Productos</h5>
        </div>
      
        <div class="d-grid d-md-flex justify-content-md-end mb-3">
            <a href="{{route('productoCreate')}}" class="btn btn-success bi bi-plus"> Nuevo Producto</a>
        </div>

      <table class="table table-bordered  table-primary table-hover">
          <thead class="grid">
          <tr class="text-center">
              <th scope="col"></th>
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
                    <td class="text-center">
                        @isset ($producto->Imagen)
                            <img class="td-image" src="{{asset('./images/productos/'.$producto->Imagen)}}" alt="">
                        @endisset
                    </td>
                      <td class="text-center">
                          {{$producto->Nombre}}
                      </td>
                      <td class="text-center">{{$producto->categoria->Nombre ?? "--"}}</td>
                      <td class="text-center">{{$producto->Precio ?? "--"}}</td>
                      <td class="text-center">{{$producto->Cantidad ?? "--"}}</td>
                      <td class="text-center">{{$producto->Descripcion ?? "--" }} </td>
                      <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('productoEdit' , ['ProductoID' => $producto->ProductoID])}}" class="btn btn-success bi bi-pencil-square me-3"></a>
                            
                            <form action="{{route('productoDestroy' , ['ProductoID' => $producto->ProductoID])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger bi bi-x-square"></button>
                            </form>
                        </div>   
                      </td>
                  </tr>
              @empty
              <tr>
                  <td class="text-center fw-bold" colspan="7">No se Encontraron Productos</td> 
              </tr>    
              @endforelse
             </tbody>
         </table>
        </div>
    </div>
@endsection