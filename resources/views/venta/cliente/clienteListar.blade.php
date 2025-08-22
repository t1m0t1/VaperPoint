@extends('layouts.default')

@section('contenido')
    <div class="container color2 shadow-lg border mt-5">
            <div class="row mb-3 color3">
                <h5 class="text-start text-light m-1">Cliente</h5>
            </div>
        
            <div class="d-grid d-md-flex justify-content-md-end mb-3">
                <a href="{{route('altaCliente')}}" class="btn btn-success bi bi-plus">Nueva cliente</a>
            </div>

        <table class="table table-bordered  table-primary table-hover">
            <thead class="grid">
                <tr>
                    <th scope="col">Dni</th>
                    <th scope="col">Nombre completo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>      
                @forelse ($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->DNI ?? "---"}}</td>   
                        <td>{{$cliente->Nombre}} {{$cliente->Apellido}}</td>   
                        <td></td>   
                    </tr>
                @empty
                <tr>
                    <td class="text-center fw-bold" colspan="7">No se encontraron clientes</td> 
                </tr>    
                @endforelse
            </tbody>
        </table>
    </div>
@endsection