@extends('blanco')
@section('contenth')@stop
@section('content')
    <?php HelperHtml::funcionReinicio("fn_estaciones_nuevo()") ?>
<h1>Crear una estacion</h1>

    <form action="javascript: fn_estaciones_new();" method="post" name="formreq_4ghdyuhhs" id="formreq_4ghdyuhhs">
{!! Form::token()!!}
    {!! HelperHtml::campoG('ID_ESTACION','Codigo Unico de estacion') !!}
{!! HelperHtml::campoG('ESTACION','Nombre de estacion') !!}
    <br />
{!! HelperHtml::TextareaT('OBSERVACIONES','Observaciones') !!}
{!! Form::submit('Crear una nueva estacion') !!}
</form>
{!! Form::close() !!}

@endsection
@section('action')@stop