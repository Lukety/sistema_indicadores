<?php
	
	// Se inicia sesion:
	session_start();

	$ID = $_SESSION['id_proyecto'];

	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");

	echo $ID;

	mysqli_query($mysqli,"DELETE FROM `indicadores` WHERE `ID` = '$ID'");

	// Redireccion a probando.php:
	header("location: indicadores.php?eliminar=si");

?>