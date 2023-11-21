@extends('layouts.default')

@section('contenido')
    <div class="container-sm color2 shadow-lg border mt-5">
        <div class="row mb-3 color3">
          <h5 class="text-start text-light m-1">Modificar Categoria</h5>
        </div>

        <form method="POST" action="{{route('categoriaUpdate' , ['CategoriaID' => $categoria->CategoriaID])}}" class="row g-3 needs-validation">
            @csrf
            @method('PUT')
            <div class="col-md-3">
              <label for="Nombre" class="form-label text-light">Nombre</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="Nombre" value="{{ old ('Nombre' , $categoria->Nombre)}}" name="Nombre">
              @error('Nombre')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="d-grid d-md-flex justify-content-md-end mb-3">
              <button class="btn btn-success bi bi-floppy" type="submit"> Modificar</button>
            </div>

          </form>

    </div>
@endsection