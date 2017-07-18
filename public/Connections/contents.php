<?php
if (!isset($_SESSION)) {
    session_start();
}
echo '<pre>';
print_r($_SESSION);
print_r($_SERVER);
echo '</pre>';
?>
<body style="margin: 0px;">
    <table border="1" cellpadding="0" align="center">
        <tr>
            <td><p>&nbsp;</p>
                <p align="center">IT AviancaTaca Ecuador &amp; <br />
                    Disfrutamos nuestro trabajo y compartimos este sentimiento con nuestros    clientes y compañeros<br />
                    Gracias por utilizar nuestros servicios. </p>
                <div align="center">
                    <hr size="2" width="100%" align="center" />
                </div>
                <p align="center"><strong>Número de Service Request: <?php echo isset($_SESSION['id_peticion']) ? $_SESSION['id_peticion'] : ''; ?> </strong></p>
                <div align="center">
                    <hr size="2" width="100%" align="center" />
                </div>
                <p align="center">(Por favor, conserve este numero para futuras    consultas sobre esta requisición)<br />
                    Reciba un cordial saludo de la familia IT AviancaTaca Ecuador, por medio    de la presente le notificamos que su requisición de servicio con las    siguientes caracterásticas:<br />
                    <strong>GENERALES</strong></p>
                <ul type="disc">
                    <li>N&uuml;mero : <?php echo isset($_SESSION['id_peticion']) ? $_SESSION['id_peticion'] : ''; ?> </li>
                    <li>Estado : Open </li>
                    <li>Estacion:         QUITO </li>
                    <li>Usuario :         WAGNER </li>
                    <li>Mail : <a href="mailto:wagner.cadena@aviancataca.com">wagner.cadena@aviancataca.com</a></li>
                    <li>Fecha         Apertura : 14/03/2012         17:17:02 </li>
                </ul>
                <div align="center">
                    <hr size="2" width="100%" align="center" />
                </div>
                <p><strong>DETALLE :</strong></p>
                <ul type="disc">
                    <li>Problema:         PRUEBA </li>
                </ul>
                <ul type="disc">
                    <li>Su         requerimiento será atendido por : DAVID PADILLA </li>
                </ul>
                <p align="center"><img src="images/help-desk.jpg" alt="Help" width="284" height="231" border="0" id="_x0000_i1028" u2:shapes="_x0000_i1029" /></p></td>
        </tr>
    </table>
</body>

