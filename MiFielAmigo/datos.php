<?php


// Cristina Castillo Obregón
// Desarrollo Web en Entorno Servidor
// curso 2019/20
// Proyecto Mi Fiel Amigo



require_once "clases/Sesion.php";
require_once "clases/Database.php";
require_once "clases/Perro.php";


// obtenemos la instancia de la sesión
$sesion = Sesion::getInstance();

// comprobar si hay una sesión activa
if (!$sesion->checkActiveSession())
    $sesion->redirect("index.php");


$user = $sesion->getUsuario();

require_once "clases/navbar.php";


//recogemos el id pasado en la url
$idPer = $_GET["id"] ?? null;
$idUsu = $user->getIdUsu();



if (!empty($_POST)) :

    // capturamos los datos del formulario

    $descripcionMod = $_POST["descripcionMod"];

    // intentamos conectar con la base de datos
    try {
        $db = Database::getInstance("root", "", "refugio");
        //$pdo->exec("set names utf8");
    } catch (PDOException $e) {
        die("ERROR:: " . $e->getMessage());
    }

    // construimos la consulta sql
    $sql = "UPDATE perro SET descripcion=? WHERE idPer=?";


    // ejecutamos la consulta
    if (!$db->execute($sql, array($descripcionMod, $idPer)))
        $error = "Se ha producido un error en la extracción del perro";

    // cerramos la conexión
    $db = null;

    header("location:datos.php?id=$idPer");

endif;

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/datos.js"></script>
    <title>Mi Fiel Amigo</title>

    <style>
        #titulo {
            margin-bottom: 3rem;
        }

        #nombrePerro {
            visibility: hidden;
        }

        .perro {
            width: 27.18vw;
            height: 23.958vw;
        }
    </style>

    <script> </script>

</head>

<body>

    <div class="container">

        <?php

        //establecemos conexión con la base de datos
        $db = Database::getInstance("root", "", "refugio");


        //buscamos el perro que queremos mostrar
        $sql = "SELECT * FROM perro WHERE idPer = $idPer";

        if (!$db->execute($sql)) :
            echo "Error con la base de datos";
        else :

            $objeto = $db->getObject("Perro");
            /*print_r($objeto);*/


            ?>

            <div id="titulo" class="row">
                <div class="col-sd-12 mx-auto">
                    <h1><?= $objeto->getNombre() ?></h1>

                </div>
            </div>
            <hr>

            <div class="cotntainer">

                <div class="row">

                    <div class="col-sm-6 ">

                        <div id="foto">
                            <img class="perro" src="<?= $objeto->getFoto() ?>" alt="<?= $objeto->getNombre() ?>">
                        </div>

                    </div>



                    <div class="col-sm-6">
                        <!-----Fila 1------->
                        <div class="row">

                            <div class="col">
                                <label class="col-form-label" for="nombre"><b>Nombre</b></label>
                                <p><?= $objeto->getNombre() ?></p>
                            </div>

                            <div class="col">
                                <label class="col-form-label" for="raza"><b>Raza</b></label>
                                <p><?= $objeto->getRaza() ?></p>
                            </div>

                        </div>
                        <!-----Fila 2------->
                        <div class="row">

                            <div class="col">
                                <label class="col-form-label" for="genero"><b>Género</b></label>
                                <p><?= $objeto->getGenero() ?></p>
                            </div>

                            <div class="col">
                                <label class="col-form-label" for="fecnac"><b>Fecha de nacimiento</b></label>
                                <p><?= $objeto->getFecNac() ?></p>
                            </div>

                        </div>
                        <!-----Fila 3------->
                        <div class="row">

                            <div class="col">
                                <label class="col-form-label" for="descripcion"><b>Descripción</b><button id="editar" style="margin-left:2rem" type="button" class="btn btn-link badge badge-pill badge-warning">Editar &#9998</button></label>
                                <p><?= $objeto->getDescripcion() ?></p>
                            </div>

                        </div>

                    </div>
                </div>
                <hr>
                <br>

                <?php

                    $num = $objeto->getIdPer();

                    /*Averiguamos los registros totales*/
                    $db->execute("SELECT COUNT(*) AS total FROM perro ;");

                    $item  = $db->getObject();
                    //print_r ($item);
                    $total = $item->total;
                    //echo $total;
                    /*print_r($total);*/

                    $anterior = ($num == 1);
                    $siguiente = ($num == $total);

                    ?>


                <!---Siguiente - Anterior--->
                <div id="titulo" class="row">

                    <div id="titulo" class="row">
                        <div class="col-sd-12 mx-auto">


                            <label id="nombrePerro"><?= $nombre = $objeto->getNombre() ?></label>


                            <?php
                                if ($db->execute("SELECT * FROM adopcion where nombre='$nombre'")) :

                                    echo "<label class='btn btn-success'>  &#x2714 ¡Adoptado!</label>";

                                else :
                                    ?>

                                <button id='aniadirAdop' data-idp='<?= $objeto->getIdPer() ?>' data-idu='<?= $user->getIdUsu() ?>' data-nom='<?= $objeto->getNombre() ?>' class='btn btn-outline-success'>Añadir a mis adopciones</button>
                            <?php
                                endif;
                                ?>
                        </div>
                    </div>

                    <!-- modal -->
                    <div id="modal" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Mi Fiel Amigo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">


                                    <form method="post">

                                        <div class="row form-group">
                                            <div class="col-md-6 mx-auto">
                                                <h5>Modifica la descripción de <?= $objeto->getNombre() ?></h5>
                                            </div>
                                        </div>


                                        <!-- descripcion-->
                                        <div class="row form-group">
                                            <div class="col-md-12 mx-auto">
                                                <label class="col-form-label" for="descripcion">Descripción:</label>
                                                <textarea class="form-control" type="text" style="min-height: 20em;" name="descripcionMod" required><?= $objeto->getDescripcion() ?></textarea>

                                            </div>
                                        </div>


                                        <!-- enviar -->
                                        <div class="row form-group">
                                            <div class="col-md-4 mx-auto">
                                                <button class="btn btn-primary w-100" type="submit">Guardar</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fin Modal -->

                    <div class="col-sd-12 mx-auto">
                        <a class="btn btn-warning" href="<?= $anterior ? "#" : "datos.php?id=" . ($num - 1) ?>">Anterior</a>
                        <a class="btn btn-warning" href="<?= $siguiente ? "#" : "datos.php?id=" . ($num + 1) ?>">Siguiente</a>
                    </div>

                    <div id="titulo" class="row">
                        <div class="col-sd-12 mx-auto">
                            <button id="borrar" data-id="<?= $objeto->getIdPer() ?>" class="btn btn-outline-danger">Borrar</button>
                        </div>
                    </div>

                </div>



            <?php
            endif;
            ?>

</body>

</html>