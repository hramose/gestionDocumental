<?php

if (!isset($_SESSION)) {
    session_start();
}
?>
<?php

include("class.phpmailer.php");
include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

function render($file, array $data = array()) {
        ob_start();
        extract($data);
        include '' . $file . '.php';
        return ob_get_clean();
    }

function envia_correo_final($id_peticion, $para, $nombre_para, $usuario_d, $estacion_d, $telefono_d, $titulo_d, $reolucion_d) {
    $mail = new PHPMailer();
	//////////////////////////////////////////
	$data =array(
    	'id_peticion' => $id_peticion,
	    'usuario_d' => $usuario_d,
		'estacion_d' => $estacion_d,
		'telefono_d' => $telefono_d,
		'titulo_d' => $titulo_d,
		'reolucion_d' => $reolucion_d,		
	);
	///////////////////////////////////////////
	
    //$body = $mail->getFile($mensaje_cuerpo);
	$html = render('correo_template',$data);
    $body = $html;
    //$body = preg_replace("[\]", '', $body);
    $mail->CharSet = 'utf-8';
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

    $mail->Subject = "Su incidente ha sido Resuelto [" . $id_peticion . "] - Conagopare Pichincha";

//$mail->Body       = "Hi,<br>This is the HTML BODY<br>";                      //HTML Body
    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    $mail->WordWrap = 50; // set word wrap

    $mail->MsgHTML($body);

    $mail->AddAddress($para, $nombre_para);

   // $mail->AddAttachment("images/help-desk.jpg");             // attachment

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

if ((isset($_REQUEST["reolucion_d"]))) {
    //envia_correo_final($id_peticion, $para, $nombre_para,$usuario_d ,$estacion_d ,$telefono_d, $titulo_d,$reolucion_d);
    envia_correo_final($_REQUEST["id_peticion"], $_REQUEST["para"], $_REQUEST["nombre_para"], $_REQUEST["usuario_d"], $_REQUEST["estacion_d"], $_REQUEST["telefono_d"], $_REQUEST["titulo_d"], $_REQUEST["reolucion_d"]);
}
?>
