<?php
require_once('../Connections/user_fun.php');
require_once('../Connections/cyber.php');
require_once('../Connections/FormsHTML5.php');
$fm = new FormsHTML5();
$uss = new Usuario_Controller($database_cyber, $cyber);
$val2acction_sw23 = isset($_REQUEST['acction_sw23']) ? $_REQUEST['acction_sw23'] : '';
if ($val2acction_sw23 == 'in_new') {
    $uss->setUsaurio($_REQUEST['usuario'], $_REQUEST['clave'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['correo_corporativo'], $_REQUEST['correo_personal'], $_REQUEST['telefono'], $_REQUEST['celular_corporativo'], $_REQUEST['celular_personal'], $_REQUEST['user_nivel']);
    ;
    exit;
}
if ($val2acction_sw23 == 'edit_user') {
//	echo "<pre>".print_r($_REQUEST,true)."</pre>";
    $uss->editUsaurio($_REQUEST['usuario'], $_REQUEST['clave'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['correo_corporativo'], $_REQUEST['correo_personal'], $_REQUEST['telefono'], $_REQUEST['celular_corporativo'], $_REQUEST['celular_personal'], $_REQUEST['user_nivel'], $_REQUEST['id_usuarios']);

    ;
    exit;
}

$mensaje_evento = "";
$tipo_accion = '';
$u;
$tipo_val=isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : 'numastico';
if ($tipo_val == 'new') {
    $mensaje_evento = "Nuevo Usuario";
    $tipo_accion = 'in_new';
} elseif ($tipo_val == 'edit') {
    $mensaje_evento = "Editar Usuario";
    $tipo_accion = 'edit_user';
    $u = $uss->getUsaurio($_REQUEST['id_usuarios']);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevos Usuarios</title>
    </head>
    <body>
        <h1><?php echo $mensaje_evento ?></h1>
        <form action="javascript: fn_user_new_edit();" method="post" name="formuserr" id="formuserr">
             <?php $fm->campoG("usuario","Usuario",(isset($u['usuario']) ? $u['usuario'] : ''),true);?>
             <?php $fm->campoP("clave","Clave",(isset($u['clave']) ? $u['clave'] : ''),true);?>
             <?php $fm->campoG("nombre","Nombre",(isset($u['nombre']) ? $u['nombre'] : ''),true);?>
             <?php $fm->campoG("apellido","Apellido",(isset($u['apellido']) ? $u['apellido'] : ''),true);?>
             
             <?php $fm->campoG("correo_corporativo","Correo Corporativo",(isset($u['correo_corporativo']) ? $u['correo_corporativo'] : ''),true);?>
             <?php $fm->campoG("correo_personal","Correo Personal",(isset($u['correo_personal']) ? $u['correo_personal'] : ''),true);?>
             <?php $fm->campoG("telefono","Telefono",(isset($u['telefono']) ? $u['telefono'] : ''),true);?>
             
             <?php $fm->campoG("celular_corporativo","Celular Corporativo",(isset($u['celular_corporativo']) ? $u['celular_corporativo'] : ''),true);?>
             <?php $fm->campoG("celular_personal","Celular Personal",(isset($u['celular_personal']) ? $u['celular_personal'] : ''),true);?>
             <div data-role="fieldcontain">                               <label for="user_nivel" class="ui-hidden-accessible">Tipo Usuario:</label>
                            <?php if ($tipo_val == 'new') { ?>Usuario<input name="user_nivel" type="hidden" id="user_nivel" value="0" placeholder="Tipo Usuario" /><?php } elseif ($tipo_val == 'edit') {
    $uss->get_user_nivel('user_nivel', $u['user_nivel']); ?><br /><a href="javascript: fn_new_permisos('<?php echo (isset($u['id_usuarios']) ? $u['id_usuarios'] : ''); ?>','<?php echo (isset($u['user_nivel']) ? $u['user_nivel'] : ''); ?>');"> Permisos>></a><?php } ?><br>             
            </div>
             <input name="" type="submit" value="Ingrese datos" /><input name="acction_sw23" type="hidden" id="acction_sw23" value="<?php echo $tipo_accion ?>" />
            <input name="id_usuarios" type="hidden" id="id_usuarios" value="<?php echo isset($_REQUEST['id_usuarios']) ? $_REQUEST['id_usuarios'] : '' ?>" />
            
        </form>
    </body>
</html>