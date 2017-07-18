@extends('blanco')
@section('contenth')@stop
@section('content')
<?php HelperHtml::funcionReinicio("fn_departamento_show('".$estaciones->ID_ESTACION."')") ?>
<h1>Mostrando {!! $estaciones->ESTACION !!}</h1>

<div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{!! $estaciones->ESTACION !!}</span>
              <span class="info-box-number">{!! $estaciones->ID_ESTACION !!} <br />
{!! $estaciones->OBSERVACIONES !!}</span>
            </div>
          </div>  
<!-------------------------------------------->
<h1>Departamentos/Servicios</h1>
<a class="btn-new" id="btn2fgshuu_dep" href="#">Nuevo</a>
<input type="hidden" value="{!! $estaciones->ID_ESTACION !!}" id="btn2fgshuu_dep_id" />
<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{!! Session::get('message') !!}</div>
@endif
<table class="table-bordered">
    <thead>
        <tr>
            <th>ID</td>
            <th>DESCRIPCION</th>
            <th>OBSERVACIONES</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>


        @foreach($departamento as $key => $value)
        <tr data-id="{!! $value->ID_DEPARTAMNETO !!}">
            <td>{!! $value->ID_DEPARTAMNETO !!}</td>
            <td>{!! $value->DESCRIPCION !!}</td>
            <td>{!! $value->OBSERVACION !!}</td>


            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <a class="btn-del depasdc6yhaDEL" id="btn1fgshuuhj3" href="#">Borrar</a>               <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! Form::open(['route' =>['departamento.show',':ID_DEPARTAMNETO'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
{!! Form::close() !!}
@endsection
@section('action')@stop
