<?php

if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        //$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }

}

function get_permisos($select_name, $Id_Usuario, $database_cyber, $cyber) {
    mysql_select_db($database_cyber, $cyber);
    $query_rs_usuarios = " SELECT (select /*top*/ 1 id_usuarios from tb_permisos where id_usuarios ='" . $Id_Usuario . "' and Id_Permiso=Permisos.Id_permisos_generales limit 1) ,
                        Permisos.Id_permisos_generales,
                        Permisos.Opc_Permiso,
                        Permisos.Nom_Permiso,
                        Permisos.Det_Permiso,
                        (select /*top 1*/ Id_Permiso from tb_permisos where id_usuarios ='" . $Id_Usuario . "' and Id_Permiso=Permisos.Id_permisos_generales limit 1) AS perm_select
                   FROM tb_permisos_generales Permisos ; ";
    //echo "<pre>$query_rs_usuarios</pre>";
    $rs_usuarios = mysql_query($query_rs_usuarios, $cyber) or die(mysql_error());
    $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
    $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
    ?>
<fieldset data-role="controlgroup">
    <legend>Permisos:</legend>

        <?php $conted3=0; do { ?>
        <!---------------------------------------------------------------->
        <input name="<?php echo $select_name ?>[<?=$conted3?>]" type="checkbox" id="<?php echo $select_name ?>[<?=$conted3?>]" value="<?php echo $row_rs_usuarios['Id_permisos_generales']; ?>" <?php
            if (isset($row_rs_usuarios['perm_select'])) {
                echo ' checked="checked" ';
            };
            ?>  />
     		<label for="<?php echo $select_name ?>[<?=$conted3?>]"  title="<?php echo $row_rs_usuarios['Opc_Permiso']; ?>"><?php echo $row_rs_usuarios['Nom_Permiso']; ?></label>
        <!---------------------------------------------------------------->


    <?php $conted3++; } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios)); ?>

    </fieldset>
    <input type="hidden" value="<?php echo $conted3?>" name="permisos_get_permisos" id="permisos_get_permisos" />
<?php
    mysql_free_result($rs_usuarios);
}

function get_permisos_tecnico($select_name, $Id_Usuario, $database_cyber, $cyber) {
    mysql_select_db($database_cyber, $cyber);
    $query_rs_usuarios = " SELECT 
(select /*top 1*/ id_usuarios from tb_soport_departament_suarios 
  where id_usuarios ='" . $Id_Usuario . "' and id_departamneto=tb_departamento.id_departamneto and tb_departamento.deleted_at is null limit 1) ,
tb_departamento.id_departamneto,
       tb_departamento.id_estacion,
       tb_departamento.descripcion,
       tb_departamento.observacion,
       tb_departamento.fecha_insert,
       tb_departamento.estado,
       (select /*top 1*/ id_departamneto from tb_soport_departament_suarios where id_usuarios ='" . $Id_Usuario . "' and id_departamneto=tb_departamento.id_departamneto limit 1) AS perm_select
  FROM  tb_departamento tb_departamento where tb_departamento.deleted_at is null order by tb_departamento.id_estacion; ";
    //echo "<pre>$query_rs_usuarios</pre>";
    $rs_usuarios = mysql_query($query_rs_usuarios, $cyber) or die(mysql_error());
    $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
    $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
    ?>


    <fieldset data-role="controlgroup">
    <legend>Permisos:</legend>
        <?php $conted3=0; do { ?>
        <!---------------------------------------------------------------->
        <input name="<?php echo $select_name ?>[<?=$conted3?>]" type="checkbox" id="<?php echo $select_name ?>[<?=$conted3?>]" value="<?php echo $row_rs_usuarios['id_departamneto']; ?>" <?php
            if (isset($row_rs_usuarios['perm_select'])) {
                echo ' checked="checked" ';
            };
            ?>  />
     		<label for="<?php echo $select_name ?>[<?=$conted3?>]"  title="<?php echo $row_rs_usuarios['id_estacion']; ?>"><?php echo $row_rs_usuarios['id_estacion']; ?>(<?php echo codificarHTML($row_rs_usuarios['descripcion']); ?>)</label><br />

        <!---------------------------------------------------------------->



    <?php $conted3++; } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios)); ?>

	<input type="hidden" value="<?php echo $conted3?>" name="permisos_get_permisos_tecnico" id="permisos_get_permisos_tecnico" />
    </fieldset>
    <?php
    mysql_free_result($rs_usuarios);
}

function get_permisos_inicio_secion($Id_Usuario, $database_cyber, $cyber) {
    mysql_select_db($database_cyber, $cyber);
    $query_rs_usuarios = " select id_permiso from tb_permisos where id_usuarios ='" . $Id_Usuario . "'; ";
    //echo "<pre>$query_rs_usuarios</pre>";
    $rs_usuarios = mysql_query($query_rs_usuarios, $cyber) or die(mysql_error());
    $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
    $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
    $permiso = array();
    unset($permiso);
    do {
        $permiso[] = $row_rs_usuarios['id_permiso'];
    } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios));
    mysql_free_result($rs_usuarios);
    return $permiso;
}

function get_autorizacion_si_no($vector_permiso, $permiso) {
    foreach ($vector_permiso as $vector) {
        $vector = trim($vector);
        if ($vector == $permiso) {
            return true;
        }
    }
    return false;
}
 function codificarHTML($cadena) {
            $cadena= utf8_encode($cadena);
            $arrAcentos = array (
                    'á' => "&aacute;",
                    'é' => '&eacute;',
                    'í' => '&iacute;',
                    'ó' => '&oacute;',
                    'ú' => '&uacute;',
                    'Á' => "&Aacute;",
                    'É' => '&Eacute;',
                    'Í' => '&Iacute;',
                    'Ó' => '&Oacute;',
                    'Ú' => '&Uacute;',
                    'Ñ' => "&Ntilde;",
                    'ñ' => "&ntilde;",
                    '¿' => '&iquest;',

            );
            $cadena = explode ( " ", $cadena );
            $arrCadena = array ();

            foreach ( $cadena as $valor ) {
                $band = 0;
                foreach ( $arrAcentos as $key => $value ) {

                    if (strpos ( $valor, $key ) !== false) {
                        $valor = str_replace ( $key, $value, $valor );
                        $band = 2;
                    }
                } // fin foreach interno
                $arrCadena [] = trim ( $valor );
            } // fin foreach
            $cadenaFinal = implode ( " ", $arrCadena );
            return $cadenaFinal;
        } // fin función


?>