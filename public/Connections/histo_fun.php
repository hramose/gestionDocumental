<?php

class Historial_Controller {

    public $data;
    private $database_cyber, $cyber;

    function __construct($database_cyber, $cyber) {
        $this->database_cyber = $database_cyber;
        $this->cyber = $cyber;
    }

    function ver_historial_cambio_actividades($id_peticion) {

        $query_rs_usuarios = sprintf("SELECT tb_log_pedido_usuarios.id_peticion,
                  tb_log_pedido_usuarios.tipo,
                  tb_log_pedido_usuarios.estado,
                  tb_log_pedido_usuarios.fecha_ini,
                  tb_log_pedido_usuarios.fecha_fin,
                  tb_log_pedido_usuarios.total,
                  tb_log_pedido_usuarios.descripcion,
                  tb_log_pedido_usuarios.accion,
                  tb_log_pedido_usuarios.fecha_insert_log,
                  tb_usuarios.usuario
             FROM  tb_usuarios tb_usuarios
                  INNER JOIN  tb_log_pedido_usuarios tb_log_pedido_usuarios
                  ON (tb_usuarios.id_usuarios = tb_log_pedido_usuarios.id_usuarios)
             WHERE tb_log_pedido_usuarios.id_peticion = %s order by tb_log_pedido_usuarios.fecha_insert_log desc ", $this->GetSQLValueString($id_peticion, "int"));
        //echo $query_rs_usuarios;

        $row_rs_usuarios = conectarseT($query_rs_usuarios);

        ?>
        <table border="1" align="center">
            <tr>    
                <th>Usuario</td>
                <th>	Hora de inicio</th>
                <th>	Hora de fin	</th>
                <th>	Total	</th>
                <th>	Descripción	</th>            
                <th>Acción</th>
                <th>Fecha de acción</th>  
            </tr>
        <?php foreach ($row_rs_usuarios as $row_rs_usuarios ) { ?>
                <tr>      
                    <td  title="<?php echo $row_rs_usuarios["nombre"]; ?> <?php echo $row_rs_usuarios["apellido"]; ?> "><?php echo $row_rs_usuarios["usuario"]; ?></td>
                    <td><?php echo $row_rs_usuarios["fecha_ini"]; ?></td>
                    <td><?php echo $row_rs_usuarios["fecha_fin"]; ?></td>
                    <td><?php echo $row_rs_usuarios["total"]; ?></td>
                    <td><?php echo $row_rs_usuarios["descripcion"]; ?></td>
                    <td><?php echo $row_rs_usuarios["accion"]; ?></td>
                    <td><?php echo $row_rs_usuarios["fecha_insert_log"]; ?></td>
                </tr>
        <?php } ?>
        </table>

        <?php
        
    }

    function ver_historial_cambio_peticion($id_pedido_usuarios) {
        
    }

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        // $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

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
