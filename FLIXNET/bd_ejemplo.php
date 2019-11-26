<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flixnet</title>
</head>

<body>

    <?php

    error_reporting(0); //ocultar cualquier mensaje de error de php

    $cadena = file_get_contents('https://api.themoviedb.org/3/tv/on_the_air?api_key=472447e7cbc8ccfb04c763ecfe9bf72a&language=es_ES&page=2');

    if ($cadena) {
        $info = json_decode($cadena);
        //echo "<pre>" . print_r($info, true) . "</pre>";
    } else {
        echo "ERROR";
    }
    /*
    //establecemos conexion con el motor de BD
    $link = new mysqli('localhost', 'root', '');

    //comprobamos que la conexion se ha realizado correctamente
    if ($link->connect_errno) :

        echo "Se ha producido un error con la conexión del servidor de BD.<br>";

        die("**ERROR: " . $link->connect_errno . "<br>"); //matar proceso


    endif;

    $link->select_db("flixnet"); //elegimos la base de datos con la que vamos a trabajar

    //realizamos una consulta
    $res = $link->query("SELECT * FROM usuario;");

    //comprobamos que la consulta se ha relizado correctamente
    if (!$res)

        die("**ERROR: " . $res->errno . " - " . $res->error . "<br>");

    //devuelve una fila en forma de array asociativo
    $row = $res->fetch_assoc();

    //devuelve una fila en forma de array escalar
    //$row = $res->fetch_row();

    //devuelve una fila en forma de array mixto, asoc o escalar)
    //$row = $res->fetch_array();
    //$row = $res->fetch_array(MYSQLI_ASSOC);
    //$row = $res->fetch_array(MYSQLI_BOTH);
    //$row = $res->fetch_array(MYSQLI_NUM);

    echo "<pre>" . print_r($row, true) . "</pre";

    //cerramos la conexion
    //$link->close();
*/


    try {
        $link = new PDO("mysql:host=localhost;dbname=flixnet", "root", "");
    } catch (PDOException $e) {

        die("**ERROR: " . $e->getMessage());
    }

    //definir la consulta sql
    $sql = "INSERT INTO serie ('titulo','plataforma','genero','fec_emision', 'nacionalidad', 'argumento')";
    $sql.="VALUES (:tit, :pla, :gen, :fec, :nac, :arg)";

    //preparar la sentencia sql
    $link->prepare($sql);

    //cerramos la conexion 
    $link = NULL;
    ?>

</body>

</html>