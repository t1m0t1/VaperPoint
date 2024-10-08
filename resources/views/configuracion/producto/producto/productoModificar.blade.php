@extends('layouts.default')

@section('contenido')
    <div class="container-sm color2 shadow-lg border mt-5">
      <div class="row mb-3 color3">
        <h5 class="text-start text-light m-1">Alta de Producto</h5>
      </div>

        <form method="POST" action="{{route('productoStore')}}">
            @csrf
            <div class="col-md-12 d-grid">
              <div class="row ms-5">
                <div class="col-md-7">
                  <div class="input-group mt-3">
                    <div class="col-md-4">
                      <label for="Nombre" class="form-label text-light">Nombre</label>
                      <input type="text" class="form-control @error('Nombre') is-invalid @enderror" value="{{ old ('Nombre' , $producto->Nombre)}}" name="Nombre">
                      @error('Nombre')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
    
                    <div class="col-md-2 ms-5">
                      <label for="Cantidad" class="form-label text-light">Cantidad</label>
                      <input type="number" class="form-control  @error('Cantidad') is-invalid @enderror" id="Cantidad" value="Cantidad"  name="Cantidad" min="0" >
                      @error('Cantidad')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
    
                    <div class="col-md-2 ms-3">
                      <label for="Precio" class="form-label text-light">Precio</label>
                      <input type="number" class="form-control  @error('Precio') is-invalid @enderror" id="Precio" value="Precio" min="0" name="Precio">
                      @error('Precio')
                        <div class="alert alert-danger">{{ $message }}</div>    
                      @enderror
                    </div>
                  </div>
    
                  <div class="input-group mt-4">
                    <div class="col-md-3">
                      <label for="CategoriaID" class="form-label text-light">Categorias</label>
                      <select class="form-select @error('CategoriaID') is-invalid @enderror" id="selectCategoria" name="CategoriaID" onchange="isImport()">
                        <option selected disabled value="">Categorias</option>
                        @foreach ($categorias as $categoria)    
                        <option value="{{$categoria->CategoriaID}}" >{{$categoria->Nombre}}</option>
                        @endforeach
                      </select>
                      @error('CategoriaID')
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
  
                  <div class="input-group mt-4">
                    <div class="col-md-9">
                      <label for="descripcion" class="form-label text-light">Descripcion</label>
                      <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                  </div>

                </div>

                <div class="col-md-4 me-3 mb-5">
                    <div class="col-md-12 border my-3 mx-auto">
                      <div class="col-md-9 my-3 mx-auto">
                        <img src="{{asset('img/no-disponible.jpg')}}" class="mx-auto d-block">
                      </div>
                      <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
              </div>

              

            <div class="d-grid d-md-flex justify-content-md-end mb-3">
              <button class="btn btn-success" type="submit">Guardar Producto</button>
            </div>
          </div>

          </form>

    </div>
@endsection