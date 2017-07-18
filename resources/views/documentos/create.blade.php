@extends('blanco')
@section('contenth')@stop
@section('content')
    <?php HelperHtml::funcionReinicio("fn_documento_nuevo()") ?>
<h1>Crear un documento nuevo</h1>


    <form action="javascript: fn_documentos_new();" method="post" name="formreq_5hhhhhhs" id="formreq_5hhhhhhs">
        {!! Form::token()!!}
        <h2>Documento <span id="refg5i8k"></span></h2>
        {!! Form::hidden('for_num', $documentos['ultimoOficio'], array('id' => 'for_num')) !!}
        {!! Form::hidden('mem_num', $documentos['ultimomem'], array('id' => 'mem_num')) !!}

        {!! Form::hidden('for_num_id', $documentos['off_cgh1'], array('id' => 'for_num_id')) !!}
        {!! Form::hidden('mem_num_id', $documentos['mem_cgh1'], array('id' => 'mem_num_id')) !!}


        {!! Form::hidden('identificador', null,        array('id' => 'identificador')) !!}
        {!! Form::hidden('identificador_numero', null, array('id' => 'identificador_numero')) !!}
        {!! Form::hidden('identificador_letras', null, array('id' => 'identificador_letras')) !!}
        {!! Form::hidden('solicitante', $_SESSION['MM_Username']) !!}


        <br />
        {!! Form::select('tipo_documento', ['oficio'=>'Oficio', 'memo'=>'Memorandum'], null ,['class' => 'asdfg341','id'=>'asdfg341']) !!}
        {!! HelperHtml::TextareaT('observaciones_doc','Observaciones') !!}
        {!! Form::submit('Crear un nuevo documento') !!}
    </form>
    {!! Form::close() !!}

@endsection
@section('action')
<script>
    fn_mem_o_off();
</script>
@stop