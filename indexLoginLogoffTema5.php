<?php
/**
 * @author original Carlos García Cachón
 * adaptado @author Oscar Pascual Ferrero
 * @version 1.3.1
 * @since 10/01/2024
 * @copyright Todos los derechos reservados a Carlos García
 * 
 * @Annotation Proyecto LoginLogoffTema5 - Parte de 'Index' 
 * 
 */
if (!isset($_COOKIE['idioma'])) { // Comprobamos si la cookie esta declarada
    setcookie("idioma", "SP", time() + 2592000); // En caso negativo la creamos y ponemos el valor por defecto
    header('Location: indexLoginLogoffTema5.php'); // Recargamos la página con el nuevo idioma
    exit();
}

if (isset($_REQUEST['botonIdioma'])) { // Comprobamos si el usuario a pulsado algún botón de idioma
    setcookie("idioma", $_REQUEST['botonIdioma'], time() + 2592000); // En caso afirmativo creamos la cookie y la cargamos con el valor seleccionado y ponemos una fecha de caducidad de 1 mes
    header('Location: indexLoginLogoffTema5.php'); // Recargamos la página con el nuevo idioma
    exit();
}
require_once './config/configIdiomas.php'; // Incluimos el arrays con los mensajes según el idioma seleccionado
?>
<!DOCTYPE html>
<html lang="es">
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oscar Pascual Ferrero</title>
        <link rel="stylesheet" href="webroot/css/style.css">
        <link rel="icon" type="image/x-icon" href="/webroot/image/botonFavicon.png">
        <style>
            .opcionesDelIdioma input[type="radio"] {
                display: none; /* Oculta los radio buttons predeterminados */
            }
            .opcionesDelIdioma label {
                display: inline-block;
                border: 1px solid #ccc; /* Borde para resaltar el área seleccionable */
                padding: 5px;
                cursor: pointer;
            }

            .opcionesDelIdioma input[type="radio"]:checked + label {
                background-color: #e0e0e0; /* Cambia el fondo cuando está seleccionado */
            }
        </style>
    </head>
    <body>
        <main>

            <h1>
                <?php echo $aIdiomaSeleccionado[$_COOKIE['idioma']]['titulo']; ?> LoginLogoffTema5
            </h1>



            <form class="opcionesDelIdioma">
                <input type="radio" id="radioUK" name="botonIdioma" value="UK" <?php echo ($_COOKIE['idioma'] == 'UK') ? 'checked' : ''; ?>>
                <label for="radioUK"><img src="doc/icono_UK.png" class="img-fluid" alt="Bandera_UK"></label>

                <input type="radio" id="radioJP" name="botonIdioma" value="JP" <?php echo ($_COOKIE['idioma'] == 'JP') ? 'checked' : ''; ?>>
                <label for="radioJP"><img src="doc/icono_JP.png" class="img-fluid" alt="Bandera_JP"></label>

                <input type="radio" id="radioSP" name="botonIdioma" value="SP" <?php echo ($_COOKIE['idioma'] == 'SP') ? 'checked' : ''; ?>>
                <label for="radioSP"><img src="doc/icono_SP.png" class="img-fluid" alt="Bandera_SP"></label>

                <button type="submit">Cambiar Idioma</button>
            </form>           
            <div >
                <img src="doc/esquemaApp.jpg" class="img-fluid" alt="Mapeo de la Aplicación">
            </div>
            <td><a href="codigoPHP/Login.php"><button>
                        <?php echo $aIdiomaSeleccionado[$_COOKIE['idioma']]['inicio']; ?>
                    </button></a></td>
        </main>

        <footer>
            <p><a href="../../index.html">Oscar Pascual Ferrero</a></p>
            <p><a href="indexLoginLogoffTema5.php">Inicio</a> | <a href="https://github.com/Discreppo/212DWESLoginLogoffTema5.git" target="_blank" >GitHub</a></p>
        </footer>
    </body>
</html>