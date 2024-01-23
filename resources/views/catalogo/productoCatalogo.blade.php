@extends('layouts.default')
@section('contenido')
    @livewire('producto.producto-catalogo', ['categoriaID' => $categoriaID])
@endsection
