<?php
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
    $updateSQL = sprintf("UPDATE Usuario SET Mai_Usuario=%s, Nom_Usuario=%s, Ape_Usuario=%s, pass=%s, descripcion=%s ,Tel_Usuario =%s ,Car_Usuario =%s WHERE Id_Usuario=%s", GetSQLValueString($_POST['user_usuario'], "text"), GetSQLValueString($_POST['user_nombre'], "text"), GetSQLValueString($_POST['user_apellido'], "text"), GetSQLValueString($_POST['user_pass'], "text"), GetSQLValueString($_POST['user_nivel'], "int"), GetSQLValueString($_POST['Tel_Usuario'], "text"), GetSQLValueString($_POST['Car_Usuario'], "text"), GetSQLValueString($_POST['user_id'], "int"));


    $Result1 = insertT($updateSQL);

    $updateGoTo = "list.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    //header(sprintf("Location: %s", $updateGoTo));
    echo "Actualizado Exitoso";
    exit;
}

$colname_rs_usuar = "-1";
if (isset($_POST['user_id'])) {
    $colname_rs_usuar = $_POST['user_id'];
}
// mysql_select_db($database_cyber, $cyber);
$query_rs_usuar = sprintf("SELECT Usuario.Id_Usuario,
       Usuario.Nom_Usuario,
       Usuario.Ape_Usuario,
       Usuario.Car_Usuario,
       Usuario.Mai_Usuario,
       Usuario.Tel_Usuario,
       Usuario.[name],
       pass,
       Usuario.descripcion
  FROM ChequerasCorporativas.Usuario Usuario WHERE Id_Usuario = %s", GetSQLValueString($colname_rs_usuar, "int"));
//$rs_usuar = mysql_query($query_rs_usuar, $cyber) or die(mysql_error());
$row_rs_usuar = conectarseU($query_rs_usuar);
//$totalRows_rs_usuar = mysql_num_rows($rs_usuar);
//echo $query_rs_usuar;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Archivos</title>
    </head>

    <body>
        <form action="javascript: fn_actualizar_user();" method="post" name="form1" id="form1">
        <!--<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">-->
            <table align="center">
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Email:</td>
                    <td><input type="text" name="user_usuario" value="<?php echo htmlentities($row_rs_usuar['Mai_Usuario'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Nombre:</td>
                    <td><input type="text" name="user_nombre" value="<?php echo htmlentities($row_rs_usuar['Nom_Usuario'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Apellido:</td>
                    <td><input type="text" name="user_apellido" value="<?php echo htmlentities($row_rs_usuar['Ape_Usuario'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Cargo:</td>
                    <td><input type="text" name="Car_Usuario" value="<?php echo htmlentities($row_rs_usuar['Car_Usuario'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Telefono:</td>
                    <td><input type="text" name="Tel_Usuario" value="<?php echo htmlentities($row_rs_usuar['Tel_Usuario'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Clave:</td>
                    <td><input type="password" name="user_pass" value="<?php echo htmlentities($row_rs_usuar['pass'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Nivel:</td>
                    <td><select name="user_nivel" class="form-control">
                            <option value="0" <?php if (!(strcmp(0, htmlentities($row_rs_usuar['descripcion'], ENT_COMPAT, 'utf-8')))) {
    echo "SELECTED";
} ?>>Basico</option>
                            <option value="1" <?php if (!(strcmp(1, htmlentities($row_rs_usuar['descripcion'], ENT_COMPAT, 'utf-8')))) {
    echo "SELECTED";
} ?>>Nivel 1</option>
                        </select></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">&nbsp;</td>
                    <td><input type="submit" value="Editar Cliente" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="javascript: fn_new_permisos('<?php echo $row_rs_usuar['Id_Usuario']; ?>');"> Permisos>></a></td>
                </tr>
            </table>
            <input type="hidden" name="MM_update" value="form1" />
            <input type="hidden" name="user_id" value="<?php echo $row_rs_usuar['Id_Usuario']; ?>" />
        </form>
        <p>&nbsp;</p>
    </body>
</html>
<?php
mysql_free_result($rs_usuar);
?>
