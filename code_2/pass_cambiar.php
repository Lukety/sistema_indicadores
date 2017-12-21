<?php

	session_start();

	$pass_actual = $_POST['pass_actual'];
	$pass_nuevo = $_POST['pass_nuevo'];
	$pass_nuevo_2 = $_POST['pass_nuevo_2'];

	$id_usuario =  $_SESSION['id_usuario'];
	$pass =  $_SESSION['pass'];

	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");

	if($pass_actual == $pass && $pass_nuevo == $pass_nuevo_2 ){

		mysqli_query($mysqli,"UPDATE `login` SET `pass` = '$pass_nuevo' WHERE `ID` = '$id_usuario'");
		session_destroy();
		header("location:login.php");

	} else {
		
		header("location:info_usuario.php?error=si");

	}

?>