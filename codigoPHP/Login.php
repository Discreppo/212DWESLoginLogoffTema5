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
            <div class="container mt-3">
                <div class="row d-flex justify-content-start">
                    <div class="col">
                        <?php
                        /**
                         * @author Oscar Pascual Ferrero
                         * @version 1.0
                         * @since 28/11/2023
                         */
                        // DECLARACION E INICIALIZACION DE VARIABLES
                        // Se incuye la libreria de validacion para usar los metodos de validacion de las entradas del formulario
                        require_once '../core/231018libreriaValidacion.php';
                        // Se incuye la libreria de configuracion de bases de datos que almacena las constantes de la conexion
                        require_once '../config/confDBPDO.php';
                        // La varible $entradaOK es un interruptor que recibe el valor true cuando no existe ningun error en la entrada
                        $entradaOK = true;
                        // El array $aRespuestas almacena los valores que son introducidos en cada input del formulario
                        $aRespuestas = [
                            'user' => '',
                            'pass' => ''
                        ];
                        // El array $aErrores almacena los valores que no cumplan los requisitos que se hayan introducido en el formulario
                        $aErrores = [
                            'user' => '',
                            'pass' => ''
                        ];

                        // Si el fromulario ha sido rellenado, se valida la entrada
                        if (isset($_REQUEST['enviar'])) {
                            // VALIDACIONES
                            // Se comprueba que el valor introducido en el campo 'user' sea un valor alfabetico con longitud maxima de 8 caracterres, si no lo es, se añade un mensaje de error al array $aErrores
                            $aErrores['user'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['user'], 8, 1, 1);
                            // Se comprueba que el valor introducido en el campo 'pass' sea una contraseña con longitud maxima de 8 caracterres, si no lo es, se añade un mensaje de error al array $aErrores
                            $aErrores['pass'] = validacionFormularios::validarpassword($_REQUEST['pass'], 8, 3, 1, 1);

                            try {
                                // Se instancia un objeto tipo PDO que establece la conexion a la base de datos con el usuario especificado
                                $miDB = new PDO(DSN, USERNAME, PASSWORD);

                                // Se inicializan variables heredoc que almacenan las consultas
                                $sql1 = 'SELECT * FROM T01_Usuario WHERE T01_CodUsuario="' . $_REQUEST['user'] . '" and T01_Password="' . hash("sha256", ($_REQUEST['user'] . $_REQUEST['pass'])) . '";';

                                // Se prepara la consulta
                                $consulta1 = $miDB->prepare($sql1);
                                // Se ejecuta la consulta
                                $consulta1->execute();
                                // Se instancia un objeto tipo PDO que almacena cada fila de la consulta
                                $usuarioActivo = $consulta1->fetchObject();

                                // Sino se encuentran coincidencias en el nombre de usuario, guardan los mensajes de errores en $aErrores
                                if ($consulta1->rowCount() <= 0) {
                                    $aErrores['user'] = "Error autentificación";
                                    $aErrores['pass'] = "Error autentificación";
                                }
                            } catch (PDOException $exception) {
                                // Si aparecen errores, se muestra por pantalla el error
                                echo('<div class="ejercicio"><span class="error">❌ Ha fallado la conexion: ' . $exception->getMessage() . '</span></div>');
                            }

                            // Se recorre el array de errores 
                            foreach ($aErrores as $campo => $error) {
                                // Si existe algun error se cambia el valor de $entradaOK a false y se limpia ese campo
                                if ($error != null) {
                                    $_REQUEST[$campo] = '';
                                    $entradaOK = false;
                                }
                            }

                            // Si el formulario NUNCA ha sido rellenado, se inicializa $entradaOK a false    
                        } else {
                            $entradaOK = false;
                        }

                        // TRATAMIENTO DE DATOS
                        // Se añaden al array $aRespuestas las respuestas cuando son correctas
                        if ($entradaOK) {
                            try {
                                // Se almacenan el numero de conexiones en $nConexiones
                                $nConexiones = ($usuarioActivo->T01_NumConexiones) + 1;
                                // Se almacenan la fecha y hora de la ultima conexion en un objeto datetime
                                $oFechaHoraUltimaConexionAnterior = new DateTime($usuarioActivo->T01_FechaHoraUltimaConexion);

                                // Se inicia la sesión
                                session_start();
                                // Se almacena en una variable de sesión el codigo del usuario
                                $_SESSION['user204DWESLoginLogoffTema5'] = $usuarioActivo->T01_CodUsuario;
                                // Se almacena en una variable de sesión el nombre completo del usuario
                                $_SESSION['DescripcionUsuario'] = $usuarioActivo->T01_DescUsuario;
                                // Se almacena en una variable de sesión el numero de conexiones
                                $_SESSION['NumeroConexiones'] = $nConexiones;
                                // Se almacena la fecha hora de la última conexión en una variable de sesión
                                $_SESSION['FechaHoraUltimaConexionAnterior'] = $oFechaHoraUltimaConexionAnterior->format('Y-m-d H:i:s');
                                // Se redirije al usuario a la pagina 'Programa.php'
                                header('Location: Programa.php');

                                // Se prepara al consulta de actulizacion
                                $sql2 = 'UPDATE T01_Usuario SET T01_NumConexiones =' . $nConexiones . ', T01_FechaHoraUltimaConexion=now() WHERE T01_CodUsuario="' . $_REQUEST['user'] . '";';

                                // Se prepara la consulta
                                $consulta2 = $miDB->prepare($sql2);

                                // Se ejecuta la consulta de actualizacion
                                $consulta2->execute();

                                exit();
                            } catch (PDOException $exception) {
                                // Si aparecen errores, se muestra por pantalla el error
                                echo('<div class="ejercicio"><span class="error">❌ Ha fallado la conexion: ' . $exception->getMessage() . '</span></div>');
                            } finally {
                                // Se cierra la conexion con la base de datos
                                unset($miDB);
                            }
                        } else {
                            ?>
                            <div class="ejercicioSesion">
                                <!-- Se crea un formulario tipo post para agregar la opcion de busqueda-->
                                <form name= "loginlogoff" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form" method="post">
                                    <table class="inicioSesion">
                                        <tr>
                                            <td><input type="text" name="user" id="user" placeholder="Usuario" value="<?php echo(isset($_REQUEST['user']) ? $_REQUEST['user'] : '') ?>"></td>
                                            <td class="error"><?php
                        // Se muestra el mensaje de error 
                        echo($aErrores['user']);
                            ?></td>
                                        </tr>  
                                        <tr>
                                            <td><input type="password" name="pass" id="pass" placeholder="Contraseña" value="<?php echo(isset($_REQUEST['pass']) ? $_REQUEST['pass'] : '') ?>"></td>
                                            <td class="error"><?php
                                            // Se muestra el mensaje de error 
                                            echo($aErrores['pass']);
                            ?></td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" form="form" value="Iniciar Sesion" name="enviar" class="botonEnviar"></td>
                                        </tr>
                                    </table>
                                </form>
                            </div> 
                            <?php
                        }
                        ?>    
                        </main>
                        <footer>
                            <p><a href="../index.html">Oscar Pascual Ferrero</a></p>
                            <p><a href="../indexLoginLogoffTema5.php">Inicio</a> | <a href="https://github.com/Discreppo/212DWESLoginLogoffTema5.git" target="_blank" >GitHub</a></p>
                        </footer>
                        </body>
                        </html>
