<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="{!! trans("view_larevel.sistemadedocumentacionconagoparepichincha")!!}">
    <meta name="author" content="wagner cadena">
    <title>@section('titulo') {!! trans("view_larevel.sistemadedocumentacionconagoparepichincha")!!}@show</title>
    <link rel="icon" type="image/png" href="{{ asset('/conagopare.png') }}">


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/sticky-footer.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="{{ asset('/js/ie8-responsive-file-warning.js') }}"></script><![endif]-->
    <script src="{{ asset('/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--Angularjs1.6 ini-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular.min.js"></script>
    <!--Angularjs1.6 fin-->
</head>

<body>

<!-- Begin page content -->
<div class="container">
    @section('contenth')
        <header class="page-header">
        <h1>{!! trans("view_larevel.sistemadedocumentacionconagoparepichincha")!!}</h1>
        </header>
    @show
    @section('content')
        <p class="lead">Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS.</p>
        <p>Use <a href="../sticky-footer-navbar">the sticky footer with a fixed navbar</a> if need be, too.</p>
    @show
</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted"><strong>{!! trans("view_larevel.copyright")!!}&copy; 2015 <a href="http://www.ecuatask.com">Wagner Cadena</a>.</strong> {!! trans("view_larevel.allrightsreserved")!!}.</p>
    </div>
</footer>


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('/js/ie10-viewport-bug-workaround.js') }}"></script>
</body>
</html>
