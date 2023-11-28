<!DOCTYPE html>
<html lang="es">
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oscar Pascual Ferrero</title>
        <link rel="stylesheet" href="webroot/css/style.css">
        <link rel="icon" type="image/x-icon" href="/webroot/image/botonFavicon.png">         
    </head>
    <body>
        <header>
            <h1>Desarrollo de aplicaciones web utilizando codigo embebido</h1>
        </header>

        <main>
            <!-- Contenido principal de tu sitio web -->
            <h1>Scripts </h1>
            <table>
                <tr>
                    <th>Script DB</th>
                    <th>Mostrar entorno desarrollo</th>
                    <th>Mostrar entorno explotación</th>
                </tr>
                <tr>
                    <td>Crea estructura de la base de datos</td> 
                    <td><a href="mostrarcodigo/mostrarScriptCreaDB.php">Mostrar</a></td>
                </tr>                
                <tr>
                    <td>Incluye los datos de la tabla indicada</td>
                    <td><a href="mostrarcodigo/mostrarScriptCargaInicialDB.php">Mostrar</a></td>
                </tr>                
                <tr>
                    <td>Elimina todo</td> 
                    <td><a href="mostrarcodigo/mostrarScriptBorraDB.php">Mostrar</a></td>
                </tr>
            </table>
            <h1>Tabla de Ejercicios</h1>
            <table>
                <tr>
                    <th>Ejercicios</th>
                    <th>Ejecución </th>
                    <th>Código </th>


                </tr>
                <tr>
                    <td>0. Mostrar el contenido de las variables superglobales y phpinfo():</td>                    
                    <td><a href="codigoPHP/ejercicio00.php"><img src="webroot/image/botonFavicon.png" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio00.php"><img src="webroot/image/botonFavicon.png" width="30px"></a></td>
                </tr>
                <tr>
                    <td>1. Desarrollo de un control de acceso con identificación del usuario basado en la función header():</td>
                    <td><a href="codigoPHP/ejercicio01.php"><img src="webroot/image/botonFavicon.png" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio01.php"><img src="webroot/image/botonFavicon.png" width="30px"></a></td>
                </tr>
                <tr>
                    <td>2. Desarrollo de un control de acceso con identificación del usuario basado en la función header() y en el uso de 
                        una tabla “Usuario” de la base de datos. (PDO).</td>
                    <td><a href="codigoPHP/ejercicio02.php"><img src="webroot/image/botonFavicon.png" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio02.php"><img src="webroot/image/botonFavicon.png" width="30px"></a></td>
                </tr>

            </table>











        </main>

        <footer>
            <p><a href="../../index.html">Oscar Pascual Ferrero</a></p>
            <p><a href="indexLoginLogoffTema5.php">Inicio</a> | <a href="https://github.com/Discreppo/212DWESLoginLogoffTema5" target="_blank" >GitHub</a></p>
        </footer>
    </body>
</html>