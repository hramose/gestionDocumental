@extends('blanco')
@section('contenth')@stop
@section('content')

<h1>Edit {!! $directorio->nombre !!}</h1>

<!-- if there are creation errors, they will show here -->
{!! Html::ul($errors->all()) !!}

<form action="javascript: fn_estaciones_edit_fin();" method="post" name="formreq_41x0yuhhs" id="formreq_41x0yuhhs">
    <input name="_method" type="hidden" value="PUT">
    {!! Form::token()!!}
    {!! HelperHtml::campoG('nombre','Nombre de Contacto o Institucion',$directorio->nombre) !!}
    {!! HelperHtml::campoG('mail_req','Correo Principal de contacto',$directorio->mail_req) !!}
    {!! HelperHtml::campoG('extencion','Telefono de contacto',$directorio->extencion) !!}
    {!! HelperHtml::campoG('celular','Celular',$directorio->ESTACION) !!}

<input type="submit" name="button" id="button" value="Ingresar formulario"  class="special"/>


</form>

@endsection
@section('action')@stop