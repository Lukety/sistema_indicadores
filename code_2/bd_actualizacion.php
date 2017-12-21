<?php

// Se inicia sesion:

session_start();
$_SESSION['id_proyecto'] = $_POST['Actualizar'];

// Conexion con la base de datos:
//$mysqli = new mysqli('127.0.0.1','root','','modernizacion');
//$ID = $_POST['Actualizar'];
//mysqli_query($mysqli,"UPDATE `estado` SET `id_proyecto` = '$ID' WHERE `ID` = '1' ");

header("location:probando.php");

?>