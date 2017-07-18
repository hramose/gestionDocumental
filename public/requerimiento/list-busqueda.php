<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../Connections/req_fun.php');
require_once('../Connections/cyber.php');
require_once('../Connections/util_3.php');

$rek = new Req_Controller($database_cyber, $cyber);
$campo = $_REQUEST['campo'];
$busqueda_parametro = $_REQUEST['busqueda_parametro'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de requerimientos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>
        <?php $d = $rek->darReq_busqueda($campo, $busqueda_parametro) ?>
           
   
    
     </body>
</html>