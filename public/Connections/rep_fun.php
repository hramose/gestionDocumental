<?php

class Rep_Controller {

    public $data;
    private $database_cyber, $cyber;

    function __construct($database_cyber, $cyber) {
        $this->database_cyber = $database_cyber;
        $this->cyber = $cyber;
    }

    function get_rep_total_mes_anio() {
        mysql_select_db($this->database_cyber, $this->cyber);
        $query_rs_usuarios = sprintf("SELECT count(*) numero_ventos,pedidos.estado,month(fecha_pedido) mes,year(fecha_pedido) anio 
    FROM  pedidos pedidos
GROUP BY pedidos.estado,month(fecha_pedido),year(fecha_pedido) 
order by anio,mes;");
        //echo $query_rs_usuarios;
        $rs_usuarios = mysql_query($query_rs_usuarios, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        ?>
        <table border="1" align="center"class="table-striped table-bordered">
            <tr>    
                <th>Numero de Eventos</td>
                <th>Estados</th>
                <th>Mes	</th>
                <th>Año	</th>                 
            </tr>
        <?php do { ?>
                <tr>      
                    <td><?php echo $row_rs_usuarios["numero_ventos"]; ?></td>
                    <td><?php echo $row_rs_usuarios["estado"]; ?></td>
                    <td><?php echo $row_rs_usuarios["mes"]; ?></td>
                    <td><?php echo $row_rs_usuarios["anio"]; ?></td>                    
                </tr>
        <?php } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios)); ?>
        </table>

        <?php
        mysql_free_result($rs_usuarios);
    }

}
