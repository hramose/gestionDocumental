<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../Connections/histo_fun.php');
require_once('../Connections/cyber.php');
$his = new Historial_Controller($database_cyber, $cyber);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HIstorial</title>
    </head>
    <body>
        <?php $his->ver_historial_cambio_actividades($_REQUEST['id_peticion']); ?>
    </body>
</html>