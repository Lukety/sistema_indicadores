
<?php
	
	session_start();

	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");

	$id = $_SESSION['usr_act'];
	$valor = $_POST['texto_actualizar'];
	$opcion = $_POST['select_actualizacion'];

	if(isset($_POST['actualizar_dato'])){

		// Accion SQL:
		mysqli_query($mysqli,"UPDATE `login` SET `$opcion` = '$valor' WHERE `ID` = '$id'");
	
		// Redireccion a probando.php:
		header("location: actualizar_usuario.php");

	}

?>