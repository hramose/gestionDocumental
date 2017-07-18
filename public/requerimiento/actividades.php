<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('../Connections/req_fun.php');
require_once('../Connections/cyber.php');
$rek = new Req_Controller($database_cyber, $cyber);
$rsol = $rek->darUsuarioSolicdeReq_dato($_REQUEST['id_peticion']);
$usu_sol = $rsol['usuario'];
$id_sol = $rsol['id_usuarios'];
if (isset($_SESSION['tecnico_user']) || (isset($_SESSION['tecnico_user']) ? $_SESSION['tecnico_user'] : '') == "") {
    $_SESSION['tecnico_user_id'] = isset($_SESSION['MM_IDUsername']) ? $_SESSION['MM_IDUsername'] : '';
    $_SESSION['tecnico_user'] = isset($_SESSION['MM_Username']) ? $_SESSION['MM_Username'] : '';
}
if ((isset($_REQUEST["cambia_tecnico"])) && ($_REQUEST["cambia_tecnico"] == "cambia_tecnico")) {
    $_SESSION['tecnico_user_id'] = $_REQUEST['id_usuarios'];
    $_SESSION['tecnico_user'] = $_REQUEST['usuario'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar actividades</title>
    </head>
    <body>	<h1><?php echo $rek->trans("messages.welcome","");?></h1>
        <script>
            function darFechIni() {
                return $('#fecha_ini').val() + ' ' + minutos_a_horas($('#fecha_ini_time').val());
            }
            function darFechFin() {
                return $('#fecha_fin').val() + ' ' + minutos_a_horas($('#fecha_fin_time').val());
            }
            function minutos_a_horas(min)
            {
                var hrs = Math.floor(min / 60);
                min = min % 60;
                if (min < 10)
                    min = "0" + min;
                return hrs + ":" + min;
            }

            function iniciar_actividad() {
                fn_usuario_pedido(<?php echo isset($_REQUEST['id_peticion']) ? $_REQUEST['id_peticion'] : '-95'; ?>);
                $("#fecha_ini").datepicker();
                $("#fecha_fin").datepicker();

                $("button#agregartec1aw3").button({
                    icons: {
                        primary: "ui-icon-disk"
                    },
                    text: true
                });
                //$( "button#usuario" ).click(function() { fn_cambiarSolic();return false; });
                $("button#agregartec1aw3").click(function () {
                    fn_gregar_pedido_ususrior(<?php echo isset($_REQUEST['id_peticion']) ? $_REQUEST['id_peticion'] : ''; ?>, $('#id_usuariossd34r').val(), 'TECNI', 'ACTIV', darFechIni(), darFechFin(), $('#sract_total').val(), $('#sract_description').val());
                    return false;
                });
                $("button#tecnicossd34r").click(function () {
                    //alert(765765765765);
                    fn_cambiarSolictecnico();
                    return false;
                });
                //$( "button#cambiar" ).click(function() { fn_cambiarSolic();return false; });
                $("button#cambiar").button({
                    icons: {
                        primary: "ui-icon-search"
                    },
                    text: true
                });
                $("button#desasociar").button({
                    icons: {
                        primary: "ui-icon-close"
                    },
                    text: true
                });
                /*$("button#usuario").button({
                 icons: {
                 primary: "ui-icon-person"
                 },
                 text: true
                 });*/
                $("button#tecnicossd34r").button({
                    icons: {
                        primary: "ui-icon-wrench"
                    },
                    text: true
                });

            }
            ;
            function sract_padout(number) {
                return (number < 10) ? '0' + number : number;
            }
            function sract_calcTotal() {

                var _valueFrom = $('#fecha_ini').val();
                var _valueTo = $('#fecha_fin').val();

                var _dateFrom = new Date($('#fecha_ini').val());
                var _dateTo = new Date($('#fecha_fin').val());
                var mins = (_dateTo - _dateFrom) / 60000;
                var mins = mins + parseInt($('#fecha_fin_time').val()) - parseInt($('#fecha_ini_time').val());
                //alert(1)
                if (parseInt(mins, 10) > 0) {
                    //alert(2)
                    var hour = Math.floor(mins / 60);
                    var min = mins % 60;
                    var res = sract_padout(hour) + ":" + sract_padout(min);
                    $('#sract_total').val(res);
                    $('#sract_totalMin').val(mins);

                } else {
                    $('#sract_total').val("");
                    $('#sract_totalMin').val("0");
                }
            }
        </script>

        <!--
        <button>Button with icon only</button>
        
        <button>Button with two icons</button>
        <button>Button with two icons and no text</button>
        -->
        <div data-role="fieldcontain"><label for="tecnicossd34r" class="ui-hidden-accessible">Usuario Solicitante:</label>
                        <div id="usuario" class="ui-btn ui-icon-home ui-btn-icon-left"><?php echo $usu_sol; ?></div>
            <button name="tecnicossd34r" id="tecnicossd34r" value="<?php echo (isset($_SESSION['tecnico_user']) ? $_SESSION['tecnico_user'] : ''); ?>">Buscar</button>                                                    <strong><div id="tec1234" class="button special fit" ><?php echo (isset($_SESSION['tecnico_user']) ? $_SESSION['tecnico_user'] : ''); ?></div></strong><input value="soporte" type="hidden" name="sract_user" />             
        </div>

        <div data-role="fieldcontain">                               <label for="nombre" >Hora de inicio:</label>
            <div class="row uniform 50%">
                <div class="col-xs-6 col-md-3">
                    <input name="fecha_ini" type="text" id="fecha_ini" onBlur="sract_calcTotal();" onChange="sract_calcTotal();" onClick="sract_calcTotal();" value="<?php echo date("m/d/Y"); ?>" size="12" maxlength="12"  class="form-control" />
                </div>
                <div class="col-xs-6 col-md-3">
                    <?php
                    $hora_act1 = (date("G") - 1) * 60 + date("i");
                    $hora_act = $hora_act1 - fmod($hora_act1, 15)
                    ?>

                    <select onChange="sract_calcTotal();" name="fecha_ini_time" id="fecha_ini_time" class="form-control">
                        <option value="0" <?php
                        if (!(strcmp(0, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>00:00</option>
                        <option value="15" <?php
                        if (!(strcmp(15, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>00:15</option>
                        <option value="30" <?php
                        if (!(strcmp(30, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>00:30</option>
                        <option value="45" <?php
                        if (!(strcmp(45, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>00:45</option>
                        <option value="60" <?php
                        if (!(strcmp(60, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>01:00</option>
                        <option value="75" <?php
                        if (!(strcmp(75, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>01:15</option>
                        <option value="90" <?php
                        if (!(strcmp(90, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>01:30</option>
                        <option value="105" <?php
                        if (!(strcmp(105, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>01:45</option>
                        <option value="120" <?php
                        if (!(strcmp(120, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>02:00</option>
                        <option value="135" <?php
                        if (!(strcmp(135, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>02:15</option>
                        <option value="150" <?php
                        if (!(strcmp(150, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>02:30</option>
                        <option value="165" <?php
                        if (!(strcmp(165, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>02:45</option>
                        <option value="180" <?php
                        if (!(strcmp(180, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>03:00</option>
                        <option value="195" <?php
                        if (!(strcmp(195, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>03:15</option>
                        <option value="210" <?php
                        if (!(strcmp(210, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>03:30</option>
                        <option value="225" <?php
                        if (!(strcmp(225, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>03:45</option>
                        <option value="240" <?php
                        if (!(strcmp(240, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>04:00</option>
                        <option value="255" <?php
                        if (!(strcmp(255, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>04:15</option>
                        <option value="270" <?php
                        if (!(strcmp(270, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>04:30</option>
                        <option value="285" <?php
                        if (!(strcmp(285, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>04:45</option>
                        <option value="300" <?php
                        if (!(strcmp(300, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>05:00</option>
                        <option value="315" <?php
                        if (!(strcmp(315, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>05:15</option>
                        <option value="330" <?php
                        if (!(strcmp(330, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>05:30</option>
                        <option value="345" <?php
                        if (!(strcmp(345, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>05:45</option>
                        <option value="360" <?php
                        if (!(strcmp(360, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>06:00</option>
                        <option value="375" <?php
                        if (!(strcmp(375, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>06:15</option>
                        <option value="390" <?php
                        if (!(strcmp(390, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>06:30</option>
                        <option value="405" <?php
                        if (!(strcmp(405, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>06:45</option>
                        <option value="420" <?php
                        if (!(strcmp(420, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>07:00</option>
                        <option value="435" <?php
                        if (!(strcmp(435, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>07:15</option>
                        <option value="450" <?php
                        if (!(strcmp(450, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>07:30</option>
                        <option value="465" <?php
                        if (!(strcmp(465, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>07:45</option>
                        <option value="480" <?php
                        if (!(strcmp(480, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>08:00</option>
                        <option value="495" <?php
                        if (!(strcmp(495, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>08:15</option>
                        <option value="510" <?php
                        if (!(strcmp(510, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>08:30</option>
                        <option value="525" <?php
                        if (!(strcmp(525, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>08:45</option>
                        <option value="540" <?php
                        if (!(strcmp(540, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>09:00</option>
                        <option value="555" <?php
                        if (!(strcmp(555, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>09:15</option>
                        <option value="570" <?php
                        if (!(strcmp(570, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>09:30</option>
                        <option value="585" <?php
                        if (!(strcmp(585, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>09:45</option>
                        <option value="600" <?php
                        if (!(strcmp(600, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>10:00</option>
                        <option value="615" <?php
                        if (!(strcmp(615, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>10:15</option>
                        <option value="630" <?php
                        if (!(strcmp(630, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>10:30</option>
                        <option value="645" <?php
                        if (!(strcmp(645, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>10:45</option>
                        <option value="660" <?php
                        if (!(strcmp(660, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>11:00</option>
                        <option value="675" <?php
                        if (!(strcmp(675, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>11:15</option>
                        <option value="690" <?php
                        if (!(strcmp(690, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>11:30</option>
                        <option value="705" <?php
                        if (!(strcmp(705, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>11:45</option>
                        <option value="720" <?php
                        if (!(strcmp(720, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>12:00</option>
                        <option value="735" <?php
                        if (!(strcmp(735, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>12:15</option>
                        <option value="750" <?php
                        if (!(strcmp(750, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>12:30</option>
                        <option value="765" <?php
                        if (!(strcmp(765, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>12:45</option>
                        <option value="780" <?php
                        if (!(strcmp(780, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>13:00</option>
                        <option value="795" <?php
                        if (!(strcmp(795, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>13:15</option>
                        <option value="810" <?php
                        if (!(strcmp(810, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>13:30</option>
                        <option value="825" <?php
                        if (!(strcmp(825, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>13:45</option>
                        <option value="840" <?php
                        if (!(strcmp(840, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>14:00</option>
                        <option value="855" <?php
                        if (!(strcmp(855, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>14:15</option>
                        <option value="870" <?php
                        if (!(strcmp(870, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>14:30</option>
                        <option value="885" <?php
                        if (!(strcmp(885, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>14:45</option>
                        <option value="900" <?php
                        if (!(strcmp(900, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>15:00</option>
                        <option value="915" <?php
                        if (!(strcmp(915, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>15:15</option>
                        <option value="930" <?php
                        if (!(strcmp(930, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>15:30</option>
                        <option value="945" <?php
                        if (!(strcmp(945, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>15:45</option>
                        <option value="960" <?php
                        if (!(strcmp(960, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>16:00</option>
                        <option value="975" <?php
                        if (!(strcmp(975, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>16:15</option>
                        <option value="990" <?php
                        if (!(strcmp(990, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>16:30</option>
                        <option value="1005" <?php
                        if (!(strcmp(1005, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>16:45</option>
                        <option value="1020" <?php
                        if (!(strcmp(1020, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>17:00</option>
                        <option value="1035" <?php
                        if (!(strcmp(1035, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>17:15</option>
                        <option value="1050" <?php
                        if (!(strcmp(1050, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>17:30</option>
                        <option value="1065" <?php
                        if (!(strcmp(1065, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>17:45</option>
                        <option value="1080" <?php
                        if (!(strcmp(1080, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>18:00</option>
                        <option value="1095" <?php
                        if (!(strcmp(1095, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>18:15</option>
                        <option value="1110" <?php
                        if (!(strcmp(1110, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>18:30</option>
                        <option value="1125" <?php
                        if (!(strcmp(1125, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>18:45</option>
                        <option value="1140" <?php
                        if (!(strcmp(1140, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>19:00</option>
                        <option value="1155" <?php
                        if (!(strcmp(1155, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>19:15</option>
                        <option value="1170" <?php
                        if (!(strcmp(1170, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>19:30</option>
                        <option value="1185" <?php
                        if (!(strcmp(1185, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>19:45</option>
                        <option value="1200" <?php
                        if (!(strcmp(1200, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>20:00</option>
                        <option value="1215" <?php
                        if (!(strcmp(1215, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>20:15</option>
                        <option value="1230" <?php
                        if (!(strcmp(1230, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>20:30</option>
                        <option value="1245" <?php
                        if (!(strcmp(1245, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>20:45</option>
                        <option value="1260" <?php
                        if (!(strcmp(1260, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>21:00</option>
                        <option value="1275" <?php
                        if (!(strcmp(1275, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>21:15</option>
                        <option value="1290" <?php
                        if (!(strcmp(1290, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>21:30</option>
                        <option value="1305" <?php
                        if (!(strcmp(1305, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>21:45</option>
                        <option value="1320" <?php
                        if (!(strcmp(1320, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>22:00</option>
                        <option value="1335" <?php
                        if (!(strcmp(1335, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>22:15</option>
                        <option value="1350" <?php
                        if (!(strcmp(1350, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>22:30</option>
                        <option value="1365" <?php
                        if (!(strcmp(1365, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>22:45</option>
                        <option value="1380" <?php
                        if (!(strcmp(1380, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>23:00</option>
                        <option value="1395" <?php
                        if (!(strcmp(1395, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>23:15</option>
                        <option value="1410" <?php
                        if (!(strcmp(1410, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>23:30</option>
                        <option value="1425" <?php
                        if (!(strcmp(1425, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>23:45</option>
                        <option value="1440" <?php
                        if (!(strcmp(1440, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>24:00</option>
                    </select> 
                </div>
            </div>
                                 

        </div>
        <div data-role="fieldcontain">                               <label for="nombre">Hora de fin:</label>
            <div class="row uniform 50%">
                <div class="col-xs-6 col-md-3">
                    <input onBlur="sract_calcTotal();" onClick="sract_calcTotal();" onChange="sract_calcTotal();" value="<?php echo date("m/d/Y"); ?>" size="12" name="fecha_fin" id="fecha_fin" type="text" data-role="date" class="form-control" />	
                </div>
                <div class="col-xs-6 col-md-3">
                    <select onChange="sract_calcTotal();" name="fecha_fin_time" id="fecha_fin_time" class="form-control">
                        <option value="0" <?php
                        if (!(strcmp(0, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>00:00</option>
                        <option value="15" <?php
                        if (!(strcmp(15, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>00:15</option>
                        <option value="30" <?php
                        if (!(strcmp(30, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>00:30</option>
                        <option value="45" <?php
                        if (!(strcmp(45, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>00:45</option>
                        <option value="60" <?php
                        if (!(strcmp(60, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>01:00</option>
                        <option value="75" <?php
                        if (!(strcmp(75, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>01:15</option>
                        <option value="90" <?php
                        if (!(strcmp(90, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>01:30</option>
                        <option value="105" <?php
                        if (!(strcmp(105, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>01:45</option>
                        <option value="120" <?php
                        if (!(strcmp(120, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>02:00</option>
                        <option value="135" <?php
                        if (!(strcmp(135, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>02:15</option>
                        <option value="150" <?php
                        if (!(strcmp(150, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>02:30</option>
                        <option value="165" <?php
                        if (!(strcmp(165, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>02:45</option>
                        <option value="180" <?php
                        if (!(strcmp(180, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>03:00</option>
                        <option value="195" <?php
                        if (!(strcmp(195, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>03:15</option>
                        <option value="210" <?php
                        if (!(strcmp(210, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>03:30</option>
                        <option value="225" <?php
                        if (!(strcmp(225, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>03:45</option>
                        <option value="240" <?php
                        if (!(strcmp(240, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>04:00</option>
                        <option value="255" <?php
                        if (!(strcmp(255, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>04:15</option>
                        <option value="270" <?php
                        if (!(strcmp(270, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>04:30</option>
                        <option value="285" <?php
                        if (!(strcmp(285, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>04:45</option>
                        <option value="300" <?php
                        if (!(strcmp(300, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>05:00</option>
                        <option value="315" <?php
                        if (!(strcmp(315, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>05:15</option>
                        <option value="330" <?php
                        if (!(strcmp(330, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>05:30</option>
                        <option value="345" <?php
                        if (!(strcmp(345, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>05:45</option>
                        <option value="360" <?php
                        if (!(strcmp(360, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>06:00</option>
                        <option value="375" <?php
                        if (!(strcmp(375, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>06:15</option>
                        <option value="390" <?php
                        if (!(strcmp(390, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>06:30</option>
                        <option value="405" <?php
                        if (!(strcmp(405, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>06:45</option>
                        <option value="420" <?php
                        if (!(strcmp(420, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>07:00</option>
                        <option value="435" <?php
                        if (!(strcmp(435, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>07:15</option>
                        <option value="450" <?php
                        if (!(strcmp(450, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>07:30</option>
                        <option value="465" <?php
                        if (!(strcmp(465, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>07:45</option>
                        <option value="480" <?php
                        if (!(strcmp(480, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>08:00</option>
                        <option value="495" <?php
                        if (!(strcmp(495, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>08:15</option>
                        <option value="510" <?php
                        if (!(strcmp(510, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>08:30</option>
                        <option value="525" <?php
                        if (!(strcmp(525, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>08:45</option>
                        <option value="540" <?php
                        if (!(strcmp(540, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>09:00</option>
                        <option value="555" <?php
                        if (!(strcmp(555, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>09:15</option>
                        <option value="570" <?php
                        if (!(strcmp(570, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>09:30</option>
                        <option value="585" <?php
                        if (!(strcmp(585, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>09:45</option>
                        <option value="600" <?php
                        if (!(strcmp(600, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>10:00</option>
                        <option value="615" <?php
                        if (!(strcmp(615, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>10:15</option>
                        <option value="630" <?php
                        if (!(strcmp(630, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>10:30</option>
                        <option value="645" <?php
                        if (!(strcmp(645, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>10:45</option>
                        <option value="660" <?php
                        if (!(strcmp(660, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>11:00</option>
                        <option value="675" <?php
                        if (!(strcmp(675, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>11:15</option>
                        <option value="690" <?php
                        if (!(strcmp(690, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>11:30</option>
                        <option value="705" <?php
                        if (!(strcmp(705, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>11:45</option>
                        <option value="720" <?php
                        if (!(strcmp(720, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>12:00</option>
                        <option value="735" <?php
                        if (!(strcmp(735, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>12:15</option>
                        <option value="750" <?php
                        if (!(strcmp(750, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>12:30</option>
                        <option value="765" <?php
                        if (!(strcmp(765, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>12:45</option>
                        <option value="780" <?php
                        if (!(strcmp(780, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>13:00</option>
                        <option value="795" <?php
                        if (!(strcmp(795, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>13:15</option>
                        <option value="810" <?php
                        if (!(strcmp(810, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>13:30</option>
                        <option value="825" <?php
                        if (!(strcmp(825, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>13:45</option>
                        <option value="840" <?php
                        if (!(strcmp(840, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>14:00</option>
                        <option value="855" <?php
                        if (!(strcmp(855, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>14:15</option>
                        <option value="870" <?php
                        if (!(strcmp(870, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>14:30</option>
                        <option value="885" <?php
                        if (!(strcmp(885, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>14:45</option>
                        <option value="900" <?php
                        if (!(strcmp(900, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>15:00</option>
                        <option value="915" <?php
                        if (!(strcmp(915, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>15:15</option>
                        <option value="930" <?php
                        if (!(strcmp(930, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>15:30</option>
                        <option value="945" <?php
                        if (!(strcmp(945, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>15:45</option>
                        <option value="960" <?php
                        if (!(strcmp(960, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>16:00</option>
                        <option value="975" <?php
                        if (!(strcmp(975, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>16:15</option>
                        <option value="990" <?php
                        if (!(strcmp(990, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>16:30</option>
                        <option value="1005" <?php
                        if (!(strcmp(1005, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>16:45</option>
                        <option value="1020" <?php
                        if (!(strcmp(1020, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>17:00</option>
                        <option value="1035" <?php
                        if (!(strcmp(1035, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>17:15</option>
                        <option value="1050" <?php
                        if (!(strcmp(1050, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>17:30</option>
                        <option value="1065" <?php
                        if (!(strcmp(1065, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>17:45</option>
                        <option value="1080" <?php
                        if (!(strcmp(1080, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>18:00</option>
                        <option value="1095" <?php
                        if (!(strcmp(1095, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>18:15</option>
                        <option value="1110" <?php
                        if (!(strcmp(1110, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>18:30</option>
                        <option value="1125" <?php
                        if (!(strcmp(1125, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>18:45</option>
                        <option value="1140" <?php
                        if (!(strcmp(1140, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>19:00</option>
                        <option value="1155" <?php
                        if (!(strcmp(1155, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>19:15</option>
                        <option value="1170" <?php
                        if (!(strcmp(1170, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>19:30</option>
                        <option value="1185" <?php
                        if (!(strcmp(1185, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>19:45</option>
                        <option value="1200" <?php
                        if (!(strcmp(1200, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>20:00</option>
                        <option value="1215" <?php
                        if (!(strcmp(1215, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>20:15</option>
                        <option value="1230" <?php
                        if (!(strcmp(1230, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>20:30</option>
                        <option value="1245" <?php
                        if (!(strcmp(1245, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>20:45</option>
                        <option value="1260" <?php
                        if (!(strcmp(1260, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>21:00</option>
                        <option value="1275" <?php
                        if (!(strcmp(1275, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>21:15</option>
                        <option value="1290" <?php
                        if (!(strcmp(1290, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>21:30</option>
                        <option value="1305" <?php
                        if (!(strcmp(1305, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>21:45</option>
                        <option value="1320" <?php
                        if (!(strcmp(1320, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>22:00</option>
                        <option value="1335" <?php
                        if (!(strcmp(1335, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>22:15</option>
                        <option value="1350" <?php
                        if (!(strcmp(1350, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>22:30</option>
                        <option value="1365" <?php
                        if (!(strcmp(1365, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>22:45</option>
                        <option value="1380" <?php
                        if (!(strcmp(1380, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>23:00</option>
                        <option value="1395" <?php
                        if (!(strcmp(1395, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>23:15</option>
                        <option value="1410" <?php
                        if (!(strcmp(1410, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>23:30</option>
                        <option value="1425" <?php
                        if (!(strcmp(1425, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>23:45</option>
                        <option value="1440" <?php
                        if (!(strcmp(1440, "$hora_act"))) {
                            echo "selected=\"selected\"";
                        }
                        ?>>24:00</option>
                    </select>
                </div>
            </div>
                              

        </div>
        <div data-role="fieldcontain">                               <label for="nombre">Total:</label>
                        <input size="7" name="sract_total" id="sract_total"  onblur="sract_calcTotal();" onClick="sract_calcTotal();" onChange="sract_calcTotal();" type="text" class="form-control"/>
            <input size="7" type="hidden" name="sract_totalMin" id="sract_totalMin" />             
        </div>
        <input type="hidden" name="id_usuariossd34r" id="id_usuariossd34r" value="<?php echo (isset($_SESSION['tecnico_user_id']) ? $_SESSION['tecnico_user_id'] : '-1511'); ?>" />
        <div data-role="fieldcontain">                               <label for="nombre" class="ui-hidden-accessible">Descripción:</label>
                        
            <textarea name="sract_description" id="sract_description" placeholder="Descripción" rows="6" required class="form-control"></textarea>           
        </div>
        <button id="agregartec1aw3" class="ui-btn ui-icon-home ui-btn-icon-left">Agregar</button>
        <input value="0" type="hidden" name="end_time_total" />
        <input type="hidden" name="newActivities" />


        <div id="detaUsu_pedido_234q">

            <table id="t">
                <tbody>
                    <tr>
                        <th>Usuario</th>
                        <th>Hora de inicio</th>
                        <th>Hora de fin</th>
                        <th>Total</th>
                        <th>Descripción</th>
                        <th>Acción</th>
                    </tr>
                    <tr>
                        <td>Preuba65418j8</td>
                        <td>04/22/2009 09:00</td>
                        <td>04/22/2009 15:30</td>
                        <td>06:30</td>
                        <td>revision del sistema</td>
                        <td><table onClick="sract_ExecuteDel('4')">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td unselectable="true">Eliminar </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table></td>
                    </tr>
                    <tr>
                        <td colspan="3"><div align="center">Total</div></td>
                        <td>06:30</td>
                        <td colspan="2"> </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <script language="javascript">
            iniciar_actividad();
        </script>

    </body>
</html>