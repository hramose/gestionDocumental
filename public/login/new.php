<?php require_once('../Connections/cyber.php'); ?>
<?php
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    $insertSQL = sprintf("INSERT INTO Usuario (name, Nom_Usuario, Ape_Usuario, pass, descripcion,Car_Usuario,Mai_Usuario,Tel_Usuario) VALUES (%s, %s, %s, %s, %s ,%s, %s, %s)", GetSQLValueString($_POST['user_usuario'], "text"), GetSQLValueString($_POST['user_nombre'], "text"), GetSQLValueString($_POST['user_apellido'], "text"), GetSQLValueString($_POST['user_pass'], "text"), GetSQLValueString($_POST['user_nivel'], "int"), GetSQLValueString($_POST['Car_Usuario'], "text"), GetSQLValueString($_POST['Mai_Usuario'], "text"), GetSQLValueString($_POST['Tel_Usuario'], "text"));


    $Result1 = insertT($insertSQL);

    $insertGoTo = "list.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }
    //header(sprintf("Location: %s", $insertGoTo));
    echo "Creado Exitoso";
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Usuario</title>
    </head>
    <body>
        <form action="javascript: fn_agregar_user();" method="post" name="form1" id="form1">
        <!--<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">-->
            <table align="center">
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Usuario(Con el que va ingresar):</td>
                    <td><input type="text" name="user_usuario" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Nombre:</td>
                    <td><input type="text" name="user_nombre" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Apellido:</td>
                    <td><input type="text" name="user_apellido" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Clave:</td>
                    <td><input type="password" name="user_pass" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Cargo:</td>
                    <td><input type="text" name="Car_Usuario" value="" size="32" /></td>
                </tr>    
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">E-MaiL:</td>
                    <td><input type="text" name="Mai_Usuario" value="" size="32" /></td>
                </tr>    
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Telefono:</td>
                    <td><input type="text" name="Tel_Usuario" value="" size="32" /></td>
                </tr>        
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Nivel:</td>
                    <td><select name="user_nivel" class="form-control">
                            <option value="0" <?php if (!(strcmp(0, ""))) {
    echo "SELECTED";
} ?>>Basico</option>        
                        </select></td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">&nbsp;</td>
                    <td><input type="submit" value="Nuevo Usuario" /></td>
                </tr>
            </table>
            <input type="hidden" name="MM_insert" value="form1" />
        </form>
        <p>&nbsp;</p>
    </body>
</html>