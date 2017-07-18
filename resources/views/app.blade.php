<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('Connections/util_3.php');
//para autentificar
//guarda funciones de autentifiacion
include("login/autentifica.php");
$opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : '';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@section('titulo') {!! trans("view_larevel.sistemadedocumentacionconagoparepichincha")!!}@show</title>
    <link rel="icon" type="image/png" href="{{ asset('/conagopare.png') }}">
    <link rel="icon"
          type="image/png"
          href="{{ asset('/conagopare.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('/conagopare.png') }}" type="image/png" />
    <link rel="icon" href="{{ asset('/conagopare.png') }}" type="image/png" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    @section('scriptEspecial')@show
</head>
<body class="skin-blue">
<div class="wrapper">
@include('includes.header')
@include('includes.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @section('titulo') {!! trans("view_larevel.aplicacion")!!}: @show
                <small>{!! trans("view_larevel.paneldecontrol")!!}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> {!! trans("view_larevel.inicio")!!}</a></li>
                <li class="active">@section('titulo') {!! trans("view_larevel.aplicacion")!!}: @show</li>
            </ol>
        </section>

        <!-- Main content -->
        <!--modal ini-->
        <!-- Default bootstrap modal example -->
        <div class="modal fade" id="popupDialogx1" tabindex="-1" role="dialog" aria-labelledby="popupDialogx1Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="popupDialogx1Label">{!! trans("view_larevel.sistemadedocumentacion")!!}</h4>
                    </div>
                    <div id="dialog-form" ></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{!! trans("view_larevel.close")!!}</button>
                    </div>
                </div>
            </div>
        </div>

        <!--modal fin-->
        <section class="content">
            <div class="content body">

                @if (Session::has('message'))
                    <div class='callout callout-info lead'>
                        <h4>Importante!</h4>
                        <p>
                            {!! Session::get('message') !!}
                        </p>
                    </div>
            @endif
            <!--para presentar el pop-up-->
                <!--mobile-->


                <!--mobilefin-->

                <div class="row">
                    <!-- Left col -->
                    <div class=" col-md-16">
                        <!-- MAP & BOX PANE -->
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">{!! trans("view_larevel.sistemadedocumentacion")!!}</h3>

                            </div><!-- /.box-header -->
                            <div id="acc87886" class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100" style="width: 99%">
                                    <span class="sr-only">99% Esperar</span>
                                </div>
                            </div>

                            <div class="box-body no-padding">
                                <div class="row content" >


                                    <!-- Map will be created here -->             @section('contenth')
                                        <header class="major" id="headerXcd33a">
                                            <h2>{!! trans("view_larevel.sistemadedocumentacionconagoparepichincha")!!}</h2>
                                            <p>{!! trans("view_larevel.sistemadedocumentacion")!!}</p>
                                        </header>
                                    @show
                                    <section>
                                    <?php if (reconoce('0,1,2')) { ?>
                                    <!--para presentar aca en la pagina-->
                                        <div id="div_listar_detalle"  ></div>
                                        <div id="div_listar_detalle_util" ></div>
                                        <div id="div_listar"><h1>{!! trans("view_larevel.bienvenido")!!}</h1>
                                            <?php require_once('home.php'); ?>
                                        </div>
                                        @section('content')
                                            <?php
                                            if ($opcion != "") {
                                                include($opcion);
                                            }
                                            } else {
                                            ?>
                                                <script type="text/javascript">
                                                    window.onload = function() {
                                                        $(function(){
                                                            fn_logear();
                                                        });
                                                    }
                                                </script>
                                            <h3><a href="javascript: fn_logear();">{!! trans("view_larevel.ingresar")!!}</a></h3>
                                            <?php } ?>

                                            <hr />
                                        @show
                                    </section>


                                    <!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                    </div><!-- /.col -->
                    <?php /*  ?>
                              <div class=" col-md-4">
                              <!-- Info Boxes Style 2 -->
							  <script>
								function mensajeDa(tipo,elemento){
									if(typeof(EventSource) !== "undefined") {
										var source = new EventSource("/criticidades/"+tipo+"/");
										source.onmessage = function(event) {
											document.getElementById(elemento).innerHTML = event.data + "";
										};
									} else {
										document.getElementById(elemento).innerHTML = "Disculpas, su Buscador no soporta server-sent events...";
									}
								}
								</script>
                              <div class="info-box bg-red">
                              <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                              <div class="info-box-content">
                              <span class="info-box-text">Urgente</span>
                              <span class="info-box-number"><div id="resultURGw" ></div></span>
                              <div class="progress">
                              <div class="progress-bar" style="width: 100%"></div>
                              </div>
                              <span class="progress-description">
                              Urgente
                              </span>
                              </div><!-- /.info-box-content -->
                              </div><!-- /.info-box -->
                              <div class="info-box bg-yellow">
                              <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                              <div class="info-box-content">
                              <span class="info-box-text">ALTO</span>
                              <span class="info-box-number"><div id="resultaltw"></div></span>
                              <div class="progress">
                              <div class="progress-bar" style="width: 100%"></div>
                              </div>
                              <span class="progress-description">
                              Alto

							  </span>
                              </div><!-- /.info-box-content -->
                              </div><!-- /.info-box -->
                              <div class="info-box bg-aqua">

                              <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                              <div class="info-box-content">
                              <span class="info-box-text">MEDIO</span>
                              <span class="info-box-number"><div id="resultMEDw"></div></span>
                              <div class="progress">
                              <div class="progress-bar" style="width: 100%"></div>
                              </div>
                              <span class="progress-description">
                              Medio
                              </span>
                              </div><!-- /.info-box-content -->
                              </div><!-- /.info-box -->
							  <div class="info-box bg-green">
                              <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                              <div class="info-box-content">
                              <span class="info-box-text">BAJO</span>
                              <span class="info-box-number"><div id="resultBAJOw"></div></span>
                              <div class="progress">
                              <div class="progress-bar" style="width: 100%"></div>
                              </div>
                              <span class="progress-description">
                              Bajo
                              </span>
                              </div><!-- /.info-box-content -->
                              </div><!-- /.info-box -->

                              </div><!-- /.col -->
							  <script>
							  mensajeDa('C_URG','resultURGw');
							  mensajeDa('C_ALT','resultaltw');
							  mensajeDa('C_MEDIO','resultMEDw');
							  mensajeDa('C_BAJO','resultBAJOw');

							  </script>
                              <?php /* */ ?>
                </div>
                <!-- /.row (main row) -->

            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>{!! trans("view_larevel.version")!!}</b> 2.2.1
        </div>
        <strong>{!! trans("view_larevel.copyright")!!}&copy; 2015 <a href="http://www.ecuatask.com">Wagner Cadena</a>.</strong> {!! trans("view_larevel.allrightsreserved")!!}.
    </footer>
</div><!-- ./wrapper -->

<script src="{{ asset('/js/all.js') }}" type="text/javascript"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

@section('action')
    <script type="text/javascript">
        <?php echo isset($_SESSION['MM_Funcion_activa']) ? $_SESSION['MM_Funcion_activa'] : '' ?>
    </script>
@show
<script type="text/javascript">
    $("#acc87886").hide();
</script>
</body>
</html>