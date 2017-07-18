<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../Connections/req_fun.php');
require_once('../Connections/user_fun.php');
require_once('../Connections/cyber.php');

$rek = new Req_Controller($database_cyber, $cyber);
$use = new Usuario_Controller($database_cyber, $cyber);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar Usuarios</title>
    </head>
    <body>
        <?php
        if ((isset($_REQUEST["darUsuarioSdeReq"])) && ($_REQUEST["darUsuarioSdeReq"] == "darUsuarioSdeReq")) {
            $rek->darUsuarioSdeReq($_REQUEST['id_peticion'], 'TECNI');
            exit;
        }

        if ((isset($_REQUEST["dar_usuario_solic"])) && ($_REQUEST["dar_usuario_solic"] == "dar_usuario_solic")) {
            $use->dar_lista_usuarios_accion('alert');
            exit;
        }

        if ((isset($_REQUEST["dar_user_solic_tlef"])) && ($_REQUEST["dar_user_solic_tlef"] == "dar_user_solic_tlef")) {
            $use->dar_lista_usuarios_accion('fn_cambiarUser_solic_telefonoEcho');
            exit;
        }

        if ((isset($_REQUEST["dar_tecnico_solic"])) && ($_REQUEST["dar_tecnico_solic"] == "dar_tecnico_solic")) {
            $use->dar_lista_usuarios_accion('fn_cambiarSolictecnicEcho');
            exit;
        }

        if ((isset($_REQUEST["aumentarusuariopedido"])) && ($_REQUEST["aumentarusuariopedido"] == "aumentarusuariopedido")) {
            $use->setTb_pedido_usuarios($_REQUEST['id_peticion'], $_REQUEST['id_usuarios'], $_REQUEST['tipo'], $_REQUEST['estado'], $_REQUEST['fecha_ini'], $_REQUEST['fecha_fin'], $_REQUEST['total'], $_REQUEST['descripcion']);
//echo '<pre>'.print_r($_REQUEST,true).'</pre>';
            exit;
        }

        if ((isset($_REQUEST["set_tecnico_sol"])) && ($_REQUEST["set_tecnico_sol"] == "set_tecnico_sol")) {
            $rek->darUsuarioSdeReq($_REQUEST['id_peticion'], 'TECNI');
            exit;
        }

        if ((isset($_REQUEST["kitar_pedido_ususrior"])) && ($_REQUEST["kitar_pedido_ususrior"] == "kitar_pedido_ususrior")) {
            $use->KitarTb_pedido_usuarios($_REQUEST["id_pedido_usuarios"]);
            exit;
        }
        ?>
    </body>
</html>