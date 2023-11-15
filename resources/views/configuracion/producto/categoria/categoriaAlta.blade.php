@extends('layouts.default')

@section('contenido')
    <div class="container m-6">
        <h1 class="text-center">CREAR CATEGORIA</h1>

        <form method="POST" action="{{route('categoriaStore')}}" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-md-4">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="Nombre" value="nombre" name="nombre" required>
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