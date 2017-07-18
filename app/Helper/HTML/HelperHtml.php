<?php

namespace Soportem\Helper\HTML;

/**
 * Created by PhpStorm.
 * User: Humberto
 * Date: 24/04/2015
 * Time: 20:15
 */
class HelperHtml {

    public static function campoT($campo = "", $titulo = "", $valor = "", $requerido = false, $type = "text") {

        return '<div data-role="fieldcontain"><label for="' . $campo . '" class="ui-hidden-accessible">' . $titulo . ':</label>
                        <input type="' . $type . '" name="' . $campo . '" id="' . $campo . '" value="' . ($valor == "" ? "" : $valor) . '" placeholder="' . $titulo . '" data-theme="a"' . ($requerido ? "required" : "") . ' class="form-control" >
        </div>';
    }

    public static function TextareaT($campo = "", $titulo = "", $valor = "", $requerido = false, $type = "text") {

        return '<div data-role="fieldcontain"><label for="' . $campo . '" class="ui-hidden-accessible">' . $titulo . ':</label>
            <textarea name="' . $campo . '" id="' . $campo . '" placeholder="' . $titulo . '" rows="6" ' . ($requerido ? "required" : "") . ' class="form-control">' . $valor . '</textarea> 
        </div>';
    }

    public static function campoG($campo = "", $titulo = "", $valor = "", $requerido = false) {
        return HelperHtml::campoT($campo, $titulo, $valor, $requerido, "text");
    }

    public static function campoP($campo = "", $titulo = "", $valor = "", $requerido = false) {
        return HelperHtml::campoT($campo, $titulo, $valor, $requerido, "password");
    }
    public static function funcionReinicio($funcion = "") {
        if (!isset($_SESSION)) {
            session_start();
            $_SESSION['MM_Funcion_activa']=$funcion;
        }
    }

}
