<?php
if (!isset($_SESSION)) {
    session_start();
}
include("class.phpmailer.php");
include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

function envia_correo($id_peticion, $para, $nombre_para) {
	$array_correo = parse_ini_file("../soportem.ini", true);
    $mail = new PHPMailer();
	
	$estacion_s =(isset($_SESSION['estacion_s']) ? $_SESSION['estacion_s'] : '');;
	$fecha_pedido_corr =(isset($_SESSION['fecha_pedido_corr']) ? $_SESSION['fecha_pedido_corr'] : '');;
	$nombre_correo =(isset($_SESSION['nombre_correo']) ? $_SESSION['nombre_correo'] : '');;
	$mail_req_corr =(isset($_SESSION['mail_req_corr']) ? $_SESSION['mail_req_corr'] : '');;
	$fecha_pedido_corr =(isset($_SESSION['fecha_pedido_corr']) ? $_SESSION['fecha_pedido_corr'] : '');;
	$titulo_corr =(isset($_SESSION['titulo_corr']) ? $_SESSION['titulo_corr'] : '');;
	$problema_corr =(isset($_SESSION['problema_corr']) ? $_SESSION['problema_corr'] : '');;
	$tecnico_corr =(isset($_SESSION['tecnico_corr']) ? $_SESSION['tecnico_corr'] : '');;

    //$body = $mail->getFile($mensaje_cuerpo);
    ob_start();
include 'formato_nuevo_req.php';
$html=ob_get_clean();
$body= $html;
    //$body = eregi_replace("[\]", '', $body);
    $mail->CharSet = 'utf-8';
    $mail->IsSMTP();
    $mail->SMTPAuth = true;                  // enable SMTP authentication
//$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host = $array_correo["correo"]["Host"];      // sets GMAIL as the SMTP server
    $mail->Port = $array_correo["correo"]["Port"];                   // set the SMTP port for the GMAIL server

    $mail->Username = $array_correo["correo"]["Username"];  // GMAIL username
    $mail->Password = $array_correo["correo"]["Password"];            // GMAIL password

    $mail->AddReplyTo($array_correo["correo"]["AddReplyTo_mail"], $array_correo["correo"]["AddReplyTo_name"]);

// $mail->From       = "scanner@aerogal.info";
    $mail->From = $array_correo["correo"]["From"];
    $mail->FromName = $array_correo["correo"]["FromName"];

    $mail->Subject = "Requerimiento Conagopare Pichincha Service Request #  " . $id_peticion . " Open ";

//$mail->Body       = "Hi,<br>This is the HTML BODY<br>";                      //HTML Body
    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    $mail->WordWrap = 50; // set word wrap

    $mail->MsgHTML($body);

    $mail->AddAddress($para, $nombre_para);

    $mail->AddAttachment("images/help-desk.jpg");             // attachment

	//$mail->SMTPDebug = 1;
    $mail->IsHTML(true); // send as HTML

    if (!$mail->Send()) {
        //echo "Mailer Error: " . $mail->ErrorInfo;
        echo '<div class="ui-widget">
				<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
					<strong>Mailer Error:</strong> ' . $mail->ErrorInfo . '.</p>
				</div>
			</div><script type="text/javascript">alert("' . $mail->ErrorInfo . '")</script>';
    } else {
        //echo "Message sent!";
        echo '<div class="ui-widget">
				<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
					<strong>Enviado!</strong> Se envio a la direccion <strong title="(' . $para . ')">programada</strong>.</p>
				</div>
			</div>';
    }
    //echo $_SESSION['id_peticion'];
}
?>

<?php

if ((isset($_REQUEST["id_peticion"]))) {
    envia_correo($_REQUEST["id_peticion"], $_REQUEST["para"], $_REQUEST["nombre_para"]);
}
?>
