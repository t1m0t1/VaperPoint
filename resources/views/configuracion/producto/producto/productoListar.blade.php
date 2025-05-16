@extends('layouts.default')
@section('contenido')

  <div class="container color2 shadow-lg border">
        <div class="row mb-3 color3">
            <h5 class="text-start text-light m-1">Listado de Productos</h5>
        </div>
        <div class="d-flex justify-content-between col-12">
          <div class="d-flex col-10 justify-content-between">
            <form action="{{route('productoIndex')}}" class="d-flex col-12 me-3" method="GET">
              <input type="text" placeholder="Buscar Producto" class="form-control m-3" name="productoBuscado">
              <select id="" class="form-select m-3" name="categoriaBuscada">
                <option value="" selected>Categorias</option>
                @foreach ($categorias as $categoria)
                    <option @if($categoriaBuscada == $categoria->CategoriaID) selected @endif value="{{$categoria->CategoriaID}}">{{$categoria->Nombre}}</option>
                @endforeach
              </select>
              <select name="filtroPrecios" id="" class="form-select m-3">
                <option value="" selected>Precio</option>
                <option @if($filtroPrecios == "ASC") selected @endif value="ASC">De Menor a Mayor</option>
                <option @if($filtroPrecios == "DESC") selected @endif value="DESC">De Mayor a Menor</option>
              </select>
              <button type="submit" class="btn btn-info m-3"><i class="bi bi-search"></i></button>
            </form>
          </div>
          <div class="col-1 ms-5 mt-3 float-end">
              <a {{-- href="{{ route('productoCreate') }}" --}} onclick="abrirModalCrearProducto()" class="btn btn-success rounded-circle"><i class="bi bi-plus"></i></a>
          </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered  table-primary table-hover table-sm">
                <thead>
                    <tr class="text-center">
                        <th>Imagen</th> 
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
    
                    @forelse ($productos as $producto)
                        <tr>
                          <td class="text-center">
                            @if($producto->Imagen && Storage::exists('public/'.$producto->Imagen))
                              <img class="td-image" src="{{ asset('storage/'.$producto->Imagen) }}" alt=""> 
                            @else
                              <img class="td-image" src="{{ asset('img/no-disponible.jpg') }}" alt="">  
                            @endif
                            </td>
                            <td class="text-center">{{ $producto->Nombre }}</td>
                            <td class="text-center">{{ $producto->categoria->Nombre ?? '--' }}</td>
                            <td class="text-center">${{ $producto->Precio ?? '--' }}</td>
                            <td class="text-center">{{ $producto->Cantidad ?? '--' }}</td>
                            <td class="text-center col-auto" id="descripcionProducto"><p class="text-truncate">{{ $producto->Descripcion ?? '--' }}</p></td>
                            <td>
                                <div class="d-flex justify-content-center mx-2">
                                    <a onclick="abrirModalEditarProducto({{$producto->ProductoID}})" class="btn btn-primary rounded-circle me-3">
                                    <i class="bi bi-pencil-square"></i>
                                    </a>
    
                                    <form action="{{ route('productoDestroy', ['ProductoID' => $producto->ProductoID]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-circle bi bi-x-square"></button>
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
        <div class="d-flex justify-content-center">
            @if ($productos->links())
            {{$productos->links()}}
            @endif
        </div>
        {{-- Inicio modal editar --}}
        @component('componentes.modal')
            @slot('modalTitulo')
              <h1 class="modal-title fs-5 text-light" id="modalTitulo"></h1>    
            @endslot
            @slot('modalBody')
                <div class="modal-body color2">
                  <div class="col-md-12 d-grid">
                    <div class="row ms-5">
                      <div class="col-md-7">
                        <ul id="ulErrors">
                        </ul>
                        <div class="input-group mt-3">
                          <div class="col-md-4">
                            <label for="nombre" class="form-label text-light">Nombre(*)</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror"  name="nombre" id="nombre" required>
                            <input type="text" id="productoID" hidden>
                            {{-- @error('nombre')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                          </div>
          
                          <div class="col-md-2 ms-4">
                            <label for="cantidad" class="form-label text-light">Cantidad(*)</label>
                            <input type="number" class="form-control  @error('cantidad') is-invalid @enderror" id="cantidad" required name="cantidad" min="0">
                            {{-- @error('cantidad')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                          </div>
          
                          <div class="col-md-2 ms-4">
                            <label for="precio" class="form-label text-light">Precio(*)</label>
                            <input type="number" class="form-control  @error('precio') is-invalid @enderror" id="precio" min="0" name="precio" required>
                            {{-- @error('precio')
                              <div class="alert alert-danger">{{ $message }}</div>    
                            @enderror --}}
                          </div>
                        </div>
          
                        <div class="input-group mt-3">
                          <div class="col-md-3">
                            <label for="categoriaID" class="form-label text-light">Categorias(*)</label>
                            <select required class="form-select @error('categoriaID') is-invalid @enderror" id="selectCategoria" name="categoriaID" onchange="isImport()">
                              <option selected disabled value="">Categorias</option>
                              @foreach ($categorias as $categoria)
                              <option value="{{$categoria->CategoriaID}}">{{$categoria->Nombre}}</option>
                              @endforeach
                              {{-- TODO: Agregar forma de ir a cargar nueva categoria --}}
                            </select>
                            {{-- @error('categoriaID')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror --}}
                          </div>
          
                          <div class="col-md-3 ms-4 ">
                            <label for="importado" class="form-label text-light">Sub Categoria</label>
                            <select class="form-select @error('importado') is-invalid @enderror" aria-label="Disabled select example" id="selectimportado" name="importado" disabled>
                              <option selected value="">Solo liquidos</option>
                              <option value="0">Nacionales</option>
                              <option value="1">Importados</option>
                              </select>
                              {{-- @error('importado')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror --}}
                          </div>
                        </div>
        
                        <div class="input-group mt-3">
                          <div class="col-md-8">
                            <label for="descripcion" class="form-label text-light">Descripcion</label>
                            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 me-3">
                          <div class="col-md-12 border my-3 mx-auto">
                            <div class="col-md-9 my-3 mx-auto">
                              <img class="img-thumbnail" id="imgSelected">
                            </div>
                            <input class="form-control" type="file" id="formFile" onclick="cargarImagen()">
                            <input type="text" id="imagenAnterior" hidden>
                          </div>
                      </div>
                      <p class="fw-light text-white">(*)Campos Requeridos</p>
                    </div>
                  </div>
              </div>
            @endslot
            @slot('botonSave')
              <button type="button" class="btn btn-primary" id="botonSave" onclick="guardarProducto()"></button>
              <div class="spinner-border text-primary" role="status" hidden id="spinner">
                <span class="visually-hidden"></span>
              </div>
            @endslot
        @endcomponent

      {{--   <div class="modal fade show" id="editProductoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header color3">
                  <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Editar Producto</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                
                <div class="modal-footer color3">
                  <button type="button" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div> --}}
        {{-- Fin modal editar --}}
        </div>
        
    </div>
@endsection
@section('js_footer')
    <script src="{{asset('/js/jsProductos.js')}}"></script>
@endsection
