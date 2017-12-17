<?php

	session_start();

	$_SESSION['nombre_dir'] = $_POST['act_valor'];
	$nombre_dir = $_POST['act_valor'];
	echo $_POST['act_valor'];

	// Conexion con la base de datos:
    $mysqli = new mysqli('localhost','root','root','modernizacion');
    mysqli_query($mysqli,"SET NAMES 'utf8'");

    $sql = "SELECT * FROM indicadores WHERE Direccion='$nombre_dir'";
    $inter = $mysqli -> query($sql);
    $proyecto = $inter -> fetch_assoc();

    $_SESSION['primer_proyecto'] = $proyecto;

	header("location:estadisticas_indicadores.php"); 

?>