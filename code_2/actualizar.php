<?php
	
	// Se inicia sesion:
	session_start();


	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");
		
	if (isset($_POST['cambiar'])) {
		
		// Se recibe el ID del proyecto a actualizar:
		//$sql_1 = "SELECT * FROM estado WHERE ID = '1'";
		//$res = $mysqli -> query($sql_1);
		//$identificador = $res -> fetch_assoc();
		//$ID = $identificador['id_proyecto'];

		$ID = $_SESSION['id_proyecto'];

		// Se reciben datos de actualizacion:
		$opcion = $_POST['selector'];
		$pre_valor = $_POST['texto_actualizando'];
		$pre2_valor = str_replace(",", ".", $pre_valor);
    	$pre3_valor = str_replace("$", "", $pre2_valor);
    	$valor = str_replace("%", "", $pre3_valor);

		// Accion SQL:
		mysqli_query($mysqli,"UPDATE `indicadores` SET `$opcion` = '$valor' WHERE `ID` = '$ID'");
	
		// Redireccion a probando.php:
		header("location: probando.php?actualizado=si");

	}

	if (isset($_POST['boton_eliminar'])) {

		$clave = $_POST['boton_eliminar'];
		mysqli_query($mysqli,"DELETE FROM `indicadores` WHERE `ID` = '$clave'");

		// Redireccion a probando.php:
		header("location: indicadores.php?eliminar=si");
	
	}

	

?>