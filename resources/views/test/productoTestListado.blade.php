@extends('layouts.default')

@section('contenido')
    <div class="container color2 shadow-lg border mt-5">
      
        <div class="row mb-3 color3">
            <h5 class="text-start text-light m-1">Listado de Productos</h5>
        </div>
      
        <div class="d-grid d-md-flex justify-content-md-end mb-3">
            <a href="#" class="btn btn-success bi bi-plus"> Nuevo Producto</a>
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
                            <img class="td-image" src="{{asset('./images/productos/mods/'.$producto->Imagen)}}" alt="">
                        @endisset
                    </td>
                      <td class="text-center">
                          {{$producto->Nombre}}
                      </td>
                      <input type="hidden" id="productoid" value="{{$producto->ProductoID}}">
                      <td class="text-center">{{$producto->categoria->Nombre ?? "--"}}</td>
                      <td class="text-center">{{$producto->Precio ?? "--"}}</td>
                      <td class="text-center">{{$producto->Cantidad ?? "--"}}</td>
                      <td class="text-center">{{$producto->Descripcion ?? "--" }} </td>
                      <td>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-success bi bi-pencil-square me-3" data-bs-toggle="modal" data-bs-target="#editProductoModal" onclick="editProducto({{$producto->ProductoID}})"></button>
                            <form action="#">
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



    <div class="modal fade" id="editProductoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header color3">
              <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Editar Producto</h1>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" id="cerrarModal"></button>
            </div>
            <form method="POST">
            @csrf
                <div class="modal-body color2">
                <input type="hidden" id="token" value="{{ csrf_token() }}">
                    
                        <div class="col-md-12 d-grid">
                          <div class="row ms-5">
                            <div class="col-md-7">
                              <div class="input-group mt-3">
                                <div class="col-md-4">
                                  <label for="nombre" class="form-label text-light">Nombre</label>
                                  <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{ old ('nombre')}}" name="nombre" id="nombre">
                                  @error('nombre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                
                                <div class="col-md-2 ms-4">
                                  <label for="cantidad" class="form-label text-light">Cantidad</label>
                                  <input type="number" class="form-control  @error('cantidad') is-invalid @enderror" id="cantidad" value="cantidad" required name="cantidad" min="0">
                                  @error('cantidad')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                
                                <div class="col-md-2 ms-4">
                                  <label for="precio" class="form-label text-light">Precio</label>
                                  <input type="number" step="0.25" class="form-control  @error('precio') is-invalid @enderror" id="precio" value="precio" min="0" name="precio">
                                  @error('precio')
                                    <div class="alert alert-danger">{{ $message }}</div>    
                                  @enderror
                                </div>
                              </div>
                
                              <div class="input-group mt-3">
                                <div class="col-md-3">
                                  <label for="categoria" class="form-label text-light">Categorias</label>
                                  <select class="form-select @error('categoria') is-invalid @enderror" id="selectCategoria" name="categoria" onchange="isImport()">
                                    <option value="">Categorias</option>
                                    @foreach ($categorias as $ca)    
                                    <option  value="{{$ca->CategoriaID}}" >{{$ca->Nombre}}</option>
                                    @endforeach 
                                  </select>
                                  @error('categoria')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                
                                <div class="col-md-3 ms-4 ">
                                  <label for="Importado" class="form-label text-light">Sub Categoria</label>
                                  <select class="form-select @error('Importado') is-invalid @enderror" aria-label="Disabled select example" id="selectImportado" name="Importado" disabled>
                                    <option selected>Solo liquidos</option>
                                    <option value="0">Nacionales</option>
                                    <option value="1">Importados</option>
                                    </select>
                                    @error('CategoriaID')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                              </div>
              
                              <div class="input-group mt-3">
                                <div class="col-md-8">
                                  <label for="descripcion" class="form-label text-light">Descripcion</label>
                                  <textarea class="form-control" id="descripcion" name="descripcion" wire:model="descripcion"></textarea>
                                </div>
                                @error('descripcion')
                                <div class="alert alert-danger">{{ $message }}</div>    
                                @enderror
                              </div>
            
                            </div>
            
                            <div class="col-md-4 me-3">
                                <div class="col-md-12 border my-3 mx-auto">
                                  <div class="col-md-9 my-3 mx-auto">
                                    <img src="" class="img-thumbnail" id="imagen"> 
                                  </div>
                                  <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                          </div>
            
                          
            
                        
                      </div>
            
                    
                </div>

                <div class="modal-footer color3">
                  <button type="button" class="btn btn-primary" id="editProductoGuardar">Guardar Cambios</button>
                </div>
            </form>
          </div>
        </div>
    </div>

@endsection