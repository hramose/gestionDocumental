<?php
if (!isset($_SESSION)) {
    session_start();
	//$_SESSION['MM_Funcion_activa']="fn_requerimiento_via_telefono_form()";
	$_SESSION['MM_Funcion_activa']="";
}
require_once('../Connections/req_fun.php');
require_once('../Connections/user_fun.php');
require_once('../Connections/cyber.php');
require_once('../Connections/FormsHTML5.php');
$fm = new FormsHTML5();

if (isset($_SESSION['tecnico_user']) || (isset($_SESSION['tecnico_user']) ? $_SESSION['tecnico_user'] : '') == "") {
    $_SESSION['tecnico_user_id'] = isset($_SESSION['MM_IDUsername']) ? $_SESSION['MM_IDUsername'] : '';
    $_SESSION['tecnico_user'] = isset($_SESSION['MM_Username']) ? $_SESSION['MM_Username'] : '';
}

function html_crate($dato) {

    $saltoelinea = '*
*';

    return preg_replace($saltoelinea, '', nl2br(trim($dato)));
}

$rek = new Req_Controller();
$p = $rek->getPEticion(isset($_REQUEST['id_peticion']) ? $_REQUEST['id_peticion'] : '-75');
$user = new Usuario_Controller($database_cyber, $cyber);
$Telefonicamente = 23;
if ((isset($_REQUEST["MM_inserttt"])) && ($_REQUEST["MM_inserttt"] == "formreqLLamadatelefono")) {
    ?>
    INGRESO aca!!!!;
    <!--<pre>
    <?php //print_r($_REQUEST); ?>
    </pre>-->
    <?php
    $datodswe21d34 = $rek->set_requerimiento($_POST['nombre'], $Telefonicamente, $_POST['titulo'], $_POST['problema'], $_POST['extencion'], $_POST['celular'], $_POST['mail_req'], $_POST['Prioridad'], $_POST['ip_1'], $_POST['ip_2'], $_POST['uniq']);

    $_SESSION['id_peticion'] = $datodswe21d34;

    $r = $rek->getRequerimiento($datodswe21d34);


    $_SESSION['estacion_s'] = 'Atendido Telefonicamente';
    $_SESSION['nombre_correo'] = $r['nombre'];
    $_SESSION['mail_req_corr'] = $r['mail_req'];
    $_SESSION['fecha_pedido_corr'] = $r['fecha_pedido'];
    $_SESSION['titulo_corr'] = $r['titulo'];
    $_SESSION['problema_corr'] = $r['problema'];

    $rek->setUsuario_o_tecnico_en_REQ($r['id_peticion'], $_REQUEST['id_usuariossds2ssr'], "SOLIC");

    $rek->setUsuario_o_tecnico_en_REQ($r['id_peticion'], $_REQUEST['select_name_user'], "TECNI");

    $rek->set_solucion($_REQUEST['select_name_user'], $datodswe21d34, $_REQUEST['resolution'], $_REQUEST['solution']);

    if ($_REQUEST['estado'] == 'COMPLETADO') {
        echo "<h1>Completado</h1>";
        $u = $user->getUsaurio($_SESSION['MM_IDUsername']);
        $asignadosd2r5j = $u['nombre'] . " " . $u['apellido'];
        $rek->editRequerimiento($_REQUEST['estado'], $asignadosd2r5j, $datodswe21d34);
        $rek->setUsuario_o_tecnico_en_REQ($datodswe21d34, $_REQUEST['select_name_user'], "CERRA");
        ?>
        <div id="Usuario_corre_final35"><div class="ui-widget">
                <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
                    <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
                        <strong>Alert:</strong> Se esta enviando el mensaje a (<?php echo isset($_REQUEST['mail_req']) ? $_REQUEST['mail_req'] : ''; ?>).<br />
                        <em><strong><em><strong>Espere un momento por favor</strong></em></strong></em>
                    </p>
                </div>
            </div></div>
        <script>
            fn_mandaCorreo_resuelto('#Usuario_corre_final35',<?php echo html_crate($datodswe21d34) ?>, '<?php echo html_crate($_REQUEST['mail_req']) ?>', '<?php echo html_crate($_REQUEST['nombre']) ?>', '<?php echo html_crate($_REQUEST['nombre']) ?>', '<?php echo html_crate($rek->get_archivos_subidos_select_departamento_txt($Telefonicamente)) ?>', '<?php echo html_crate($_REQUEST['extencion']) ?>', '<?php echo html_crate($_REQUEST['titulo']) ?>', '<?php echo html_crate($_REQUEST['resolution']) ?>');
        </script>
        <?php
        }else {
        echo "<h1>En Progreso...!!!</h1>";
        ?>
        <!------------------------------->
        <div id="Usuario_corre3f"><div class="ui-widget">
                <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
                    <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
                        <strong>Alert:</strong> No se manda el mensaje aun <?php echo $r['mail_req'] ?>.<br />
                        <em><strong><em><strong>Espere un momento por favor</strong></em></strong></em></p>
                </div>
            </div></div>
        <?php echo (isset($hecho_DIVmensajesCorreo) ? $hecho_DIVmensajesCorreo : '') ?>
        <script type="text/javascript">
        <?php if(isset($hecho_mensajesCorreo)){echo $hecho_mensajesCorreo;}  ?>
            fn_mandaCorreo_solamente('#Usuario_corre3f',<?php echo $datodswe21d34 ?>, '<?php echo $r['mail_req'] ?>', '<?php echo $r['nombre'] ?>',<?php echo $count = 1 ?>);
        </script>
        <!------------------------------->
        <?php
    }
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>nuevo requerimiento</title>
    </head>
    <body>
        <script>

            $(document).ready(function ($) {

            });
            function setatajo() {
                $('#titulo').val("Consultoria");
                $('#problema').val("Consultoria telefonica/ personal");
                $('#mail_req').val("@conagoparepichincha.gob.com");
                $('#resolution').val("Se realiza consultoria con este resultado: \n");
                $('#solution').val("Se realizo a una consultoria");
            }
        </script>  


        <form action="javascript: fn_requerimiento_teleno_new();" method="post" name="formreqLLamadatelefono" id="formreqLLamadatelefono"> 
            <?php
            $uniq = uniqid('pedido_');
            $_SESSION['pedido_'] = $uniq;
            ?>   

            <div data-role="fieldcontain">
                <label>Solicitar usuario</label>
                <strong>
                    <input name="id_usuariossds2ssr" id="id_usuariossds2ssr" value=""  type="hidden" />
                    <div id="tec1234"><?php echo $S_tecnico_user = (isset($_SESSION['tecnico_user']) ? $_SESSION['tecnico_user'] : ''); ?></div></strong>
                <button name="tecnicossd36r" id="tecnicossd36r" value="<?php echo $S_tecnico_user; ?>">	Buscar Tecnico</button>
            </div>

            <?php $fm->campoG("titulo", "Título"); ?><button name="atajo1" id="atajo1" value="">	Atajo</button>
            <?php $fm->TextareaT("problema", "Descripción"); ?>
            <?php $fm->campoG("nombre", "Nombre"); ?>
            <?php $fm->campoG("mail_req", "Correo"); ?>
            <div id="datos_extra1s35t">
                <?php $fm->campoG("extencion", "Telefono"); ?>
                <?php $fm->campoG("celular", "Celular"); ?>
                <?php $fm->campoG("ip_1", "IP (Modifique si es necesario)", $rek->getRealIP_home()); ?>
                <table>
                    <tr>
                        <td>Archivos</td>
                        <td>                                        


                            <a href="elfinder-2.0-rc1/elfinder.php?opcion2ws=pedido" target="popup" onClick="window.open(this.href, this.target, 'width=500,height=600');
                                    return false;"><div class="ui-state-default ui-corner-all" title=".ui-icon-disk">Añadir/Editar Archivos<span class="ui-icon ui-icon-disk" style=" float:right"></span></div></a>
                            <br />
                            <div style="clear:both"></div>                    
                            <div class="columna">
                                <div id="archivos_dato_231w"></div> 
                            </div>
                            <div class="columna">
                                <a style="float:right" href="javascript:fn_listar_archivosPedido('#archivos_dato_231w','<?php echo $uniq ?>/pedido')" ><div class="ui-state-default ui-corner-all" title="Refrescar los campos y carpeta">Refresca los datos<span class="ui-icon ui-icon-arrowrefresh-1-w"  style=" float:left"></span></div></a>
                            </div>
                            <div style="clear:both"></div>
                            <input name="uniq" type="hidden" value="<?php echo $uniq ?>" id="uniq" />
                            <script>
                                $(document).ready(function ($) {
                                    fn_listar_archivosPedido('#archivos_dato_231w', '<?php echo $uniq ?>');
                                    //593 2 3960 600 
                                    //$("#extencion").mask("(999) 999-9999? x99999");
                                    $("#extencion").mask("(999) 9-9999-999? ext 9999");
                                    $("#celular").mask("099999999");
                                });
                            </script>

                        </td>
                    </tr>
                </table>
                <div data-role="fieldcontain">                               <label for="Prioridad" class="ui-hidden-accessible">Prioridad:</label>
                    <div class="12u">
                           <div class="select-wrapper"></div>
                        <?php $rek->get_criticidad('Prioridad'); ?>*
                    </div>
                </div>
                <input name="ip_2" id="ip_2" type="hidden" value="<?php echo isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : ''; ?>" />
            </div>
            <div data-role="fieldcontain">                               <label for="estado" class="ui-hidden-accessible">Estado:</label>
                <div class="12u">
                       <div class="select-wrapper"></div>
                    <?php $rek->get_estado('estado', ''); ?>
                </div>
            </div>

            <?php $fm->TextareaT("resolution", "Resolución"); ?>
            <?php $fm->TextareaT("solution", "Solución"); ?> 
            <div data-role="fieldcontain">                               <label for="select_name_user" class="ui-hidden-accessible">Asignado a:</label>
                <div class="12u">
                       <div class="select-wrapper"></div>
                    <?php $rek->get_usuarios_telefono_select("select_name_user") ?>
                </div>
            </div>
            <input type="submit" name="button" id="button" value="Guardar Llamada" />
            <input name="MM_inserttt" type="hidden" id="MM_inserttt" value="formreqLLamadatelefono" />

        </form>
        <script>


        </script>
    </body>
</html>