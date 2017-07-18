<?php
if (!isset($_SESSION)) {
    session_start();
	$_SESSION['MM_Funcion_activa']="fn_detalle_req(".(isset($_REQUEST['id_peticion']) ? $_REQUEST['id_peticion'] : '-1').")";
}
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detalle de requerimiento</title>
    </head>
    <?php $id_petfg2sx= isset($_REQUEST['id_peticion']) ? $_REQUEST['id_peticion'] : '';?>
    <body>
            <div data-role="tabs" id="tabs">               
                
            	<ul class="nav nav-tabs tabs-up" id="friends">
                  <li><a href="requerimiento/form_detalle.php?id_peticion=<?php echo $id_petfg2sx  ?>" data-target="#contacts" class="media_node active span" id="contacts_tab" data-toggle="tabajax" rel="tooltip"> Detalles Generales </a></li>
                  <li><a href="requerimiento/solucion.php?id_peticion=<?php echo $id_petfg2sx ?>" data-target="#friends_list" class="media_node span" id="friends_list_tab" data-toggle="tabajax" rel="tooltip">Solucion</a></li>
                  <li><a href="requerimiento/actividades.php?id_peticion=<?php echo $id_petfg2sx ?>" data-target="#awaiting_request" class="media_node span" id="awaiting_request_tab" data-toggle="tabajax" rel="tooltip">Actividades</a></li>
                  <li><a href="requerimiento/historial.php?id_peticion=<?php echo $id_petfg2sx ?>" data-target="#historial_request" class="media_node span" id="historial_request_tab" data-toggle="tabajax" rel="tooltip">Historial</a></li>
            </ul>
            	<div class="tab-content">
                      <div class="tab-pane active" id="contacts">Cargando, Espere ppor Favor....</div>
                      <div class="tab-pane" id="friends_list">Cargando, Espere ppor Favor....</div>
                      <div class="tab-pane  urlbox span8" id="awaiting_request">Cargando, Espere ppor Favor....</div>
                      <div class="tab-pane  urlbox span8" id="historial_request">Cargando, Espere ppor Favor....</div>
                    </div>
            </div><!-- End demo -->


    <script>
	$('[data-toggle="tabajax"]').click(function(e) {
    var $this = $(this),
        loadurl = $this.attr('href'),
        targ = $this.attr('data-target');

    $.get(loadurl, function(data) {
        $(targ).html(data);
    });

    $this.tab('show');
    return false;
});
	</script>

    </body>
</html>