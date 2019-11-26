<?php

	require_once "libs/Serie.php" ;
	require_once "libs/Sesion.php" ;
	require_once "libs/Database.php" ;

	require_once "libs/libreria.php" ;

	// obtenemos la instancia de la sesión
	$ses = Sesion::getInstance() ;

	// comprobar si hay una sesión activa
	if (!$ses->checkActiveSession())
		 $ses->redirect("index.php") ;

	// obtenemos el usuario
	$usr = $ses->getUsuario() ;
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>FlixNet</title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="css/flixnet.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	
	<script>
	
		$(document).ready(function() 
		{

			// realiza una petición AJAX
			//
			function loadShows()
			{
				$.ajax(
					{
						method: "GET",
						url   : "operaciones.php",
						data  : { "cop":1, "p": pag },

					}).done(function(data) {
						
						$("#content").append(data) ;
						pag++ ;

					}) ;
			}


			var pag = 1 ;
			//$("p") selección de etiqueta
			//$(objeto) selección de objeto JS
			//$(".clase") selección a través de clase

			$("#go").click(function() 
			{
				loadShows() ;
			}) ;

			$(window).scroll(function() {

				if ($(window).scrollTop() + $(window).height() >= 
					$(document).height())
					loadShows() ;

			}) ;


			// mostrar las series de la primera página
			loadShows() ;

		}) ;

	
	</script>

	<style>

		.content 	{ padding: 40px; }
		.pagination { margin-top: 40px !important; }

	</style>

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
						<a class="nav-link" href="#">Inicio</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Favoritos</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Perfil</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Salir</a>
					</li>
				</ul> 

			</div>	<!-- end-collapse -->

			<div class="navbar-text">
				Bienvenido/a, <?= $usr ?> 
			</div>

		</div>	<!-- end-navbar -->


		<div id="content"></div>


		<button id="go" type="button">mostrar algo</button>

</body>
</html>