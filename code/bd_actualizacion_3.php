<?php

	session_start();

	$_SESSION['nombre_sec'] = $_POST['Actualizar'];
	echo $_POST['Actualizar'];

	header("location:estadisticas_direccion.php"); 

?>