@extends('blanco')
@section('contenth')  @stop
@section('titulo') Reporte Titulo @stop
@section('content')

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{!! Session::get('message') !!}</div>
    @endif
    <div id="details" class="clearfix">
        <div id="invoice">
            <h1>{!! trans("view_larevel.reporte2")!!}</h1>
        </div>
    </div>
      <table border="1" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <td>{!! trans("view_larevel.ID_PETICION")!!}</td>
            <td>{!! trans("view_larevel.USUARIO")!!}</td>
            <td>{!! trans("view_larevel.DESCRIPCION")!!}</td>
            <td>{!! trans("view_larevel.TITULO")!!}</td>
            <td>{!! trans("view_larevel.PROBLEMA")!!}</td>
            <td>{!! trans("view_larevel.FECHA_PEDIDO")!!}</td>
            <td>{!! trans("view_larevel.FECHA_SOLUCION")!!}</td>
            <td>{!! trans("view_larevel.PRIORIDAD")!!}</td>
        </tr>
        </thead>
        <tbody>
        @foreach($documentos as $key => $value)
            <tr>
                <td>{!! $value->ID_PETICION!!}</td>
                <td>{!! $value->USUARIO!!}</td>
                <td>{!! $value->DESCRIPCION!!}</td>
                <td>{!! $value->TITULO!!}</td>
                <td>{!! $value->PROBLEMA!!}</td>
                <td>{!! $value->FECHA_PEDIDO!!}</td>
                <td>{!! $value->FECHA_SOLUCION!!}</td>
                <td>{!! $value->PRIORIDAD!!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('action')
@stop