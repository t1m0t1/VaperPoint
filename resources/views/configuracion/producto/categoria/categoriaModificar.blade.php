@extends('layouts.default')

@section('contenido')
    <div class="container m-6">
        <h1 class="text-center">Editar Categoria</h1>

        <form method="POST" action="{{route('categoriaUpdate' , ['CategoriaID' => $categoria->CategoriaID])}}" class="row g-3 needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="col-md-4">
              <label for="Nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="Nombre" value="{{ old ('Nombre' , $categoria->Nombre)}}" name="Nombre" required>
              @error('Nombre')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="d-grid gap-2 d-md-block">
              <button class="btn btn-primary" type="submit">Guardar</button>
            
                <a href="{{route('categoriaIndex')}}" class="btn btn-primary">Atras</a>
            </div>

          </form>

    </div>
@endsection