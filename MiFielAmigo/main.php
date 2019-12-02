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

    // hay sesión activa
    // obtenemos el usuario
    $user = $sesion->getUsuario();

    //buscamos el perro que queremos mostrar


    /********************************Subir Foto*************************************/

    //los archivos de las fotos se almacenarán en $_FILES 
    if (!empty($_FILES)) :

        /*if (!$db->query("SELECT * FROM perro WHERE idPer = $idPer")) :
            echo "Error con la base de datos";
        else :

            $objeto = $db->getObject("Perro");
        endif;*/

        print_r($_FILES["img"]); //comprobar

        $ruta_aleatoria = $_FILES["img"]["tmp_name"];
        //ruta + nombre de la foto
        $mi_ruta = "images/perros/" . $_FILES["img"]["name"];

        //movemos la imagen a nuestra ruta
        if (!move_uploaded_file($ruta_aleatoria, $mi_ruta)) :
            echo "Error: Foto no lo suficientmente adorable";

        endif;
    endif;

    /********************Formulario Modal***************************/
    //Añadir un nuevo perro
    //comprobamos si $_POST contiene datos

    if (!empty($_POST)) :

        echo "<pre>" . print_r($_POST, true) . "</pre>";


        $nom = $_POST["nombre"];
        $raza = $_POST["raza"];
        $gen = $_POST["genero"];
        $desc = $_POST["descripcion"];
        $fnac = $_POST["fnac"];


        // intentamos conectar con la base de datos
        try {
            $pdo = Database::getInstance("root", "", "refugio");
        } catch (PDOException $e) {
            die("ERROR:: " . $e->getMessage());
        }

        // construimos la consulta sql
        $sql = "INSERT INTO perro (nombre,raza,genero,descripcion,fec_nacimiento,foto) ";
        $sql .= "VALUES (?, ?, ?, ?, ?, ?) ;";

        // ejecutamos la consulta
        if (!$pdo->execute($sql, array($nom, $raza, $gen, $desc, $fnac, $mi_ruta)))
            $error = "Se ha producido un error en la creación del perro";

        // cerramos la conexión
        $pdo = null;

        header("location:main.php");

    endif;

    // importamos la cabecera de la página
    require_once "clases/navbar.php";

    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script type="text/javascript" src="js/main.js"></script>
        <title>Mi fiel Amigo</title>
        <style>
            #boton {
                padding-bottom: 3vw !important;
            }

        </style>
        <script>

        </script>
    </head>

    <body>
        <div class="container" id="boton">
            <div class="row">

                <div class="col-sm-6 ">
                    <button id="aniadir" type="button" class="btn btn-outline-info">Añadir perro &#10010</button>
                </div>

            </div>
        </div>


        <div id="contenido">

        </div>
   

        <div class="container">
            <div class="row">
                <div class="col-sd-12 mx-auto">
                    <button id="mostrar" type="button" class="btn btn-primary">Cargar más</button>
                </div>
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


                        <form method="post" enctype="multipart/form-data">

                            <div class="row form-group">
                                <div class="col-md-6 mx-auto">
                                    <h5>Introduzca los datos siguientes</h5>
                                </div>
                            </div>

                            <!-- nombre Perro-->
                            <div class="row form-group">
                                <div class="col-md-6 mx-auto">
                                    <label class="col-form-label" for="nombre">Nombre:</label>
                                    <input class="form-control" type="text" name="nombre" required />
                                </div>
                            </div>

                            <!-- raza-->
                            <div class="row form-group">
                                <div class="col-md-6 mx-auto">
                                    <label class="col-form-label" for="raza">Raza:</label>
                                    <input class="form-control" type="text" name="raza" required />
                                </div>
                            </div>

                            <!-- genero-->
                            <div class="row form-group">
                                <div class="col-md-6 mx-auto">
                                    <label class="col-form-label" for="genero">Género:</label>
                                    <input class="form-control" type="text" name="genero" required />
                                </div>
                            </div>

                            <!-- descripcion-->
                            <div class="row form-group">
                                <div class="col-md-6 mx-auto">
                                    <label class="col-form-label" for="descripcion">Descripción:</label>
                                    <textarea class="form-control" type="text" name="descripcion" required></textarea>

                                </div>
                            </div>

                            <!-- fecha de nacimiento -->
                            <div class="row form-group">
                                <div class="col-md-6 mx-auto">
                                    <label class="col-form-label" for="fnac">Fecha de Nacimiento:</label>
                                    <input class="form-control" type="date" name="fnac" required />
                                </div>
                            </div>

                            <!-- foto-->
                            <div class="row form-group">
                                <div class="col-md-6 mx-auto">
                                    <label for="img">Subir foto</label>
                                    <input type="file" class="form-control-file" id="img" name="img" accept="image/jpg" required />
                                    <small>Las fotos deberán tener formato 415x368px y formato png</small>
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

        <!-- -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

    </html>