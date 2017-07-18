<?php
require_once('../Connections/user_fun.php');
require_once('../Connections/cyber.php');
$uss = new Usuario_Controller($database_cyber, $cyber);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Usuarios del sistema</title>
    </head>
    <body>
        <h1>Usuarios de Sistema </h1>
        <p><a href="javascript: fn_usuarios_new()">Nuevo Usuario&gt;&gt;</a></p>
        <p>
            <?php
            echo $uss->dar_lista_usuario();
            ?></p>
    </body>
</html>