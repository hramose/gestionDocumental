

function racargarTabla(tabla) {
    /*$(tabla).table({
        rebuild: function (event, ui) {
        }
    });*/
}
function fn_cerrar() {
    
	$("#headerXcd33a").fadeOut();;
    $("#popupDialogx1").modal("hide");
    /*$.unblockUI({ 
     onUnblock: function(){
     $("#div_oculto").html("");
     }
     }); */
}
;
function iniformaflotanteprim1() {
    $("#div_listar_detalle").dialog({
        autoOpen: true,
        height: 600,
        width: 700,
        modal: true,
        buttons: {
            Cancel: function () {
                $(this).dialog("close");
            }
        }
    });
    $("#div_listar_detalle").dialog("open");
}

function fn_cerrarprim1() {
    $("#div_listar_detalle").dialog("close");
}
;

function iniformaflotanteprim2() {
    $("#div_listar_detalle_util").dialog({
        autoOpen: true,
        height: 600,
        width: 700,
        modal: true,
        buttons: {
            Cancel: function () {
                $(this).dialog("close");
            }
        }
    });
    $("#div_listar_detalle_util").dialog("open");
}

function fn_cerrarprim2() {
    $("#div_listar_detalle_util").dialog("close");
}
;

function iniformaflotante_pequena() {
    $("#popupDialogx1").modal("show");
    /*$( "#dialog-form" ).dialog({
     autoOpen: true,
     height: 250,
     width: 400,
     modal: true,
     buttons: {				
     Cancel: function() {
     $( this ).dialog( "close" );
     }
     }			
     });*/
    
}

function iniformaflotante() {
    $("#popupDialogx1").modal("show");
    /*$( "#dialog-form" ).dialog({
     autoOpen: true,
     height: 600,
     width: 700,
     modal: true,
     buttons: {				
     Cancel: function() {
     $( this ).dialog( "close" );
     }
     }			
     });
     $( "#dialog-form" ).dialog("open");*/
}
function fn_carga_i(){
	$("#acc87886").show();
}
function fn_carga_f(){
	$("#acc87886").hide();
}

/*===========================================================
*del login
===========================================================*/
function fn_user() {
	fn_carga_i();
    var str = $("#frm_buscar").serialize();/*es para pasar los datos del form como un query conlos campos*/
    $.ajax({
        url: 'login/list.php',
        type: 'get',
        data: str,
        success: function (data) {
            $("#div_listar").html(data);
			fn_carga_f();
            fn_cerrar();
        }
    });
}

function fn_new_user() {
	fn_carga_i();
    $("#dialog-form").load("login/new.php", {
        id: '777777'
    }, function () {
		fn_carga_f();
        iniformaflotante();
    });
}
;

function fn_user_modificar(user_id) {
	fn_carga_i();
    $("#dialog-form").load("login/edit.php", {
        user_id: user_id
    }, function () {
		fn_carga_f();
        iniformaflotante();/*#dialog-form*/
    });
}
;

function fn_user_eliminar(user_id) {
	fn_carga_i();
    var respuesta = confirm("Desea eliminar a este Usuario?");
    if (respuesta) {
        $.ajax({
            url: 'login/del.php',
            data: 'user_id=' + user_id,
            type: 'post',
            success: function (data) {
                if (data != "")
                    alert(data);
				fn_carga_f();	
                fn_user()
            }
        });
    }
}

function fn_agregar_user() {
	fn_carga_i();
    var str = $("#form1").serialize();
    $.ajax({
        url: 'login/new.php',
        type: 'post',
        data: str,
        success: function (data) {
            if (data != "")
                alert(data);
				fn_carga_f();
            fn_user();
        }
    });
}
function fn_actualizar_user() {
	fn_carga_i();
    var str = $("#form1").serialize();
    $.ajax({
        url: 'login/edit.php',
        type: 'post',
        data: str,
        success: function (data) {
            if (data != "")
                alert(data);
				fn_carga_f();
            fn_user();
        }
    });
}
function fn_salir_user() {
	fn_carga_i();
    $("#dialog-form").load("login/salir.php", {
        id: '777777'
    }, function () {
		fn_carga_f();
        iniformaflotante_pequena();/*#dialog-form*/
    });
}
;
function fn_logear() {
    $("#dialog-form").load("login/login.php", {
        id: '777777'
    }, function () {
        iniformaflotante_pequena();/*#dialog-form*/
    });
}
;
function fn_recuperar_log0() {
    $("#dialog-form").load("login/recuperalogin.php", {
        id: '777777'
    }, function () {
        iniformaflotante_pequena();/*#dialog-form*/
    });
}
;
function fn_in_logear() {
    var str = $("#form1").serialize();
    $.ajax({
        url: 'login/edit.php',
        type: 'post',
        data: str,
        success: function (data) {
            if (data != "")
                alert(data);
            fn_user();
        }
    });
}

function clicK_derecho() {
    $("#page-bgbtm").mousedown(function (e) {
        if (e.button == 2) {
            $("#dialog-form").html("<p>&nbsp;</p><p>&nbsp;</p><table align=\"center\"><tr><td><h1>Aerogal Soporte.</h1><br><h2>Aerogal Desarrollo</h2><br /><h3>Diseñado por Sistemas Aerogal</h3></td></tr></table>");
            iniformaflotante();/*#dialog-form*/

        }
    });
}


function fn_requerimiento_teleno_new(id_usuarios) {
    
    $("#div_listar_detalle_util").html("");
    var str = $("#formreqLLamadatelefono").serialize();/*es para pasar los datos del form como un query conlos campos	*/
    var respuesta = confirm("¿Desea Ingresar una nueva requerimiento Telefonico?");
    var falta_campos = true;
    if ($('#estado').val() == "EN PROCESO") {
        fn_valid0('#resolution');
        fn_valid0('#solution');
        if ($('#id_departamento').val() == '---') {
            falta_campos = false;
            fn_invalid0('#id_departamento')
        } else {
            fn_valid0('#id_departamento')
        }
        ;
        if ($('#Prioridad').val() == '---') {
            falta_campos = false;
            fn_invalid0('#Prioridad')
        } else {
            fn_valid0('#Prioridad')
        }
        ;
        if ($('#extencion').val() == '') {
            falta_campos = false;
            fn_invalid0('#extencion')
        } else {
            fn_valid0('#extencion')
        }
        ;
    } else {
        if ($('#resolution').val() == '') {
            falta_campos = false;
            fn_invalid0('#resolution')
        } else {
            fn_valid0('#resolution')
        }
        ;
        if ($('#solution').val() == '') {
            falta_campos = false;
            fn_invalid0('#solution')
        } else {
            fn_valid0('#solution')
        }
        ;
    }

    if ($('#select_name_user').val() == '---') {
        falta_campos = false;
        fn_invalid0('#select_name_user')
    } else {
        fn_valid0('#select_name_user')
    }
    ;

    if ($('#tecnicossd36r').val() == '') {
        falta_campos = false;
        fn_invalid0('#tecnicossd36r');
        $("#tec1234").html("Este dato es Mandatorio");
        fn_invalid0('#tec1234');
    } else {
        fn_valid0('#tecnicossd36r');
        fn_valid0('#tec1234');
    }
    ;

    if ($('#nombre').val() == '') {
        falta_campos = false;
        fn_invalid0('#nombre')
    } else {
        fn_valid0('#nombre')
    }
    ;
    if ($('#titulo').val() == '') {
        falta_campos = false;
        fn_invalid0('#titulo')
    } else {
        fn_valid0('#titulo')
    }
    ;
    if ($('#problema').val() == '') {
        falta_campos = false;
        fn_invalid0('#problema')
    } else {
        fn_valid0('#problema')
    }
    ;
    if ($('#mail_req').val() == '') {
        fn_invalid0('#mail_req')
    } else {
        if (valEmail($('#mail_req').val())) {
            fn_valid0('#mail_req')
        } else {
            fn_invalid0('#mail_req')
        }
    }
    ;

    $("#div_listar_detalle_util").html("");
    if (!falta_campos) {
        alert("Complete los campos");
        $("#div_listar_detalle_util").html('<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> <strong>Alert:</strong>Campos Obligatorios.</p></div></div>');
        /*$(this).effect("shake", { times:3 }, 200);*/
        $("#div_listar_detalle_util").effect("shake", {
            times: 3
        }, 100);
    }
    if (respuesta && falta_campos) {
        if (respuesta) {
			fn_carga_i();
            $.ajax({
                url: 'requerimiento/telefonica.php',
                data: str,
                type: 'post',
                success: function (data) {
                    if (data != "") {
                        $("#div_listar_detalle_util").html(data);

                        if (data.indexOf('Actualizado') > 0) {
                            $("#div_listar").html("Actualizado Exitoso");
                        }/*coment borrar*/
						fn_carga_f();
                    }
                }
            });
        }
    }
}

function fn_mandaCorreo_resuelto(campo, id_peticion, para, nombre_para, usuario_d, estacion_d, telefono_d, titulo_d, reolucion_d) {
    
    $(campo).load("Connections/envia_correo_resuelto.php", {
        id_peticion: id_peticion,
        para: para,
        nombre_para: nombre_para,
        usuario_d: usuario_d,
        estacion_d: estacion_d,
        telefono_d: telefono_d,
        titulo_d: titulo_d,
        reolucion_d: reolucion_d
    }, function () {
        		
    });
}

function fn_Kitar_pedido_ususrior_PROCESO(id_pedido_usuarios,tipo) {
    
    $("#div_listar_detalle_util").html('');
    var respuesta = confirm("¿Desea Quitar este Usuario de este pedido? ¡Esto no es Reversible.!");
    if (respuesta) {
		fn_carga_i();
        $.ajax({
            url: 'requerimiento/pedido_usuarios.php',
            type: 'post',
            data: 'kitar_pedido_ususrior=kitar_pedido_ususrior&id_pedido_usuarios=' + id_pedido_usuarios, //str,
            success: function (data) {
                $("#div_listar_detalle_util").html(data);
                if (data.indexOf('Actualizado') > 0) {
                    fn_requerimiento_list(tipo);

                }/*coment borrar*/
				fn_carga_f();
            }
        });

    }
}
;


function fn_asigname(id_peticion, id_usuarios, estado) {
    fn_carga_i();
    $.ajax({
        url: 'requerimiento/asigna_cerrar_abrir.php',
        type: 'get',
        data: "id_peticion=" + id_peticion + "&id_usuarios=" + id_usuarios + "&estado=" + estado + "&MM_update=fn_asigname", 
        success: function (data) {
            $("#div_listar_detalle_util").html("Se creo un evento " + data);
            fn_carga_i();
			fn_cerrar();
        }
    });
}


function fn_quitar_asignate_requerimiento(id_peticion, id_usuarios,tipo) {
    //$("#div_listar_detalle_util").html("");
    //$("#div_listar").html();				
	fn_carga_i();
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos	
    var respuesta = confirm("¿Desea Quitarse la asignarsion a este requerimiento !");
    if (respuesta) {
        fn_requerimiento_list(tipo);
		fn_carga_f();
    }
}

function fn_asignate_requerimiento(id_peticion, id_usuarios,tipo) {
    //$("#div_listar_detalle_util").html("");
    //$("#div_listar").html();				
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos	
    var respuesta = confirm("¿Desea Asignarse este requerimiento !");
    if (respuesta) {
		fn_carga_i();
        fn_asigname(id_peticion, id_usuarios, "PROCE");
        fn_requerimiento_list(tipo);
		fn_carga_f();
    }
}

function fn_mandaCorreo_solamente(campo, id_peticion, para, nombre_para, progresito) {
    //alert("mandando correo");
    $(campo).load("Connections/envia_correo.php", {
        id_peticion: id_peticion,
        para: para,
        nombre_para: nombre_para
    }, function () {
        //iniformaflotante();/*#dialog-form*/

    });
}

function fn_mandaCorreo(campo, id_peticion, para, nombre_para, progresito) {
    //alert("mandando correo");
    $(campo).load("Connections/envia_correo.php", {
        id_peticion: id_peticion,
        para: para,
        nombre_para: nombre_para
    }, function () {
        //iniformaflotante();/*#dialog-form*/
        set_avance3444(progresito)
    });
}


function fn_listar_archivosPedido(campo, uniq) {
    //alert(1);
    $(campo).load("elfinder-2.0-rc1/listar.php", {
        uniq: uniq
    }, function () {
        //iniformaflotante();/*#dialog-form*/
    });
}
function fn_Kitar_pedido_ususrior(id_pedido_usuarios, id_peticion) {
    //alert('awertfgb')
    $("#div_listar_detalle_util").html('');
    var respuesta = confirm("¿Desea Quitar este Usuario de este pedido? ¡Esto no es Reversible.!");
    if (respuesta) {
		fn_carga_i();
        $.ajax({
            url: 'requerimiento/pedido_usuarios.php',
            type: 'post',
            data: 'kitar_pedido_ususrior=kitar_pedido_ususrior&id_pedido_usuarios=' + id_pedido_usuarios, //str,
            success: function (data) {
                $("#div_listar_detalle_util").html(data);
                if (data.indexOf('Actualizado') > 0) {
                    fn_usuario_pedido(id_peticion);
                    //$("#div_listar").html("Actualizado Exitoso");
                }/*coment borrar*/
				fn_carga_f();
            }
        });

    }
}
;
function fn_gregar_pedido_ususrior(id_peticion, id_usuarios, tipo, estado, fecha_ini, fecha_fin, total, descripcion) {
    //$("#div_listar_detalle_util").html("");
    //$("#div_listar").html();		
    $("#div_listar_detalle_util").html('');
    var respuesta = confirm("¿Desea Añadir este pedido a este usuario?");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos	
    if (respuesta) {
		fn_carga_i();
        $.ajax({
            url: 'requerimiento/pedido_usuarios.php',
            type: 'post',
            data: 'aumentarusuariopedido=aumentarusuariopedido&id_peticion=' + id_peticion + '&id_usuarios=' + id_usuarios + '&tipo=' + tipo + '&estado=' + estado + '&fecha_ini=' + fecha_ini + '&fecha_fin=' + fecha_fin
                    + '&total=' + total + '&descripcion=' + descripcion, //str,
            success: function (data) {
                $("#div_listar_detalle_util").html(data);
                if (data.indexOf('Actualizado') > 0) {

                    fn_usuario_pedido(id_peticion);

                    //$("#div_listar").html("Actualizado Exitoso");
                }/*coment borrar*/
				fn_carga_f();
            }
        });
    }
}

function fn_cambiarSolictecnicEcho(id_usuarios, usuario) {
    //alert('awertfgb')
	fn_carga_i();
    $("#div_listar_detalle_util").html('');
    //alert('esto es lo q pasa'+id_usuarios);
    $('#id_usuariossd34r').val(id_usuarios);
    $('#tecnicossd34r').val(usuario);
    $('#tec1234').html("Nuevo Usuario:" + usuario);
	fn_carga_f();
    fn_cerrar()
}
;

function fn_cambiarUser_solic_telefonoEcho(id_usuarios, usuario) {
    //alert('awertfgb')
    $("#div_listar_detalle_util").html('');
    //alert('esto es lo q pasa'+id_usuarios);
    $('#id_usuariossds2ssr').val(id_usuarios);
    $('#tecnicossd36r').val(usuario);
    $('#tec1234').html(usuario);

    fn_cerrar()
}
;

function fn_cambiarUser_solic_telefono() {
    //alert('awertfgb')
    $("#dialog-form").load("requerimiento/pedido_usuarios.php", {
        dar_user_solic_tlef: 'dar_user_solic_tlef'
    }, function () {
        iniformaflotante();/*#dialog-form*/
        racargarTabla("#darUsuarioSdeReq65t");
    });
}
;

function fn_cambiarSolictecnico() {

    $("#dialog-form").load("requerimiento/pedido_usuarios.php", {
        dar_tecnico_solic: 'dar_tecnico_solic'
    }, function () {
        iniformaflotante();/*#dialog-form*/		
        racargarTabla("#darUsuarioSdeReq65t");
    });
}
;
function fn_cambiarSolic() {
    //alert('awertfgb')
    $("#dialog-form").load("requerimiento/pedido_usuarios.php", {
        dar_usuario_solic: 'dar_usuario_solic'
    }, function () {
        iniformaflotante();/*#dialog-form*/
    });
}
;


function fn_usuario_pedido(id_peticion) {
    //$("#div_listar_detalle_util").html("");
    //$("#div_listar").html();		
    $("#div_listar_detalle_util").html('');
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos	
	fn_carga_i();
    $.ajax({
        url: 'requerimiento/pedido_usuarios.php',
        type: 'post',
        data: 'darUsuarioSdeReq=darUsuarioSdeReq&id_peticion=' + id_peticion, //str,
        success: function (data) {

            $("#detaUsu_pedido_234q").html(data);
			fn_carga_f();
            racargarTabla("#darUsuarioSdeReq-xc23de");

        }
    });
}

function fn_requerimiento_editar() {
    //$("#div_listar_detalle_util").html("");
    //$("#div_listar").html();
    $("#div_listar_detalle_util").html('');
    var respuesta = confirm("¿Desea Modificar el Requerimiento?");
    if ($('#solicitud_listo').val() == 0) {
        alert("No se asignó solución, por favor asigne una");		
        respuesta = false;
    }
    var str = $("#formreq_sssds2").serialize();//es para pasar los datos del form como un query conlos campos		
    if (respuesta) {
		fn_carga_i();
        $.ajax({
            url: 'requerimiento/form_detalle.php',
            type: 'post',
            data: str,
            success: function (data) {
                $("#div_listar_detalle_util").html(data);
                if (data.indexOf('Actualizado') > 0) {
                    $("#div_listar").html("Actualizado Exitoso");
                }/*coment borrar*/
				fn_carga_f();
            }
        });
    }
}

function fn_edit_solucion(idSolucion) {
    //$("#div_listar_detalle_util").html("");
    //$("#div_listar").html();		
    $("#div_listar_detalle_util").html('');
    var respuesta = confirm("¿Desea Modificar la Solucion?");
    var str = $("#formSolucion").serialize();//es para pasar los datos del form como un query conlos campos	
    if (respuesta) {
		fn_carga_i();
        $.ajax({
            url: 'requerimiento/solucion.php',
            type: 'post',
            data: str,
            success: function (data) {
                $("#div_listar_detalle_util").html(data);
                if (data.indexOf('Actualizado') > 0) {
                    $("#div_listar").html("Actualizado Exitoso");
					fn_detalle_req(idSolucion);
                }/*coment borrar*/
				fn_carga_f();
            }
        });
    }
}
function fn_set_solucion(idSolucion) {
    
    var respuesta = confirm("¿Desea Ingresar una Solucion?");
    var str = $("#formSolucion").serialize();/*es para pasar los datos del form como un query conlos campos	*/
    if (respuesta) {
		fn_carga_i();
        $.ajax({
            url: 'requerimiento/solucion.php',
            type: 'post',
            data: str,
            success: function (data) {
                $("#div_listar_detalle_util").html(data);
                if (data.indexOf('Actualizado') > 0) {
                    $("#div_listar").html("Actualizado Exitoso");
					fn_detalle_req(idSolucion);
                }/*coment borrar*/
				fn_carga_f();
            }
        });
    }
}
function fn_detalle_req(id_peticion) {
    var str = $("#formreq").serialize();/*es para pasar los datos del form como un query conlos campos	*/
    fn_carga_i();
	$.ajax({
        url: 'requerimiento/detalle.php',
        type: 'get',
        data: "id_peticion=" + id_peticion,/*str,*/
        success: function (data) {
            $("#div_listar").html(data);
            fn_cerrar();
			
			$('#tabs friends').tab('show'); /* Select first tab*/
			$.get("requerimiento/form_detalle.php?id_peticion="+id_peticion, function(data) {
				$("#contacts").html(data);
			});
			fn_carga_f();
			
        }
    });
}
function fn_valid0(campo) {
    $(campo).css("background-color", '#FFFFCC');
}

function fn_invalid0(campo) {
    $(campo).css("background-color", '#FFBFBF');
    $("campo").prepend("<b>Obligatorio</b>");

}
function valEmail(valor) {
    re = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/
    if (!re.exec(valor)) {
        return false;
    } else {
        return true;
    }
}
function fn_requerimiento_new(id_usuarios) {
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos	
    var respuesta = confirm("¿Desea Ingresar una nueva requerimiento?");
    var falta_campos = true;
    if ($('#id_departamento').val() == '---') {
        falta_campos = false;
        fn_invalid0('#id_departamento')
    } else {
        fn_valid0('#id_departamento')
    }
    ;
    if ($('#Prioridad').val() == '---') {
        falta_campos = false;
        fn_invalid0('#Prioridad')
    } else {
        fn_valid0('#Prioridad')
    }
    ;
    if ($('#nombre').val() == '') {
        falta_campos = false;
        fn_invalid0('#nombre')
    } else {
        fn_valid0('#nombre')
    }
    ;
    if ($('#id_departamento').val() == '---') {
        falta_campos = false;
        fn_invalid0('#id_departamento')
    } else {
        fn_valid0('#id_departamento')
    }
    ;
    if ($('#titulo').val() == '') {
        falta_campos = false;
        fn_invalid0('#titulo')
    } else {
        fn_valid0('#titulo')
    }
    ;
    if ($('#problema').val() == '') {
        falta_campos = false;
        fn_invalid0('#problema')
    } else {
        fn_valid0('#problema')
    }
    ;
    if ($('#extencion').val() == '') {
        falta_campos = false;
        fn_invalid0('#extencion')
    } else {
        fn_valid0('#extencion')
    }
    ;
    if ($('#mail_req').val() == '') {
        falta_campos = false;
        fn_invalid0('#mail_req')
    } else {
        if (valEmail($('#mail_req').val())) {
            fn_valid0('#mail_req')
        } else {
            falta_campos = false;
            fn_invalid0('#mail_req')
        }
    }
    ;
    $("#div_listar_detalle_util").html("");
    if (!falta_campos) {
        alert("Complete los campos");
        $("#div_listar_detalle_util").html('<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> <strong>Alert:</strong>Campos Obligatorios.</p></div></div>');
        //$(this).effect("shake", { times:3 }, 200);
        $("#div_listar_detalle_util").effect("shake", {
            times: 3
        }, 100);
    }
    if (respuesta && falta_campos) {
        if (respuesta) {
			fn_carga_i();
            $.ajax({
                url: 'requerimiento/new_req.php',
                data: str,
                type: 'post',
                success: function (data) {
                    if (data != "") {
                        $("#div_listar_detalle_util").html(data);
						//alert(data);
                        if (data.indexOf('dgafffahhuy45rrrf') > 0) {//busca la palabra creado en el documento php
                            $("#div_listar").html("<h1>Actualizado Exitoso</h1>");
                       }/*coment borrar*/
					   fn_carga_f();
                    }
                }
            });
        }
    }
}
function fn_requerimiento_form() {
	fn_carga_i();
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos	
    $.ajax({
        url: 'requerimiento/form.php',
        type: 'get',
        data: "", //str,
        success: function (data) {
            $("#div_listar").html(data);			
			fn_carga_f();
            fn_cerrar();			
            fn_directorio();			
        }
    });
}
function fn_accionesRequerimiento_via_telefono_form() {


    $("button#tecnicossd36r").click(function () {

        fn_cambiarUser_solic_telefono();
        return false;
    });
    //$( "button#cambiar" ).click(function() { fn_cambiarSolic();return false; });
    $("#atajo1").click(function () {

        setatajo();
        return false;
    });
    $('#datos_extra1s35t').fadeOut();
    $('#Prioridad').val('BAJO');

    $('#estado').change(function () {
        if ($('#estado').val() == "EN PROCESO") {
            $('#datos_extra1s35t').fadeIn();
        } else {
            $('#datos_extra1s35t').fadeOut();
        }
    });




}
function fn_requerimiento_via_telefono_form() {
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos	
	fn_carga_i();
    $.ajax({
        url: 'requerimiento/telefonica.php',
        type: 'get',
        data: "", //str,
        success: function (data) {
            $("#div_listar").html(data);
			fn_carga_f();
            fn_accionesRequerimiento_via_telefono_form();
            fn_cerrar();
        }
    });
}
function fn_reportes_tot() {
	fn_carga_i();
    $("#div_listar_detalle_util").html("");
    var str = $("#formreportes").serialize();//es para pasar los datos del form como un query conlos campos	
    $.ajax({
        url: 'reportes/index.php',
        type: 'get',
        data: "", //str,
        success: function (data) {
            $("#div_listar").html(data);
			fn_carga_f();
            fn_cerrar();
        }
    });
}
function fn_reportes_tot2() {
    fn_carga_i();
    $("#div_listar_detalle_util").html("");
    var str = $("#formreportes").serialize();//es para pasar los datos del form como un query conlos campos
    $.ajax({
        url: 'reporte_total',
        type: 'get',
        data: "", //str,
        success: function (data) {
            $("#div_listar").html(data);
            fn_carga_f();
            fn_cerrar();
        }
    });
}

function fn_reportes_historial() {
    $("#div_listar_detalle_util").html("");
    var str = $("#formreportes").serialize();//es para pasar los datos del form como un query conlos campos	
	fn_carga_i();
    $.ajax({
        url: 'reportes/index2.php',
        type: 'get',
        data: "", //str,
        success: function (data) {
            $("#div_listar").html(data);
            fn_carga_f();
			fn_cerrar();
        }
    });
}
function fn_darreporte(reporte,tipo){
	fn_carga_i();
	if(tipo=="h"){tipo="html";}
	if(tipo=="x"){tipo="excel";}
	if(tipo=="p"){tipo="pdf";}
	if(tipo=="pd"){tipo="pdf_down";}
	//$(atributo).attr("href", );
	window.open(reporte+"/"+$("#fechaIniErt456").val()+"/"+$("#fechaFinErt456").val()+"/"+tipo, "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=10, width=550, height=600");
	fn_carga_f();
}
function fn_requerimiento_list(tipo) {
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos	
	fn_carga_i();
    $.ajax({
        url: 'requerimiento/list.php',
        type: 'get',
        data: "tipo="+tipo, //str,
        success: function (data) {
            $("#div_listar").html(data);
            //racargarTabla("#darUsuarioSdeReq-yha441a");
			//racargarTabla("#darUsuarioSdeReq-yha771a");
			fn_carga_f();
			racargarTabla("#"+tipo);
            fn_cerrar();
        }
    });
}
function fn_requerimiento_buscar() {
    $("#div_listar").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos	
	fn_carga_i();
    $.ajax({
        url: 'requerimiento/buscar.php',
        type: 'get',
        data: "", //str,
        success: function (data) {
            $("#div_listar_detalle_util").html(data);
			fn_carga_f();
            fn_cerrar();
        }
    });
}
function fn_requerimiento_buscar_lista(parametro) {
    //$("#div_listar_detalle_util").html("");
    //fn_requerimiento_buscar();
    var str = $(parametro).serialize();//es para pasar los datos del form como un query conlos campos	
	fn_carga_i();
	$.ajax({
        url: 'requerimiento/list-busqueda.php',
        type: 'get',
        data: str,
        success: function (data) {
            $("#div_listar").html(data);
            //fn_requerimiento_buscar();
			fn_carga_f();
            racargarTabla("#darReq_busqueda-table");
            fn_cerrar();
        }
    });
}

//===========================================================
//fin Nuevo requerimiento
//===========================================================

//===========================================================
//Usaurios-REQ
//===========================================================

// sub- permisos
function fn_new_permisos(Id_Usuario, user_nivel) {
	fn_carga_i();
    $("#dialog-form").load("login/permisos.php", {
        Id_Usuario: Id_Usuario,
        user_nivel: user_nivel
    }, function () {
		fn_carga_f();
        iniformaflotante();/*#dialog-form*/
    });
}
;

function fn_ingresar_permisos() {
    var str = $("#form1").serialize();
    fn_carga_i();
    $.ajax({
        url: 'login/permisos.php',
        type: 'post',
        data: str,
        success: function (data) {
            if (data != "")
                //window.clipboardData.setData("Text", data);
            alert(data);
			//alert(str);
            fn_usuarios_listar();
			fn_carga_f();
        }
    });
}
function fn_ingresar_permiso_tecnico() {
    var str = $("#form1tecnico").serialize();
	fn_carga_i();
    $.ajax({
        url: 'login/permisos.php',
        type: 'post',
        data: str,
        success: function (data) {
            if (data != "")
                //window.clipboardData.setData("Text", data);
                alert(data);
            fn_usuarios_listar();
			fn_carga_f();
        }
    });
}
//fin-sub-permisos

function fn_usuarios_listar() {
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos	
	fn_carga_i();
    $.ajax({
        url: 'usuarios/list.php',
        type: 'get',
        data: "", //str,
        success: function (data) {
            $("#div_listar").html(data);
			fn_carga_f();
            racargarTabla("#darUsuarioSdeReq-vf66gt");
            fn_cerrar();
        }
    });
}
function fn_usuarios_new() {
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos	
	fn_carga_i();
    $.ajax({
        url: 'usuarios/form.php',
        type: 'get',
        data: "tipo=new", //str,
        success: function (data) {
            $("#div_listar").html(data);
			fn_carga_f();
            fn_cerrar();
        }
    });
}
function fn_usuarios_edit(id_usuarios) {
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos	
	fn_carga_i();
    $.ajax({
        url: 'usuarios/form.php',
        type: 'get',
        data: "tipo=edit&id_usuarios=" + id_usuarios, //str,
        success: function (data) {
            $("#div_listar").html(data);
			fn_carga_f();
            fn_cerrar();
        }
    });
}
function valida_campo_norm(campo, variable_pivo, mandatario) {
    aux_variable_pivo = variable_pivo;
    if ($(campo).val() == '') {
        aux_variable_pivo = false;
        fn_invalid0(campo)
    } else {
        fn_valid0(campo)
    }
    ;
    if (mandatario == 'no') {
        fn_valid0(campo);
        return variable_pivo
    }
    return aux_variable_pivo;
}
function valida_campo_email(campo, variable_pivo, mandatario) {
    aux_variable_pivo = variable_pivo;
    if ($(campo).val() == '') {
        fn_invalid0(campo)
    } else {
        if (valEmail($(campo).val())) {
            fn_valid0(campo)
        } else {
            aux_variable_pivo = false;
            fn_invalid0(campo)
        }
    }
    ;
    if (mandatario == 'no') {
        return variable_pivo
    }
    return aux_variable_pivo;
}
function fn_user_new_edit() {
    var str = $("#formuserr").serialize();//es para pasar los datos del form como un query conlos campos	
    if ($("#acction_sw23").val() == 'edit_user') {
        var respuesta = confirm("¿Desea Modificar el Usuario?");
    } else {
        var respuesta = confirm("¿Desea Ingresar una nuevo Usuario?");
    }
    var falta_campos = true;
    falta_campos = valida_campo_norm("#usuario", falta_campos, 'si');
    falta_campos = valida_campo_norm("#clave", falta_campos, 'si');
    falta_campos = valida_campo_norm("#nombre", falta_campos, 'si');
    falta_campos = valida_campo_norm("#apellido", falta_campos, 'si');
    falta_campos = valida_campo_email("#correo_corporativo", falta_campos, 'si');
    falta_campos = valida_campo_email("#correo_personal", falta_campos, 'no');
    falta_campos = valida_campo_norm("#telefono", falta_campos, 'si');
    falta_campos = valida_campo_norm("#celular_corporativo", falta_campos, 'no');
    falta_campos = valida_campo_norm("#celular_personal", falta_campos, 'no');
    falta_campos = valida_campo_norm("#user_nivel", falta_campos, 'si');
    $("#div_listar_detalle_util").html("");
    if (!falta_campos) {
        alert("Complete los campos");
    }
    if (respuesta && falta_campos) {
        if (respuesta) {
			fn_carga_i();
            $.ajax({
                url: 'usuarios/form.php',
                data: str,
                type: 'post',
                success: function (data) {
                    if (data != "") {
                        $("#div_listar_detalle_util").html(data);
						fn_carga_f();
                        if (data.indexOf('Actualizado') > 0) {
                            $("#div_listar").html("Actualizado Exitoso");
                        }
                    }
                }
            });
        }
    }
}
//===========================================================
//fin Usaurios-REQ
//===========================================================

//===========================================================
//inicio Opciones
//===========================================================
function fn_estaciones_botones(){
	$('#btn2fgshuu_est').click(function(e) {
        e.preventDefault();
        fn_estaciones_nuevo();
    });
    $('#btn2fgshuu_doc').click(function(e) {
        e.preventDefault();
        fn_documento_nuevo();
    });
	$('#btn2fgshuu_dir').click(function(e) {
        e.preventDefault();
        fn_directorio_nuevo();
    });
	
	$('#btn2fgshuu_dep').click(function(e) {
        e.preventDefault();
        fn_departamento_nuevo($('#btn2fgshuu_dep_id').val());
    });
	
    $('.estacionesasdc6yhaDEL').click(function(e){
        e.preventDefault();			
		 var respuesta = confirm("Desea eliminar a esta Estacion?");
		 if(respuesta){
			 fn_carga_i();
			var row=$(this).parents('tr');
			var id=row.data('id');
			var form=$('#form-delete');
			var url=form.attr('action').replace(':USER_ID',id);
			var data= form.serializeArray();
			row.fadeOut();
			$.post(url,data,function(result){
				alert(result.mensaje);
				fn_carga_f();
			}).fail(function(){
				row.show();
				alert("No se pudo borrar esta fila");
				row.fadeIn;
				fn_carga_f();
			});
		 }
    });
	
	$('.estacionesasdc6yhaSHOW').click(function(e){
        e.preventDefault();		
		var row=$(this).parents('tr');
		var id=row.data('id');
		
		fn_departamento_show(id);
		
    });
	
	$('.diectoriosasdc6yhaDEL').click(function(e){
        e.preventDefault();

        var row=$(this).parents('tr');
        var id=row.data('id');
        var form=$('#form-delete');
        var url=form.attr('action').replace(':id',id);
        var data= form.serializeArray();
        row.fadeOut();
        $.post(url,data,function(result){
            alert(result.mensaje);
        }).fail(function(){
            row.show();
            alert("No se pudo borrar esta fila");
            row.fadeIn;
        });
    });
	$('.depasdc6yhaDEL').click(function(e){
        e.preventDefault();

        var row=$(this).parents('tr');
        var id=row.data('id');
        var form=$('#form-delete');
        var url=form.attr('action').replace(':ID_DEPARTAMNETO',id);
        var data= form.serializeArray();
        row.fadeOut();
       $.ajax({
			 url: url,
			type: 'post',
			data: data,
			}).success(function(result) { 
			    alert(result.mensaje);
			}).fail(function(){
				row.show();
				alert("No se pudo borrar esta fila");
				row.fadeIn();
			});
    });
    $('.directorio2fg').click(function(e){
		e.preventDefault();
        var row=$(this).parents('tr');
        var id=row.data('id');
		
		var nombre=row.data('nombre');
		var mail_req=row.data('mail_req');
		var extencion=row.data('extencion');
		var celular=row.data('celular');
		
		//alert(nombre+";"+ mail_req+";"+  extencion+";"+  celular);
		$("#nombre").val(nombre);
		$("#mail_req").val(mail_req);
		$("#extencion").val(extencion);
		$("#celular").val(celular);
		$("#suggestions").html("");
		
    });
}
function fn_estaciones_form() {
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos
	fn_carga_i();
    $.ajax({
        url: '/estaciones/',
        type: 'get',
        data: "", //str,
        success: function (data) {
            $("#div_listar").html(data);
			fn_carga_f();
            racargarTabla("#darEstaciones-rts45g");
            fn_cerrar();
            fn_estaciones_botones();
        }
    });
}

function fn_directorio_form() {
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos
	fn_carga_i();
    $.ajax({
        url: '/directorio/',
        type: 'get',
        data: "", //str,
        success: function (data) {
            $("#div_listar").html(data);
			fn_carga_f();
            racargarTabla("#darDirectorios-rts45g");
            fn_cerrar();
            fn_estaciones_botones();
        }
    });
}


function fn_documentos_form(pagina) {

    $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos
	fn_carga_i();
    $.ajax({
        url: '/documentos/?page='+pagina,
        type: 'get',
        data: "", //str,
        success: function (data) {
            var int_pa=parseInt(pagina);
            if(isNaN(int_pa)){
                return 1;
            }
            $("#div_listar").html(data);
            $("#paginacion2shjd44").val(int_pa+1);
            $("#paginacion2shjd44_2").val(int_pa-1);
			fn_carga_f();
            racargarTabla("#darEstaciones-rts45g");
            fn_cerrar();
            fn_estaciones_botones();
        }
    });
}


function fn_estaciones_nuevo() {
   // alert('fn_estaciones_nuevo');
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos
    //alert(str);
	fn_carga_i();
    $.ajax({
        url: '/estaciones/create/',
        type: 'get',
        data: str,
        success: function (data) {
            $("#div_listar").html(data);
			fn_carga_f();
            racargarTabla("#darEstaciones-rts45g");
            fn_cerrar();

            $( '#comment' ).on( 'submit', function(e) {
                e.preventDefault();


                var form=$('#form-store');
                var url=form.attr('action').replace(':USER_ID',id);
                var data= form.serializeArray();
                $.post(url,data,function(result){
                    alert(result.mensaje);
                }).fail(function(){
                    alert("No se pudo borrar esta fila");
                    row.show();
                });

            });

        }
    });
}

function fn_documento_nuevo() {
    // alert('fn_estaciones_nuevo');
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos
    //alert(str);
	fn_carga_i();
    $.ajax({
        url: '/documentos/create/',
        type: 'get',
        data: str,
        success: function (data) {
            $("#div_listar").html(data);
			fn_carga_f();
            racargarTabla("#darEstaciones-rts45g");
            fn_cerrar();

            $( '#comment' ).on( 'submit', function(e) {
                e.preventDefault();


                var form=$('#form-store');
                var url=form.attr('action').replace(':USER_ID',id);
                var data= form.serializeArray();
                $.post(url,data,function(result){
                    alert(result.mensaje);
                }).fail(function(){
                    alert("No se pudo borrar esta fila");
                    row.show();
                });

            });

        }
    });
}

function fn_directorio_nuevo() {
   //alert('fn_directorio_nuevo');
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos
    //alert(str);
    $.ajax({
        url: '/directorio/create/',
        type: 'get',
        data: str,
        success: function (data) {
            $("#div_listar").html(data);
            racargarTabla("#darDirectorios-rts45g");
            //fn_cerrar();

            $( '#comment' ).on( 'submit', function(e) {
                e.preventDefault();


                var form=$('#form-store');
                var url=form.attr('action').replace(':id',id);
                var data= form.serializeArray();
                $.post(url,data,function(result){
                    alert(result.mensaje);
                }).fail(function(){
                    alert("No se pudo borrar esta fila");
                    row.show();
                });

            });

        }
    });
}

function fn_departamento_nuevo(id) {
   $("#div_listar_detalle_util").html("");
    var str = $("#formreq").serialize();//es para pasar los datos del form como un query conlos campos
    //alert(id);
    $.ajax({
        url: '/departamento/'+id+'/',
        type: 'get',
        data: str,
        success: function (data) {
			//alert(2);
            $("#div_listar").html(data);
            racargarTabla("#darDirectorios-rts45g");
			//fn_cerrar();
        }
    });
}



function fn_estaciones_new() {
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq_4ghdyuhhs").serialize();//es para pasar los datos del form como un query conlos campos
    $.ajax({
        url: '/estaciones',
        type: 'post',
        data: str,
        success: function (data) {
            //alert(str);
           // alert(data);
            $("#div_listar").html(data);
            fn_cerrar();
            fn_estaciones_botones();
        }
    });
}

function fn_documentos_new() {

    $("#div_listar_detalle_util").html("");
    var str = $("#formreq_5hhhhhhs").serialize();//es para pasar los datos del form como un query conlos campos
    $.ajax({
        url: '/documentos',
        type: 'post',
        data: str,
        success: function (data) {
            //alert(str);
            // alert(data);
            $("#div_listar").html(data);
            fn_cerrar();
            fn_estaciones_botones();
        }
    });
}

function fn_directorio_new() {
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq_4ghdyuhhs").serialize();//es para pasar los datos del form como un query conlos campos
    $.ajax({
        url: '/directorio',
        type: 'post',
        data: str,
        success: function (data) {
            //alert(str);
           // alert(data);
            $("#div_listar").html(data);
            fn_cerrar();
            fn_estaciones_botones();
        }
    });
}

function fn_departamentos_new() {
	//alert('fn_departamentos_new');
    $("#div_listar_detalle_util").html("");
    var str = $("#forft4rs").serialize();//es para pasar los datos del form como un query conlos campos
	$.ajax({
        url: '/departamento',
        type: 'post',
        data: str,
        success: function (data) {
            //$("#div_listar").html(data);
			//$("#div_listar_detalle_util").html(data);
            fn_cerrar();
			fn_departamento_show($('#ID_ESTACION').val());
        }
    });
}



function fn_mem_o_off(){
    $( "#asdfg341" )
        .change(function () {
            var str = "";
            $( "select option:selected" ).each(function() {
                str += $( this ).val() + "";
            });
            var docc1=0;
            var docc1_id=0;
            var identificador_letras="";
            if(str=='oficio'){

                docc1=$( "#for_num").val();
                docc1_id=$( "#for_num_id").val();
                identificador_letras="OFI";
            }else if(str=='memo'){

                docc1=$( "#mem_num").val();
                docc1_id=$( "#mem_num_id").val();
                identificador_letras="MEM";
            }else{
                alert("-----");
                docc1='';
                docc1_id='';
                identificador_letras="---";
            }
            $('#refg5i8k').html(docc1);
            $('#identificador').val(docc1);
            $('#identificador_numero').val(docc1_id);
            $('#identificador_letras').val(identificador_letras);
        })
        .change();
}
function fn_estaciones_edit_fin() {
    $("#div_listar_detalle_util").html("");
    var str = $("#formreq_41x0yuhhs").serialize();//es para pasar los datos del form como un query conlos campos
    //alert(str);
    $.ajax({
        url: '/',
        type: 'get',
        data: str,
        success: function (data) {
            alert(str);
            alert(data);
            $("#div_listar").html(data);
            fn_cerrar();
            fn_estaciones_botones();
        }
    }).fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
    });
}
//===========================================================
//fin Opciones
//===========================================================
//cambios del 21012016
function fn_directorio(){
	$('#nombre').keypress(function(){
		//Obtenemos el value del input
		var service = $(this).val();
        if(service.length>=1){
            var dataString = "/directorio/"+service+"/";
            //alert(dataString);
            //Le pasamos el valor del input al ajax
            $("#suggestions").html("<h3>Cargando...</h3>");
            $.ajax({
			  url: dataString,
			  context: document.body
			}).success(function(data) { 
			   $("#suggestions").html(data);
			   racargarTabla("#darDirectorios-rts45g");
				fn_estaciones_botones();
			});
        }
    });
}
function fn_departamento_show(id){
		//alert('fn_departamento_show:'+id);
		fn_carga_i();
		$.ajax({
        url: '/estaciones/'+id,
        type: 'get',
        data: "", //str,
        success: function (data) {
				$("#div_listar").html(data);
				fn_carga_f();
				fn_cerrar();
				fn_estaciones_botones();
			}
		});
	}