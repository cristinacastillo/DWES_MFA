<?php


// Cristina Castillo Obregón
// Desarrollo Web en Entorno Servidor
// curso 2019/20
// Proyecto Mi Fiel Amigo



require_once "clases/Sesion.php";
require_once "clases/Database.php";
require_once "clases/Perro.php";
require_once "clases/Adopcion.php";

// obtenemos la instancia de la sesión
$sesion = Sesion::getInstance();

// comprobar si hay una sesión activa
if (!$sesion->checkActiveSession())
    $sesion->redirect("index.php");

// hay sesión activa
// obtenemos el usuario
$user = $sesion->getUsuario();


//conectamos con la base de datos
$db = Database::getInstance("root", "", "refugio");


// importamos la cabecera de la página
require_once "clases/navbar.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adopciones</title>

    <style>
        th,
        td {
            text-align: center !important;
        }

        table {
            border: 1px solid grey !important;
        }

        .th {
            background-color: #e6f7ff !important;
            border: 1px solid grey !important;
        }
    </style>

</head>

<body>



    <?php


    /*$db->query("SELECT count(*) as total FROM adopcion");
    $max = $db->getObject("Adopcion");
    echo "<pre>" . print_r($max, true) . "</pre>";
*/
    $id = $user->getIdUsu();

    if ($db->execute("SELECT * FROM adopcion WHERE idUSu=$id")) :
        ?>
        <div class="container">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="th" scope="col">Adopciones</th>
                        <th class="th" scope="col">Nombre del perro</th>
                        <th class="th" scope="col">Fecha de Adopción</th>

                    </tr>
                </thead>
                <?php
                    while ($adopcion = $db->getObject("Adopcion")) :
                        ?>
                    <tbody>
                        <tr>
                            <th scope="row">&#128021 &#128054</th>
                            <td><?= $adopcion->getNombre() ?></td>
                            <td><?= $adopcion->getFecha() ?></td>

                        </tr>
                <?php
                    endwhile;
                    $db = null;
                else :
                    echo "<div class='container'><div class='alert alert-warning' style='margin:5em;text-align:center' role='alert'>
                Aún no tienes adopciones.
              </div></div>";
                endif;
                ?>

                    </tbody>
            </table>
        </div>

</body>

</html>