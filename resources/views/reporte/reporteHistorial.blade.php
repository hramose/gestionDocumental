@extends('blanco')
@section('contenth')@stop
@section('content')
    <?php HelperHtml::funcionReinicio("fn_documentos_form(2)") ?>
    <h1>{!! trans("view_larevel.reportehistorial")!!}</h1>
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{!! Session::get('message') !!}</div>
    @endif
   <table data-role="table" id="darEstaciones-rts45g" data-mode="reflow" class="ui-responsive table-stroke">
        <thead>
        <tr>
            <th>{!! trans("view_larevel.nombredelsolicitante")!!}</td>
            <th>{!! trans("view_larevel.estado")!!}</th>
            <th>{!! trans("view_larevel.fechadeaccion")!!}</th>

        </tr>
        </thead>
        <tbody>


        @foreach($log as $key => $value)
            <tr">
                <td>{!! $value->NOMBRE !!}</td>
                <td>{!! $value->ESTADO !!}</td>
                <td>{!! $value->FECHA_INSERT !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@section('action')
    <script>


    </script>
@stop