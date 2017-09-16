<?php
require_once('../Connections/cyber.php');
require_once('../Connections/envia_correo_recupera_clave.php');

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


// *** Validate request to login to this site.
if (!isset($_SESSION)) {
    session_start();
}

require_once('../Connections/cyber.php');
require_once('../Connections/util_3.php');
require_once('../Connections/cyber.php');
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
    $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
    $loginUsername = $_POST['usuario'];
    //$password=md5($_POST['pass']);
    $correo = $_POST['correo'];
    $MM_fldUserAuthorization = "user_nivel";
    $MM_redirectLoginSuccess = "../index.php";
    $MM_redirectLoginFailed = "../error.php?mensaje=Usuario o Correo incorrecto";
    $MM_redirecttoReferrer = false;


    $LoginRS__query = sprintf("  SELECT tb_usuarios.id_usuarios  as user_id,
       tb_usuarios.usuario,
       tb_usuarios.clave user_pass,
       tb_usuarios.nombre + ' ' +
       tb_usuarios.apellido user_usuario,
       tb_usuarios.correo_corporativo,
       tb_usuarios.correo_personal,
       tb_usuarios.telefono,
       tb_usuarios.celular_corporativo,
       tb_usuarios.celular_personal,
       tb_usuarios.fecha_insert,
       tb_usuarios.fecha_update,
       tb_usuarios.estado,
       tb_usuarios.user_nivel
  FROM tb_usuarios tb_usuarios WHERE usuario=%s AND correo_corporativo=%s", GetSQLValueString($loginUsername, "text"), GetSQLValueString($correo, "text"));
//echo   $LoginRS__query;

    $loginFoundUser =conectarseU($LoginRS__query);
    if ($loginFoundUser) {
        $para = $loginFoundUser['correo_corporativo'];
        $nombre_para = $loginFoundUser['user_usuario'];
        $usuario = $loginFoundUser['usuario'];
        $clave = $loginFoundUser['user_pass'];
        header('Refresh: 3; URL=' . $MM_redirectLoginSuccess);
        echo '<h1>';
        envia_correo($para, $nombre_para, $usuario, $clave);
        echo '</h1>';
        //header("Location: " . $MM_redirectLoginSuccess );	
        exit;
    } else {
        header("Location: " . $MM_redirectLoginFailed);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Recuperar Clave</title>
    </head>
    <body>
        <form action="<?php echo $loginFormAction; ?>" method="POST" id="login" name="login">
            <div data-role="fieldcontain">
                <label for="usuario" class="ui-hidden-accessible">Usuario:</label>
                <input type="text" name="usuario" id="usuario" value="" placeholder="Usuario" autofocus required  />
            </div>
            <div data-role="fieldcontain">
                <label for="correo" class="ui-hidden-accessible">Correo Corporativo:</label>
                <input type="text" name="correo" id="correo" value="" placeholder="Correo Corporativo" required  />

            </div>
            <input type="submit" name="button" id="button" value="Recuperar Clave" />
        </form>
    </body>
</html>