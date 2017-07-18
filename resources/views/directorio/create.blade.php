@extends('blanco')
@section('contenth')@stop
@section('content')
    <?php HelperHtml::funcionReinicio("fn_estaciones_nuevo()") ?>
    <h1>{!! trans("view_larevel.crearentradadedirectorio")!!}</h1>

    <form action="javascript: fn_directorio_new();" method="post" name="formreq_4ghdyuhhs" id="formreq_4ghdyuhhs">
        {!! Form::token()!!}
        {!! HelperHtml::campoG('nombre',trans("view_larevel.nombredecontactooinstitucion")) !!}
        {!! HelperHtml::campoG('mail_req',trans("view_larevel.correoprincipaldecontacto")) !!}
        {!! HelperHtml::campoG('extencion',trans("view_larevel.telefonodecontacto")) !!}
        {!! HelperHtml::campoG('celular',trans("view_larevel.celular")) !!}

        {!! Form::submit(trans("view_larevel.crearentradadedirectorio")) !!}
    </form>
    {!! Form::close() !!}

@endsection
@section('action')@stop