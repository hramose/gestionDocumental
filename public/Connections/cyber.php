<?php
# FileName="Connection_php_mysql.htm"
# Type="mysql"
# HTTP="true"
$array_database = parse_ini_file("../soportem.ini", true);

$hostname_cyber = $array_database["DataBase"]["hostname_cyber"];
$database_cyber = $array_database["DataBase"]["database_cyber"];
$username_cyber = $array_database["DataBase"]["username_cyber"];
$password_cyber = $array_database["DataBase"]["password_cyber"];
$cyber = mysql_pconnect($hostname_cyber, $username_cyber, $password_cyber) or trigger_error(mysql_error(),E_USER_ERROR);
?>