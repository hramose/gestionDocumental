<?php 
	$id_peticion=(isset($_REQUEST["id_peticion"]) ? $_REQUEST["id_peticion"] : '');
	$estacion_s =(isset($_SESSION['estacion_s']) ? $_SESSION['estacion_s'] : '');;
	$fecha_pedido_corr =(isset($_SESSION['fecha_pedido_corr']) ? $_SESSION['fecha_pedido_corr'] : '');;
	$nombre_correo =(isset($_SESSION['nombre_correo']) ? $_SESSION['nombre_correo'] : '');;
	$mail_req_corr =(isset($_SESSION['mail_req_corr']) ? $_SESSION['mail_req_corr'] : '');;
	$fecha_pedido_corr =(isset($_SESSION['fecha_pedido_corr']) ? $_SESSION['fecha_pedido_corr'] : '');;
	$titulo_corr =(isset($_SESSION['titulo_corr']) ? $_SESSION['titulo_corr'] : '');;
	$problema_corr =(isset($_SESSION['problema_corr']) ? $_SESSION['problema_corr'] : '');;
	$tecnico_corr =(isset($_SESSION['tecnico_corr']) ? $_SESSION['tecnico_corr'] : '');;
	?>
<?php
ob_start();
include 'formato_nuevo_req.php';
$html=ob_get_clean();
echo $html;
?>