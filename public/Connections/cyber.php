<?php
# FileName="Connection_php_mysql.htm"
# Type="mysql"
# HTTP="true"
$array_database = parse_ini_file("../soportem.ini", true);

$hostname_cyber = $array_database["DataBase"]["hostname_cyber"];
$database_cyber = $array_database["DataBase"]["database_cyber"];
$username_cyber = $array_database["DataBase"]["username_cyber"];
$password_cyber = $array_database["DataBase"]["password_cyber"];

$cyber = null;

function conectarseU($sql){

    $array_database = parse_ini_file("../soportem.ini", true);

    $hostname_cyber = $array_database["DataBase"]["hostname_cyber"];
    $database_cyber = $array_database["DataBase"]["database_cyber"];
    $username_cyber = $array_database["DataBase"]["username_cyber"];
    $password_cyber = $array_database["DataBase"]["password_cyber"];

    $pdo = new PDO('mysql:host='.$hostname_cyber.';dbname='.$database_cyber, $username_cyber, $password_cyber);
    $sentencia = $pdo->query($sql);
    $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
    return $fila;
}
function conectarseT($sql){
    $array_database = parse_ini_file("../soportem.ini", true);

    $hostname_cyber = $array_database["DataBase"]["hostname_cyber"];
    $database_cyber = $array_database["DataBase"]["database_cyber"];
    $username_cyber = $array_database["DataBase"]["username_cyber"];
    $password_cyber = $array_database["DataBase"]["password_cyber"];

    $pdo = new PDO('mysql:host='.$hostname_cyber.';dbname='.$database_cyber, $username_cyber, $password_cyber);
    $sentencia = $pdo->query($sql);
    $fila = $sentencia->fetchAll();
    return $fila;
}
function conT($sql){
    return conectarseT($sql);
}

function insertT($sql){
    try {
        $array_database = parse_ini_file("../soportem.ini", true);

        $hostname_cyber = $array_database["DataBase"]["hostname_cyber"];
        $database_cyber = $array_database["DataBase"]["database_cyber"];
        $username_cyber = $array_database["DataBase"]["username_cyber"];
        $password_cyber = $array_database["DataBase"]["password_cyber"];

        $conn = new PDO('mysql:host='.$hostname_cyber.';dbname='.$database_cyber, $username_cyber, $password_cyber);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*$sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";*/
        // use exec() because no results are returned
        $conn->exec($sql);
        //echo "New record created successfully";
        $conn = null;
        return true;
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
        $conn = null;
        return false;
    }
}

function dd($row_rs_usuarios){
    echo "<pre>";
    echo print_r($row_rs_usuarios,false);
    echo "</pre>";
}

?>