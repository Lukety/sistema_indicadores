<?php

session_start();

$id_proyecto = $_POST['xproyecto'];

if($_POST['xproyecto']=="vacio"){
	header("location:estadisticas_indicadores.php");
}

// Conexion con la base de datos:
$mysqli = new mysqli('localhost','root','root','modernizacion');
mysqli_query($mysqli,"SET NAMES 'utf8'");

$sql = "SELECT * FROM indicadores WHERE ID=$id_proyecto";
$inter = $mysqli -> query($sql);
$proyecto = $inter -> fetch_assoc();

$_SESSION['primer_proyecto'] = $proyecto;

header("location:estadisticas_indicadores.php");

?>