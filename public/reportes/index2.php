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
        <?php $fm->campoG("fechaIniErt456", "Fecha de inicio dd/mm/yyyy", date('d/m/Y', strtotime('-1 week'))); ?>
        <?php $fm->campoG("fechaFinErt456", "Fecha de fin dd/mm/yyyy", gmdate('d/m/Y', time())); ?>

        <div class=demo>
            <div id=accordion>
                <h3>Reportes Generales</h3>
                <div>
                    <p>Ver Reporte <a target="_blank" href="javascript: darreporte('reportes/rep_total.php','h')">Html</a> | <a target="_blank"  href="javascript:darreporte('reportes/rep_total.php','x')"  >Excel</a></p>
                    <p>Ver Reporte pie <a target="_blank" href="javascript: darreporte('reportes/pie2.php','h')" >Html</a> | <a target="_blank"  href="javascript:darreporte( 'reportes/pie2.php','e')" >Excel</a></p>
                </div>

            </div>
        </div><!-- End demo -->
        <!-- End demo-description -->
    </body>
</html>