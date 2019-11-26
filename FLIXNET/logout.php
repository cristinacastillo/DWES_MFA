<?php

	require_once "libs/Sesion.php" ;

	// obtenemos la instancia de la sesión
	$ses = Sesion::getInstance() ;

	// cerramos la sesión
	$ses->close() ;

	// redirigimos al inicio
	$ses->redirect("index.php") ;

	//session_start() ;

	// vaciamos $_SESSION
	// $_SESSION[] = [] ;
	//unset($_SESSION["email"]) ;

	// destruimos la sesión
	//session_destroy() ;

	// redirigimos al index
	//header("Location: index.php") ;