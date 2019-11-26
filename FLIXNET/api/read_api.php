<!DOCTYPE html>
<html lang="es">
<head>
	<title>· FlixNet ·</title>
	<meta charset="utf8" />
</head>
<body>

	<?php

		//error_reporting(0) ;	// ocultar cualquier mensaje de error de PHP
		define('API_KEY', '6758e4b628ca5f6e1b8d69ce5cb6e6b8') ;

		//
		require_once("../libs/Database.php") ;
		
		/**
		 */
		function getSeries()
		{
			// conectamos con la base de datos
			$sqli = new mysqli("localhost", "root", "") or die("Se ha producido un error en la conexión.") ;
			$sqli->select_db("flixnet") ;
			$sqli->set_charset("utf8") ;

			$seasons = [] ;

			// realizamos la primera solicitud
			// para buscar las series que están emitiéndose
			$datos  = file_get_contents("https://api.themoviedb.org/3/tv/on_the_air?api_key=". API_KEY ."&language=es_ES&page=1") ;

			// si tengo información
			if ($datos): 

				// convertimos el JSON a un formato manejable por PHP
				$info   = json_decode($datos) ;
				//echo "<pre>".print_r($info, true)."</pre>" ;

				foreach ($info->results as $item):

					$id    = $item->id ;
					$datos = file_get_contents("https://api.themoviedb.org/3/tv/$id?api_key=". API_KEY ."&language=es-ES") ;

					if ($datos):
						// convertimos de nuevo el JSON a un formato manejable por PHP
						$show = json_decode($datos) ;
						//echo "<pre>".print_r($show, true)."</pre>" ;

						// guardamos los datos necesarios
						$idTmdb     = $show->id ;
						$nombre     = $show->name ;
						$argumento  = $show->overview ;
						$poster     = $show->poster_path ;
						$fecha		= $show->first_air_date ;
						$genero     = (!empty($show->genres))?$show->genres[0]->name :null ;
						$pais       = (!empty($show->origin_country))?$show->origin_country[0] :null ;
						$plataforma = (!empty($show->networks))?$show->networks[0]->name :null ;

						// almacenamos el número de temporadas por serie en el array $seasons
						//array_push($seasons,[$idTmdb => $show->number_of_seasons]) ;
						$seasons[$idTmdb] = $show->number_of_seasons ;

						// consulta
						$sql = "INSERT INTO serie " ;
						$sql.= "VALUES ('$idTmdb','$nombre', '$poster', '$plataforma', '$genero', '$fecha', '$pais', '$argumento') ;" ;

						//echo $sql."<br/>" ;

						echo "Insertando $nombre....<br/>" ;
						$sqli->query($sql) ;

					else :
						echo "Sin información<br/>" ;

					endif ;

				endforeach ;

				// cerramos la conexión con la base de datos
				$sqli->close() ;

			else:
				echo "No hay información.<br/>" ;
			endif;

			//
			return $seasons ;
		}

		/**
		 */
		function getCapitulos($seasons)
		{
			// conectamos con la base de datos
			$sqli = Database::getInstance("root", "", "flixnet") ;
			$sqli->query("SELECT * FROM serie ;") ;

			//
			$series = $sqli->getAll() ;

			//
			foreach ($series as $key => $item):

				$idSer  = $item["idSer"] ;
				$ntemps = $seasons[$idSer] ;

				echo "Insertando temporadas en ".$item["titulo"]."<br/>" ;

				for ($i=1; $i <= $ntemps; $i++):

					echo "-- temporada: $i<br/>" ;

					$datos = file_get_contents("https://api.themoviedb.org/3/tv/$idSer/season/$i?api_key=". API_KEY ."&language=es_ES") ;
					$caps  = json_decode($datos) ;

					foreach($caps->episodes as $key => $capitulo):

						//echo "<pre>".print_r($capitulo, true)."</pre>" ;


						$id        = $capitulo->id ;
						$ncap      = $key+1 ;
						$titulo    = addslashes($capitulo->name) ;
						$argumento = addslashes($capitulo->overview) ;

						$sql = "INSERT IGNORE INTO capitulo " ;
						$sql.= "VALUES ('$id', '$idSer', '$ncap', '$i', '$titulo', '$argumento', null) ;" ;

						//echo "$sql<br/>" ;
						//die() ;
						
						// consulta
						$sqli->query($sql) ;

					endforeach ;

				endfor ;

			endforeach ;

		}



		// obtenemos las series y los capítulos
		getCapitulos(getSeries()) ;

	?>

</body>
</html>