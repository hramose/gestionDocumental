@extends('blanco')
@section('contenth')@stop
@section('content')
    <?php HelperHtml::funcionReinicio("fn_departamento_nuevo('".$ID_ESTACION."')") ?>
    <h1>Crear una Departamento o Servicio</h1>
    <form action="javascript: fn_departamentos_new();" method="post" name="forft4rs" id="forft4rs">
        {!! Form::token()!!}
        {!! Form::hidden('ID_ESTACION', $ID_ESTACION, array('id' => 'ID_ESTACION')); !!}
        {!! HelperHtml::campoG('DESCRIPCION','Descripcion') !!}
        <br />
        {!! HelperHtml::TextareaT('OBSERVACION','Observaciones') !!}
        {!! Form::submit('Crear una nueva estacion') !!}
    </form>
    {!! Form::close() !!}

@endsection
@section('action')@stop