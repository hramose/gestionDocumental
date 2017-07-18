<?php
/**
 * Created by PhpStorm.
 * User: Humberto
 * Date: 27/04/2015
 * Time: 11:38
 */
require '../vendor/autoload.php';
$data =array(
    'name' => 'Wagner Cadena',
    'mensaje' => 'Mensaje de ejemplo'
);
$html = Soportem\Helper\HTML\Template::render('pdf/certificado',$data);
           Soportem\Helper\PDF\Pdf::render("Certificado",$html);
     //echo  Soportem\Helper\HTML\HelperHtml::campoP("asasa","aaaa","aaaaaa");
