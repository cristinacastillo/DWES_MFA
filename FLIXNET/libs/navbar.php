<!DOCTYPE html>
<html lang="es">
<head>
	<title>FlixNet</title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="css/flixnet.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
	
	<!--<script src="https://code.jquery.com/jquery-3.4.1.js"></script>-->

</head>
<body>

	<div class="container-flex">		
		<div class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">FlixNet</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
				</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="main.php?p=1">Inicio</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Favoritos</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="perfil.php">Perfil</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="logout.php">Salir</a>
					</li>
				</ul> 

			</div>	<!-- end-collapse -->

			<div class="navbar-text">
				Bienvenido/a, <?= $usr ?> 
			</div>

		</div>	<!-- end-navbar -->