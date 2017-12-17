<?php

$mysqli = new mysqli('localhost','root','root','modernizacion');
mysqli_query($mysqli,"SET NAMES 'utf8'");

if(isset($_POST['Usuario'])){
	$usuario = $_POST['Usuario'];
}

if(isset($_POST['Nombre'])){
	$nombre = $_POST['Nombre'];
}

if(isset($_POST['Apellido'])){
	$apellido = $_POST['Apellido'];
}

if(isset($_POST['DNI'])){
	$dni = $_POST['DNI'];
}

if(isset($_POST['Secretaria'])){
	$secretaria = $_POST['Secretaria'];
}

if(isset($_POST['Direccion'])){
	$direccion = $_POST['Direccion'];
}

if(isset($_POST['Administrador'])){
	$administrador = $_POST['Administrador'];
}

if(isset($_POST['Secretaria_Direccion'])){
	$secretaria_direccion = $_POST['Secretaria_Direccion'];
}

if(isset($_POST['Contrasena'])){
	$contrasena = $_POST['Contrasena'];
}

$sql = "INSERT INTO `login`(`privilegio`, `usuario`, `pass`, `apellido`, `nombre`, `dni`, `secretaria`, `direccion`, `sec_dir`) VALUES ($administrador,'$usuario','$contrasena', '$apellido','$nombre','$dni','$secretaria','$direccion',$secretaria_direccion)";

mysqli_query($mysqli,$sql);
header("location: usuarios.php?cargar=si");

?>