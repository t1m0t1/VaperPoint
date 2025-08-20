@extends('layouts.default')
@section('contenido')
    @if (session( 'success' ))
        <div class="alert alert-success top-0" role="alert">
            {{session( 'success' )}}
        </div>
    @endif
    <div class="h-100"> 
        <h1>HOME</h1>
    </div>    
@endsection

