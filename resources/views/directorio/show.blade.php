@extends('blanco')
@section('contenth')@stop
@section('content')
    <a class="btn-new" id="btn2fgshuu_dir" href="#">Nuevo</a>
    <table id="darDirectorios-rts45g" class="table-bordered table-striped">
        <thead>
        <tr>
            <th>Nombre</td>
            <?php /*<th>Correo</th>
            <th>Telefono</th>
            <th>Celular</th>
            <th>Actions	</th> */ ?>
        </tr>
        </thead>
        <tbody>
        @foreach($directorio as $key => $value)
            <tr data-id="{!! $value->id !!}" data-nombre="{!! $value->nombre !!}" data-mail_req="{!! $value->mail_req !!}"
                data-extencion="{!! $value->extencion !!}"  data-celular="{!! $value->celular !!}"  >
                <td>{!! $value->nombre !!}</td>
            <?php /* <td>{!! $value->mail_req !!}</td>
                <td>{!! $value->extencion !!}</td>
                <td>{!! $value->celular !!}</td> */ ?>


            <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <a class="btn-del directorio2fg" id="btn1fgshuuhj3" href="#">Elejir</a>
                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('action')
    <script>


    </script>
@stop