@extends('layouts.default')

@section('contenido')
<div class="container color2 shadow-lg border mt-5">
      
        <div class="row mb-3 color3">
            <h5 class="text-start text-light m-1">Venta</h5>
        </div>
      
        <div class="d-grid d-md-flex justify-content-md-end mb-3">
            <a href="/venta/alta" class="btn btn-success bi bi-plus">Nueva Venta</a>
        </div>

      <table class="table table-bordered  table-primary table-hover">
          <thead class="grid">
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Cliente</th>
                <th scope="col" class="text-end">Monto Total</th>
                <th scope="col" class="text-center">Acciones</th>
            </tr>
          </thead>
        <tbody>      
              @forelse ($ventas as $venta)
                  <tr>
                      <td>{{$venta->FechaVenta}}</td>   
                      <td>{{$venta->ClienteID ?? "Consumidor final"}}</td>   
                      <td class="text-end">$ {{number_format($venta->MontoTotal, 2, ',', ' ')}}</td>   
                      <td></td>   
                  </tr>
              @empty
              <tr>
                  <td class="text-center fw-bold" colspan="7">No se encontraron ventas</td> 
              </tr>    
              @endforelse
        </tbody>
     </table>
</div>
@endsection