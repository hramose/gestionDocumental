<?php
if ((isset($_REQUEST["tipo"])) && ($_REQUEST["tipo"] == "excel")){
header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("content-disposition: attachment;filename=Reporte.xls");
}
?>
<?php include("../Connections/rep_fun.php"); ?>
<?php include("../Connections/cyber.php"); ?>
<?php
$rep = new Rep_Controller($database_cyber, $cyber);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reportes Total</title>
    </head>
    <body>
        <?php
        $rep->get_rep_total_mes_anio();
        ?>
    </body>
</html>
