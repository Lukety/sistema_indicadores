<?php

	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");

	$sql = "SELECT * FROM secretaria WHERE 1";
	$contenido = $mysqli -> query($sql);
	
	$sql_2 = "SELECT * FROM direccion WHERE 1";
	$contenido_2 = $mysqli -> query($sql_2);


	$repetidos = 0;


	if(isset($_POST['boton_secretaria'])){
		$secretaria = $_POST['nueva_secretaria'];
	
		while($comparando = $contenido -> fetch_assoc()){
		
		if(strtolower($comparando['nombre']) == strtolower($secretaria)){
			$repetidos = 1;
			break;
		}else{
			$repetidos = 0;	
		}

		}		

		if($repetidos == 0){
			$sql = "INSERT INTO `secretaria`(`nombre`) VALUES ('$secretaria')";
			mysqli_query($mysqli,$sql);
			header("location:secretarias_direcciones.php?cargar_sec=si");
		
		}else{
			header("location:secretarias_direcciones.php?error_sec=si");
		}

	
	}
	

	if(isset($_POST['boton_direccion'])){
		$direccion = $_POST['nueva_direccion'];
		
		while($comparando = $contenido_2 -> fetch_assoc()){
		
		if(strtolower($comparando['nombre']) == strtolower($direccion)){
			$repetidos = 1;
			break;
		}else{
			$repetidos = 0;	
		}

		}

		if($repetidos == 0){

			$sql = "INSERT INTO `direccion`(`nombre`) VALUES ('$direccion')";
			mysqli_query($mysqli,$sql);
			header("location:secretarias_direcciones.php?cargar_dir=si");

		}else{
			header("location:secretarias_direcciones.php?error_dir=si");	
		}	

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