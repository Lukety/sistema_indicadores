<?php

	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");

	if(isset($_POST['boton_unidad'])){
		$unidad = $_POST['nueva_unidad'];
		$sql = "INSERT INTO `unidad`(`nombre`) VALUES ('$unidad')";
		mysqli_query($mysqli,$sql);
		header("location:otras_configuraciones.php?cargar=si");
	}

	if(isset($_POST['boton_eli_unidad'])){
		$sel_unidad = $_POST['sel_unidad'];
		$sql = "DELETE FROM unidad WHERE  nombre = '$sel_unidad'";
		mysqli_query($mysqli,$sql);
		header("location:otras_configuraciones.php?eliminar=si");
	}

	

?>
