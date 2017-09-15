<?php

class Usuario_Controller {

    public $data;
    private $database_cyber, $cyber;

    function __construct($database_cyber, $cyber) {
        $this->database_cyber = $database_cyber;
        $this->cyber = $cyber;
    }


    function KitarTb_pedido_usuarios($id_pedido_usuarios) {
        $deleteSQL = sprintf("delete from tb_pedido_usuarios WHERE id_pedido_usuarios = %s
", $this->GetSQLValueString($id_pedido_usuarios, "int"));
        //echo $deleteSQL;

        $rs_usuarios = insertT($deleteSQL);

        if ($rs_usuarios) {
            echo '<div class="ui-widget">
				<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
					<strong>Actualizado con exito!</strong>Se Borro corectamente su Usuario en la peticion</p>
				</div>
			</div>';
        } else {
            echo '<div class="ui-widget">
				<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
					<strong>Error:</strong> ' . $rs_usuarios . '</p>
				</div>
			</div>';
        }
    }

    function setTb_pedido_usuarios($id_peticion, $id_usuarios, $tipo, $estado, $fecha_ini, $fecha_fin, $total, $descripcion) {
        $deleteSQL = sprintf("insert into tb_pedido_usuarios (
   id_peticion
  ,id_usuarios
  ,tipo
  ,estado
  ,fecha_update
  ,fecha_ini
  ,fecha_fin
  ,total
  ,descripcion
) VALUES (
   %s -- id_peticion
  ,%s -- id_usuarios
  ,%s -- tipo
  ,%s -- estado
  ,NOW() -- fecha_update
  ,STR_TO_DATE(%s, '%%m/%%d/%%Y %%H:%%i') -- fecha_ini ,
  ,STR_TO_DATE(%s, '%%m/%%d/%%Y %%H:%%i')  -- fecha_fin
  ,%s -- total
  ,%s -- descripcion
)
", $this->GetSQLValueString($id_peticion, "int"), $this->GetSQLValueString($id_usuarios, "int"), $this->GetSQLValueString($tipo, "text"), $this->GetSQLValueString($estado, "text"), $this->GetSQLValueString($fecha_ini, "text"), $this->GetSQLValueString($fecha_fin, "text"), $this->GetSQLValueString($total, "text"), $this->GetSQLValueString($descripcion, "text")
        );
        //echo $deleteSQL;

		//file_put_contents('../log_'.date("j.n.Y").'7548xc5.txt', $deleteSQL, FILE_APPEND);
		//$this->file_put_contents_atomic("wcadena.log", $deleteSQL)	;
		error_log("este es una prueba!", 0);

        $rs_usuarios = insertT($deleteSQL);

        if ($rs_usuarios) {
            echo '<div class="ui-widget">
				<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
					<strong>Actualizado con exito!</strong>Se ingreso corectamente su Usuario en la peticion</p>
				</div>
			</div>';
        } else {
            echo '<div class="ui-widget">
				<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
					<strong>Error:</strong> ' . $rs_usuarios . '</p>
				</div>
			</div>';
        }
    }

    function dar_lista_usuarios_accion($nombre_variable) {

        $query_rs_usuarios = sprintf("SELECT tb_usuarios.usuario,
       tb_usuarios.nombre+ ' '+
       tb_usuarios.apellido as nombre,
       tb_usuarios.correo_corporativo,
       tb_usuarios.celular_corporativo,
       tb_usuarios.estado,
       CASE
          WHEN tb_usuarios.user_nivel = 0 THEN 'Usuario'
          WHEN tb_usuarios.user_nivel = 1 THEN 'Tecnico'
          WHEN tb_usuarios.user_nivel = 2 THEN 'Usuario Avanzado'
          WHEN tb_usuarios.user_nivel < 0 THEN 'Dasabilitado'
          ELSE 'Usuario No Contemplado'
       END
          AS user_nivel,
       tb_usuarios.telefono,
       tb_usuarios.id_usuarios
  FROM  tb_usuarios tb_usuarios where tb_usuarios.user_nivel > 0 ;");
        //echo $query_rs_usuarios;

        $row_rs_usuarios = conectarseT($query_rs_usuarios);

        ?>
        <table id="darUsuarioSdeReq65t" class="table-striped table-bordered">
            <thead>
            <tr>
                <th>	Usuario 1</th>
                <th>	Nombre	</th>
                <th>	Correo	</th>
                <!--<th>	Telefono	</th>
                <th>	Celular	</th>
                <th>	Mail	</th>-->
                <th>	Tipo Usuario	</th>            </tr>
                </thead>
  <tbody>
        <?php foreach ($row_rs_usuarios as $row_rs_usuarios ) { ?>
                <tr onclick="<?php echo $nombre_variable; ?>(<?php echo $row_rs_usuarios["id_usuarios"]; ?>, '<?php echo $row_rs_usuarios["usuario"]; ?>')" style="cursor:pointer">
                    <td><?php echo $row_rs_usuarios["usuario"]; ?></td>
                    <td><?php echo $row_rs_usuarios["nombre"]; ?></td>
                    <td><?php echo $row_rs_usuarios["correo_corporativo"]; ?></td>
                    <!--<td><?php echo $row_rs_usuarios["telefono"]; ?></td>
                    <td><?php echo $row_rs_usuarios["celular_corporativo"]; ?></td>
                    <td><?php echo $row_rs_usuarios["correo_corporativo"]; ?></td>-->
                    <td><?php echo $row_rs_usuarios["user_nivel"]; ?></td>
                </tr>
        <?php } ; ?>
        </tbody>
        </table>

        <?php

    }

    function get_user_nivel($select_name, $campo) {
        ?>
        <select id="<?php echo $select_name ?>" name="<?php echo $select_name ?>" class="form-control" >
            <option value="---" <?php
            if (!(strcmp("---", "$campo"))) {
                echo "selected=\"selected\"";
            }
            ?>>Selecciones</option>
            <option value="0" <?php
            if (!(strcmp(0, "$campo"))) {
                echo "selected=\"selected\"";
            }
            ?>>Usuario</option>
            <option value="1" <?php
            if (!(strcmp(1, "$campo"))) {
                echo "selected=\"selected\"";
            }
            ?>>Tecnico</option>
            <option value="2" <?php
            if (!(strcmp(2, "$campo"))) {
                echo "selected=\"selected\"";
            }
            ?>>Usuario Avanzado</option>
            <option value="-1" <?php
            if (!(strcmp(-1, "$campo"))) {
                echo "selected=\"selected\"";
            }
            ?>>Dasabilitado</option>
        </select>
        <?php
    }

    function editUsaurio($usuario, $clave, $nombre, $apellido, $correo_corporativo, $correo_personal, $telefono, $celular_corporativo, $celular_personal, $user_nivel, $id_usuarios) {
        $deleteSQL = sprintf("update tb_usuarios SET
   usuario = %s
  ,clave = %s
  ,nombre = %s
  ,apellido = %s
  ,correo_corporativo = %s
  ,correo_personal = %s
  ,telefono = %s
  ,celular_corporativo = %s
  ,celular_personal = %s
  ,fecha_update = NOW()
  ,user_nivel = %s
WHERE id_usuarios = %s;", $this->GetSQLValueString($usuario, "text"), $this->GetSQLValueString($clave, "text"), $this->GetSQLValueString($nombre, "text"), $this->GetSQLValueString($apellido, "text"), $this->GetSQLValueString($correo_corporativo, "text"), $this->GetSQLValueString($correo_personal, "text"), $this->GetSQLValueString($telefono, "text"), $this->GetSQLValueString($celular_corporativo, "text"), $this->GetSQLValueString($celular_personal, "text"), $this->GetSQLValueString($user_nivel, "text"), $this->GetSQLValueString($id_usuarios, "int")
        );
//	echo $deleteSQL;

        $rs_usuarios = insertT($deleteSQL);

        if ($rs_usuarios) {
            echo '<div class="ui-widget">
				<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
					<strong>Se actualiza con exito!</strong> Se Actualiza corectamente su Usuario</p>
				</div>
			</div>';
        } else {
            echo '<div class="ui-widget">
				<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
					<strong>Error:</strong> ' . $rs_usuarios . '</p>
				</div>
			</div>';
        }
    }

    function getUsaurio($id_usuarios) {
        $dato = NULL;
        $deleteSQL = sprintf('SELECT  tb_usuarios.id_usuarios
 , tb_usuarios.usuario
 , tb_usuarios.clave
 , tb_usuarios.nombre
 , tb_usuarios.apellido
 , tb_usuarios.correo_corporativo
 , tb_usuarios.correo_personal
 , tb_usuarios.telefono
 , tb_usuarios.celular_corporativo
 , tb_usuarios.celular_personal
 , tb_usuarios.fecha_insert
 , tb_usuarios.fecha_update
 , tb_usuarios.estado
 , tb_usuarios.user_nivel
FROM  tb_usuarios tb_usuarios
WHERE (tb_usuarios.id_usuarios = %s)', $this->GetSQLValueString($id_usuarios, "text")
        );
        $row_rs_usuarios = conectarseU($deleteSQL);
        $dato = $row_rs_usuarios;
        return $dato;
    }

    function setUsaurio($usuario, $clave, $nombre, $apellido, $correo_corporativo, $correo_personal, $telefono, $celular_corporativo, $celular_personal, $user_nivel) {
        $deleteSQL = sprintf("INSERT INTO tb_usuarios (usuario	,
clave	,
nombre	,
apellido	,
correo_corporativo	,
correo_personal	,
telefono	,
celular_corporativo	,
celular_personal	,
user_nivel	
	,fecha_update
) VALUES (
   %s ,
%s ,
%s ,
%s ,
%s ,
%s ,
%s ,
%s ,
%s ,
%s ,
NOW()
)", $this->GetSQLValueString($usuario, "text"), $this->GetSQLValueString($clave, "text"), $this->GetSQLValueString($nombre, "text"), $this->GetSQLValueString($apellido, "text"), $this->GetSQLValueString($correo_corporativo, "text"), $this->GetSQLValueString($correo_personal, "text"), $this->GetSQLValueString($telefono, "text"), $this->GetSQLValueString($celular_corporativo, "text"), $this->GetSQLValueString($celular_personal, "text"), $this->GetSQLValueString($user_nivel, "text")
        );
        //echo $deleteSQL;

        $rs_usuarios = insertT($deleteSQL);

        if ($rs_usuarios) {
            echo '<div class="ui-widget">
				<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
					<strong>Actualizado con exito!</strong> Se ingreso corectamente su Usuario</p>
				</div>
			</div>';
        } else {
            echo '<div class="ui-widget">
				<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
					<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
					<strong>Error:</strong> ' . $rs_usuarios . '</p>
				</div>
			</div>';
        }
    }

    function dar_lista_usuario() {

        $query_rs_usuarios = sprintf("SELECT tb_usuarios.usuario,
       tb_usuarios.nombre+ ' '+
       tb_usuarios.apellido as nombre,
       tb_usuarios.correo_corporativo,
       tb_usuarios.celular_corporativo,
       tb_usuarios.estado,
       CASE
          WHEN tb_usuarios.user_nivel = 0 THEN 'Usuario'
          WHEN tb_usuarios.user_nivel = 1 THEN 'Tecnico'
          WHEN tb_usuarios.user_nivel = 2 THEN 'Usuario Avanzado'
          WHEN tb_usuarios.user_nivel < 0 THEN 'Dasabilitado'
          ELSE 'Usuario No Contemplado'
       END
          AS user_nivel,
       tb_usuarios.telefono,
       tb_usuarios.id_usuarios
  FROM  tb_usuarios tb_usuarios;");


        $row_rs_usuarios = conT($query_rs_usuarios);

        ?>
        <div class="box-body table-responsive no-padding">
         <table id="darUsuarioSdeReq-vf66gt" class="table-striped table-bordered">
         <thead>
            <tr>
                <th>	Usuario 2</th>
                <th>	Nombre	</th>
                <th>	Correo	</th>
                <th>	Teléfono	</th>
                <th>	Celular	</th>
                <th>	Mail	</th>
                <th>	Tipo Usuario	</th>
                <th>Edición</th>
            </tr>
            </thead>
  <tbody>
        <?php foreach ($row_rs_usuarios as $row_rs_usuarios ) { ?>
                <tr>
                    <td><?php echo $row_rs_usuarios["usuario"]; ?></td>
                    <td><?php echo $row_rs_usuarios["nombre"]; ?></td>
                    <td><?php echo $row_rs_usuarios["correo_corporativo"]; ?></td>
                    <td><?php echo $row_rs_usuarios["telefono"]; ?></td>
                    <td><?php echo $row_rs_usuarios["celular_corporativo"]; ?></td>
                    <td><?php echo $row_rs_usuarios["correo_corporativo"]; ?></td>
                    <td><?php echo $row_rs_usuarios["user_nivel"]; ?></td>
                    <td><!--<a  style="float:right"  href="javascript: fn_editar_req(<?php echo $row_rs_usuarios["id_usuarios"]; ?>)" class="ui-state-default ui-corner-all" title=".ui-icon-pencil"><span class="ui-icon ui-icon-pencil"></span></a>-->
                        <a  style="float:right"  href="javascript: fn_usuarios_edit(<?php echo $row_rs_usuarios["id_usuarios"]; ?>)" class="ui-state-default ui-corner-all" title=".ui-icon-check"><span class="ui-icon ui-icon-check">Editar</span></a>
                    </td>
                </tr>
        <?php } ; ?>
        </tbody>
        </table>
        </div>
        <?php

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
?>