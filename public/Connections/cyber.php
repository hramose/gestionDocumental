<?php
# FileName="Connection_php_mysql.htm"
# Type="mysql"
# HTTP="true"
$array_database = parse_ini_file("../soportem.ini", true);

$hostname_cyber = $array_database["DataBase"]["hostname_cyber"];
$database_cyber = $array_database["DataBase"]["database_cyber"];
$username_cyber = $array_database["DataBase"]["username_cyber"];
$password_cyber = $array_database["DataBase"]["password_cyber"];
//$cyber = mysql_pconnect($hostname_cyber, $username_cyber, $password_cyber) or trigger_error(mysql_error(),E_USER_ERROR);
$cyber = null;

function conectarseU($sql){
    $pdo = new PDO('mysql:host=localhost;dbname=wcadena_lara1', 'wcadena_lara1', 'wcadena_lara1');
    $sentencia = $pdo->query($sql);
    $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
    return $fila;
}
function conectarseT($sql){
    $pdo = new PDO('mysql:host=localhost;dbname=wcadena_lara1', 'wcadena_lara1', 'wcadena_lara1');
    $sentencia = $pdo->query($sql);
    $fila = $sentencia->fetchAll();
    return $fila;
}

function dd($row_rs_usuarios){
    echo "<pre>";
    echo print_r($row_rs_usuarios,false);
    echo "</pre>";
}

?>