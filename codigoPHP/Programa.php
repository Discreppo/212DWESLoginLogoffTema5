
<?php
/**
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 28/11/2023
 */
session_start(); //Reanudamos la sesion existente
// Se valida si el usuario ha sido identificado
if (!isset($_SESSION['user204DWESLoginLogoffTema5'])) {
    // Se redirige al usuario al Login para que se autentifique
    header('Location: Login.php');
    // Termina el programa
    exit();
}

// Se valida si el usuario hace click en el botón 'Cerrar Sesion' 
if (isset($_REQUEST['cerrarSesion'])) {
    // Se destruye su sesión
    session_destroy();
    // Se redirige al usuario al Login
    header('Location: Login.php');
    // Termina el programa
    exit();
}

// Se valida si el usuario hace click en el botón 'Detalle' 
if (isset($_REQUEST['detalle'])) {
    // Se redirige al usuario al Login
    header('Location: Detalle.php');
    // Termina el programa
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../webroot/css/style.css">
        <link rel="icon" type="image/x-icon" href="../webroot/image/botonFavicon.png">
        <title>Oscar Pascual Ferrero</title>
    </head>

    <body>        
        <main>
            <h1>Programa</h1>
            
<?php
echo('</div>');
echo('<div class="mensajeSesion">');
echo('Bienvenid@, <b>' . $_SESSION['DescripcionUsuario'] . '</b>! <br>');
echo('Esta es la <b>' . $_SESSION['NumeroConexiones'] . '</b> vez que te conectas.<br>');
echo('Tu ultima conexion fue el <b>' . $_SESSION['FechaHoraUltimaConexionAnterior'] . '</b>.');
echo('</div>');
?>
            <div class="ejercicio">
                <!-- Se crea un formulario tipo post para agregar la opcion de busqueda-->
                <form name= "programa" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form1" method="post">
                    <input type="submit" form="form1" value="Detalle" name="detalle" class="botonPrograma">
                    <input type="submit" form="form1" value="Cerrar Sesion" name="cerrarSesion" class="botonPrograma">
                </form>
            </div> 
        </main>
        <footer>
            <p><a href="../index.html">Oscar Pascual Ferrero</a></p>
            <p><a href="../indexLoginLogoffTema5.php">Inicio</a> | <a href="https://github.com/Discreppo/212DWESLoginLogoffTema5.git" target="_blank" >GitHub</a></p>
        </footer>
    </body>
</html>
