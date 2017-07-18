<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Requerimiento</title>
    </head>    
    <body style="margin: 0px;">
        <table border="1" cellpadding="0" align="center">
            <tr>
                <td><p>&nbsp;</p>
                    <h1 align="center"><img src="images/conagopare-pichincha-superior.png" width="800" height="228" alt="Conagopare pichincha"></h1>
                    <div align="center">
                      <hr size="2" width="100%" align="center" />
                    </div>
                     
                    <p align="center"><strong>Tramite #<?php echo $id_peticion; ?> </strong></p>
                    <p align="center">(Por favor, conserve este numero para futuras    consultas sobre este requerimiento)</p>
                    <p align="center">Estado : Open </p>
                  <div align="center">
                        <hr size="2" width="100%" align="center" />
                    </div>
                    <p>Reciba un cordial saludo de Conagopare Pichincha, por medio de la presente le notificamos del ingreso de  su requisici&oacute;n de servicio con las siguientes caracter&iacute;sticas:
                    </p>
                    <ul type="disc">
                                            <li>Solicitante:         <?php echo $nombre_correo; ?> </li>
                                               <li>Fecha Apertura : <?php echo $fecha_pedido_corr; ?> </li>
                    </ul>
                    
                    <p>Requerimiento: <?php echo $titulo_corr; ?></p>
                    <p type="disc">
                        Observacion:<pre><?php echo $problema_corr; ?> </pre>
                    </p>
                    <ul type="disc">
                        <li>Su         requerimiento ser&aacute; atendido lo mas pronto <span title="<?php echo $tecnico_corr; ?>">posible</span> </li>
                    </ul>
                    <p>Siempre encaminados a un trabajo mancomunado a favor de nuestras parroquias.</p>
                    <p align="center"><img src="images/conagopare-pichincha-footer.png"  width="596" height="152"  alt="Conagopare Pichincha"></p></td>
            </tr>
        </table>
    </body>
</html>