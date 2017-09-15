<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../Connections/req_fun.php');
require_once('../Connections/user_fun.php');
require_once('../Connections/cyber.php');

function html_crate($dato) {

    $saltoelinea = '*
*';

    return preg_replace($saltoelinea, '', nl2br(trim($dato)));
}

$rek = new Req_Controller($database_cyber, $cyber);
$p = $rek->getPEticion(isset($_REQUEST['id_peticion']) ? $_REQUEST['id_peticion'] : '-1');
$user = new Usuario_Controller($database_cyber, $cyber);

if ((isset($_REQUEST["MM_update"])) && ($_REQUEST["MM_update"] == "formreq_sssds2")) {
    //editRequerimiento($estado, $asignado, $id_peticion)
    $rek->editRequerimiento($_REQUEST['estado'], $_REQUEST['asignado'], $_REQUEST['id_peticion']);
    //setUsuario_o_tecnico_en_REQ_cerrar($id_peticion, $id_usuarios, $estado)
    //se cambio porq puede haber muchos eventos de un solo usuario ,mejor se crea un evento cerrado
    $rek->setUsuario_o_tecnico_en_REQ($_REQUEST['id_peticion'], $_SESSION['MM_IDUsername'], "CERRA");
    if ($_REQUEST['estado'] == 'COMPLETADO') {
        ?>	

        <div id="Usuario_corre_final34"><div class="ui-widget">
                <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
                    <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
                        <strong>Alert:</strong> Se esta enviando el mensaje a (<?php echo isset($_REQUEST['mail_req']) ? $_REQUEST['mail_req'] : ''; ?>).<br />
                        <em><strong><em><strong>Espere un momento por favor</strong></em></strong></em></p>
                </div>
            </div>
        </div>
        <script>
            fn_mandaCorreo_resuelto('#Usuario_corre_final34',<?php echo html_crate($_REQUEST['id_peticion']) ?>, '<?php echo html_crate($_REQUEST['mail_req']) ?>', '<?php echo html_crate($_REQUEST['nombre']) ?>', '<?php echo html_crate($_REQUEST['nombre']) ?>', '<?php echo html_crate($rek->get_archivos_subidos_select_departamento_txt($_REQUEST['id_departamento'])) ?>', '<?php echo html_crate($_REQUEST['extencion']) ?>', '<?php echo html_crate($_REQUEST['titulo']) ?>', '<?php echo html_crate($_REQUEST['resolucion_final']) ?>');
        </script>
        <?php
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detalle de forma</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body>

        <?php //print_r($p);  ?>
        <?php // print_r($_SESSION);      ?>

        <script >
            $(document).delegate("#aboutPage", "pageinit", function () {
                alert('A page with an id of "aboutPage" was just created by jQuery Mobile!');
            });
            $(document).on("mobileinit", function () {
                //apply overrides here
                alert(222567771);
            });
        </script>
        <script type="text/javascript" language="javascript">
            function fn_campo_solo_lectura(campo) {
                $(campo).attr("readonly", "true");
                fn_no_modifica(campo);
                $(campo).click(function () {
                    $("#div_listar_detalle_util").html('<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> <strong>Alert:</strong> No se puede Modificar este campo.</p></div></div>');
                    //$(this).effect("shake", { times:3 }, 200);
                    $("#div_listar_detalle_util").effect("shake", {times: 3}, 100);
                });
            }

            function fn_no_modifica(campo) {
                $(campo).css("background-color", '#CAFFE4');
            }



        </script>
        <h1>Orden: <?php echo $p['id_peticion'] ?></h1>
        <form action="javascript: fn_requerimiento_editar();" method="post" name="formreq_sssds2" id="formreq_sssds2">

            <div data-role="fieldcontain">                               <label for="nombre" class="ui-hidden-accessible">Nombre del Solicitante:</label>
                            <input type="text" name="nombre" id="nombre" value="<?php echo $p['nombre'] ?>" placeholder="Nombre del Solicitante" data-theme="a" autofocus required  class="form-control">             
            </div>

            
            <div data-role="fieldcontain">                               <label for="titulo" class="ui-hidden-accessible">Requerimiento:</label>
                            <input type="text" name="titulo" id="titulo" value="<?php echo $p['titulo'] ?>" placeholder="Requerimiento" data-theme="a" required maxlength="145" class="form-control">             
            </div>
            <div data-role="fieldcontain">                               <label for="problema" class="ui-hidden-accessible">Observacion:</label>
                <div class="12u">
                                <textarea name="problema" id="problema" placeholder="Problema /Observacion" rows="6" required class="form-control"><?php echo $p['problema'] ?></textarea> 
                </div>      
            </div>
            <div data-role="fieldcontain">                               <label for="id_departamento" class="ui-hidden-accessible">Departamento:</label>
                <div class="12u">
                                <div class="select-wrapper">             
                    </div>
                    <?php echo $rek->get_archivos_subidos_select("id_departamento", $p['id_departamento']) ?>*
                </div>
            </div>
            <div data-role="fieldcontain">                               <label for="Prioridad" class="ui-hidden-accessible">Estado:</label>
                <div class="12u">
                                <div class="select-wrapper">             
                    </div>
                    <?php $rek->get_criticidad('prioridad', $p['Prioridad']); ?>
                </div>
            </div>
            <div data-role="fieldcontain">                               <label for="extencion" class="ui-hidden-accessible">Telefono de Contacto:</label>
                            <input type="text" name="extencion" id="extencion" value="<?php echo $p['extencion'] ?>" placeholder="Telefono de Contacto" data-theme="a" required maxlength="50"  class="form-control">             
            </div>
            <div data-role="fieldcontain">                               <label for="celular" class="ui-hidden-accessible">Celular:</label>
                            <input type="text" name="celular" id="celular" value="<?php echo $p['celular'] ?>" placeholder="Celular" data-theme="a" maxlength="40" class="form-control">             
            </div>
            <div data-role="fieldcontain">                               <label for="mail_req" class="ui-hidden-accessible">Correo Destinatario:</label>
                            <input type="email" name="mail_req" id="mail_req" value="<?php echo $p['mail_req'] ?>" placeholder="Correo Destinatario" data-theme="a" maxlength="50" class="form-control">             
            </div>

            
            <div data-role="fieldcontain">                               
                            <input type="hidden" name="ip_1" id="ip_1" value="<?php echo $p['ip_1'] ?>" placeholder="IP # 1" data-theme="a"  class="form-control">             
            
                            <input type="hidden" name="ip_2" id="ip_2" value="<?php echo $p['ip_2'] ?>" placeholder="IP # 2" data-theme="a"  class="form-control">             
            </div>
            <div data-role="fieldcontain">                               <label for="id_departamento" class="ui-hidden-accessible">Estado:</label>
                <div class="12u">
                                <div class="select-wrapper">             
                    </div>
                    <?php $rek->get_estado('estado', $p['estado']); ?> Actual: (<?= $p['estado'] ?>)
                </div>
            </div>

            <div data-role="fieldcontain">                               <label for="asignado" class="ui-hidden-accessible">Asignado:</label>
                            <?php
                $u = $user->getUsaurio($_SESSION['MM_IDUsername']);
                //print_r()
                ?>
                <input name="asignado" id="asignado" type="text" value="<?php echo $u['nombre'] ?> <?php echo $u['apellido'] ?>"  class="form-control" />          
            </div>

            <div data-role="fieldcontain">                               <h3>Archivos:</h3>
                            <?php
                $uniq = $p['uniq'];
                $_SESSION['pedido_'] = $uniq;
                ?>                   
                <a href="elfinder-2.0-rc1/elfinder.php?opcion2ws=pedido" target="popup" onClick="window.open(this.href, this.target, 'width=500,height=600');
                        return false;">Añadir/Editar Archivos</a>
                <div style="clear:both"></div>
                <div class="columna">
                    <div id="archivos_dato_231w"></div> 
                </div>
                <div class="columna">
                    <a style="float:right" href="javascript:fn_listar_archivosPedido('#archivos_dato_231w','<?php echo $uniq ?>/pedido')" ><div class="ui-state-default ui-corner-all" title="Refrescar los campos y carpeta"><span class="ui-icon ui-icon-arrowrefresh-1-w"></span></div></a>
                </div>
                <div style="clear:both"></div>
                <input name="uniq" type="hidden" value="<?php echo $uniq ?>" id="uniq" />
                <script>
                    /*$(function () {
                     
                     alert(88888888888888888888888888888888);
                     });*/
                    function iniciar_pagina() {
                        // Handler for .ready() called.
                        //$("#nombre").readOnly=true; 
                        //$("#nombre").prop("readonly",true); 
                        fn_campo_solo_lectura("#nombre");
                        fn_campo_solo_lectura("#id_departamento");
                        fn_campo_solo_lectura("#titulo");
                        fn_campo_solo_lectura("#problema");
                        fn_campo_solo_lectura("#extencion");
                        fn_campo_solo_lectura("#celular");
                        fn_campo_solo_lectura("#mail_req");
                        fn_campo_solo_lectura("#ip_1");
                        fn_campo_solo_lectura("#ip_2");
                        fn_campo_solo_lectura("#prioridad");
                        fn_listar_archivosPedido('#archivos_dato_231w', '<?php echo $uniq ?>');
                    }
                    ;

                </script> 
                <?php $dartg2377 = $rek->getSolucion_valida(isset($_REQUEST['id_peticion']) ? $_REQUEST['id_peticion'] : '-1'); ?>                   
                <input name="solicitud_listo" type="hidden" value="<?php echo $dartg2377['esiste_solucion']; ?>" id="solicitud_listo" />
                <textarea name="resolucion_final" id="resolucion_final" cols="" rows="" style="visibility:collapse" ><?php echo $dartg2377['resolucion']; ?></textarea>                                        
            </div>
            <div style="clear:both"></div>

        </div>
        <input type="submit" name="button" id="button" value="Modificar Formulario" />

        <input name="id_peticion" type="hidden" id="id_peticion" value="<?php echo $p['id_peticion'] ?>" />
        <input name="MM_update" type="hidden" id="MM_update" value="formreq_sssds2" />
    </form>
    <script language="javascript">
        iniciar_pagina();
    </script>
</body>
</html>