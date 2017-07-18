<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cargar Archivos</title>

        <!-- jQuery and jQuery UI (REQUIRED) -->
        <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

        <!-- elFinder CSS (REQUIRED) -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/elfinder.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">

        <!-- elFinder JS (REQUIRED) -->
        <script type="text/javascript" src="js/elfinder.min.js"></script>

        <!-- elFinder Basic Auth JS -->
        <script src="js/elfinderBasicAuth.js"></script>

        <!-- elFinder translation (OPTIONAL) -->
        <script type="text/javascript" src="js/i18n/elfinder.es.js"></script>

        <?php echo (isset($_REQUEST['opcion2ws']) ? $_REQUEST['opcion2ws'] : '') ?>
        <?php $_SESSION['opcion2ws'] = (isset($_REQUEST['opcion2ws']) ? $_REQUEST['opcion2ws'] : '') ?>
		
        <!-- elFinder initialization (REQUIRED) -->
        <script type="text/javascript" charset="utf-8">
            $().ready(function () {
                var elf = $('#elfinder').elfinder({
                    url: 'php/connector.php?target=<?php echo (isset($_REQUEST['target']) ? $_REQUEST['target'] : '') ?>?opcion2ws=<?php echo (isset($_REQUEST['opcion2ws']) ? $_REQUEST['opcion2ws'] : '') ?>', // connector URL (REQUIRED)
                    lang: 'es',             // language (OPTIONAL)
                }).elfinder('instance');
            });
        </script>
    </head>
    <body>

        <!-- Element where elFinder will be created (REQUIRED) -->
        <div id="elfinder"></div>

    </body>
</html>
