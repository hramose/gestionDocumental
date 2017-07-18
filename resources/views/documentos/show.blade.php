@extends('blanco')
@section('contenth')@stop
@section('content')
<h1>Mostrando {!! $estaciones->name !!}</h1>

<div class="jumbotron text-center">
    <h2>{!! $estaciones->ID_ESTACION !!}</h2>
    <p>
        <strong>Estacion:</strong> {!! $estaciones->ESTACION !!}<br>
        <strong>Observacion:</strong> {!! $estaciones->OBSERVACIONES !!}
    </p>
</div>

@endsection
@section('action')@stop
