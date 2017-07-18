<?php

/**
 * Finds path, relative to the given root folder, of all files and directories in the given directory and its sub-directories non recursively. 
 * Will return an array of the form 
 * array( 
 *   'files' => [], 
 *   'dirs'  => [], 
 * ) 
 * @author sreekumar 
 * @param string $root 
 * @result array 
 */
function read_all_files($root = '.') {
    $files = array('files' => array(), 'dirs' => array());
    $directories = array();
    $last_letter = $root[strlen($root) - 1];
    $root = ($last_letter == '\\' || $last_letter == '/') ? $root : $root . DIRECTORY_SEPARATOR;

    $directories[] = $root;

    while (sizeof($directories)) {
        $dir = array_pop($directories);
        if ($handle = opendir($dir)) {
            while (false !== ($file = readdir($handle))) {
                if ($file == '.' || $file == '..') {
                    continue;
                }
                $file = $dir . $file;
                if (is_dir($file)) {
                    $directory_path = $file . DIRECTORY_SEPARATOR;
                    array_push($directories, $directory_path);
                    $files['dirs'][] = $directory_path;
                } elseif (is_file($file)) {
                    $files['files'][] = $file;
                }
            }
            closedir($handle);
        }
    }
    return $files;
}

function get_between($input, $start, $end) {
    $substr = substr($input, strlen($start) + strpos($input, $start), (strlen($input) - strpos($input, $end)) * (-1));
    return $substr;
}
function get_between2($input, $start, $end) {
    $substr = substr($input, strlen($start) + strpos($input, $start), (strlen($input) - strpos($input, $end)) * (-1));
    return $substr;
}
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar Archivos</title>
    </head>

    <body>
        Archivos presentados:
        <ul>
            <?php
            $uniq = $_REQUEST['uniq'];
            if ($uniq == '') {
                exit;
            }
            $dir = "../archivos/" . $uniq . "/";
            $archiv_23de4 = "";
            if (is_dir($dir)) {
                $archiv_23de4 = read_all_files($dir);
            }
            //print_r($archiv_23de4['files']);
            if (isset($archiv_23de4['files']))
                foreach ($archiv_23de4['files'] as &$valor) {
                    //echo '<li>'.$valor.'</li>';
                    echo '<li><a  target="_blank" href="archivos/' . get_between($valor . "*", "../archivos/", "*") . '" >' . get_between2($valor . "*", "../archivos/", "*") . '</a></li>';
                }
            ?>
        </ul>                   
    </body>
</html>