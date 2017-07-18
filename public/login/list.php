<?php /*
if (!isset($_SESSION)) {
    session_start();
}
require_once('../Connections/cyber.php'); 
if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        //$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }

}

mysql_select_db($database_cyber, $cyber);
$query_rs_usuarios = "SELECT Usuario.Id_Usuario as user_id,
       Usuario.Nom_Usuario as user_nombre,
       Usuario.Ape_Usuario as user_apellido,
       Usuario.Car_Usuario,
       Usuario.Mai_Usuario,
       Usuario.Tel_Usuario,
       Usuario.[name] as user_usuario,
       Usuario.pass,
       Usuario.descripcion as user_nivel
  FROM ChequerasCorporativas.Usuario Usuario ORDER BY name ASC";
//echo $query_rs_usuarios;
$rs_usuarios = mysql_query($query_rs_usuarios, $cyber) or die(mysql_error());
$row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
$totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
?>
<?php require_once('../Connections/cyber.php'); ?>
<?php require_once('../Connections/cyber.php'); ?>
<?php require_once('../Connections/util_3.php'); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>usuarios</title>
    </head>

    <body>
        <a href="javascript: fn_new_user();">Nuevo>></a>
        <table border="1" align="center">
            <tr>    
                <td>Usuario</td>
                <td>Nombre</td>
                <td>Apellido</td>    
                <td>Nivel</td>
                <td>Edicion</td>
            </tr>
<?php do { ?>
                <tr>
                    <td title="Usuario #<?php echo $row_rs_usuarios['user_id']; ?>"><?php echo $row_rs_usuarios['user_usuario']; ?></td>
                    <td><?php echo $row_rs_usuarios['user_nombre']; ?></td>
                    <td><?php echo $row_rs_usuarios['user_apellido']; ?></td>
                    <td><?php echo $row_rs_usuarios['user_nivel']; ?></td>
                    <td> <?php if (get_autorizacion_si_no($_SESSION['permiso'], 30)) { ?><a href="javascript: fn_user_modificar(<?php echo $row_rs_usuarios['user_id']; ?>);">Edit</a> <a href="javascript: fn_user_eliminar(<?php echo $row_rs_usuarios['user_id']; ?>);">Borrar</a><?php } else {
        echo "No tiene permiso";
    } ?></td>
                </tr>
<?php } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios)); ?>
        </table>
    </body>
</html>
<?php
mysql_free_result($rs_usuarios);*/
?>
