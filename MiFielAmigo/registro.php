<?php


// Cristina Castillo Obregón
// Desarrollo Web en Entorno Servidor
// curso 2019/20
// Proyecto Mi Fiel Amigo

require_once("clases/Database.php");

if (!empty($_POST)) :

    /* echo "<pre>" . print_r($_POST, true) . "</pre>";*/
    //$db->exec("set names utf8");
    // capturamos los datos del formulario
    $ema = $_POST["email"];
    $nom = $_POST["nombre"];
    $ape = $_POST["apellidos"];
    $pas = $_POST["pass"];
    $con = $_POST["conf"];
    // creamos una api_key personalizada para el usuario con su email y una marca de tiempo
    $api_key  =  md5($ema . time());

    /*echo "<pre>" . print_r($api_key, true) . "</pre>";*/

    // comprobar que las contraseñas son iguales
    if ($pas == $con) :


        // intentamos conectar
        try {
            $db = Database::getInstance("root", "", "refugio");
        } catch (PDOException $e) {
            die("ERROR:: " . $e->getMessage());
        }

        $sql = "SELECT * FROM usuario WHERE email='$ema'";
        if (!$db->execute($sql)) :

            // construimos la sentecia
            $sql = "INSERT INTO usuario (email,pass,nombre,apellidos,api_key) ";
            $sql .= "VALUES (?, md5(?), ?, ?,?) ;";

            // ejecutamos la consulta
            if (!$db->execute($sql, array($ema, $pas, $nom, $ape, $api_key)))
                $error = "Se ha producido un error en la creación del usuario";

            // cerramos la conexión
            $db = null;
        else :
            $error = " La dirección de email introducida ya existe";
        endif;

    else :
        $error = "Las contraseñas no coinciden";
    endif;

endif;


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>MiFielAmigo</title>
    <meta charset="utf8" />
    <link rel="stylesheet" type="text/css" href="css/refugio.css" />
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <style>
        body {
            background: pink;
        }

        h4 {
            color: white;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- logotipo -->
        <div class="row">
            <div class="col-sd-12 mx-auto">
                <img class="logo" src="images/mifielamigo-logo.png" alt="MiFielAmigo" />
            </div>
        </div>

        <!-- nota -->
        <div class="row">
            <div class="col-sd-12 mx-auto mb-5">
                <h4>Registro de Usuario</h4>
            </div>
        </div>


        <?php
        if (isset($error)) :
            echo "<div class=\"alert alert-danger w-50 mx-auto\">";
            echo $error;
            echo "</div>";
        endif;
        ?>

        <!-- formulario de registro -->
        <form method="post">

            <!-- nombre de usuario -->
            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <label class="col-form-label" for="email">Nombre de usuario:</label>
                    <input class="form-control" type="email" name="email" placeholder="mifiel@amigo.com" required />
                </div>
            </div>

            <!-- nombre -->
            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <label class="col-form-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" name="nombre" required />
                </div>
            </div>

            <!-- apellidos -->
            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <label class="col-form-label" for="apellidos">Apellidos:</label>
                    <input class="form-control" type="text" name="apellidos" required />
                </div>
            </div>

            <!-- contraseña -->
            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <label class="col-form-label" for="pass">Contraseña:</label>
                    <input class="form-control" type="password" name="pass" required />
                </div>
            </div>

            <!-- confirmación contraseña -->
            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <label class="col-form-label" for="conf">Confirmación contraseña:</label>
                    <input class="form-control" type="password" name="conf" required />
                </div>
            </div>

            <!-- registro -->
            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <button class="btn btn-primary w-100" type="submit">Registrarme</button>
                </div>
            </div>
        </form>

        <!-- volver atrás -->
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <a href="http://localhost/mifielamigo" class="btn btn-outline-dark">Volver a inicio</a>
            </div>
        </div>

    </div> <!-- container -->

    <br />

</body>

</html>