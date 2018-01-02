<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../Connections/req_fun.php');
require_once('../Connections/user_fun.php');
require_once('../Connections/cyber.php');
$rek = new Req_Controller();
$id_peticion=isset($_REQUEST['id_peticion']) ? $_REQUEST['id_peticion'] : '-1';
$id_usuarios=isset($_REQUEST["id_usuarios"]) ? $_REQUEST["id_usuarios"] : '-1';
$estado=isset($_REQUEST["estado"]) ? $_REQUEST["estado"] : '-1';

$p = $rek->getPEticion($id_peticion);

$user = new Usuario_Controller($database_cyber, $cyber);

if ((isset($_REQUEST["MM_update"])) && ($_REQUEST["MM_update"] == "fn_asigname")) {
    $rek->setUsuario_o_tecnico_en_REQ($id_peticion, $id_usuarios, 'TECNI', $estado);
    exit;
}
?>