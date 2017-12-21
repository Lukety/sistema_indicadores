<!DOCTYPE html>
<html>

<?php

	// Control de sesiones:
	session_start();

	if(empty($_SESSION['usuario'])){
		header("location:login.php");
	}

	$usuario = $_SESSION['usuario'];

	// Nombre:
	$nom = $_SESSION['nombre'];

	// Apellido
	$apellido = $_SESSION['apellido'];

	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");

	$sql = "SELECT * FROM unidad WHERE 1 ORDER BY nombre";
	$res = $mysqli -> query($sql);
	$res_2 = $mysqli -> query($sql);

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
							Administrador <b class="caret"></b>
						</a>	
						<ul class="dropdown-menu">
							<li><a href="secretarias_direcciones.php"> Secretarías y Direcciones </a></li>
							<li><a href="usuarios.php"> Usuarios </a></li>
							<li><a href="otras_configuraciones.php"> Otras configuraciones </a></li>
							<li><a href="cerrar.php"><b> Cerrar Sesión </b></a></li>
						</ul>
						</li>
						<li><a href="estadisticas.php"> Estadisticas </a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a> <b> En linea como: </b> <?php echo $apellido ?> <?php echo $nom ?> &nbsp &nbsp &nbsp &nbsp </a></li>
					</ul>		
				</div>	
			</nav>
		</div>
		</header>

		<div class="container">
		<div class="row">
		
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<center>
					<br>
					<img class="img-responsive" src="img/icono_otras_configuraciones.png">
				</center>
			</div>
			<div class="col-md-2"></div>
		
		<div class="col-md-4"></div>
		<div class="col-md-4">
		
		<br>

		<?php if(isset($_GET['cargar'])) { ?>
			
			<br>
			<div class="alert alert-warning alert-dismissable">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			La unidad fue <b><u>cargada</u></b> correctamente
			</div>

		<?php } ?>

		<?php if(isset($_GET['error'])) { ?>
			
			<br>
			<div class="alert alert-danger alert-dismissable">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			<b>Error:</b> La unidad ya fue <b><u>cargada</u></b>. 
  			</div>

		<?php } ?>




		<?php if(isset($_GET['eliminar'])) { ?>
			
			<br>
			<div class="alert alert-warning alert-dismissable">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
  			La unidad fue <b><u>eliminada</u></b> correctamente
			</div>

		<?php } ?>


		<div class="panel panel-default">
		<div class="panel-heading">

		<center> <h3> Unidades </h3> </center>

		</div>

		<br>

			<form action="config_actualizar.php" method="post">

			<div class="container">
				<div class="col-md-3">

			<b> Nueva unidad: </b> <br> <br>

			<input type="text" name="nueva_unidad" placeholder="Unidad" class="form-control"> <br>
			<input type="submit" name="boton_unidad" value="Agregar" class="btn btn-default">

			<br>
			<hr>	
			
			<b> Eliminar Unidad: </b>

			<br><br>

			<select name="sel_unidad" class="form-control" ">
			
				<?php 
					while($comp = $res -> fetch_assoc()){
				?>

				<option value="<?php echo $comp['nombre'] ?>" > <?php echo $comp['nombre'] ?> </option>
				
				<?php
					}
				?>

			</select>

			<br>

			<input type="submit" name="boton_eli_unidad" value="Eliminar" class="btn btn-default"> <br>

				</div>
			</div>
		
			<hr>

			<ul>
				<b> Listado de unidades: </b>

				<?php 
					while($comp_2 = $res_2 -> fetch_assoc()){
				?>
						 
				<li>	
					<h4>
						<?php  
							echo $comp_2['nombre'];
						?>
					</h4>
				</li>
						
				<?php 
					} 
				?>

			</ul>	

		</form>
		
		</div>

		<br>
		<br>
		<br>

		</div>
		</div>

</body>
</html>