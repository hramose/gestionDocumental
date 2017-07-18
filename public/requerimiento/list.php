<?php
if (!isset($_SESSION)) {
    session_start();
	$_SESSION['MM_Funcion_activa']="fn_requerimiento_list('".$_GET['tipo']."')";
}
require_once('../Connections/req_fun.php'); 
 require_once('../Connections/cyber.php'); 
  require_once('../Connections/util_3.php'); 
$rek = new Req_Controller($database_cyber, $cyber);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de requerimientos a resolver</title>
    </head>
    <body>
        <!--<h1>Lista de Requerimientos:</h1>-->
        <!--<pre>*<?php //print_r($_SESSION) ?>*</pre>-->
        <?php if ($_GET['tipo'] == 'darUsuarioSdeReq-yha441a') { ?>
			<?php if ($_SESSION['MM_UserGroup'] == 1) { ?>
                <h1>Mis requerimientos:</h1>
                <?php $d = $rek->darReq_en_proceso($_SESSION['MM_IDUsername'], 'ACTIV', 'TECNI',"darUsuarioSdeReq-yha441a") ?>	
            <?php } ?>
        <?php } ?>
        <?php if ($_GET['tipo'] == 'darUsuarioSdeReq-yha771a') { ?>
        <h1>Mis Solicitudes:</h1>
        <?php $d = $rek->darReq_en_proceso($_SESSION['MM_IDUsername'], 'ACTIV', 'SOLIC',"darUsuarioSdeReq-yha771a") ?>
        <?php } ?>
         <?php if ($_GET['tipo'] == 'darUsuarioSdeReq-Jkuioo') { ?>
        <h1>Requerimientos de mi equipo:</h1>
        <?php $d = $rek->darReq_en_proceso($_SESSION['MM_IDUsername'], 'ACTIV', 'SOLIC',"darUsuarioSdeReq-Jkuioo") ?>
        <?php } ?>
    </body>
</html>