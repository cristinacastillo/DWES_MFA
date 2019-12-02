    <?php


    // Cristina Castillo Obregón
    // Desarrollo Web en Entorno Servidor
    // curso 2019/20
    // Proyecto Mi Fiel Amigo



    require_once "clases/Sesion.php";
    require_once "clases/Database.php";
    require_once "clases/Perro.php";



    //definicion de las variables para el maximo de columnas
    define("colMax", 3);
    define("fotMax", 6);


    //creamos funcion para mostrar el listado de perros
    function mostrar()
    {

        //conectamos con la base de datos
        $db = Database::getInstance("root", "", "refugio");

        //obtenemos la pagina en la que estamos y si no se le asiganara la 1

        if (isset($_GET["pag"])) :
            $pag = $_GET["pag"];
        else :
            $pag = 1;
        endif;

        $inicio = ($pag - 1) * fotMax;
        $sql = ("SELECT * FROM perro limit $inicio," . fotMax . " ;");

        //limitar el número de registros devueltos en función de un valor límite
        if ($db->execute($sql)) :

            do {

                ?>
                <div class="container">
                    <div class="row mb-2">
                        <?php

                                    $columna = 0;
                                    while (($columna < colMax) && ($objeto = $db->getObject("Perro"))) :

                                        ?>

                            <div class="col col-lg-4">
                                <div class="card">
                                    <img class="perro" src="<?= $objeto->getFoto() ?>" class="card-img-top" alt="<?= $objeto->getNombre() ?>">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sd-12 mx-auto">
                                                <a href="datos.php?id=<?= $objeto->getIdPer() ?>" class="btn btn-warning"><?= $objeto->getNombre() ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                                        $columna++;
                                    endwhile;
                                    ?>
                    </div>
                </div>
                
        <?php

                } while ($objeto);
            endif;
        }


        function aniadirAdop()
        {

            $pdo = Database::getInstance("root", "", "refugio");


            $id = $_GET['id'];
            $idU = $_GET['idU'];
            $nom = $_GET['nom'];
            $fecha = date("Y-m-d");



            // construimos la consulta sql
            $sql = "INSERT INTO adopcion (idUsu, idPer, nombre,fecha) ";
            $sql .= "VALUES (?, ?, ?, ?) ;";


            // ejecutamos la consulta
            if (!$pdo->execute($sql, array($idU, $id, $nom, $fecha)))
                $error = "Se ha producido un error en la creación del perro";

            // cerramos la conexión
            $pdo = null;
        }



        function borrarPerro()
        {

            $db = Database::getInstance("root", "", "refugio");

            $id = $_GET["id"];

            // intentamos conectar con la base de datos
            try {
                $pdo = Database::getInstance("root", "", "refugio");
            } catch (PDOException $e) {
                die("ERROR:: " . $e->getMessage());
            }

            //construimos la consulta sql

            $sql = "DELETE FROM perro WHERE ";
            $sql .= " idPer=?";


            // ejecutamos la consulta
            if (!$pdo->execute($sql, array($id)))
                $error = "Se ha producido un error en la creación del perro";



            //sacamos el ultimo valor de la tabla perro 
            $db->execute("SELECT idPer as ultimo FROM perro ORDER BY idPer DESC LIMIT 1");
            $consulta = $db->getObject();
            $ultimo = $consulta->ultimo;
            //le sumamos uno mas al ultimo registro
            $ultimo = $ultimo + 1;

            //hacemos auto increment para que la seguir insertando datos los ids sigan el orden
            $sql = "ALTER TABLE perro AUTO_INCREMENT=$ultimo";

            $pdo->execute($sql);


            // cerramos la conexión
            $pdo = null;
        }




        $cod = $_GET["cod"] ?? 0;

        switch ($cod):
            case 1:
                mostrar();
                break;
            case 2:
                aniadirAdop();
                break;
            case 3:
                borrarPerro();
                break;
            default:
                echo "Código de operación erróneo";
        endswitch;
