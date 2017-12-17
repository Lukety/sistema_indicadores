<?php

	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");

	if(isset($_POST['boton_secretaria'])){
		$secretaria = $_POST['nueva_secretaria'];
		$sql = "INSERT INTO `secretaria`(`nombre`) VALUES ('$secretaria')";
		mysqli_query($mysqli,$sql);
		header("location:secretarias_direcciones.php?cargar_sec=si");
	}
	
	if(isset($_POST['boton_direccion'])){
		$direccion = $_POST['nueva_direccion'];
		$sql = "INSERT INTO `direccion`(`nombre`) VALUES ('$direccion')";
		mysqli_query($mysqli,$sql);
		header("location:secretarias_direcciones.php?cargar_dir=si");
	}

	if(isset($_POST['boton_eli_secretaria'])){
		$sel_secretaria = $_POST['sel_secretaria'];
		$sql = "DELETE FROM secretaria WHERE  nombre = '$sel_secretaria'";
		mysqli_query($mysqli,$sql);
		header("location:secretarias_direcciones.php?eliminar_sec");
	}

	if(isset($_POST['boton_eli_direccion'])){
		$sel_direccion = $_POST['sel_direccion'];
		$sql = "DELETE FROM direccion WHERE  nombre = '$sel_direccion'";
		mysqli_query($mysqli,$sql);
		header("location:secretarias_direcciones.php?eliminar_dir");
	}
	
?>