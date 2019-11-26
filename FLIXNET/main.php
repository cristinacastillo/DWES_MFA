<?php

	require_once "libs/Serie.php" ;
	require_once "libs/Sesion.php" ;
	require_once "libs/Database.php" ;

	require_once "libs/libreria.php" ;

	define("MAX_COL", 4) ;	// número de columnas
	define("MAX_ITEM", 8) ;	// ítems por página

	// obtenemos la instancia de la sesión
	$ses = Sesion::getInstance() ;

	// comprobar si hay una sesión activa
	if (!$ses->checkActiveSession())
		 $ses->redirect("index.php") ;

	// hay sesión activa
	// obtenemos el usuario
	$usr = $ses->getUsuario() ;

	// importamos la cabecera de la página
	require_once "libs/navbar.php" ;
?>

		<div class="content">

			<?php

				// conectamos con la base de datos
				$db = Database::getInstance("root", "", "flixnet") ;

				// calculamos el total de registros
				$db->query("SELECT COUNT(*) AS total FROM serie ;") ;
				$item  = $db->getObject() ;
				$total = $item->total ;

				// obtenemos el número de página
				// si no se nos pasa ninguna, fijamos la primera
				$pag = isset($_GET["p"])?$_GET["p"]:1 ;

				// determinamos el punto de partida para la consulta
				$ini = ($pag - 1) * MAX_ITEM ;

				// buscamos las series correspondientes a la página actual
				if (!$db->query("SELECT * FROM serie LIMIT $ini, " . MAX_ITEM . " ;")):
					mostrarAlerta("No se han encontrado series en la base de datos", "danger") ;
				else:

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

					// añadimos una paginación sencilla
					$ant_cond = ($pag==1) ;
					$sig_cond = (($pag*MAX_ITEM) >= $total) ;

			?>

			
			<nav aria-label="paginación">
				<ul class="pagination justify-content-center">

					<!-- anterior -->
					<li class="page-item <?= $ant_cond?"disabled":"" ?>">
						<a class="page-link" href="<?= $ant_cond?"#":"main.php?p=".($pag-1) ?>">anterior</a>
					</li>	
					
					<!-- siguiente -->
					<li class="page-item <?= $sig_cond?"disabled":"" ?>">
						<a class="page-link" href="<?= $sig_cond?"#":"main.php?p=".($pag+1) ?>">siguiente</a>
					</li>
				</ul>
			</nav>


			<?php

				endif ;	// end-if-query
			?>

		</div>	<!-- end-content -->

	</div>	<!-- end-container -->
	
</body>
</html>