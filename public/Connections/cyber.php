<?php
# FileName="Connection_php_mysql.htm"
# Type="mysql"
# HTTP="true"
$array_database = parse_ini_file("../soportem.ini", true);

$hostname_cyber = $array_database["DataBase"]["hostname_cyber"];
$database_cyber = $array_database["DataBase"]["database_cyber"];
$username_cyber = $array_database["DataBase"]["username_cyber"];
$password_cyber = $array_database["DataBase"]["password_cyber"];
$cyber = mysqli_connect($hostname_cyber, $username_cyber, $password_cyber) or die("Unable to connect to MySQL");
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
function conT($sql){
    return conectarseT($sql);
}

function insertT($sql){
    try {
        $conn = new PDO('mysql:host=localhost;dbname=wcadena_lara1', 'wcadena_lara1', 'wcadena_lara1');
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