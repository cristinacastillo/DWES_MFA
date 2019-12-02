<!DOCTYPE html>
<html lang="es">

<!--
// Cristina Castillo Obregón
// Desarrollo Web en Entorno Servidor
// curso 2019/20
// Proyecto Mi Fiel Amigo
-->

<head>
    <title>MiFielAmigo</title>
    <meta charset="utf8" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/refugio.css" />
    <link rel="shortcut icon" href="images/favicon.ico">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <!--<script src="https://code.jquery.com/jquery-3.4.1.js"></script>-->

    <style>
        body {
            height: 80%;
        }

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
            text-align: center;
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

       
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky ">

        <a class="navbar-brand " href="main.php"><img id="logo" src="images/mifielamigo-logo.png" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a id="bienvenida" class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">¡Bienvenido al refugio, <?= $user->getNombre() ?>!</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="main.php">Perros <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="adopciones.php">Adopciones</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="perfilUsuario.php">Perfil de usuario</a>
                </li>

            </ul>

            <span class="navbar-text">
                <a href="logout.php">Cerrar sesión <img id="logout" src="images/logout.png" alt=""></a>
            </span>
        </div>

    </nav>

