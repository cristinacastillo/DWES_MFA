<?php


// Cristina Castillo Obregón
// Desarrollo Web en Entorno Servidor
// curso 2019/20
// Proyecto Mi Fiel Amigo


require_once "clases/Sesion.php";
require_once "clases/Database.php";

//solicitamos la sesion
$sesion = Sesion::getInstance();

//comprobar si ya hay una sesion activa
if ($sesion->checkActiveSession())
    //si la sesion está activa se redireccionará a la pagina principal
    $sesion->redirect("main.php");


//comprobamos si el login se ha realizado correctamente
//para ello comprobamos el contenido de $_POST
//si no esta vacio
if (!empty($_POST)) :
    //asignamos los datos de $_POST a nuestras variables
    $email = $_POST["email"];
    $pass  = $_POST["pass"];

    // intentamos loguearnos
    $ok  = $sesion->login($email, $pass);

    // si el login se ha hecho correctamente
    // redirigimos al main
    if ($ok) $sesion->redirect("main.php");

endif;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/refugio.css" />
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <title>MiFielAmigo</title>

    <style>
        body {
            background-color: pink;
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

        <!-- formulario de login -->
        <form method="post">

            <!-- email -->
            <div class="row mt-5 form-group">
                <div class="col-md-12">
                    <input class="form-control w-25 mx-auto" type="text" name="email" placeholder="mifiel@amigo.com" required />
                </div>
            </div>

            <!-- contraseña -->
            <div class="row form-group">
                <div class="col-md-12">
                    <input class="form-control w-25 mx-auto" type="password" name="pass" placeholder="Contraseña" required />
                </div>
            </div>

            <?php
            if ((isset($ok)) && (!$ok)) :
                ?>
                <div class="container">

                    <div class="alert alert-danger w-50 mx-auto">
                        Usuario o contraseña incorrectas.
                    </div>

                </div>
            <?php
            endif;
            ?>

            <!-- botón LOGIN -->
            <div class="row form-group">
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary w-25" type="submit">Entrar</button>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <a href="registro.php" class="btn btn-outline-dark">Crear usuario</a>
            </div>



        </form>

    </div>
</body>

</html>