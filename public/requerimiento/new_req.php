<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../Connections/req_fun.php');
require_once('../Connections/cyber.php');
require_once('../Connections/envia_correo.php');
require_once('../Connections/MyLogPHP.php');
$log = new MyLogPHP();
$rek = new Req_Controller();
$datodswe2111 = $rek->set_requerimiento($_POST['nombre'], $_POST['id_departamento'], $_POST['titulo'], $_POST['problema'], $_POST['extencion'], $_POST['celular'], $_POST['mail_req'], $_POST['Prioridad'], $_POST['ip_1'], $_POST['ip_2'], $_POST['uniq']);
$_SESSION['id_peticion'] = $datodswe2111;

$r = $rek->getRequerimiento($datodswe2111);

$_SESSION['estacion_s'] = $r['esta_ciudad'] . '(' . $r['depart_ciudad'] . ')';
$_SESSION['nombre_correo'] = $r['nombre'];
$_SESSION['mail_req_corr'] = $r['mail_req'];
$_SESSION['fecha_pedido_corr'] = $r['fecha_pedido'];
$_SESSION['titulo_corr'] = $r['titulo'];
$_SESSION['problema_corr'] = $r['problema'];

$actores_REk = $rek->dartecnicoAsignado_departamento($r['id_departamento']);
echo "<br />";
//echo '<pre>'.print_r($actores_REk,true).'</pre>';	
//echo '<pre>'.print_r($r,true).'</pre>';

$rek->setUsuario_o_tecnico_en_REQ($r['id_peticion'], $_SESSION['MM_IDUsername'], "SOLIC");
$count = count($actores_REk['responsables']);
$_SESSION['tecnico_corr'] = "";
$hecho_mensajesCorreo = "";
$hecho_DIVmensajesCorreo = "";
for ($i = 0; $i < $count; $i++) {
    $meeeensaje2w3 = '<div class="ui-widget">
				<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
					<strong>Alert:</strong> No se manda el mensaje <strong title="(' . $actores_REk['responsables'][$i]['correo_corporativo'] . ')">a la dirección programada</strong>  <em><strong><em><strong><br />Espere un momento por favor</strong></em></strong></em>.</p>
				</div>
			</div>';
    $_SESSION['tecnico_corr'] = $_SESSION['tecnico_corr'] . "(" . $actores_REk['responsables'][$i]['nombre'] . ' ' . $actores_REk['responsables'][$i]['apellido'] . ")";
    $rek->setUsuario_o_tecnico_en_REQ($r['id_peticion'], $actores_REk['responsables'][$i]['id_usuarios'], "TECNI");
    echo "<br />";
    //envia_correo( $datodswe2111, $actores_REk['responsables'][$i]['correo_corporativo'], $actores_REk['responsables'][$i]['nombre'] . ' ' . $actores_REk['responsables'][$i]['apellido']);
    $uniq = uniqid('CorreoDIV_');
    $hecho_DIVmensajesCorreo = $hecho_DIVmensajesCorreo . "<div id='" . $uniq . "'>" . $meeeensaje2w3 . "</div>\n";
    $hecho_mensajesCorreo = $hecho_mensajesCorreo . "fn_mandaCorreo('#" . $uniq . "','" . $datodswe2111 . "', '" . $actores_REk['responsables'][$i]['correo_corporativo'] . "', '" . $actores_REk['responsables'][$i]['nombre'] . " " . $actores_REk['responsables'][$i]['apellido'] . "'," . $i . ");\n";
    //$log->info("cananeo777".$hecho_mensajesCorreo);
    //echo '++++++++++++++++++++<pre>'.print_r($actores_REk,true).'</pre>';  
    //echo '*************<pre>'.$hecho_mensajesCorreo.'</pre>';
    
}
//envia_correo( $datodswe2111, $r['mail_req'], $r['nombre']);
//echo '++++++++++++++++++++<pre>'.print_r($_SESSION,true).'</pre>';

?>
<script type="text/javascript">
<?php echo $hecho_mensajesCorreo ?>
    fn_mandaCorreo('#Usuario_corre34',<?php echo $datodswe2111 ?>, '<?php echo $r['mail_req'] ?>', '<?php echo $r['nombre'] ?>',<?php echo $count ?>);
</script>
<script type="text/javascript">
    var progresitto234 = 1;
    $(document).ready(function ($) {
        set_avance3444();
		
    });
    function set_avance3444() {	        
        var auxx = (progresitto234 * 100 / (<?php echo $count ?> + 1));
        /*$("#progressbar2w34").progressbar({
            value: auxx
        });*/
		 $("#progressbar2w34").html(" "+Math.round(auxx)+"%");
        progresitto234 = progresitto234 + 1;
    }
</script>
<h3>
    Progreso de envio <span id="progressbar2w34">0%</span></h3>
<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Ver Detalle de envío
</a>
<div class="collapse" id="collapseExample">
  <div class="well">
<div id="accordionsd34b5" data-role="collapsible"  data-theme="b" data-content-theme="b" >    
    <h3>Informe de envio</h3>
    <div>    
        <p>        
            <!------------------------------->
        <div id="Usuario_corre34"><div class="ui-widget">
                <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
                    <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
                        <strong>Alert:</strong> No se manda el mensaje aun <?php echo $r['mail_req'] ?>.<br />
                        <em><strong><em><strong>Espere un momento por favor</strong></em></strong></em></p>
                </div>
            </div></div>
        <?php echo $hecho_DIVmensajesCorreo ?>
        <!------------------------------->
        </p>
    </div>	
</div>
</div>
</div>

