@extends('blanco')
@section('contenth')@stop
@section('content')
<?php HelperHtml::funcionReinicio("fn_documentos_form(2)") ?>
<h1>Estados</h1>
<a class="btn-new" id="btn2fgshuu_doc" href="#">Nuevo</a>
<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
{!! Form::hidden('paginacion2shjd44', 1, array('id' => 'paginacion2shjd44')) !!}
{!! Form::hidden('paginacion2shjd44_2', 1, array('id' => 'paginacion2shjd44_2')) !!}
<table data-role="table" id="darEstaciones-rts45g" data-mode="reflow" class="ui-responsive table-stroke">
    <thead>
        <tr>
            <th>Identificador</td>
            <th>Solicitante</th>
            <th>Observaciones</th>

        </tr>
    </thead>
    <tbody>


        @foreach($documentos as $key => $value)
        <tr data-id="{!! $value->id !!}">
            <td>{!! $value->identificador !!}</td>
            <td>{!! $value->solicitante !!}</td>
            <td>{!! $value->observaciones_doc !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@if ($documentos->hasMorePages())
     <a id="nextPaf67" href="javascript: fn_documentos_form($('#paginacion2shjd44').val())">Proximo</a>
@endif
@if ($documentos->currentPage()>1)
    <a id="nextPaf67" href="javascript: fn_documentos_form($('#paginacion2shjd44_2').val())">Anterior</a>
@endif

{!! Form::open(['route' =>['estaciones.show',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
{!! Form::close() !!}
@endsection
@section('action')
<script>


</script>
@stop