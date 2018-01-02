<?php
if (!isset($_SESSION)) {
    session_start();
    $_SESSION['MM_Funcion_activa'] = "fn_requerimiento_form()";
}
require_once('../Connections/req_fun.php');
require_once('../Connections/cyber.php');
$rek = new Req_Controller();

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Nuevo Requerimiento </title>
   	</head>    
    <body>
        <form action="javascript: fn_requerimiento_new();" method="post" name="formreq" id="formreq">
            <div data-role="fieldcontain">                               <label for="nombre" class="ui-hidden-accessible">Nombre del Solicitante:</label>
                <input type="text" name="nombre" id="nombre" value="" placeholder="Nombre del Solicitante" data-theme="a" autofocus required data-type="search" autocomplete="off" class="form-control" >
                <div id="suggestions"></div>
            </div>
            <script>
                $(document).ready(function ($) {
                    fn_directorio();
                    //Al escribr dentro del input con id="service"
                });
            </script>

            

            <div data-role="fieldcontain"> 
                <label for="titulo" class="ui-hidden-accessible">Requerimiento:</label>
                <input type="text" name="titulo" id="titulo" value="" placeholder="Requerimiento" data-theme="a" required maxlength="145" class="form-control">
            </div>

            <div data-role="fieldcontain">                               
                <label for="problema" class="ui-hidden-accessible">Observacion:</label>
                <div class="12u">
                    <textarea class="form-control" name="problema" id="problema" placeholder="Observacion / Problema" rows="6" required></textarea> 
                </div>      
            </div>
            <div data-role="fieldcontain">
                <label for="id_departamento" class="ui-hidden-accessible">Departamento:</label>
                <div class="12u">
                    <div class="select-wrapper">             
                    </div>
                    <?php echo $rek->get_archivos_subidos_select("id_departamento") ?>
                </div>
            </div>

			<div data-role="fieldcontain">                              
                <label for="Prioridad" class="ui-hidden-accessible">Estado:</label>
                <div class="12u">
                    <div class="select-wrapper">             
                    </div>
                    <?php $rek->get_criticidad('Prioridad'); ?>
                </div>
            </div>
            <div data-role="fieldcontain">                               
                <label for="extencion" class="ui-hidden-accessible">Telefono de Contacto:</label>
                <input type="text" name="extencion" id="extencion" value="" placeholder="Telefono de Contacto" data-theme="a" required maxlength="50" class="form-control">             
            </div>

            <div data-role="fieldcontain">                               
                <label for="celular" class="ui-hidden-accessible">Celular:</label>
                <input type="text" name="celular" id="celular" value="" placeholder="Celular" data-theme="a" maxlength="40" class="form-control">             
            </div>

            <div data-role="fieldcontain">                               
                <label for="mail_req" class="ui-hidden-accessible">Correo Destinatario:</label>
                <input type="email" name="mail_req" id="mail_req" value="" placeholder="Correo Destinatario" data-theme="a" maxlength="50" class="form-control">             
            </div>
            <!--<div data-role="fieldcontain"><label for="ip_1" class="ui-hidden-accessible">IP (Modifique si es necesario):</label>-->
            <input type="hidden" name="ip_1" id="ip_1" value="<?php echo $rek->getRealIP_home() ?>" placeholder="IP (Modifique si es necesario)" data-theme="a" class="form-control">
            <!--</div>-->
            

            <div data-role="fieldcontain">
                <h3>Archivos:</h3>
                    <?php
                $uniq = uniqid('pedido_');
                $_SESSION['pedido_'] = $uniq;
                ?>                   
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
            </div>
            <input type="submit" name="button" id="button" value="Ingresar formulario"  class="special"/>


            <input name="ip_2" id="ip_2" type="hidden" value="<?php echo isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : ''; ?>" />
        </form>
    </body>
</html>