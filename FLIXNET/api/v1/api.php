<?php

	require_once "../../libs/Serie.php" ;
	require_once "../../libs/Capitulo.php" ;

	require_once "../../libs/Database.php" ;
	require_once "../../libs/libreria.php" ;

	// ESTO NO TIENE QUE IR AQUÍ
	// Generación de la API KEY para un determinado usuario
	// construimos una cadena con elementos fijos y variables
	// hecho esto, le aplicamos algún método de encriptación.
	//
	//$cad = "flixnet_usuario@usuario.com****".time() ;
	//echo md5($cad) ;
	//die() ;
	// ####################################################

	/**
	 */
	function infoSerie($id)
	{
		// comprobamos si el $id es válido
		if (empty($id))
			return [
					  "cod" => 999,
					  "mensaje" => "Falta identificador de la serie.",
					] ;

		// obtenemos información sobre la serie
		$db = Database::getInstance("root", "", "flixnet") ;
		$db->query("SELECT * FROM serie WHERE idSer=$id ; ") ;
		$ser = $db->getObject("Serie") ;

		// generamos el resultado que deseemos
		return [
					"id"       => $ser->getIdSer(),
					"name"     => $ser->getTitulo(),
					"image"    => $ser->getPoster(),
					"overview" => $ser->getArgumento() 
				] ;
	}

	/**
	 */
	function infoCapitulo($id)
	{
		// obtenemos información sobre la serie
		$db = Database::getInstance("root", "", "flixnet") ;
		$db->query("SELECT * FROM capitulo WHERE idCap=$id ; ") ;
		$cap = $db->getObject("Capitulo") ;

		// generamos el resultado que deseemos
		return [
					"id"       => $cap->getIdCap(),
					"name"     => $cap->getTitulo(),
					"overview" => $cap->getArgumento() 
				] ;
	}


	// comprobamos si existe la API_KEY
	$api = $_GET["api_key"]??"" ;

	// buscamos en la base de datos
	$db = Database::getInstance("root", "", "flixnet") ;

	if (!$db->query("SELECT * FROM usuario WHERE api_key='$api' ; ")):
		$data = [
				   "cod" => 0,
				   "mensaje" => "Killo, para, que no tienes permiso.",
				] ;

	else:

		$op = $_GET["op"]??"" ;

		switch ($op) 
		{
			case 'serie':
				$id   = $_GET["id"]??""  ;
				$data = infoSerie($id) ;
				break;

			case 'capitulo':
				$data = infoCapitulo($_GET["id"]) ;
				break ;
			
			default:
				$data = [
						  "cod" => 666,
						  "mensaje" => "Código de operación incorrecto.",
						] ;
				break;
		}

	endif ;


	// devolvemos el contenido especificando que es JSON
	header("Content-Type: application/json") ;
	echo json_encode($data) ;



	