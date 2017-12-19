<?php

// Se inicia sesion:

session_start();


if(isset($_POST['boton_actualizar'])){

	$_SESSION['usr_act'] = $_POST['boton_actualizar'];
	header("location:actualizar_usuario.php");
}

if(isset($_POST['boton_eliminar'])){

	$id_eliminar = $_POST['boton_eliminar'];

	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	mysqli_query($mysqli,"DELETE FROM `login` WHERE `ID` = '$id_eliminar'");
	
	header("location:usuarios.php?eliminar=si");

}

// Conexion con la base de datos:
//$mysqli = new mysqli('127.0.0.1','root','','modernizacion');
//$ID = $_POST['Actualizar'];
//mysqli_query($mysqli,"UPDATE `estado` SET `id_proyecto` = '$ID' WHERE `ID` = '1' ");

?>