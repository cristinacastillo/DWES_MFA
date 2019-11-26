<?php

	require_once "libs/Database.php" ;
	require_once "libs/Sesion.php" ;
	require_once "libs/Serie.php" ;

	define("MAX_COL", 4) ;	// número de columnas
	define("MAX_ITEM", 8) ;	// ítems por página

	/*
	 * Modifica la puntuación de la serie en la base de datos
	 */
	function rating()
	{

		// obtenemos la putuación
		$pto = $_GET["ptos"] ;
		$ids = $_GET["ids"] ;

		// 
		$ses = Sesion::getInstance() ;
		$usr = $ses->getUsuario() ;
		$idu = $usr->getIdUsu() ;

		// instanciamos la base de datos
		$db = Database::getInstance("root", "", "flixnet") ;

		if ($db->query("SELECT * FROM usuario_serie WHERE idusu=$idu AND idser=$ids ;"))
			$sql = "UPDATE usuario_serie SET putuacion=$pto WHERE idusu=$idu AND idser=$ids ;" ;
		else
			$sql = "INSERT INTO usuario_serie VALUES ($idu, $ids, $pto) ;" ;


		// lanzamos la consulta
		if ($db->query($sql))
			echo "La puntuación se ha guardado correctamente" ;
		else
			echo "No se ha podido actualizar la puntuación" ;
	}



	/*
	 * Realiza una búsqueda paginada de  series en la base de datos 
	 */
	function search() 
	{
		// obtenemos el número de página
		// si no se nos pasa ninguna, fijamos la primera
		$pag = isset($_GET["p"])?$_GET["p"]:1 ;

		// determinamos el punto de partida para la consulta
		$ini = ($pag - 1) * MAX_ITEM ;

		// buscamos las series
		$db = Database::getInstance("root", "", "flixnet") ;

		// buscamos las series correspondientes a la página actual
		if ($db->query("SELECT * FROM serie LIMIT $ini, " . MAX_ITEM . " ;")):

			do {
				
				echo "<div class=\"row mb-2\">" ;
				$col = 0 ;
				while (($col < MAX_COL) && ($item = $db->getObject("Serie"))):
	?>
					<div class="col col-lg-3">
						<div class="card mx-auto" style="width:12rem;">
							<img src="<?= $item->getPoster() ?>" class="card-img-top" />
							<div class="card-body text-center">
								<a href="info.php?id=<?= $item->getIdSer() ?>">
									<h6 class="card-title"><?= $item->getTitulo() ?></h6>
								</a>
							</div>	<!-- end-card-body -->
						</div>	<!-- end-card -->
					</div>	<!-- end-col -->

	<?php
					$col++ ;

				endwhile ;

				echo "</div>" ;

			} while ($item) ;

		endif ;
	}

	//echo "<pre>".print_r($_GET, true)."</pre>" ;
	//die() ;

	$cop = $_GET["cop"]??0 ;

	// determinamos qué operación hay que ejecutar
	switch ($cop):
		case 1 : search() ; break ;
		case "rate" : rating() ; break ;
		default:
			echo "Código de operación erróneo" ;
	endswitch; 














