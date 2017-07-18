<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../Connections/req_fun.php');
require_once('../Connections/cyber.php');

$rek = new Req_Controller($database_cyber, $cyber);


if ((isset($_REQUEST["MM_insert"])) && ($_REQUEST["MM_insert"] == "formSolucion")) {
    //$id_usuarios,$id_peticion,$resolucion,$solucion
    $rek->set_solucion($_SESSION['MM_IDUsername'], $_REQUEST['id_peticion'], $_REQUEST['resolucion'], $_REQUEST['solucion']);
    exit;
}
if ((isset($_REQUEST["MM_update"])) && ($_REQUEST["MM_update"] == "formSolucion")) {
    //$id_usuarios,$id_peticion,$resolucion,$solucion
    $rek->editSolucion($_SESSION['MM_IDUsername'], $_REQUEST['id_peticion'], $_REQUEST['resolucion'], $_REQUEST['solucion']);
    exit;
}
$s = $rek->getSolucion($_REQUEST['id_peticion']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Solucion Resolucion</title>
    </head>
    <body>
        <h1><?php
            if (count($s) <= 1) {
                echo 'Insertar Solucion';
            } else {
                echo 'Actualizar Solucion';
            }
            ?></h1>            
        <form action="javascript: <?php
        if (count($s) <= 1) {
            echo 'fn_edit_solucion('.$_REQUEST['id_peticion'].')';
        } else {
            echo 'fn_set_solucion('.$_REQUEST['id_peticion'].')';
        }
        ?>;" method="post" name="formSolucion" id="formSolucion">
            <div data-role="fieldcontain">                               <label for="resolucion" class="ui-hidden-accessible">Resolución(Mensaje enviado a usuario):</label>
                <div class="12u">
                                <textarea name="resolucion" id="resolucion" placeholder="Resolución" rows="6" required class="form-control"><?php echo $s['resolucion'] ?></textarea> 
                </div>      
            </div>

            <div data-role="fieldcontain">                               <label for="solucion" class="ui-hidden-accessible">Solución(Resultados Alcanzados):</label>
                <div class="12u">
                                <textarea name="solucion" id="solucion" placeholder="Solución" rows="6" required class="form-control"><?php echo $s['solucion'] ?></textarea> 
                </div>      
            </div>
            <input name="id_peticion" id="id_peticion" type="hidden" value="<?php echo isset($_REQUEST['id_peticion']) ? $_REQUEST['id_peticion'] : ''; ?>" />

            <input name="" type="submit" value="Guardar" />

            <input type="hidden" name="<?php
            if (count($s) <= 1) {
                echo 'MM_insert';
            } else {
                echo 'MM_update';
            }
            ?>" value="formSolucion" />
        </form>
    </body>
</html>