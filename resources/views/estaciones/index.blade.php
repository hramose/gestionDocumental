@extends('blanco')
@section('contenth')@stop
@section('content')
<?php HelperHtml::funcionReinicio("fn_estaciones_form()") ?>
<h1>ESTACIONES</h1>
<a class="btn-new" id="btn2fgshuu_est" href="#">Nuevo</a>
<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
<table class="table-bordered">
    <thead>
        <tr>
            <th>ID</td>
            <th>ESTACION</th>
            <th>OBSERVACIONES</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>


        @foreach($estaciones as $key => $value)
        <tr data-id="{!! $value->ID_ESTACION !!}">
            <td>{!! $value->ID_ESTACION !!}</td>
            <td>{!! $value->ESTACION !!}</td>
            <td>{!! $value->OBSERVACIONES !!}</td>


            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <a class="btn-del estacionesasdc6yhaDEL" id="btn1fgshuuhj3" href="#">Borrar</a>
                <a class="btn-del estacionesasdc6yhaSHOW" id="btn1fgshuuhj3" href="#">Detalle</a>
                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! Form::open(['route' =>['estaciones.show',':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
{!! Form::close() !!}
@endsection
@section('action')
<script>


</script>
@stop