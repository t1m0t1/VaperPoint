@extends('layouts.default')
@section('js_footer')
    <script src="{{asset('./js/venta/nueva-venta.js')}}"></script>
@endsection
@section('contenido')
    <div class="container color2 shadow-lg border h-100 mb-5">
        <div class="row mb-3 color3">
            <h5 class="text-start text-light m-1">Registrar venta</h5>
        </div>
        <div class="container d-flex h-75">
            <div class="col-4">
                <div class="col-12">
                    <label for="Search" class="form-label"></label>
                    <select class="form-control select2" id="select2Productos" onchange="agregarProductoLista()">
                        <option value="">Seleccione un producto</option>
                        @foreach ( $productos as $producto )
                            <option value="{{$producto}}"> {{$producto->Nombre}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button class="col-5 btn btn-success text-light text-center">Seleccionar cliente</button>
                    <button class="col-5 btn btn-success text-light text-center">Agregar descuento</button>
                </div>
            </div>
            <div class="col-8 mt-4">
                <div class="d-flex justify-content-end mx-5 mb-3">
                    <button class="btn btn-light text-danger" onclick="limpiarCarrito()">Limpiar carrito</button>
                </div>
                <form action="{{route('generarVenta')}}" method="POST" id="form-venta">
                    @csrf
                    <input type="text" name="clienteID" value="{{old('clienteID')}}" hidden>
                    <input type="text" id="listadoProductos" name="productos" value="{{old('productos')}}" hidden>
                    <input type="text" name="descuento" value="{{old('descuento')}}" hidden>
                    <input type="number" id="montoTotalJS" name="montoTotal" value="{{old('montoTotal')}}" hidden>
                </form>
                 <!-- Contenedor de la tabla -->
                <div class="table-responsive flex-grow-1 overflow-auto mx-5 h-100 bg-dark">
                    <table class="table table-dark table-hover">
                        <thead class="table-dark text-center">
                            <tr>
                                <th class="col-4">Producto</th>
                                <th class="col-3">Cantidad</th>
                                <th class="col-3">Precio</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tbody-productos">
                            
                        </tbody>
                        <div class="col-12 text-center">
                            @error('montoTotal')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </table>
                </div>

                <div class="d-flex justify-content-between mx-5 px-5 pb-2 bg-dark">
                    <span class="text-light fs-4 ">Total</span>
                    <span class="text-light fs-4 "><span id="total-a-cobrar">00,00</span>$</span>
                </div>
                <div class="text-center mt-2">
                    <button class="btn px-5 btn-primary fs-5" onclick="enviarFormularioNuevaVenta()">Confirmar venta</button>
                </div>
            </div>
        </div>
    </div>
@endsection