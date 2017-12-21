<?php  

		// Control de sesiones:
		session_start();

		if(empty($_SESSION['usuario'])){
		header("location:login.php");
		}

		// Conexion con la base de datos:
		$mysqli = new mysqli('localhost','root','root','modernizacion');
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		
		$admin = $_SESSION['privilegio'];
		$usuario = $_SESSION['usuario'];
		$nom = $_SESSION['nombre'];
		$apellido = $_SESSION['apellido'];
		$dni = $_SESSION['dni'];
		$sec_dir = $_SESSION['sec_dir'];
		$sec = $_SESSION['secretaria'];
		$dir = $_SESSION['direccion'];
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title> Indicadores Municipalidad </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="estilo.css">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/series-label.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>

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
						
						<?php
							if($admin == 1){
						?>

						<li><a href="carga.php"> Cargar </a></li>

						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Administrador <b class="caret"></b>
						</a>	
						<ul class="dropdown-menu">
							<li><a href="secretarias_direcciones.php"> Secretarias y Direcciones </a></li>
							<li><a href="usuarios.php"> Usuarios </a></li>
							<li><a href="otras_configuraciones.php"> Otras configuraciones </a></li>
							<li><a href="cerrar.php"><b> Cerrar Sesión </b></a></li>
						</ul>
						</li>

						<?php
							}
						?>
				
						<?php
							if($admin == 0){
						?>

						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Usuario <b class="caret"></b>
						</a>	
						<ul class="dropdown-menu">
							<li><a href="#"> Información </a></li>
							<li><a href="cerrar.php"><b> Cerrar Sesión </b></a></li>
						</ul>
						</li>

						<?php
							}
						?>
						
						<?php
							if($admin == 1){
						?>


						<li><a href="estadisticas.php"> Estadisticas </a></li>
			
						<?php
							}
						?>

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
		<div class="col-md-3"></div>

		<div class="col-md-5">
				<br>
				<br>

				<?php if(isset($_GET['error'])) { ?>
			
					<br>
					<div class="alert alert-danger alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					 Hay un <b><u> error</u></b> en los datos ingresados
					</div>

				<?php } ?>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3> Datos de usuario </h3>
				</div>

				<div class="panel-body">
					<ul>
						<li> <h4> <b>Usuario:</b> <?php echo $usuario ?> </h4> </li>
						<li> <h4> <b>Apellido:</b> <?php echo $apellido ?> </h4> </li>
						<li> <h4> <b>Nombre:</b> <?php echo $nom ?> </h4> </li>
						<li> <h4> <b>DNI:</b> <?php echo $dni ?> </h4> </li>
						<li> <h4> <b>Secretaría:</b> <?php echo $sec ?> </h4> </li>
					
						<?php if($sec_dir == 1){ ?> 	
					
							<li> <h4> <b>Dirección:</b> <?php echo $dir ?> </h4> </li>
					
						<?php } ?>

						<hr>

						<form action="pass_cambiar.php" method="post">

						<h5> Contraseña actual: </h5>
						<input type="text" name="pass_actual">
						<h5> Nueva contraseña: </h5>
						<input type="text" name="pass_nuevo">
						<h5> Repetir nueva contraseña: </h5>
						<input type="text" name="pass_nuevo_2">

						<br>
						<br>

						<input type="submit" name="cambiar" value="cambiar" class="btn btn-default">

						</form>

					</ul>
				</div>



			</div>
		</div>

		<div class="col-md-4"></div>
		</div>
	</div>
</div>

</body>

</html>