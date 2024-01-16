<?php
// Se renauda la sesion existente
session_start();
if (!isset($_SESSION['user212DWESLoginLogoffTema5'])) { // Si el usuario no se ha autentificado
    header('Location: login.php'); //Redirigimos a el usuario al login
    exit();
}
// Se valida si el usuario hace click en el botón 'Cerrar Sesion' 
if (isset($_REQUEST['volver'])) {    
    // Se redirige al usuario al Programa
    header('Location: Programa.php');
    // Termina el detalle
    exit();
}
require_once '../config/configIdiomas.php'; // Incluimos el arrays con los mensajes según el idioma seleccionado
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oscar Pascual Ferrero</title>
        <link rel="stylesheet" href="../webroot/css/style.css">
        <link rel="icon" type="image/x-icon" href="../webroot/image/botonFavicon.png">
    </head>
    <body>
        <main>
            <div class="ejercicio">
                <!-- Se crea un formulario tipo post para agregar la opcion de busqueda-->
                <form name= "programa" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form1" method="post">                    
                    <input type="submit" form="form1" value="volver" name="volver" class="botonPrograma">hola
                </form>
            </div> 
            <?php
            // $_SESSION
            echo('<div class="ejercicio">');
            echo('<h3>$_SESSION</h3>');
            foreach ($_SESSION as $key => $valor) {
                echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
            }
            echo('</div>');

            // $_COOKIE
            echo('<div class="ejercicio">');
            echo('<h3>$_COOKIE</h3>');
            foreach ($_COOKIE as $key => $valor) {
                echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
            }
            echo('</div>');

            // $_SERVER
            echo('<div class="ejercicio">');
            echo('<h3>$_SERVER</h3>');
            foreach ($_SERVER as $key => $valor) {
                echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
            }
            echo('</div>');

            // $GLOBALS
            echo('<div class="ejercicio">');
            echo('<h3>$GLOBALS</h3>');
            foreach ($GLOBALS as $key => $valor) {
                foreach ($valor as $clave => $valor2) {
                    echo('<u>' . $clave . '</u> => <b>' . $valor2 . '</b><br>');
                }
            }
            echo('</div>');

            // $_GET
            echo('<div class="ejercicio">');
            echo('<h3>$_GET</h3>');
            foreach ($_GET as $key => $valor) {
                echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
            }
            echo('</div>');

            // $_POST
            echo('<div class="ejercicio">');
            echo('<h3>$_POST</h3>');
            foreach ($_POST as $key => $valor) {
                echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
            }
            echo('</div>');

            // $_FILES
            echo('<div class="ejercicio">');
            echo('<h3>$_FILES</h3>');
            foreach ($_FILES as $key => $valor) {
                echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
            }
            echo('</div>');

            // $_REQUEST
            echo('<div class="ejercicio">');
            echo('<h3>$_REQUEST</h3>');
            foreach ($_REQUEST as $key => $valor) {
                echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
            }
            echo('</div>');

            // $_ENV
            echo('<div class="ejercicio">');
            echo('<h3>$_ENV</h3>');
            foreach ($_ENV as $key => $valor) {
                echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
            }
            echo('</div>');

            // Se muestra en pantalla la información de PHP de nuestro servidor
            phpinfo();
            ?>   
        </main>
        <footer>
            <p><a href="../index.html">Oscar Pascual Ferrero</a></p>
            <p><a href="../indexLoginLogoffTema5.php">Inicio</a> | <a href="https://github.com/Discreppo/212DWESLoginLogoffTema5.git" target="_blank" >GitHub</a></p>
        </footer>
    </body>
</html>
