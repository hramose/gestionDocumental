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
    $password = $_POST['pass'];
    $MM_fldUserAuthorization = "user_nivel";
    $MM_redirectLoginSuccess = "../index.php";
    $MM_redirectLoginFailed = "../error.php?mensaje=Usuario o Clave incorrecta";
    $MM_redirecttoReferrer = false;


    $LoginRS__query = sprintf("  SELECT tb_usuarios.id_usuarios  as user_id,
       tb_usuarios.usuario,
       tb_usuarios.clave user_pass,
       concat(tb_usuarios.nombre , ' ' ,
       tb_usuarios.apellido) user_usuario,
       tb_usuarios.correo_corporativo,
       tb_usuarios.correo_personal,
       tb_usuarios.telefono,
       tb_usuarios.celular_corporativo,
       tb_usuarios.celular_personal,
       tb_usuarios.fecha_insert,
       tb_usuarios.fecha_update,
       tb_usuarios.estado,
       tb_usuarios.user_nivel
  FROM  tb_usuarios tb_usuarios WHERE usuario=%s AND clave=%s", GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));

    $LoginRS = conectarseU($LoginRS__query);
    $loginFoundUser = count($LoginRS);
    if($loginFoundUser>0){
        $loginStrId = $LoginRS['user_id'];
        $loginNombre_Usuario = $LoginRS['user_usuario'];
        $loginStrGroup  =   $LoginRS['user_nivel'];

        if (PHP_VERSION >= 5.1) {
            session_regenerate_id(true);
        } else {
            session_regenerate_id();
        }
        $_SESSION['MM_Username'] = $loginUsername;
        $_SESSION['MM_IDUsername'] = $loginStrId;
        $_SESSION['MM_UserGroup'] = $loginStrGroup;
        $_SESSION['MM_UserNameCompleto'] = $loginNombre_Usuario;
        $_SESSION['permiso'] = get_permisos_inicio_secion($loginStrId, $database_cyber, $cyber);

        if (isset($_SESSION['PrevUrl']) && false) {
            $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
        }
        header("Location: " . $MM_redirectLoginSuccess);
    } else {
        header("Location: " . $MM_redirectLoginFailed);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login de sistema</title>
    </head>
    <body>
        <form action="<?php echo $loginFormAction; ?>" method="POST" id="login" name="login">
            <div data-role="fieldcontain">
                <label for="usuario" class="ui-hidden-accessible">Usuario:</label>
                <input type="text" name="usuario" id="usuario" value="" placeholder="Usuario" autofocus required class="form-control"  />
            </div>	<br />
            <div data-role="fieldcontain">
                <label for="pass" class="ui-hidden-accessible">Clave</label>
                <input name="pass" type="password" id="pass" value="" placeholder="Clave" required class="form-control" />
            </div>	
            <br />
            <input type="submit" name="button" id="button" value="Ingresar" class="form-control" />

        </form>
        <a href="javascript: fn_recuperar_log0()">Perdi mi clave &gt;&gt;</a>
    </body>
</html>