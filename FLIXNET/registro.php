<?php

	// Antonio José Sánchez Bujaldón
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	
	if (!empty($_POST)):
	
		echo "<pre>".print_r($_POST,true)."</pre>" ;
		
		// capturamos los datos del formulario
		$ema = $_POST["email"] ;
		$nom = $_POST["nombre"] ;
		$ape = $_POST["apellidos"] ;
		$pas = $_POST["pass"] ;
		$con = $_POST["conf"] ;
		$fec = !empty($_POST["fnac"])?$_POST["fnac"]:null ;

		// comprobar que las contraseñas son iguales
		if ($pas==$con):

			// intentamos conectar
			try {
				$pdo = new PDO("mysql:host=localhost;dbname=flixnet","root","") ;
			} catch (PDOException $e) {
				die("ERROR:: ".$e->getMessage()) ;
			}

			// construimos la sentecia
			$sql = "INSERT INTO usuario (email,pass,nombre,apellidos,fec_nacimiento) " ;
			$sql.= "VALUES (:ema, md5(:pas), :nom, :ape, :fec) ;" ;

			// preparamos la sentencia
			$sqlp = $pdo->prepare($sql) ;

			// vinculado los parámetros a la consulta SQL
			$sqlp->bindValue(":ema", $ema, PDO::PARAM_STR) ;
			$sqlp->bindValue(":pas", $pas, PDO::PARAM_STR) ;
			$sqlp->bindValue(":nom", $nom, PDO::PARAM_STR) ;
			$sqlp->bindValue(":ape", $ape, PDO::PARAM_STR) ;
			$sqlp->bindValue(":fec", $fec, PDO::PARAM_STR) ;

			// ejecutamos la consulta
			if (!$sqlp->execute())
				$error = "Se ha producido un error en la creación del usuario" ;

			// cerramos la conexión
			$pdo = null ;

		else:
			$error = "Las contraseñas no coinciden" ;
		endif ;

	endif ;


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>· FlixNet ·</title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="css/flixnet.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body>

	<div class="container">

		<!-- logotipo -->
		<div class="row">
			<div class="col-sd-12 mx-auto">
				<img class="logo" src="images/flixnet_logo.png" alt="FlixNet" />
			</div>
		</div>

		<!-- nota -->
		<div class="row">
			<div class="col-sd-12 mx-auto mb-5">
				<h4>Registro de Usuarios</h4>
			</div>
		</div>

		
		<?php
			if (isset($error)):
				echo "<div class=\"alert alert-danger w-50 mx-auto\">" ;
				echo $error ;
				echo "</div>" ;
			endif ;
		?>

		<!-- formulario de registro -->
		<form method="post">
			
			<!-- nombre de usuario -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="email">Nombre de usuario:</label>
					<input class="form-control" type="email" name="email" 
						   placeholder="email@flixnet.com" required />
				</div>
			</div>

			<!-- nombre -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="nombre">Nombre:</label>
					<input class="form-control" type="text" name="nombre" required />
				</div>
			</div>

			<!-- apellidos -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="apellidos">Apellidos:</label>
					<input class="form-control" type="text" name="apellidos" required />
				</div>
			</div>

			<!-- contraseña -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="pass">Contraseña:</label>
					<input class="form-control" type="password" name="pass" 
						   required />
				</div>
			</div>

			<!-- confirmación contraseña -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="conf">Confirmación contraseña:</label>
					<input class="form-control" type="password" name="conf" 
						   required />
				</div>
			</div>

			<!-- fecha de nacimiento -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="fnac">Fecha de Nacimiento:</label>
					<input class="form-control" type="date" name="fnac" />
				</div>
			</div>

			<!-- registro -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<button class="btn btn-primary w-100" type="submit">Registrar</button>
				</div>
			</div>
		</form>

		<!-- volver atrás -->
		<div class="row">
			<div class="col-md-4 mx-auto text-center">
				<a href="http://localhost/flixnet" class="btn btn-link">volver atrás</a>
			</div>
		</div>

	</div> <!-- container -->

	<br/>

</body>
</html>