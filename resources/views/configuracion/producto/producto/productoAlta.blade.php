@extends('layouts.default')

@section('contenido')
    <div class="container-sm color2 shadow-lg border mt-5">
      <div class="row mb-3 color3">
        <h5 class="text-start text-light m-1">Alta de Producto</h5>
      </div>

        <form method="POST" enctype="multipart/form-data" action="{{route('productoStore')}}">
            @csrf
            <div class="col-md-12 d-grid">
              <div class="row ms-5">
                <div class="col-md-7">
                  <div class="input-group mt-3">
                    <div class="col-md-4">
                      <label for="Nombre" class="form-label text-light">Nombre <i class="bi bi-braces-asterisk"></i></label>
                      <input type="text" class="form-control @error('Nombre') is-invalid @enderror" value="{{ old ('Nombre')}}" name="Nombre">
                      @error('Nombre')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
    
                    <div class="col-md-3 ms-3">
                      <label for="Cantidad" class="form-label text-light">Cantidad <i class="bi bi-braces-asterisk"></i></label>
                      <input type="number" class="form-control  @error('Cantidad') is-invalid @enderror" id="Cantidad" value="Cantidad" name="Cantidad" min="0" >
                      @error('Cantidad')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
    
                    <div class="col-md-3 ms-3">
                      <label for="Precio" class="form-label text-light">Precio <i class="bi bi-braces-asterisk"></i></label>
                      <input type="number" class="form-control  @error('Precio') is-invalid @enderror" id="Precio" value="Precio" min="0" name="Precio">
                      @error('Precio')
                      <p class="text-danger">{{ $message }}</p>    
                      @enderror
                    </div>
                  </div>
    
                  <div class="input-group mt-4">
                    <div class="col-md-3">
                      <label for="CategoriaID" class="form-label text-light">Categorias <i class="bi bi-braces-asterisk"></i></label>
                      <select class="form-select @error('CategoriaID') is-invalid @enderror" id="selectCategoria" name="CategoriaID" onchange="isImport()">
                        <option selected disabled value="">Categorias</option>
                        @foreach ($categorias as $categoria)    
                        <option value="{{$categoria->CategoriaID}}" >{{$categoria->Nombre}}</option>
                        @endforeach
                      </select>
                      @error('CategoriaID')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
    
                    <div class="col-md-3 ms-4 ">
                      <label for="Importado" class="form-label text-light">Sub Categoria</label>
                      <select class="form-select @error('Importado') is-invalid @enderror" aria-label="Disabled select example" id="selectImportado" name="Importado" disabled>
                        <option selected>Solo liquidos</option>
                        <option value="0">Nacionales</option>
                        <option value="1">Importados</option>
                        </select>
                        @error('Importado')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                  </div>
  
                  <div class="input-group mt-4">
                    <div class="col-md-10">
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
                      <input class="form-control  @error('Imagen') is-invalid @enderror" type="file" id="formFile" name="Imagen">
                      @error('Imagen')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
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