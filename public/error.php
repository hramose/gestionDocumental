<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>busqueda de requerimiento</title>
    </head>
    <body>
        <h1>Error:</h1>
        <h2 style="color:#F00"><?php echo isset($_REQUEST['mensaje']) ? $_REQUEST['mensaje'] : ''; ?></h2>
    </body>
</html>