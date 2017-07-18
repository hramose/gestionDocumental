<?php
if (!isset($_SESSION)) {
    session_start();
    $_SESSION['MM_Funcion_activa'] = "fn_reportes_tot()";
}
require_once('../Connections/FormsHTML5.php');
$fm = new FormsHTML5();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reportes general</title>
    </head>
    <body>
        <SCRIPT>
            $(document).ready(function ($) {
                $("#accordion").accordion();
            });
        </SCRIPT>
        <?php $fm->campoG("fechaIniErt456", "Fecha de inicio dd-mm-yyyy", date('d-m-Y', strtotime('-4 week'))); ?>
        <?php $fm->campoG("fechaFinErt456", "Fecha de fin dd-mm-yyyy", gmdate('d-m-Y', time())); ?>

        <div class=demo>
            <div id=accordion>
                <h3>Reportes Generales</h3>
                <div>
                    <p>Ver Reporte 
                    <button onclick="fn_darreporte('/reporte2','h')">HTML</button> | 
                    <button onclick="fn_darreporte('/reporte2','x')">EXCEL</button> | 
                    <button onclick="fn_darreporte('/reporte2','p')">PDF</button> | 
                    <button onclick="fn_darreporte('/reporte2','pd')">Descarga PDF</button> | 
                   
                   </p>
                    
                </div>

            </div>
        </div><!-- End demo -->
        <!-- End demo-description -->
    </body>
</html>