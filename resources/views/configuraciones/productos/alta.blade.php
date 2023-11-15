@extends('configuraciones.layout.app')

@section('contenido')
    <div class="container m-6">
        <h1 class="text-center">CREAR PRODUCTO</h1>

        <form method="POST" action="{{route('productoStore')}}" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-md-4">
              <label for="nombre" class="form-label">Nombre Producto</label>
              <input type="text" class="form-control" id="nombre" value="nombre" name="nombre" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-3">
              <label for="categorias" class="form-label">Categorias</label>
              <select class="form-select" id="categorias" name="categoriaID">
                <option selected disabled value="">Categorias</option>
                @foreach ($categorias as $categoria)    
                <option value="{{$categoria->CategoriaID}}" >{{$categoria->Nombre}}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">
                Please select a valid state.
              </div>
            </div>

            <div class="col-md-3">
              <label for="categorias" class="form-label">Sub Categoria</label>
              <select class="form-select" aria-label="Disabled select example" disabled>
                <option selected>Solo liquidos</option>
                <option value="1">Nacionales</option>
                <option value="2">Importados</option>
                </select>
            </div>

            <div class="col-md-4">
              <label for="precio" class="form-label">Precio</label>
              <input type="number" class="form-control" id="precio" value="Precio" min="0" name="precio">
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-4">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" value="Cantidad" required name="cantidad" min="0">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            

            <div class="col-md-6">
              <label for="descripcion" class="form-label">Descripcion</label>
              <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
              
            </div>

            <div class="col-md-8">
                <label for="formFile" class="form-label">Imagen</label>
                <input class="form-control" type="file" id="formFile">
              </div>

            <div class="d-grid gap-2 d-md-block">
              <button class="btn btn-primary" type="submit">Guardar</button>

              <a href="{{route('productoIndex')}}" class="btn btn-primary">Atras</a>
            </div>

          </form>

    </div>
@endsection