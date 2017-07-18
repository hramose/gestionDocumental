@extends('blanco')
@section('contenth')@stop
@section('content')

<h1>Edit {!! $estaciones->name !!}</h1>

<!-- if there are creation errors, they will show here -->
{!! Html::ul($errors->all()) !!}

<form action="javascript: fn_estaciones_edit_fin();" method="post" name="formreq_41x0yuhhs" id="formreq_41x0yuhhs">
    <input name="_method" type="hidden" value="PUT">
    {!! Form::token()!!}
{!! HelperHtml::campoG('ESTACION','ESTACION',$estaciones->ESTACION) !!}

{!! HelperHtml::campoG('OBSERVACIONES','OBSERVACIONES', $estaciones->OBSERVACIONES) !!}

<input type="submit" name="button" id="button" value="Ingresar formulario"  class="special"/>


</form>

@endsection
@section('action')@stop