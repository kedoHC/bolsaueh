<?php
	$servidor="localhost";
	$usuario="kedo";
	$contrasena="kedokedo";
	$basededatos="bolsaueh";

	$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
	mysqli_set_charset($conexion, "utf8");
?>