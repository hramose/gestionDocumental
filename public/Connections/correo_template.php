<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">


        <title>Correo de Aviso Conagopare Pichincha</title>

        <!-- Bootstrap core CSS -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


    </head>

    <body>

        <div class="container">
            <p align="center"><img src="images/conagopare-pichincha-superior.png" width="800" height="228" alt="Conagopare Pichincha"></p>
          <div class="row marketing">
                <div class="col-lg-6">
                    <h4>Numero de Solicitud</h4>
                    <p><?php echo (isset($id_peticion) ? $id_peticion : ''); ?></p>

                    <h4>Solicitante</h4>
                    <p><?php echo (isset($usuario_d) ? $usuario_d : ''); ?></p>

                    <h4>Estación</h4>
                    <p><?php echo (isset($estacion_d) ? $estacion_d : ''); ?></p>
                </div>

                <div class="col-lg-6">
                    <h4>Teléfono</h4>
                    <p><?php echo (isset($telefono_d) ? $telefono_d : ''); ?></p>

                    <h4>Incidente</h4>
                    <p><?php echo (isset($titulo_d) ? $titulo_d : ''); ?></p>


                </div>        
            </div>
            <div class="panel panel-default">
                <div  class="panel-body">
                    <h4>Descripción</h4>
                    <p><?php echo (isset($reolucion_d) ? $reolucion_d : ''); ?></p>
                </div>
            </div>
            <footer class="footer">
                <p align="center"><img src="images/conagopare-pichincha-footer.png"  width="596" height="152" ></p>
                <p>&copy; 2016 Conagopare Pichincha, Ecuador.</p>
            </footer>

        </div> <!-- /container -->


    </body>
</html>
