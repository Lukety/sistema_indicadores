<!DOCTYPE html>
<html>

<?php

	// Control de sesiones:
	session_start();

	if(empty($_SESSION['usuario'])){
		header("location:login.php");
	}

	$usuario = $_SESSION['usuario'];

	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	$sql = "SELECT * FROM login WHERE usuario='$usuario'";
	$res = $mysqli -> query($sql);
	$comp = $res -> fetch_assoc();

?>

<head>
	<meta charset="utf-8"> 
	<title> Indicadores Municipalidad </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="estilo.css">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</head>
<body>

		<header>
			<div class="container">	
			<img src="img/icono_muni.png" align="left"> 
			<br>
			<font size="5" face="arial"> Control de indicadores </font>
			<br>
			<font size="3" face="arial"><b> Municipalidad de San Luis </b></font>

			<br> <br>

			<nav class = "navbar navbar-default" role="navigation" >

				<div class="navbar-header">	
					<button type="button" class="navbar-toggle" data-toggle="collapse" 
						data-target = ".navbar-ex1-collapse">
						<span class="sr-only"> Desplegar navegación </span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				<a class="navbar-brand" href="indicadores.php"> Modernizacion </a>
				</div>

				<div class ="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="indicadores.php"> Inicio </a></li>
						<li><a href="carga.php"> Cargar </a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							Usuario <b class="caret"></b>
						</a>	
						<ul class="dropdown-menu">
							<li><a href="administrador.php"> Administrador </a></li>
							<li><a href="datos.php" class="active"> Datos </a></li>
							<li><a href="cerrar.php"><b> Cerrar Sesion </b></a></li>
						</ul>
						</li>
						<li><a href="estadisticas.php"> Estadisticas </a></li>
					</ul>
				</div>	
			</nav>
		</div>
		</header>

		<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			
			<div class="col-md-8">
				<br>
				<h1> <?php echo $comp['nombre']; ?> </h1>
				<hr>
				<ul>
					<li><h4> <b>Usuario:</b> <?php echo $usuario ?> </h4></li>
					<li><h4> <b>DNI:</b> <?php echo $comp['dni'] ?> </h4></li>
					<li><h4> <b>Cargo:</b> <?php echo $comp['cargo'] ?> </h4></li>
					<li><h4> <b>Dependencia:</b> <?php echo $comp['dependencia'] ?> </h4></li>
				</ul>

			</div>
			

			<div class="col-md-2"></div>
		
</body>
</html>