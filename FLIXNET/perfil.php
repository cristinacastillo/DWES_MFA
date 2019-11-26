<?php

	require_once "libs/Sesion.php" ;
	require_once "libs/Database.php" ;
	require_once "libs/libreria.php" ;

	$ses = Sesion::getInstance() ;

	// comprobar si hay una sesión activa
	if (!$ses->checkActiveSession())
		 $ses->redirect("index.php") ;

	// hay sesión activa
	// obtenemos el usuario
	$usr = $ses->getUsuario() ;

	// comprobamos si hemos recibido alguna imagen
	// $_GET, $_POST, $_FILES

	// 3. Utilizamos $_FILES para comprobar si tenemos alguna imagen
	// 4. Movemos la imagen a la carpeta de destino utilizando la función
	//    move_uploaded_file donde:
	//
	//		$_FILES[xx]["name"] es el nombre REAL de la imagen
	//		$_FILES[xx]["tmp_name"] es el nombre TEMPORAL de la imagen
	//

	if (!empty($_FILES)):

		ponerBonito($_FILES["img"]) ;

		$path_ini = $_FILES["img"]["tmp_name"] ;
		$path_fin = "images/avatares/".$_FILES["img"]["name"] ;

		//if (exif_imagetype($path_ini) != IMAGETYPE_PNG)
		//	echo "El formato de la imagen no es correcto." ;
		//else
		if (!move_uploaded_file($path_ini, $path_fin)):
			echo "Se ha producido un error al cargar la imagen del usuario" ;
		else:
			$usr->setFoto($path_fin) ;
			$ses->updateUser($usr) ;
		endif ;

		
		

	endif ;

	require_once "libs/navbar.php" ;
?>

	<div class="content">

		<?php
			//ponerBonito($usr) ;
		?>

		<!--
			1. El método del formulario debe ser POST OBLIGATORIAMENTE
			2. Añadimos el atributo enctype con el valor multipart/form-data
		-->

		<form method="post" enctype="multipart/form-data">

			<div class="row">
				<div class="col">
					<label>Email: </label>
					<input type="email" name="ema" value="<?= $usr->getEmail() ?>" />
				</div>
			</div>

			<div class="row">
				<div class="col form-group">				
				    <label for="img">Example file input</label>
				    <input type="file" class="form-control-file" id="img" name="img" 
				    	   accept="image/jpg, image/png" />
				</div>
			</div>

			<div class="row">
				<div class="col">				
				    <button class="btn btn-primary" type="submit">Guardar datos</button>
				</div>
			</div>			

		</form>

	</div>

</body>
</html>