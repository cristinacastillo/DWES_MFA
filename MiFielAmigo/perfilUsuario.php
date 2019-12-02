    <?php


    // Cristina Castillo Obregón
    // Desarrollo Web en Entorno Servidor
    // curso 2019/20
    // Proyecto Mi Fiel Amigo



    require_once "clases/Sesion.php";
    require_once "clases/Database.php";

    // obtenemos la instancia de la sesión
    $sesion = Sesion::getInstance();

    // comprobar si hay una sesión activa
    if (!$sesion->checkActiveSession())
        $sesion->redirect("index.php");

    // hay sesión activa
    // obtenemos el usuario
    $user = $sesion->getUsuario();

    require_once "clases/navbar.php";


    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>MiFielAmigo</title>
        <meta charset="utf8" />

        <link rel="shortcut icon" href="images/favicon.ico">

        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>

        <!--<script src="https://code.jquery.com/jquery-3.4.1.js"></script>-->

        <style>
            #logo {
                width: 5em !important;
                margin-right: 3rem !important;
                margin-left: 5rem !important;
            }

            li {
                margin-left: 3vw !important;
                font-size: 1.5vw !important;

            }

            h5 {
                text-align: center !important;
            }

            span {
                margin-left: 3vw !important;
                font-size: 1.05vw !important;
                font-weight: bold !important;
            }

            #logout {
                width: 1vw !important;
                margin: 0.3vw !important;
            }

            nav {
                margin-bottom: 3vw !important;
                background-color: #e6f7ff !important;

            }

            .details li {
                list-style: none !important;
            }

            .lip {
                margin: 2vw !important;

            }

            #icono {
                width: 22vw !important;
                height: 22vw !important;
            }

            .logo {
                width: 3vw !important;
                height: 3vw !important;
                margin-right: 2vw !important;
            }
        </style>

    <body>

        <!--<nav class="navbar navbar-expand-lg navbar-light sticky ">

            <a class="navbar-brand " href="main.php"><img id="logo" src="images/mifielamigo-logo.png" alt=""></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a id="bienvenida" class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">¡Bienvenido al refugio,<?= $user->getNombre() ?>!</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="main.php">Perros <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Adopciones</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="perfilUsuario.php">Perfil de usuario</a>
                    </li>

                </ul>

                <span class="navbar-text">
                    <a href="logout.php">Cerrar sesión <img id="logout" src="images/logout.png" alt=""></a>
                </span>
            </div>


        </nav>-->

        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                        <img id="icono" src="images/icono.png" alt="stack photo" class="img">
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                        <div class="container" style="border-bottom:1px solid black">
                            <h2>Perfil de Mi Fiel Amigo</h2>
                        </div>
                        <hr>

                        <ul class="container details">
                            <li class="lip">
                                <p><img class="logo" src="images/perfil.png" alt="logo-perfil"><?= $user->getNombre() . " " . $user->getApellidos() ?></p>
                            </li>
                            <li class="lip">
                                <p><img class="logo" src="images/email.png" alt="logo-email"><?= $user->getEmail() ?></p>
                            </li>

                            <li class="lip">
                                <p><img class="logo" src="images/key.png" alt="logo-api-key"><?= $user->getApiKey() ?></p>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                    Uso APIKEY
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Mi Fiel Amigo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6>JSON de Perros</h6>
                            <p>http://localhost/mifielamigo/api/api.php?api_key=...&op=perros</p>
                            <h6>JSON de un Perro mediante su ID</h6>
                            <p>http://localhost/mifielamigo/api/api.php?api_key=...&op=perro&id=...</p>
                            <h6>JSON de Usuarios</h6>
                            <p>http://localhost/mifielamigo/api/api.php?api_key=...&op=usuario</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                        </div>
                    </div>
                </div>
            </div>

    </body>

    </html>