@extends('blanco')
@section('contenth')@stop
@section('content')
    <?php HelperHtml::funcionReinicio("fn_directorio_form()") ?>
    <h1>{!! trans("view_larevel.directorio")!!}</h1>
    <a class="btn-new" id="btn2fgshuu_dir" href="#">{!! trans("view_larevel.nuevo")!!}</a>
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{!! Session::get('message') !!}</div>
    @endif
    <table data-role="table" id="darDirectorios-rts45g" data-mode="reflow" class="ui-responsive table-stroke">
        <thead>
        <tr>
            <th>{!! trans("view_larevel.nombre")!!}</td>
            <th>{!! trans("view_larevel.correo")!!}</th>
            <th>{!! trans("view_larevel.telefono")!!}</th>
            <th>{!! trans("view_larevel.celular")!!}</th>
            <th>{!! trans("view_larevel.actions")!!}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($directorio as $key => $value)
            <tr data-id="{!! $value->id !!}">
                <td>{!! $value->nombre !!}</td>
                <td>{!! $value->mail_req !!}</td>
                <td>{!! $value->extencion !!}</td>
                <td>{!! $value->celular !!}</td>


                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <a class="btn-del diectoriosasdc6yhaDEL" id="btn1fgshuuhj3" href="#">{!! trans("view_larevel.borrar")!!}</a>
                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! Form::open(['route' =>['directorio.show',':id'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
    {!! Form::close() !!}
@endsection
@section('action')
    <script>


    </script>
@stop