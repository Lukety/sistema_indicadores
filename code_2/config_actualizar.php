<?php

	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");

	$sql = "SELECT * FROM unidad WHERE 1";
	$contenido = $mysqli -> query($sql);
	$repetidos = 0;

	if(isset($_POST['boton_unidad'])){
		$unidad = $_POST['nueva_unidad'];
		
		while($comparando = $contenido -> fetch_assoc()){
		
			if(strtolower($comparando['nombre']) == strtolower($unidad)){
				$repetidos = 1;
				break;
			}else{
				$repetidos = 0;	
			}

		}

		if($repetidos == 0){

			$sql = "INSERT INTO `unidad`(`nombre`) VALUES ('$unidad')";
			mysqli_query($mysqli,$sql);
			header("location:otras_configuraciones.php?cargar=si");

		}else{
			header("location:otras_configuraciones.php?error=si");
		}

	
	}

	if(isset($_POST['boton_eli_unidad'])){
		$sel_unidad = $_POST['sel_unidad'];
		$sql = "DELETE FROM unidad WHERE  nombre = '$sel_unidad'";
		mysqli_query($mysqli,$sql);
		header("location:otras_configuraciones.php?eliminar=si");
	}

	

?>
