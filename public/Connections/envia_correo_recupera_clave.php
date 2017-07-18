<?php

include("class.phpmailer.php");
include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

function envia_correo($para, $nombre_para, $usuario, $clave) {
    $mail = new PHPMailer();

    //$body = $mail->getFile($mensaje_cuerpo);
    $body = '<body>
<p>Su Usuario: ' . $usuario . '</p>
<p>Tiene la clave: ' . $clave . '</p>
<p><a href="http://gestion.ecuatask.com/" target="_blank">http://gestion.ecuatask.com/</a></p>
</body>
';
    //$body = preg_replace("[\]", '', $body);

    $mail->IsSMTP();
    $mail->SMTPAuth = true;                  // enable SMTP authentication
//$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $array_correo = parse_ini_file("../soportem.ini", true);
    $mail->Host = $array_correo["correo"]["Host"];      // sets GMAIL as the SMTP server
    $mail->Port = $array_correo["correo"]["Port"];                   // set the SMTP port for the GMAIL server

    $mail->Username = $array_correo["correo"]["Username"];  // GMAIL username
    $mail->Password = $array_correo["correo"]["Password"];            // GMAIL password

    $mail->AddReplyTo($array_correo["correo"]["AddReplyTo_mail"], $array_correo["correo"]["AddReplyTo_name"]);

// $mail->From       = "scanner@aerogal.info";
    $mail->From = $array_correo["correo"]["From"];
    $mail->FromName = $array_correo["correo"]["FromName"];

    $mail->Subject = "Recuperar_clave Conagopare Pichincha";

//$mail->Body       = "Hi,<br>This is the HTML BODY<br>";                      //HTML Body
    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    $mail->WordWrap = 50; // set word wrap

    $mail->MsgHTML($body);

    $mail->AddAddress($para, $nombre_para);

    //$mail->AddAttachment("images/help-desk.jpg");             // attachment

    //$mail->SMTPDebug = 1;
    $mail->IsHTML(true); // send as HTML

    if (!$mail->Send()) {
        echo "Error en Envio: " . $mail->ErrorInfo;
    } else {
        echo "Mensaje Enviado!";
    }
}

?>
