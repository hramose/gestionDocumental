<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../../Connections/util_3.php');
error_reporting(0); // Set E_ALL for debuging

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderConnector.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinder.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeDriver.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeLocalFileSystem.class.php';
// Required for MySQL storage connector
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeMySQL.class.php';
// Required for FTP connector support
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeFTP.class.php';


/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from  '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool|null
 **/
function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;                                    // else elFinder decide it itself
}

$opts = array(
	 'debug' => true,
	'roots' => array(
		array(
			'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
			'path'          => '../../archivos/'.(isset($_SESSION['pedido_']) ? $_SESSION['pedido_'] : '')."/".(isset($_SESSION["opcion2ws"]) ? $_SESSION["opcion2ws"] : ''),         // path to files (REQUIRED)
			'URL'           => dirname($_SERVER['PHP_SELF']) . '/../../archivos/'.(isset($_SESSION['pedido_']) ? $_SESSION['pedido_'] : '').'/'.(isset($_SESSION["opcion2ws"]) ? $_SESSION["opcion2ws"] : ''), // URL to files (REQUIRED)
			'accessControl' => 'access'             // disable and hide dot starting files (OPTIONAL)
		)
	)
);

////////////////////////////////////////////////////////////////

function MakeDirectory($dir, $mode = 0755)
{
  if (is_dir($dir) || @mkdir($dir,$mode)) return TRUE;
  if (!MakeDirectory(dirname($dir),$mode)) return FALSE;
  return @mkdir($dir,$mode);
}

$root_sd23="";
if ((isset($_SESSION["opcion2ws"]))) {
	//MakeDirectory($opts['root']."/".$_REQUEST["target"]);
	$root_sd23= '../../archivos/'.(isset($_SESSION['pedido_']) ? $_SESSION['pedido_'] : '').'/'.(isset($_SESSION["opcion2ws"]) ? $_SESSION["opcion2ws"] : '');// path to root directory
	}
MakeDirectory($root_sd23);
//echo $root_sd23; 

////////////////////////////////////////////////////////////////

// run elFinder

if (get_autorizacion_si_no($_SESSION['permiso'], '785')) {
	$connector = new elFinderConnector(new elFinder($opts));
	$connector->run();
}

