<?php /*
if (!isset($_SESSION)) {
    session_start();
}
require_once('Connections/util_3.php');
//para autentificar
//guarda funciones de autentifiacion
include("login/autentifica.php");
$opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : '';
?><!DOCTYPE HTML>
<html>
<head>
    <title>@section('titulo')CivilTask sistema de Tickets en linea @show</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta http-equiv="Prama" content="no-cache">
    <meta http-equiv="Expires" content="-1">

    <link rel="stylesheet" type="text/css" href="{!! ('/css/mobil/civiltask.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! ('/css/mobil/jquery.mobile.icons.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! ('/css/mobil/jquery.mobile-1.4.5.min.css') !!}">
    <!--[if lte IE 8]><script src="{!! ('/css/ie/html5shiv.js') !!}"></script><![endif]-->
    <!--<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>-->
    <script src="{!! ('/js/ext/jquery-1.10.2.min.js') !!}"></script>
    <script>
        $(document).on("mobileinit", function () {
            // Reference: http://jquerymobile.com/demos/1.1.0/docs/api/globalconfig.html
            $.extend($.mobile, {
                linkBindingEnabled: false,
                ajaxEnabled: false
            });

        });


    </script>
    <script src="{!! ('/js/jquery.scrolly.min.js') !!}"></script>
    <script src="{!! ('/js/jquery.dropotron.min.js') !!}"></script>
    <script src="{!! ('/js/jquery.scrollex.min.js') !!}"></script>
    <script src="{!! ('/js/skel.min.js') !!}"></script>
    <script src="{!! ('/js/skel-layers.min.js') !!}"></script>
    <script src="{!! ('/js/init.js') !!}"></script>

    <script type="text/javascript" src="{!! ('/js/scrip.js') !!}" language="javascript"></script>

    <!--<noscript>-->
    <link rel="stylesheet" href="{!! ('/css/skel.css') !!}" />
    <link rel="stylesheet" href="{!! ('/css/style.css') !!}" />
    <link rel="stylesheet" href="{!! ('/css/style-xlarge.css') !!}" />
    <!--</noscript>-->
    <!--[if lte IE 9]><link rel="stylesheet" href="{!! ('/css/ie/v9.css') !!}" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="{!! ('/css/ie/v8.css') !!}" /><![endif]-->


    <!--<script src="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="https://rawgithub.com/jquery/jquery-ui/1.10.4/ui/jquery.ui.datepicker.js"></script>
    <script id="mobile-datepicker" src="https://rawgithub.com/arschmitz/jquery-mobile-datepicker-wrapper/v0.1.1/jquery.mobile.datepicker.js"></script>-->
    <script src="{!! ('/js/ext/jquery.mobile-1.4.5.min.js') !!}"></script>
    <script src="{!! ('/js/ext/jquery.ui.datepicker.js') !!}"></script>
    <script src="{!! ('/js/ext/jquery.mobile.datepicker.js') !!}"></script>

</head>
<body>

<!-- Header -->
<header id="header" class="skel-layers-fixed">
    <h1 id="logo"><a href="index.php">Sistema de Documentacion Conagopare</a></h1>
    <nav id="nav">
        <?php
        if (reconoce('0,1,2')) {
            include("menu.php");
        }
        ?>

    </nav>
</header>
<!--para presentar el pop-up-->
<!--mobile-->
<div data-role="popup" id="popupDialogx1" data-overlay-theme="b" data-theme="b" data-dismissible="false" style="max-width:400px; background:#00274F">
    <div data-role="header" data-theme="a">
        <h1>Sistema CivilTask</h1>
    </div>
    <div role="main" class="ui-content">
        <div id="dialog-form" ></div>
        <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Cancel</a>
    </div>
</div>
<!--mobilefin-->




<!-- Main -->
<div id="main" class="wrapper style1">
    <div class="container">
        @section('contenth')
            <header class="major" id="headerXcd33a">
                <h2>Sistema de Documentacion Conagopare</h2>
                <p>Sistema de Documentacion</p>
            </header>
            @show

                    <!-- Text -->
            <section>
                <?php if (reconoce('0,1,2')) { ?>
                <!--para presentar aca en la pagina-->
                <div id="div_listar_detalle" title="Aerogal Soporte" ></div>
                <div id="div_listar_detalle_util" title="Aerogal Soporte" ></div>
                <div id="div_listar"><h1>Bienvenido</h1>
                    <?php require_once('home.php'); ?>
                </div>
                @section('content')
                    <?php
                    if ($opcion != "") {
                        include($opcion);
                    }
                    } else {
                    ?>
                    <script language="javascript" type="text/javascript">
                        window.onload = function() {
                            $(function(){
                                fn_logear();
                            });
                        }
                    </script>
                    <h3><a href="javascript: fn_logear();">Ingresar</a></h3>
                    <?php } ?>

                    <hr />
                @show
            </section>

    </div>
</div>
<div role="main" class="ui-content">

</div>
<!-- Footer -->
<footer id="footer">
    <?php /**<ul class="icons">
    <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
    <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
    <li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
    <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
    <li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
    <li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
    </ul>
     * / ?>
    <ul class="copyright">
        <li>&copy; Wagner Cadena. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        <?php if (reconoce('0,1,2')) { ?><li> <a href="javascript: fn_salir_user();">Salir</a></li><?php } ?>
    </ul>
</footer>
@section('action')
    <script type="text/javascript" language="javascript">
        <?php echo isset($_SESSION['MM_Funcion_activa']) ? $_SESSION['MM_Funcion_activa'] : ''  ?>
    </script>
@show
</body>
</html>
 */