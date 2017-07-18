<!--<pre>
<?php
//print_r($_SESSION);
?></pre>-->
 <ul class="treeview-menu">
    <!--<li><a href="/">Inicio</a></li>-->
    <?php if (get_autorizacion_si_no($_SESSION['permiso'], '4')) { ?><li><a href="javascript:fn_requerimiento_form()"><?=trans("req.nuev2wrd")?></a></li><?php } ?>
    <?php if (get_autorizacion_si_no($_SESSION['permiso'], '1')) { ?><li><a href="javascript: fn_requerimiento_buscar();"><?=trans("req.busc2wrd")?></a></li><?php } ?>
   
    <?php if (get_autorizacion_si_no($_SESSION['permiso'], '7')) { ?><li><a href="javascript: fn_requerimiento_via_telefono_form();"><?=trans("req.a1qwe")?></a></li><?php } ?>
   
    <!--			<li><a href="javascript: fn_maquina();">Maquinas</a></li>
                <li><a href="javascript: fn_mqu();">Maquinas Uso</a></li>    
                            <li><a href="javascript: fn_soft();">Software</a></li>
                            <li><a href="javascript: fn_factura()">Factura</a></li>-->
    
    </ul></li>
      
    <li class="treeview">
                <a href="#">
                <i class="fa fa-check"></i> <span><?=trans("req.a2qwe")?></span>
                </a>
    <ul class="treeview-menu">
        <?php if (get_autorizacion_si_no($_SESSION['permiso'], '3')) { ?><li><a href="javascript: fn_requerimiento_list('darUsuarioSdeReq-yha441a')"><?=trans("req.a3qwe")?></a></li><?php } ?>
        <li><a href="javascript: fn_requerimiento_list('darUsuarioSdeReq-Jkuioo')"><?=trans("req.a4qwe")?></a></li>
        <li><a href="javascript: fn_requerimiento_list('darUsuarioSdeReq-yha771a')"><?=trans("req.a5qwe")?></a></li>
    </ul>
    </li>
	<?php if (get_autorizacion_si_no($_SESSION['permiso'], '64')) { ?>    
    <li class="treeview">
                <a href="#">
                <i class="fa fa-cog"></i> <span><?=trans("req.opciones")?></span>
                </a>
    <ul class="treeview-menu">
         <?php if (get_autorizacion_si_no($_SESSION['permiso'], '2')) { ?><li><a href="javascript: fn_usuarios_listar();"><?=trans("req.usuarios")?></a></li><?php } ?>
        <li><a href="javascript: fn_estaciones_form()"><?=trans("req.estaciones")?></a></li>
        <li><a href="javascript: fn_documentos_form(1)"><?=trans("req.documento")?></a></li>
        <li><a href="javascript: fn_directorio_form()"><?=trans("req.directorio")?></a></li>

    </ul>

    </li><?php } ?>
    
     <?php if (get_autorizacion_si_no($_SESSION['permiso'], '75')) { ?>
     <li class="treeview">
                <a href="#">
                <i class="fa fa-line-chart "></i> <span><?=trans("req.reportes")?></span>
                </a>
    <ul class="treeview-menu">
        <li><a href="javascript: fn_reportes_tot()"><?=trans("req.reportetotal")?></a></li>
        <li><a href="javascript: fn_reportes_tot2()"><?=trans("req.reportetotal2")?></a></li>
    </ul>
    </li>     
     <?php } ?>
    
    <?php if (reconoce('0,1,2')) { ?> <li><a href="javascript: fn_salir_user();" ><i class="fa fa-sign-out "></i><?=trans("req.salir")?></a></li><?php } ?>
    <li class="treeview"><a href="documentation/Manual-de-Gestor-de-procesos-Conagopare-Pichincha-v1.0.pdf"><i class="fa fa-book"></i> <span><?=trans("req.documentacin")?></span></a></li>
<?php /**?><li class="header"><?=trans("req.alertas")?> </li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> <?=trans("req.important")?></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> <?=trans("req.warning")?></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> <?=trans("req.information")?></a></li>
<?php **/?>
</ul>