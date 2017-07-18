<?php

class Req_Controller {

    public $data;
    private $database_cyber, $cyber;

    function __construct($database_cyber, $cyber) {
        $this->database_cyber = $database_cyber;
        $this->cyber = $cyber;
        $this->setTraduccion();
    }

    function get_usuarios_telefono_select($select_name) {
        mysql_select_db($this->database_cyber, $this->cyber);
        $query_rs_usuarios = "SELECT tb_usuarios.usuario,
       tb_usuarios.id_usuarios,
       tb_usuarios.estado
  FROM  tb_usuarios tb_usuarios
 WHERE (tb_usuarios.user_nivel > 0) ; ";
        //echo $query_rs_usuarios;
        $rs_usuarios = mysql_query($query_rs_usuarios, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        ?>
        <select id="<?php echo $select_name ?>" name="<?php echo $select_name ?>" class="form-control" >
            <option value="---"><?=$this->trans("req_fun.selecciones")?></option>
            <?php do { ?>
                <option value="<?php echo $row_rs_usuarios['id_usuarios']; ?>"><?php echo $row_rs_usuarios['usuario']; ?></option>
            <?php } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios)); ?>
        </select>
        <?php
        mysql_free_result($rs_usuarios);
    }

    function getSolucion_valida($id_peticion) {
        $dato = NULL;
        $deleteSQL = sprintf('SELECT max(resolucion) resolucion,count(*) esiste_solucion
FROM  tb_solucion_pedido tb_solucion_pedido WHERE (tb_solucion_pedido.id_peticion = %s)', $this->GetSQLValueString($id_peticion, "text")
        );
        //echo $deleteSQL;
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        $dato = $row_rs_usuarios;
        mysql_free_result($rs_usuarios);
        return $dato;
    }

    function dar_ID_Usuario_asignado_pedido($id_peticion, $id_usuarios) {
        $dato = NULL;
        $deleteSQL = sprintf("select tb_pedido_usuarios.id_pedido_usuarios from tb_pedido_usuarios where id_peticion =%s  and id_usuarios =%s and estado =%s ;", $this->GetSQLValueString($id_peticion, "int"), $this->GetSQLValueString($id_usuarios, "int"), $this->GetSQLValueString('PROCE', "text"));
        //echo $deleteSQL;
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        $dato = $row_rs_usuarios;
        mysql_free_result($rs_usuarios);
        return $dato;
    }

    ///////////////////////////////////////////////

    function darUsuario_asignado_pedido($id_peticion, $id_usuarios, $estado = 'PROCE') {
        $dato = NULL;
        $deleteSQL = sprintf("select count(*) as existee from tb_pedido_usuarios where id_peticion =%s  and id_usuarios =%s and estado =%s ;", $this->GetSQLValueString($id_peticion, "int"), $this->GetSQLValueString($id_usuarios, "int"), $this->GetSQLValueString($estado, "text"));
        // echo $deleteSQL;
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        $dato = $row_rs_usuarios;
        mysql_free_result($rs_usuarios);
        return $dato;
    }

    ////////////////////////////////////////////////////////////////////////////////////


    function darUsuarioSdeReq_busqueda($id_peticion, $tipo) {
        mysql_select_db($this->database_cyber, $this->cyber);
        $query_rs_usuarios = sprintf("SELECT tb_pedido_usuarios.id_pedido_usuarios,
                  tb_pedido_usuarios.id_peticion,
                  tb_pedido_usuarios.id_usuarios,
                  tb_pedido_usuarios.tipo,
                  tb_pedido_usuarios.estado,
                  tb_usuarios.usuario,
                  tb_usuarios.nombre,
                  tb_usuarios.apellido
             FROM  tb_pedido_usuarios tb_pedido_usuarios
                  INNER JOIN  tb_usuarios tb_usuarios
                  ON (tb_pedido_usuarios.id_usuarios = tb_usuarios.id_usuarios)
            WHERE tb_pedido_usuarios.id_peticion = %s
                  AND tb_pedido_usuarios.tipo LIKE %s
         GROUP BY tb_pedido_usuarios.id_pedido_usuarios,
                  tb_pedido_usuarios.id_peticion,
                  tb_pedido_usuarios.id_usuarios,
                  tb_pedido_usuarios.tipo,
                  tb_pedido_usuarios.estado,
                  tb_usuarios.usuario,
                  tb_usuarios.nombre,
                  tb_usuarios.apellido ;", $this->GetSQLValueString($id_peticion, "int"), $this->GetSQLValueString($tipo, "text"));
        //echo $query_rs_usuarios;
        $rs_usuarios = mysql_query($query_rs_usuarios, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        ?>
        <ul>

            <?php do { ?>
                <li title="<?php echo $row_rs_usuarios["nombre"]; ?> <?php echo $row_rs_usuarios["apellido"]; ?> <?=$this->trans("req_fun.como")?>: <?php echo $row_rs_usuarios["tipo"]; ?> "><?php echo $row_rs_usuarios["usuario"]; ?></li>
            <?php } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios)); ?>
        </ul>

        <?php
        mysql_free_result($rs_usuarios);
    }

    function darUsuarioSolicdeReq($id_peticion, $tipo = 'SOLIC') {
        $dato = NULL;
        $deleteSQL = sprintf("SELECT tb_pedido_usuarios.id_pedido_usuarios,
                  tb_pedido_usuarios.id_peticion,
                  tb_pedido_usuarios.id_usuarios,
                  tb_pedido_usuarios.tipo,
                  tb_pedido_usuarios.estado,
                  tb_pedido_usuarios.fecha_ini,
                  tb_pedido_usuarios.fecha_fin,
                  tb_pedido_usuarios.total,
                  tb_pedido_usuarios.descripcion,
                  tb_usuarios.usuario,
                  tb_usuarios.nombre,
                  tb_usuarios.apellido
             FROM  tb_pedido_usuarios tb_pedido_usuarios
                  INNER JOIN  tb_usuarios tb_usuarios
                  ON (tb_pedido_usuarios.id_usuarios = tb_usuarios.id_usuarios)
             WHERE tb_pedido_usuarios.id_peticion = %s and tb_pedido_usuarios.tipo= %s ;", $this->GetSQLValueString($id_peticion, "int"), $this->GetSQLValueString($tipo, "text"));
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        $dato = $row_rs_usuarios;
        mysql_free_result($rs_usuarios);
        return $dato;
    }

    function darUsuarioSolicdeReq_dato($id_peticion) {
        $dato = NULL;
        $deleteSQL = sprintf("SELECT tb_pedido_usuarios.id_pedido_usuarios,
                  tb_pedido_usuarios.id_peticion,
                  tb_pedido_usuarios.id_usuarios,
                  tb_pedido_usuarios.tipo,
                  tb_pedido_usuarios.estado,
                  tb_pedido_usuarios.fecha_insert,
                  tb_pedido_usuarios.fecha_update,
                  tb_pedido_usuarios.fecha_ini,
                  tb_pedido_usuarios.fecha_fin,
                  tb_pedido_usuarios.total,
                  tb_pedido_usuarios.descripcion,
                  tb_usuarios.usuario,
                  tb_usuarios.clave,
                  tb_usuarios.nombre,
                  tb_usuarios.apellido,
                  tb_usuarios.correo_corporativo,
                  tb_usuarios.correo_personal,
                  tb_usuarios.telefono,
                  tb_usuarios.celular_corporativo,
                  tb_usuarios.celular_personal,
                  tb_usuarios.fecha_insert,
                  tb_usuarios.fecha_update,
                  tb_usuarios.estado,
                  tb_usuarios.user_nivel
             FROM  tb_pedido_usuarios tb_pedido_usuarios
                  INNER JOIN  tb_usuarios tb_usuarios
                  ON (tb_pedido_usuarios.id_usuarios = tb_usuarios.id_usuarios)
             WHERE tb_usuarios.user_nivel > 0 and  tb_pedido_usuarios.id_peticion= %s ;", $this->GetSQLValueString($id_peticion, "int"));
        // echo $deleteSQL;
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        $dato = $row_rs_usuarios;
        mysql_free_result($rs_usuarios);
        return $dato;
    }

    function darUsuarioSdeReq($id_peticion, $tipo) {
        mysql_select_db($this->database_cyber, $this->cyber);
        $query_rs_usuarios = sprintf("SELECT tb_pedido_usuarios.id_pedido_usuarios,
                  tb_pedido_usuarios.id_peticion,
                  tb_pedido_usuarios.id_usuarios,
                  tb_pedido_usuarios.tipo,
                  tb_pedido_usuarios.estado,
                  tb_pedido_usuarios.fecha_ini,
                  tb_pedido_usuarios.fecha_fin,
                  tb_pedido_usuarios.total,
                  tb_pedido_usuarios.descripcion,
                  tb_usuarios.usuario,
                  tb_usuarios.nombre,
                  tb_usuarios.apellido
             FROM  tb_pedido_usuarios tb_pedido_usuarios
                  INNER JOIN  tb_usuarios tb_usuarios
                  ON (tb_pedido_usuarios.id_usuarios = tb_usuarios.id_usuarios)
             WHERE tb_pedido_usuarios.id_peticion = %s and tb_pedido_usuarios.tipo like %s ;", $this->GetSQLValueString($id_peticion, "int"), $this->GetSQLValueString($tipo, "text"));
        //echo $query_rs_usuarios;
        $rs_usuarios = mysql_query($query_rs_usuarios, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        ?>

        <table id="darUsuarioSdeReq-xc23de" class="table-striped table-bordered">
            <thead>
            <tr>
                <th><?=$this->trans("req_fun.usuario")?></td>
                <th><?=$this->trans("req_fun.horadeinicio")?></th>
                <th><?=$this->trans("req_fun.horadefin")?></th>
                <th><?=$this->trans("req_fun.total")?></th>
                <th><?=$this->trans("req_fun.descripcion")?></th>
                <th><?=$this->trans("req_fun.accion")?></th>
            </tr>
             </thead>
  <tbody>
            <?php do { ?>
                <tr>
                    <td  title="<?php echo $row_rs_usuarios["nombre"]; ?> <?php echo $row_rs_usuarios["apellido"]; ?> "><?php echo $row_rs_usuarios["usuario"]; ?></td>
                    <td><?php echo $row_rs_usuarios["fecha_ini"]; ?></td>
                    <td><?php echo $row_rs_usuarios["fecha_fin"]; ?></td>
                    <td><?php echo $row_rs_usuarios["total"]; ?></td>
                    <td><?php echo $row_rs_usuarios["descripcion"]; ?></td>
                    <td><a  style="float:right"  href="javascript: fn_Kitar_pedido_ususrior(<?php echo $row_rs_usuarios["id_pedido_usuarios"]; ?>,<?php echo $id_peticion ?>)" class="ui-state-default ui-corner-all" title="<?=$this->trans("req_fun.quitaresteusuariodelapeticion")?>"><?=$this->trans("req_fun.borrar")?><i class="fa fa-times"></i></a>
                        </a>
                    </td>
                </tr>
            <?php } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios)); ?>
            </tbody>
        </table>

        <?php
        mysql_free_result($rs_usuarios);
    }

    function editRequerimiento($estado, $asignado, $id_peticion) {
        $deleteSQL = sprintf("update pedidos SET   
  estado = %s    
  ,fecha_solucion = NOW()
  ,asignado = %s    
WHERE id_peticion = %s", $this->GetSQLValueString($estado, "text"), $this->GetSQLValueString($asignado, "text"), $this->GetSQLValueString($id_peticion, "int")
        );
//	echo $deleteSQL;
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());

        if ($rs_usuarios) {
            echo '<div class="ui-widget">
				<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
					<strong>'.$this->trans("req_fun.actualizadoconexito").'</strong> '.$this->trans("req_fun.seactualizocorectamenteelpedido").'</p>
				</div>
			</div>';
            //$this->TR_PEDIDO_INSERT($id_peticion,$nombre,$estado);///falla de variable nombre
        } else {
            echo '<div class="ui-widget">
				<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
					<strong>'.$this->trans("req_fun.error").':</strong> ' . $rs_usuarios . '</p>
				</div>
			</div>';
        }
    }

    function editSolucion($id_usuarios, $id_peticion, $resolucion, $solucion) {
        $deleteSQL = sprintf("update tb_solucion_pedido SET  
  id_usuarios = %s 
  ,resolucion = %s
  ,solucion = %s
  ,fecha_update = NOW()
WHERE id_peticion = %s", $this->GetSQLValueString($id_usuarios, "int"), $this->GetSQLValueString($resolucion, "text"), $this->GetSQLValueString($solucion, "text"), $this->GetSQLValueString($id_peticion, "int")
        );
//	echo $deleteSQL;
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());

        if ($rs_usuarios) {
            echo '<div class="ui-widget">
				<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
					<strong>'.$this->trans("req_fun.actualizadoconexito").'</strong>'.$this->trans("req_fun.seactualizocorectamentesusolucion").'</p>
				</div>
			</div>';
        } else {
            echo '<div class="ui-widget">
				<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
					<strong>'.$this->trans("req_fun.error").':</strong> ' . $rs_usuarios . '</p>
				</div>
			</div>';
        }
    }

    function getSolucion($id_peticion) {
        $dato = NULL;
        $deleteSQL = sprintf('SELECT tb_solucion_pedido.id_solucion_pedido,
       tb_solucion_pedido.id_usuarios,
       tb_solucion_pedido.id_peticion,
       tb_solucion_pedido.resolucion,
       tb_solucion_pedido.solucion,
       tb_solucion_pedido.fecha_insert,
       tb_solucion_pedido.fecha_update
  FROM  tb_solucion_pedido tb_solucion_pedido
WHERE (tb_solucion_pedido.id_peticion = %s)', $this->GetSQLValueString($id_peticion, "text")
        );
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        $dato = $row_rs_usuarios;
        mysql_free_result($rs_usuarios);
        return $dato;
    }

    function set_solucion($id_usuarios, $id_peticion, $resolucion, $solucion) {
        $deleteSQL = sprintf("insert into tb_solucion_pedido (
   id_usuarios
  ,id_peticion
  ,resolucion
  ,solucion  
  ,fecha_update
) VALUES (
   %s-- id_usuarios
  ,%s -- id_peticion
  ,%s -- resolucion
  ,%s -- solucion
  ,NOW() -- fecha_update
) ;", $this->GetSQLValueString($id_usuarios, "int"), $this->GetSQLValueString($id_peticion, "int"), $this->GetSQLValueString($resolucion, "text"), $this->GetSQLValueString($solucion, "text")
        );

        //echo $deleteSQL;
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());
        $datodswe45 = -1;
        if ($rs_usuarios) {
            $datodswe45 = $this->darIdPeticion();
            echo '<div class="ui-widget">
				<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
					<strong>'.$this->trans("req_fun.actualizadoconexito").'</strong>'.$this->trans("req_fun.seingresocorectamentesusolucion").'</p>
				</div>
			</div>';
            return $datodswe45;
        } else {
            echo '<div class="ui-widget">
				<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
					<strong>'.$this->trans("req_fun.error").':</strong> ' . $rs_usuarios . '</p>
				</div>
			</div>';
            return $datodswe45;
        }
    }

    function getPEticion($id_peticion) {
        $dato = NULL;
        $deleteSQL = sprintf('SELECT pedidos.id_peticion,
       pedidos.nombre,
       pedidos.cantidad,
       pedidos.estacion,
       pedidos.tipo,
       pedidos.problema,
       pedidos.cod_empleado_soporte,
       pedidos.estado,
       pedidos.fecha_pedido,
       pedidos.fecha_solucion,
       pedidos.asignado,
       pedidos.solucion,
       pedidos.mail_req,
       pedidos.fecha_asignacion,
       pedidos.area,
       pedidos.Reasignado,
       pedidos.fecha_reasignacion,
       pedidos.motivo_reasignacion,
       pedidos.Prioridad,
       pedidos.extencion,
       pedidos.celular,
       pedidos.ip_1,
       pedidos.ip_2,
       pedidos.id_departamento,
       pedidos.titulo,
	   pedidos.uniq
  FROM  pedidos pedidos
WHERE (pedidos.id_peticion = %s)', $this->GetSQLValueString($id_peticion, "text")
        );
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        $dato = $row_rs_usuarios;
        mysql_free_result($rs_usuarios);
        return $dato;
    }

    function setUsuario_o_tecnico_en_REQ_cerrar($id_peticion, $id_usuarios, $estado) {
        $deleteSQL = sprintf("update tb_pedido_usuarios SET       
  estado = %s  
  ,fecha_update = NOW()
WHERE id_peticion = %s and tipo = 'TECNI' and id_usuarios = %s;", $this->GetSQLValueString($estado, "text"), $this->GetSQLValueString($id_peticion, "int"), $this->GetSQLValueString($id_usuarios, "int"));

        //echo $deleteSQL;
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());
        $datodswe45 = -1;
        if ($rs_usuarios) {
            $datodswe45 = $this->darIdPeticion();
            echo 'Actualizado Correctamente';
            return $datodswe45;
        } else {
            echo 'Error Actualizacion' . $rs_usuarios;
            return $datodswe45;
        }
    }

    function setUsuario_o_tecnico_en_REQ($id_peticion, $id_usuarios, $tipo, $estado = "ACTIV") {
        if ($estado == 'PROCE') {
            if ($this->dartecnico_asuntado($id_peticion) > 0) {
                echo $this->trans("req_fun.errorcreciondeasignacion");
                return -1;
            }
        }
        $deleteSQL = sprintf("insert into tb_pedido_usuarios (
   id_peticion
  ,id_usuarios
  ,tipo
  ,estado
  ,fecha_update
) VALUES (
  %s -- id_peticion
  ,%s -- id_usuarios
  ,%s -- tipo
  ,%s -- estado 
  ,NOW() -- fecha_update
);", $this->GetSQLValueString($id_peticion, "int"), $this->GetSQLValueString($id_usuarios, "int"), $this->GetSQLValueString($tipo, "text"), $this->GetSQLValueString($estado, "text")
        );

        //echo $deleteSQL;
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());
        $datodswe45 = -1;
        if ($rs_usuarios) {
            $datodswe45 = $this->darIdPeticion();
            echo '<!--$this->trans("req_fun.creadocorrectamente")-->';
            return $datodswe45;
        } else {
            echo $this->trans("req_fun.errorcreciondeasignacion");
            return $datodswe45;
        }
    }

    function dartecnicoAsignado_departamento($id_departamneto) {
        $array = array(
            "Tecnico" => "" . $id_departamneto,
            "responsables" => null
        );
        ////////////////////////////////////////////////////////////////////////////////
        mysql_select_db($this->database_cyber, $this->cyber);
        $query_rs_usuarios = sprintf("SELECT tb_usuarios.id_usuarios,
tb_usuarios.nombre,
                  tb_usuarios.apellido,
                  tb_usuarios.correo_corporativo,
                  tb_usuarios.user_nivel,
                  tb_soport_departament_suarios.id_departamneto,
                  tb_usuarios.usuario
             FROM  tb_soport_departament_suarios tb_soport_departament_suarios
                  INNER JOIN  tb_usuarios tb_usuarios
                  ON (tb_soport_departament_suarios.id_usuarios =
                         tb_usuarios.id_usuarios)
             WHERE tb_usuarios.user_nivel > 0 and id_departamneto = %s;", $this->GetSQLValueString($id_departamneto, "text"));
        //echo $query_rs_usuarios;
        $rs_usuarios = mysql_query($query_rs_usuarios, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        do {
            $array["responsables"][] = array(
                "id_usuarios" => $row_rs_usuarios["id_usuarios"],
                "nombre" => $row_rs_usuarios["nombre"],
                "apellido" => $row_rs_usuarios["apellido"],
                "correo_corporativo" => $row_rs_usuarios["correo_corporativo"],
                "usuario" => $row_rs_usuarios["usuario"]
            );
        } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios));
        mysql_free_result($rs_usuarios);
        /////////////////////////////////////////////////////////////////////////////////
        return $array;
    }

    function getRequerimiento($id_peticion) {
        $dato = NULL;
        $deleteSQL = sprintf('SELECT pedidos.id_peticion,
                        pedidos.nombre,
                        pedidos.cantidad,
                        pedidos.estacion,
                        pedidos.tipo,
                        pedidos.problema,
                        pedidos.cod_empleado_soporte,
                        pedidos.estado,
                        pedidos.fecha_pedido,
                        pedidos.fecha_solucion,
                        pedidos.asignado,
                        pedidos.solucion,
                        pedidos.mail_req,
                        pedidos.fecha_asignacion,
                        pedidos.area,
                        pedidos.Reasignado,
                        pedidos.fecha_reasignacion,
                        pedidos.motivo_reasignacion,
                        pedidos.Prioridad,
                        pedidos.extencion,
                        pedidos.celular,
                        pedidos.ip_1,
                        pedidos.ip_2,
                        pedidos.id_departamento,
                        pedidos.titulo,
                        tb_estaciones.estacion AS esta_ciudad,
                        tb_departamento.descripcion AS depart_ciudad
                   FROM ( tb_departamento tb_departamento
                         INNER JOIN  tb_estaciones tb_estaciones
                         ON (tb_departamento.id_estacion = tb_estaciones.id_estacion))
                        RIGHT OUTER JOIN  pedidos pedidos
                        ON (pedidos.id_departamento = tb_departamento.id_departamneto)
WHERE (pedidos.id_peticion = %s)', $this->GetSQLValueString($id_peticion, "text")
        );
        //$deleteSQL = sprintf('SELECT pedidos.id_peticion,                   pedidos.nombre,                   pedidos.cantidad,                   pedidos.estacion,                   pedidos.tipo,                   pedidos.problema,                   pedidos.cod_empleado_soporte,                   pedidos.estado,                   pedidos.fecha_pedido,                   pedidos.fecha_solucion,                   pedidos.asignado,                   pedidos.solucion,                   pedidos.mail_req,                   pedidos.fecha_asignacion,                   pedidos.area,                   pedidos.Reasignado,                   pedidos.fecha_reasignacion,                   pedidos.motivo_reasignacion,                   pedidos.Prioridad,                   pedidos.extencion,                   pedidos.celular,                   pedidos.ip_1,                   pedidos.ip_2,                   pedidos.id_departamento,                   pedidos.titulo,                   tb_estaciones.estacion esta_ciudad,                   tb_departamento.descripcion depart_ciudad              FROM ( tb_departamento tb_departamento                    INNER JOIN  tb_estaciones tb_estaciones                    ON (tb_departamento.id_estacion = tb_estaciones.id_estacion))                   INNER JOIN  pedidos pedidos                   ON (pedidos.id_departamento = tb_departamento.id_departamneto) WHERE (pedidos.id_peticion = %s)', $this->GetSQLValueString($id_peticion, "text")        );
        // echo $deleteSQL;
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        $dato = $row_rs_usuarios;
        mysql_free_result($rs_usuarios);
        return $dato;
    }

    /**
      da el numero de tecnicos con estado PROCE
     * */
    function dartecnico_asuntado($id_peticion) {
        mysql_select_db($this->database_cyber, $this->cyber);
        $query_rs_usuarios = sprintf("SELECT tb_usuarios.usuario
             FROM  tb_pedido_usuarios tb_pedido_usuarios
                  INNER JOIN  tb_usuarios tb_usuarios
                  ON (tb_pedido_usuarios.id_usuarios = tb_usuarios.id_usuarios)
            WHERE (tb_pedido_usuarios.id_peticion = %s) and (tb_pedido_usuarios.estado = 'PROCE') ;", $id_peticion);
        //echo "<pre><code>".$query_rs_usuarios."</code></pre>";
        $rs_usuarios = mysql_query($query_rs_usuarios, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        ?>
        <?php
        if ($totalRows_rs_usuarios > 0)
            do {
                ?>
                <?php echo $row_rs_usuarios["usuario"]; ?>|
            <?php } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios)); ?>
        <?php
        mysql_free_result($rs_usuarios);
        return $totalRows_rs_usuarios;
    }

    function darReq_busqueda($campo, $busqueda_parametro) {
        mysql_select_db($this->database_cyber, $this->cyber);
        $query_rs_usuarios = sprintf("SELECT pedidos.nombre,
                        pedidos.titulo,
                        pedidos.problema,
                        LEFT (pedidos.problema, 20)+'...' AS problema_mini,
                        pedidos.extencion,
                        pedidos.celular,
                        pedidos.mail_req,
                        pedidos.Prioridad,
                        pedidos.ip_1,
                        pedidos.ip_2,
                        pedidos.estacion,
                        pedidos.estado,
                        pedidos.fecha_pedido,
                        tb_departamento.descripcion,
                        tb_estaciones.estacion,
                        pedidos.id_peticion
                   FROM ( tb_departamento tb_departamento
                         INNER JOIN  tb_estaciones tb_estaciones
                         ON (tb_departamento.id_estacion = tb_estaciones.id_estacion))
                        RIGHT OUTER JOIN  pedidos pedidos
                        ON (pedidos.id_departamento = tb_departamento.id_departamneto)
             WHERE %s like %s order by pedidos.ESTADO desc ;", $campo, $this->GetSQLValueString($busqueda_parametro, "textlike"));
        //echo $query_rs_usuarios;
        $rs_usuarios = mysql_query($query_rs_usuarios, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        ?>
        <div class="table-responsive">
                <table id="darReq_busqueda-table" class="table-striped table-bordered">
                    <thead>
                        <tr>
                            <th  data-priority="1" >	#</th>
                            <th data-priority="persist"><?=$this->trans("req_fun.nombresolicitante")?></th>
                            <th data-priority="2"><?=$this->trans("req_fun.titulo")?></th>
                            <!--<th data-priority="3"><?=$this->trans("req_fun.problema")?>	*</th>
                            <th data-priority="4"><?=$this->trans("req_fun.extencion")?>*</th>
                            <th data-priority="5"><?=$this->trans("req_fun.celular")?>*</th>-->
                            <th data-priority="6"><?=$this->trans("req_fun.correo")?></th>
                            <th data-priority="7"><?=$this->trans("req_fun.prioridad")?></th>
                            <!--<td>	<?=$this->trans("req_fun.ip_1")?>	</td>-->
                            <!--<td>	<?=$this->trans("req_fun.ip_2")?>	</td>-->
                            <!--<td>	estacion	</td>-->
                            <th data-priority="8"><?=$this->trans("req_fun.estado")?></th>
                            <th data-priority="9"><?=$this->trans("req_fun.fechapedido")?></th>
                            <!--<th data-priority="10"><?=$this->trans("req_fun.lugar")?>*</th>
                            <th data-priority="11"><?=$this->trans("req_fun.actores")?>*</th>-->
                            <?php if (get_autorizacion_si_no($_SESSION['permiso'], '5')) { ?><th><?=$this->trans("req_fun.edicion")?></th>  <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php do { ?>
                            <tr>
                                <th><?php echo $row_rs_usuarios["id_peticion"]; ?></td>
                                <td><?php echo $row_rs_usuarios["nombre"]; ?></td>
                                <td><?php echo $row_rs_usuarios["titulo"]; ?></td>
                                <!--<td title="<?php echo $row_rs_usuarios["problema"]; ?>"><?php echo $row_rs_usuarios["problema_mini"]; ?></td>
                                <td><?php echo $row_rs_usuarios["extencion"]; ?></td>
                                <td><?php echo $row_rs_usuarios["celular"]; ?></td>-->
                                <td><?php echo $row_rs_usuarios["mail_req"]; ?></td>
                                <td><?php echo $row_rs_usuarios["Prioridad"]; ?></td>
                                <?php /*  <td><?php echo $row_rs_usuarios["ip_1"]; ?></td>
                                <td><?php echo $row_rs_usuarios["ip_2"]; ?></td>-->  */?>
                                <td><?php echo $row_rs_usuarios["estado"]; ?></td>
                                <td><?php echo $row_rs_usuarios["fecha_pedido"]; ?></td>
                               <!-- <td>(<?php echo $row_rs_usuarios["estacion"]; ?>) <?php echo $row_rs_usuarios["descripcion"]; ?></td>
                                <td><?php $this->darUsuarioSdeReq_busqueda($row_rs_usuarios["id_peticion"], '%') ?></td>-->
                                <?php if (get_autorizacion_si_no($_SESSION['permiso'], '5')) { ?>
                                    <td>
                                    <a  style="float:right"  href="javascript: fn_detalle_req(<?php echo $row_rs_usuarios["id_peticion"]; ?>)" class="ui-state-default ui-corner-all" title="<?=$this->trans("req_fun.editar")?>">
                                        <?=$this->trans("req_fun.editar")?><i class="fa fa-pencil"></i>
                                    </a>
                                        <?php /*<!--<a  style="float:right"  href="javascript: fn_editar_req(<?php echo $row_rs_usuarios["id_peticion"]; ?>)" class="ui-state-default ui-corner-all" title=".ui-icon-check"><span class="ui-icon ui-icon-check"></span></a>-->*/ ?>
                                    </td><?php } ?>
                            </tr>
                        <?php } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios)); ?>
                    </tbody>
                </table>
                </div>


        <?php
        mysql_free_result($rs_usuarios);
    }

    function darReq_en_proceso($id_usuarios, $estado_soporte, $tipo,$nombreTabla="darUsuarioSdeReq-yha441a") {
		$bandera6yt=false;
		if($nombreTabla=='darUsuarioSdeReq-Jkuioo'&&$tipo=='SOLIC'){
			$bandera6yt=true;
		}
        mysql_select_db($this->database_cyber, $this->cyber);
        $query_rs_usuarios = sprintf("SELECT DISTINCT pedidos.nombre,
                         pedidos.titulo,
                         pedidos.problema,
                         LEFT(pedidos.problema, 20) + '...' AS problema_mini,
                         pedidos.extencion,
                         pedidos.celular,
                         pedidos.mail_req,
                         pedidos.Prioridad,
                         pedidos.ip_1,
                         pedidos.ip_2,
                         pedidos.estacion,
                         pedidos.estado,
                         pedidos.fecha_pedido,
                         tb_departamento.descripcion,
                         pedidos.id_peticion,
                         tb_pedido_usuarios.id_usuarios,
                         tb_pedido_usuarios.estado AS estado_soporte,
                         tb_pedido_usuarios.tipo,
                         tb_estaciones.estacion
                    FROM (( tb_departamento tb_departamento
                           INNER JOIN  tb_estaciones tb_estaciones
                           ON (tb_departamento.id_estacion = tb_estaciones.id_estacion))
                          RIGHT OUTER JOIN  pedidos pedidos
                          ON (pedidos.id_departamento = tb_departamento.id_departamneto))
                         INNER JOIN  tb_pedido_usuarios tb_pedido_usuarios
                         ON (tb_pedido_usuarios.id_peticion = pedidos.id_peticion)
              WHERE (pedidos.estado = 'EN PROCESO' or pedidos.estado = 'STAND BY') 
			  ".( ($bandera6yt) ? "-- ":"")."and id_usuarios= %s 
			  and tb_pedido_usuarios.estado =%s and 
                    tb_pedido_usuarios.tipo=%s     
					order by tb_pedido_usuarios.ID_PETICION;", $this->GetSQLValueString($id_usuarios, "text"), $this->GetSQLValueString($estado_soporte, "text"), $this->GetSQLValueString($tipo, "text"));
        //echo "<code><pre>".$query_rs_usuarios."</pre></code>";
        $rs_usuarios = mysql_query($query_rs_usuarios, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        ?>
        <div class="table-responsive">
        <table id="<?php echo $nombreTabla;?>" class="table-striped table-bordered">
        <thead>
            <tr>
                <th><?=$this->trans("req_fun.dash")?></th>
                <?php if (get_autorizacion_si_no($_SESSION['permiso'], '6')) { ?>
                <th><?=$this->trans("req_fun.tecnico")?></th><?php } ?>
                <th><?=$this->trans("req_fun.solicitante")?></th>
                <th><?=$this->trans("req_fun.requerimiento")?></th>
                <!--<th><?=$this->trans("req_fun.observacion")?></th>
                <th><?=$this->trans("req_fun.extencion")?></th>-->
                <!--<th><?=$this->trans("req_fun.celular")?></th>-->
                <!--<th><?=$this->trans("req_fun.correo")?></th>-->
                <th><?=$this->trans("req_fun.prioridad")?></th>
                <?php /*<!--<td><?=$this->trans("req_fun.ip_1")?></td>-->
                <!--<td><?=$this->trans("req_fun.ip_2")?></td>-->*/ ?>
                <th><?=$this->trans("req_fun.estado")?></th>
                <th><?=$this->trans("req_fun.fechapedido")?></th>
                <!--<th><?=$this->trans("req_fun.lugar")?></th>-->
                <th><?=$this->trans("req_fun.edicion")?></th>
            </tr>
            </thead>
                    <tbody>
            <?php
            if ($totalRows_rs_usuarios > 0)
                do {
                    ?>
                    <tr>
                        <td><?php echo $row_rs_usuarios["id_peticion"]; ?></td>
                        <?php if (get_autorizacion_si_no($_SESSION['permiso'], '6')) { ?><td>
                                <?php $presentador2w3 = $this->dartecnico_asuntado($row_rs_usuarios["id_peticion"]) ?>
                                <?php if ($presentador2w3 == 0) { ?>
                                    <a href="javascript: fn_asignate_requerimiento(<?php echo $row_rs_usuarios["id_peticion"]; ?>,<?php echo isset($_SESSION['MM_IDUsername']) ? $_SESSION['MM_IDUsername'] : ''; ?>,'<?php echo $nombreTabla;?>')" class="ui-btn ui-icon-home ui-btn-icon-left" title="<?=$this->trans("req_fun.asignarseesterequerimiento")?>"><?=$this->trans("req_fun.asignarse")?></a>
                                <?php } else { ?>
                                    <?php $dafty57 = ($this->darUsuario_asignado_pedido($row_rs_usuarios["id_peticion"], $_SESSION['MM_IDUsername'], 'PROCE')) ?>
                                    <?php
                                    if ($dafty57['existee'] == 1) {
                                        $dafty57_aux2 = $this->dar_ID_Usuario_asignado_pedido($row_rs_usuarios["id_peticion"], $_SESSION['MM_IDUsername']);
                                        ?>
                                        <a  style="float:right"  href="javascript: fn_Kitar_pedido_ususrior_PROCESO(<?php echo $dafty57_aux2['id_pedido_usuarios']; ?>,'<?php echo $nombreTabla;?>')" class="ui-state-default ui-corner-all" title="<?=$this->trans("req_fun.quitar")?>"><?=$this->trans("req_fun.quitar")?><i class="fa fa-times"></i>
                                        </a> <?php } ?>
                                <?php } ?>
                            </td><?php } ?>
                        <td><?php echo $row_rs_usuarios["nombre"]; ?></td>
                        <td><?php echo $row_rs_usuarios["titulo"]; ?></td>
                        <!--<td title="<?php echo $row_rs_usuarios["problema"]; ?>"><?php echo $row_rs_usuarios["problema_mini"]; ?></td>
                        <td><?php echo $row_rs_usuarios["extencion"]; ?></td>
                        <td><?php echo $row_rs_usuarios["celular"]; ?></td>
                        <td><?php echo $row_rs_usuarios["mail_req"]; ?></td>-->
                        <td><?php echo $row_rs_usuarios["Prioridad"]; ?></td>
                        <?php /*<!--<td><?php echo $row_rs_usuarios["ip_1"]; ?></td>
                        <td><?php echo $row_rs_usuarios["ip_2"]; ?></td>-->*/?>
                        <td><?php echo $row_rs_usuarios["estado"]; ?></td>
                        <td><?php echo $row_rs_usuarios["fecha_pedido"]; ?></td>
                        <!--<td>(<?php echo $row_rs_usuarios["estacion"]; ?>)<?php echo $row_rs_usuarios["descripcion"]; ?></td>-->
                        <td><a  style="float:right"  href="javascript: fn_detalle_req(<?php echo $row_rs_usuarios["id_peticion"]; ?>)" class="ui-state-default ui-corner-all" title="<?=$this->trans("req_fun.editar")?>">
                                <?=$this->trans("req_fun.editar")?><i class="fa fa-pencil"></i>
                            </a>
                            <?php /*<!--<a  style="float:right"  href="javascript: fn_editar_req(<?php echo $row_rs_usuarios["id_peticion"]; ?>)" class="ui-state-default ui-corner-all" title=".ui-icon-check"><span class="ui-icon ui-icon-check"></span></a>-->*/ ?>
                        </td>
                    </tr>
                <?php } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios)); ?>
               </tbody>
        </table>
		</div>
        <?php
        mysql_free_result($rs_usuarios);
    }

    function darIdPeticion() {
        mysql_select_db($this->database_cyber, $this->cyber);
        $query_rs_usuarios = "select max(p.id_peticion) actual_id from  pedidos as p; ";
        //echo $query_rs_usuarios;
        $rs_usuarios = mysql_query($query_rs_usuarios, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        $dator = $row_rs_usuarios['actual_id'];
        mysql_free_result($rs_usuarios);
        return $dator;
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
			case "textlike":
                $theValue = ($theValue != "") ? "'%" . $theValue . "%'" : "NULL";
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

    function get_estado($select_name, $estado) {
        ?>
        <select id="<?php echo $select_name ?>" name="<?php echo $select_name ?>" class="form-control" >

            <option <?php
            if (!(strcmp("COMPLETADO", trim($estado)))) {
                echo "selected=\"selected\"";
            }
            ?> value="COMPLETADO"><?=$this->trans("req_fun.completado")?></option>
            <option <?php
            if (!(strcmp("EN PROCESO", trim($estado)))) {
                echo "selected=\"selected\"";
            }
            ?> value="EN PROCESO"><?=$this->trans("req_fun.enproceso")?></option>
            <option <?php
            if (!(strcmp("STAND BY", trim($estado)))) {
                echo "selected=\"selected\"";
            }
            ?> value="STAND BY"><?=$this->trans("req_fun.standby")?></option>

        </select>
        <?php
    }

    function get_criticidad($select_name, $Prioridad = -1) {
        mysql_select_db($this->database_cyber, $this->cyber);
        $query_rs_usuarios = "SELECT tb_criticidades.id_tabla,
       tb_criticidades.cod_criticidad,
       tb_criticidades.Prioridad AS label,
       tb_criticidades.Prioridad AS value,
       tb_criticidades.descripcion,
       tb_criticidades.usuarios,
       tb_criticidades.tiempo_atencion,
       tb_criticidades.observaciones
  FROM  tb_criticidades tb_criticidades; ";
        //echo $query_rs_usuarios;
        $rs_usuarios = mysql_query($query_rs_usuarios, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        ?>
        <script>
            function addmensaje_34(label) {
                var cuerpo = (eval("mensaje_34_json['" + label + "'].descripcion"));
                //var usuarios=(eval("mensaje_34_json['"+label+"'].usuarios"));
                var tiempo_atencion = (eval("mensaje_34_json['" + label + "'].tiempo_atencion"));
                var mensaje_34 = '<div class="ui-widget mensajpwquenito"><div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"><p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><strong>' + label + '</strong><br /><u><?=$this->trans("req_fun.descripcion")?></u>: ' + cuerpo + '<br /><u><?=$this->trans("req_fun.tiempodeatencion")?></u>: ' + tiempo_atencion + '<br /></div></div>';
                $('#mensaje_34').html(mensaje_34);
            }
        </script>
        <?php $aux = array(); ?>
        <select id="<?php echo $select_name ?>" name="<?php echo $select_name ?>" onchange="addmensaje_34(this.value)" class="form-control" >
            <option value="---"><?=$this->trans("req_fun.selecciones")?></option>
            <?php do { ?>
                <?php $aux[trim($row_rs_usuarios['value'])] = $row_rs_usuarios; ?>
                <option value="<?php echo trim($row_rs_usuarios['value']); ?>" <?php
                if (!(strcmp(trim($row_rs_usuarios['value']), trim($Prioridad)))) {
                    echo "selected=\"selected\"";
                }
                ?>><?php echo $row_rs_usuarios['label']; ?></option>
                    <?php } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios)); ?>
        </select>
        <!--<pre>
        <?php // print_r($aux); ?>
        <?php //echo json_encode($aux); ?>
            </pre>-->
        <script>
            var mensaje_34_json = eval('(' + '<?php echo json_encode($aux); ?>' + ')');
            //alert(mensaje_34_json.CRITICO.descripcion);
        </script>
        <div id="mensaje_34"></div>
        <?php
        mysql_free_result($rs_usuarios);
    }

    function get_archivos_subidos_select_departamento_txt($id_departamento = -1) {
        mysql_select_db($this->database_cyber, $this->cyber);
        $query_rs_usuarios = sprintf("SELECT tb_departamento.id_departamneto,
                        tb_departamento.descripcion,
                        tb_departamento.observacion,
                        tb_estaciones.estacion
                   FROM  tb_departamento tb_departamento
                        LEFT OUTER JOIN  tb_estaciones tb_estaciones
                        ON (tb_departamento.id_estacion = tb_estaciones.id_estacion)
                        WHERE tb_departamento.id_departamneto = %s
               ORDER BY tb_estaciones.estacion ASC,
                        tb_departamento.descripcion ASC,
                        tb_departamento.observacion ASC ;", $this->GetSQLValueString($id_departamento, "int"));
        //echo $query_rs_usuarios;
        $rs_usuarios = mysql_query($query_rs_usuarios, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        do {
            $optiongroup = $row_rs_usuarios['estacion'] . '-' . $row_rs_usuarios['descripcion'];
        } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios));
        mysql_free_result($rs_usuarios);
        return $optiongroup;
    }
	    public static function codificarHTML($cadena) {
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

    function get_archivos_subidos_select($select_name, $id_departamento = -1) {
        mysql_select_db($this->database_cyber, $this->cyber);
        $query_rs_usuarios = "SELECT tb_departamento.id_departamneto,
                        convert(cast(convert(tb_departamento.descripcion using utf8) as binary) using utf8) AS descripcion,
                        tb_departamento.observacion,
                        tb_estaciones.estacion
                   FROM  tb_departamento tb_departamento
                        RIGHT OUTER JOIN  tb_estaciones tb_estaciones
                        ON (tb_departamento.id_estacion = tb_estaciones.id_estacion)
						where tb_estaciones.deleted_at is null and tb_departamento.deleted_at is null
               ORDER BY tb_estaciones.estacion ASC,
                        tb_departamento.descripcion ASC,
                        tb_departamento.observacion ASC; ";
        //echo $query_rs_usuarios;
        $rs_usuarios = mysql_query($query_rs_usuarios, $this->cyber) or die(mysql_error());
        $row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);
        $totalRows_rs_usuarios = mysql_num_rows($rs_usuarios);
        ?>
        <select id="<?php echo $select_name ?>" name="<?php echo $select_name ?>" class="form-control" >
            <option value="---"><?=$this->trans("req_fun.selecciones")?></option>
            <?php $optiongroup = ""; ?>
            <?php $optiongroupaux = ""; ?>
            <?php $count = 0; ?>
            <?php do { ?>
                <?php
                $optiongroup = $row_rs_usuarios['estacion'];
                if ($optiongroup != $optiongroupaux) {
                    if (($count++) != 0) {
                        echo "</OPTGROUP>";
                    }
                    echo "<OPTGROUP label='" . $row_rs_usuarios['estacion'] . "'>";
                    $optiongroupaux = $this->codificarHTML($row_rs_usuarios['estacion']);
                }
                ?>
                <?php if ($row_rs_usuarios['id_departamneto'] != '') { ?><option value="<?php echo $row_rs_usuarios['id_departamneto']; ?>" <?php
                    if (!(strcmp($row_rs_usuarios['id_departamneto'], "$id_departamento"))) {
                        echo "selected=\"selected\"";
                    }
                    ?> ><?php echo $this->codificarHTML($row_rs_usuarios['estacion']); ?> - <?php echo $this->codificarHTML($row_rs_usuarios['descripcion']); ?></option><?php } ?>
                    <?php } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios)); ?>
                    <?php
                    if (($count) != 0) {
                        echo "</OPTGROUP>";
                    }
                    ?>
        </select>
        <?php
        mysql_free_result($rs_usuarios);
    }

    function getRealIP_home() {
        return getenv('HTTP_CLIENT_IP')? :
                getenv('HTTP_X_FORWARDED_FOR')? :
                        getenv('HTTP_X_FORWARDED')? :
                                getenv('HTTP_FORWARDED_FOR')? :
                                        getenv('HTTP_FORWARDED')? :
                                                getenv('REMOTE_ADDR');
    }

    function set_requerimiento($nombre, $id_departamento, $titulo, $problema, $extencion, $celular, $mail_req, $Prioridad, $ip_1, $ip_2, $uniq) {
        $deleteSQL = sprintf("INSERT INTO pedidos (
  nombre,id_departamento,titulo,problema,extencion,celular,mail_req,Prioridad,ip_1,ip_2,estacion,estado,fecha_pedido,uniq
) VALUES (
   %s,%s,%s,%s,%s,%s,%s,%s,%s,%s,'-','EN PROCESO',NOW(),%s
)", $this->GetSQLValueString($nombre, "text"), $this->GetSQLValueString($id_departamento, "text"), $this->GetSQLValueString($titulo, "text"), $this->GetSQLValueString($problema, "text"), $this->GetSQLValueString($extencion, "text"), $this->GetSQLValueString($celular, "text"), $this->GetSQLValueString($mail_req, "text"), $this->GetSQLValueString($Prioridad, "text"), $this->GetSQLValueString($ip_1, "text"), $this->GetSQLValueString($ip_2, "text"), $this->GetSQLValueString($uniq, "text")
        );
        //echo $deleteSQL;
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());
        $datodswe45 = -1;
        if ($rs_usuarios) {
            $datodswe45 = $this->darIdPeticion();
            echo '
			  <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-thumbs-o-up"></i></span>
                <div class="info-box-content"  dataq-id="dgafffahhuy45rrrf">
                  <span class="info-box-text">'.$this->trans("req_fun.creadoconexito").'<br />
'.$this->trans("req_fun.seingresocorectamentesu").' <br />
'.$this->trans("req_fun.requerimiento").':</span>
                  <span class="info-box-number">Tramite #' . $datodswe45 . '</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            ';
            //$this->TR_PEDIDO_INSERT($datodswe45,$nombre,'EN PROCESO');
            return $datodswe45;
        } else {
            echo '<div class="ui-widget">
				<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
					<strong>'.$this->trans("req_fun.error").':</strong> ' . $rs_usuarios . '</p>
				</div>
			</div>';
            return $datodswe45;
        }
    }
	/**
	*gatillos inicio
	*/
	function TR_PEDIDO_INSERT($ID_PETICION, $NOMBRE, $ESTADO) {
        $deleteSQL = sprintf("INSERT INTO tb_log_pedido (
   ID_PETICION
  ,NOMBRE
  ,ESTADO
  ,FECHA_INSERT
) VALUES (
  %s -- ID_PETICION - IN int(11)
  ,%s -- NOMBRE - IN varchar(100)
  ,%s -- ESTADO - IN varchar(50) 
  ,NOW()  -- FECHA_INSERT - IN timestamp
);", $this->GetSQLValueString($ID_PETICION, "int"), $this->GetSQLValueString($NOMBRE, "text"), $this->GetSQLValueString($ESTADO, "text"));

        //echo $deleteSQL;
        mysql_select_db($this->database_cyber, $this->cyber);
        $rs_usuarios = mysql_query($deleteSQL, $this->cyber) or die(mysql_error());
        $datodswe45 = -1;
        if ($rs_usuarios) {
            $datodswe45 = 1;
            echo '<!--Creado Correctamente-->';
            return $datodswe45;
        } else {
            echo 'Error Crecion de asignacion';
            return $datodswe45;
        }
    }
	/**
	*gatillos fin
	*/
	/**
     * translate desde laravel
     */
    public $traductor;
	function translate($radix ="/../../"){
        require __DIR__.$radix.'bootstrap/autoload.php';

// You need to specify where the translation files is
        $test_translation_path = __DIR__.$radix.'resources/lang';
        $test_translation_locale = 'es';

// Set up data for the validator
        $translation_file_loader = new Illuminate\Translation\FileLoader(new Illuminate\Filesystem\Filesystem, $test_translation_path);

        $translator = new Illuminate\Translation\Translator($translation_file_loader, $test_translation_locale);
        return $translator;
    }
    function setTraduccion($radix ="/../../"){
        $this->traductor=$this->translate($radix);
    }
    function trans($dato_trans){
        return $this->traductor->trans($dato_trans);
    }

}
?>