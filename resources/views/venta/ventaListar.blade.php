@extends('layouts.default')

@section('contenido')
<div class="container color2 shadow-lg border mt-5">
      
        <div class="row mb-3 color3">
            <h5 class="text-start text-light m-1">Venta</h5>
        </div>
      
        <div class="d-grid d-md-flex justify-content-md-end mb-3">
            <a onclick="Livewire.emit('mostrarModal')" class="btn btn-success bi bi-plus"> Nueva Venta</a>
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
              @forelse ($ventas as $venta)
                  <tr>
                      <td class="text-center">
                          {{$venta->FechaVenta}}
                      </td>>   
                  </tr>
              @empty
              <tr>
                  <td class="text-center fw-bold" colspan="7">No se encontraron ventas</td> 
              </tr>    
              @endforelse
        </tbody>
     </table>
</div>
@livewire('venta.venta-nueva')
@endsection