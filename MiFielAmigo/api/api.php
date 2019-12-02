<?php

require_once "apiOp.php";

// intentamos conectar con la base de datos
try {
    $pdo = new PDO("mysql:host=localhost;dbname=refugio", "root", "");
} catch (PDOException $e) {
    die("ERROR:: " . $e->getMessage());
}

//comprobamos si la api_key y el parámetro operación se nos proporciona a través de la URL

if (empty($_GET["api_key"]))
    echo "No tienes permiso, api key errónea     ";

if (empty($_GET["op"]))
    echo "No tienes permiso, código de operación erróneo      ";

//comprobamos si  no se pasa NADA en la URL

if (empty($_GET))
    echo "No tienes permiso, api key o código de operación erróneos     ";


//comprobamos si la api existe en nuestra base de datos

$api_key = $_GET["api_key"] ?? "";

// buscamos en la base de datos
$db = Database::getInstance("root", "", "refugio");

if (!$db->execute("SELECT * FROM usuario WHERE api_key='$api_key' ; ")) :
    $data = [
        "cod" => 0,
        "mensaje" => "Necesitas los permisos",
    ];

else :

    $op = $_GET["op"] ?? "";

    switch ($op) {
        case 'perro':
            $id   = $_GET["id"] ?? "";
            $data = infoPerro($id);
            break;

        case 'perros':
            $data = infoPerros();
            break;

        case 'usuario':
            $data = infoUsuarios();
            break;

        default:
            $data = [
                "cod" => 666,
                "mensaje" => "Código de operación incorrecto.",
            ];
            break;
    }

endif;


// devolvemos el contenido especificando que es JSON
header("Content-Type: application/json");
echo json_encode($data);
