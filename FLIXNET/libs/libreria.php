<?php

	// Antonio José Sánchez Bujaldón
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	function ponerBonito($mensaje)
	{
		echo "<pre>".print_r($mensaje, true)."</pre>" ;
	}

	function mostrarAlerta($msg, $tipo="primary")
	{
		echo "<div class=\"alert w-50 alert-$tipo\" role=\"alert\">$msg</div>" ;
	}