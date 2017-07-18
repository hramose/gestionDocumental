<?php

namespace Soportem\Helper\PDF;

use DOMPDF;

class Pdf {

    protected static $configure = false;

    public static function configure() {
        if (static::$configure)
            return;
        define('DOMPDF_ENABLE_AUTOLOAD', false);
        require_once '../vendor/dompdf/dompdf/dompdf_config.inc.php';
        static::$configure = true;
    }

    public static function render($file, $html) {
        static::configure();

        $dompdf = new DOMPDF();     //if you use namespaces you may use new \DOMPDF()
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream($file . ".pdf", array("Attachment" => 0));
    }

}
