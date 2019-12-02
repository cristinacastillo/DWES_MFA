<?php


// Cristina Castillo Obregón
// Desarrollo Web en Entorno Servidor
// curso 2019/20
// Proyecto Mi Fiel Amigo


require_once "clases/Sesion.php" ;

// obtenemos la instancia de la sesión
$ses = Sesion::getInstance() ;

// cerramos la sesión
$ses->close() ;

// redirigimos al inicio
$ses->redirect("index.php") ;