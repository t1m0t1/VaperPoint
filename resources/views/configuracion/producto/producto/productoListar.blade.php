@extends('layouts.default')
@section('contenido')
    <div class="container color2 shadow-lg border mt-5">
        <div class="row mb-3 color3">
            <h5 class="text-start text-light m-1">Listado de Productos</h5>
        </div>
        <div class="d-grid d-md-flex justify-content-md-end mb-3">
            <a href="{{ route('productoCreate') }}" class="btn btn-success rounded-circle"> <i class="bi bi-plus"></i></a>
        </div>
        @livewire('producto.producto-modificar')
    </div>
        <div class="table-responsive">
            <table class="table table-bordered  table-primary table-hover table-sm">
                <thead>
                    <tr class="text-center">
                        <th></th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
    
                    @forelse ($productos as $producto)
                        <tr>
                            <td class="text-center">
                                @if(Storage::exists('./images/productos/mods/' .$producto->Imagen))
                                    <img class="td-image" src="{{ asset('./images/productos/mods/' . $producto->Imagen) }}"
                                        alt="">
                                @endif
                            </td>
                            <td class="text-center">{{ $producto->Nombre }}</td>
                            <td class="text-center">{{ $producto->categoria->Nombre ?? '--' }}</td>
                            <td class="text-center">${{ $producto->Precio ?? '--' }}</td>
                            <td class="text-center">{{ $producto->Cantidad ?? '--' }}</td>
                            <td class="text-center col-auto">{{ $producto->Descripcion ?? '--' }} </td>
                            <td>
                                <div class="d-flex justify-content-center mx-2">
                                    <a onclick="Livewire.emit('emitMostraModalEditProducto', {{ $producto->ProductoID }})"
                                        class="btn btn-primary rounded-circle me-3">
                                    <i class="bi bi-pencil-square"></i>
                                    </a>
    
                                    <form action="{{ route('productoDestroy', ['ProductoID' => $producto->ProductoID]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-circle bi bi-x-square"></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center fw-bold" colspan="7">No se Encontraron Productos</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            @if ($productos->links())
            {{$productos->links()}}
            @endif
        </div>
        @livewire('producto.producto-modificar')
    </div>
@endsection
