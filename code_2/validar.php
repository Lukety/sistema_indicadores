<?php

// recepcion por metodo POST de usuario y contraseña ingresada:
$usuario = $_POST['Usuario'];
$pass = $_POST['Contrasena'];

// Conexion con la base de datos:
$mysqli = new mysqli('localhost','root','root','modernizacion');
mysqli_query($mysqli,"SET NAMES 'utf8'");

// se verifica si usuario o contraseña estan vacios:
if(empty($usuario) || empty($pass)){
	header("location: login.php");
}

/* 
Se busca en la base de datos la informacion del usuario ingresado y
se almacena en la variable $comp.
*/

$sql = "SELECT * FROM login WHERE usuario='$usuario'";
$res = $mysqli -> query($sql);
$comp = $res -> fetch_assoc();

if($comp){
	if($comp['pass'] == $pass){
		session_start();
		$_SESSION['usuario'] = $usuario;
		$_SESSION['id_usuario'] = $comp['ID'];
		$_SESSION['privilegio'] = $comp['privilegio'];
		$_SESSION['sec_dir'] = $comp['sec_dir'];
		$_SESSION['secretaria'] = $comp['secretaria'];
		$_SESSION['direccion'] = $comp['direccion'];
		$_SESSION['nombre'] = $comp['nombre'];
		$_SESSION['apellido'] = $comp['apellido'];
		$_SESSION['dni'] = $comp['dni'];
		$_SESSION['pass'] = $comp['pass'];
		
		header("location: indicadores.php");
	}
	else{
		header("location: login.php?errorpass=si");
		exit();
	}
}else{
	header("location: login.php?errorusr=si");
	exit();
}


?>