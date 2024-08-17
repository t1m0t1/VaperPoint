@extends('layouts.default')

@section('contenido')
    <div class="container-sm color2 shadow-lg border mt-5">
        <div class="row mb-3 color3">
          <h5 class="text-start text-light m-1">Alta de Categoria</h5>
        </div>

        <form method="POST" action="{{route('categoriaStore')}}" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-md-3">
              <label for="Nombre" class="form-label text-light">Nombre</label>
              <input type="text" class="form-control @error('Nombre') is-invalid @enderror" id="Nombre" value="{{ old ('Nombre')}}" name="Nombre">
              @error('Nombre')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="d-grid d-md-flex justify-content-md-end mb-3">
              <button class="btn btn-success" type="submit">Guardar Categoria</button>
            </div>

          </form>

    </div>
@endsection