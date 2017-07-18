<?php
if (!isset($_SESSION)) {
    session_start();
	$_SESSION['MM_Funcion_activa']="fn_requerimiento_buscar()";
}
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>busqueda de requerimiento</title>
    </head>
    <body>
        <form id="formbuscar_req" name="formbuscar_req" method="post" action="javascript: fn_requerimiento_buscar_lista('#formbuscar_req')">	
        
        <div data-role="fieldcontain">                               <label for="busqueda_parametro" class="ui-hidden-accessible">Buscar por numero de Requerimiento:</label>
                            <input type="text" name="busqueda_parametro" id="busqueda_parametro" value="" placeholder="Buscar por numero de Requerimiento" data-theme="a" autofocus required class="form-control"> 
                <input name="Buscar" type="submit" value="Buscar" class="special" />            
            </div>
            
                <input name="campo" id="campo" type="hidden" value="pedidos.id_peticion" />
                
          
        </form>
        
    </body>
</html>