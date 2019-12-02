<?php

// Cristina Castillo Obregón
// Desarrollo Web en Entorno Servidor
// curso 2019/20
// Proyecto Mi Fiel Amigo

require_once "../clases/Database.php";

require_once "../clases/Perro.php";
require_once "../clases/Adopcion.php";
require_once "../clases/Usuario.php";



//informacion de un perro según su id
function infoPerro($id)
{

    if (empty($id))
        return [
            "cod" => 999,
            "mensaje" => "Falta identificardor del perro"
        ];

    //recoger informacion del perro
    $db = Database::getInstance("root", "", "refugio");
    $db->execute("SELECT * FROM perro WHERE idPer=$id ; ");
    $perro = $db->getObject("Perro");

    //resultado
    return [
        /*"id" => $perro->getIdPer(),*/
        "nombre" => $perro->getNombre(),
        "raza" => $perro->getRaza(),
        "genero" => $perro->getGenero(),
        "descripcion" => $perro->getDescripcion(),
        "fec_nacimiento" => $perro->getFecNac(),
        "foto" => $perro->getFoto(),
    ];
};


function infoPerros(): array
{

    //recoger informacion del perro
    $db = Database::getInstance("root", "", "refugio");
    $db->execute("SELECT * FROM perro; ");

    $perros = [];

    while ($perro = $db->getObject("Perro")) :
        $datos = [
            "nombre" => $perro->getNombre(),
            "raza" => $perro->getRaza(),
            "genero" => $perro->getGenero(),
            "descripcion" => $perro->getDescripcion(),
            "fec_nacimiento" => $perro->getFecNac(),
            "foto" => $perro->getFoto(),
        ];
        array_push($perros, $datos);
    endwhile;
    return $perros;
};

function infoUsuarios(): array
{

    //recoger informacion del perro
    $db = Database::getInstance("root", "", "refugio");
    $db->execute("SELECT * FROM usuario");

    $usuarios = [];

    while ($usuario = $db->getObject("Usuario")) :
        $datos = [
            "nombre" => $usuario->getNombre(),
            "apellidos" => $usuario->getApellidos(),
            "email" => $usuario->getEmail()
        ];
        array_push($usuarios, $datos);
    endwhile;
    return $usuarios;
};