<?php
//initialize the session
if (!isset($_SESSION)) {
    session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF'] . "?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")) {
    $logoutAction .="&" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) && ($_GET['doLogout'] == "true")) {
    //to fully log out a visitor we need to clear the session varialbles
    $_SESSION['MM_Username'] = NULL;
    $_SESSION['MM_UserGroup'] = NULL;
    $_SESSION['MM_IDUsername'] = NULL;
    $_SESSION['PrevUrl'] = NULL;
    $_SESSION['MM_Funcion_activa'] = NULL;
    $_SESSION['MM_UserNameCompleto'] = NULL;
    $_SESSION['permiso'] = NULL;

    $_SESSION['id_peticion'] = NULL;
    $_SESSION['estacion_s'] = NULL;
    $_SESSION['nombre_correo'] = NULL;
    $_SESSION['mail_req_corr'] = NULL;
    $_SESSION['fecha_pedido_corr'] = NULL;
    $_SESSION['titulo_corr'] = NULL;
    $_SESSION['problema_corr'] = NULL;
    $_SESSION['tecnico_corr'] = NULL;
    $_SESSION['tecnico_user_id'] = NULL;
    $_SESSION['tecnico_user'] = NULL;


    unset($_SESSION['MM_Username']);
    unset($_SESSION['MM_UserGroup']);
    unset($_SESSION['MM_IDUsername']);
    unset($_SESSION['PrevUrl']);
    unset($_SESSION['MM_Funcion_activa']);
    unset($_SESSION['MM_UserNameCompleto']);
    unset($_SESSION['permiso']);

    unset($_SESSION['id_peticion']);
    unset($_SESSION['estacion_s']);
    unset($_SESSION['nombre_correo']);
    unset($_SESSION['mail_req_corr']);
    unset($_SESSION['fecha_pedido_corr']);
    unset($_SESSION['titulo_corr']);
    unset($_SESSION['problema_corr']);
    unset($_SESSION['tecnico_corr']);
    unset($_SESSION['tecnico_user_id']);
    unset($_SESSION['tecnico_user']);

    $logoutGoTo = "../index.php";
    if ($logoutGoTo) {
        header("Location: $logoutGoTo");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Salir de sistema</title>
    </head>
    <body>
        <center><a href="<?php echo $logoutAction ?>" class="btn btn-default navbar-btn">Salir del sistema</a></center>
    </body>
</html>