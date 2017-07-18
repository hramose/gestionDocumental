<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../Connections/cyber.php');
require_once('../Connections/util_3.php');
require_once('../Connections/cyber.php');
include('../Connections/MyLogPHP.php');
$log = new MyLogPHP();



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

$editFormAction =isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : '';
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
//print_r($_POST);
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    $log->info(print_r($_POST, true));

    $permisos = isset($_POST["permisos"]) ? $_POST["permisos"] : '';
    mysql_select_db($database_cyber, $cyber);
    $Result1 = mysql_query(sprintf("delete from tb_permisos where id_usuarios =%s;", GetSQLValueString($_POST['Id_Usuario'], "text")), $cyber) or die(mysql_error());
	$permisos_get_permisos_count=isset($_POST["permisos_get_permisos"]) ? $_POST["permisos_get_permisos"] : '';
    for ($i = 0; $i < $permisos_get_permisos_count; $i++) {
		if(isset($permisos[$i])){
        $insertSQL = sprintf("insert into tb_permisos (
   Id_Permiso
  ,id_usuarios
  ,permiso
) VALUES (
   %s -- Id_Permiso
  ,%s -- Id_Usuario
  ,%s -- permiso
)", GetSQLValueString($permisos[$i], "text"), GetSQLValueString(isset($_POST['Id_Usuario']) ? $_POST['Id_Usuario'] : '', "text"), GetSQLValueString('ver', "text")
        );
		$log->info($insertSQL);
        //echo  $insertSQL	
		
        	$Result1 = mysql_query($insertSQL, $cyber) or die(mysql_error());
		}
    }
    // mysql_select_db($database_cyber, $cyber);
    //$Result1 = mysql_query($insertSQL, $cyber) or die(mysql_error());

    $insertGoTo = "list.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        //$insertGoTo .= $_SERVER['QUERY_STRING'];
    }
    //header(sprintf("Location: %s", $insertGoTo));
    echo "Creado Exitoso";
    exit;
}
//-----------------------------------------------------------------
///permisos de tecnicos
//-----------------------------------------------------------------
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1tecnico")) {
    //print_r($_POST);
    $permisos = isset($_POST["permisos2"]) ? $_POST["permisos2"] : '';
    mysql_select_db($database_cyber, $cyber);
    $Result1 = mysql_query(sprintf("delete from tb_soport_departament_suarios where id_usuarios =%s;", GetSQLValueString($_POST['Id_Usuario'], "text")), $cyber) or die(mysql_error());
	$permisos_get_permisos_tecnico_count=isset($_POST["permisos_get_permisos_tecnico"]) ? $_POST["permisos_get_permisos_tecnico"] : '';
    for ($i = 0; $i < $permisos_get_permisos_tecnico_count; $i++) {
		if(isset($permisos[$i])){
        $insertSQL = sprintf("insert into tb_soport_departament_suarios (
   id_departamneto
  ,id_usuarios
) VALUES (
   %s -- id_departamneto
  ,%s -- Id_Usuario
)", GetSQLValueString($permisos[$i], "text"), GetSQLValueString(isset($_POST['Id_Usuario']) ? $_POST['Id_Usuario'] : '-7451123', "text")
        );
        //echo  $insertSQL				    ;
        $Result1 = mysql_query($insertSQL, $cyber) or die(mysql_error());
		}
    }
    // mysql_select_db($database_cyber, $cyber);
    //$Result1 = mysql_query($insertSQL, $cyber) or die(mysql_error());

    $insertGoTo = "list.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        //$insertGoTo .= $_SERVER['QUERY_STRING'];
    }
    //header(sprintf("Location: %s", $insertGoTo));
    echo "Creado Exitoso";
    exit;
}
//-----------------------------------------------------------------
///fin permisos de tecnicos
//-----------------------------------------------------------------
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Permisos Usuarios</title>
    </head>
    <body>
        <script type="text/javascript">
            $(document).ready(function ($) {
                $(".multiplexsder12").multiselect();
            });
        </script>
        <form action="javascript: fn_ingresar_permisos();" method="post" name="form1" id="form1">
            <?php get_permisos("permisos", (isset($_REQUEST['Id_Usuario']) ? $_REQUEST['Id_Usuario'] : ''), $database_cyber, $cyber) ?>	
            <input type="submit" value="Cargar permisos" />
            <input type="hidden" name="MM_insert" value="form1" />
            <input type="hidden" name="Id_Usuario" value="<?php echo isset($_POST['Id_Usuario']) ? $_POST['Id_Usuario'] : ''; ?>" />




        </form>
        <?php if ((isset($_REQUEST['user_nivel']) ? $_REQUEST['user_nivel'] : '') == '1') { ?>
            <form action="javascript: fn_ingresar_permiso_tecnico();" method="post" name="form1tecnico" id="form1tecnico">
                <?php get_permisos_tecnico("permisos2", $_REQUEST['Id_Usuario'], $database_cyber, $cyber) ?>	
                <input type="submit" value="Cargar permisos" />
                <input type="hidden" name="MM_insert" value="form1tecnico" />
                <input type="hidden" name="Id_Usuario" value="<?php echo isset($_POST['Id_Usuario']) ? $_POST['Id_Usuario'] : ''; ?>" />
            </form>
        <?php } ?>
    </body>
</html>