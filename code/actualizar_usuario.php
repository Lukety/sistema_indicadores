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


</head>

<body>

<?php

	session_start();

	if(empty($_SESSION['usuario'])){
			header("location:login.php");
		}

	$id_actualizar = $_SESSION['usr_act'];

	// Nombre:
	$nom = $_SESSION['nombre'];

	// Apellido
	$apellido = $_SESSION['apellido'];

	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");

	$sql = "SELECT * FROM login WHERE id=$id_actualizar";
	$res = $mysqli -> query($sql);
	$info = $res -> fetch_assoc();

?>

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
							<li><a href="secretarias_direcciones.php"> Secretarias y Direcciones </a></li>
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
			<br>
			<br>

			<div class="col-md-2"> </div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">

						<center><h3> Datos personales </h3></center>

					</div>

					<div class="panel-body">
						<ul>
							<li> <h4> <b> Apellido: </b> <?php echo $info['apellido'] ?> </h4> </li>
 							<li> <h4> <b> Nombre: </b> <?php echo $info['nombre'] ?> </h4> </li>
							<li> <h4> <b> DNI: </b> <?php echo $info['dni'] ?> </h4> </li>
						</ul>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">

						<center><h3> Datos de sistema </h3></center>

					</div>

					<div class="panel-body">
						<ul>
							<li> <h4> <b> Usuario: </b> <?php echo $info['usuario'] ?> </h4> </li>
 							<li> <h4> <b> Contraseña: </b> <?php echo $info['pass'] ?> </h4> </li>
							<li> <h4> <b> Admin: </b> 
						 
							<?php
									if($info['privilegio'] == 1){
								?> 

									<img src="img/icono_tilde.png" align="center">
								
								<?php
									}else{
								?>
							
									<img src="img/icono_cruz.png" align="center">
								
								<?php
									}
								?>

							</h4> </li>
						</ul>
					</div>
				</div>	

			</div>

			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">

						<center><h3> Secretaría/Dirección </h3></center>

					</div>

					<div class="panel-body">
						<ul>
							<li> <h4> <b> Secretaría: </b> <?php echo $info['secretaria'] ?> </h4> </li>
 							<li> <h4> <b> Dirección: </b> <?php echo $info['direccion'] ?> </h4> </li>
							<li> <h4> <b> sec o dir: </b> 

							<?php 

							if($info['sec_dir']==0){
								echo "Secretaría";	
							}else{
								echo "Dirección";
							}

							?> </h4> </li>
	
						</ul>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">

						<center><h3> Actualización </h3></center>

					</div>

					<div class="panel-body">
					
					<h5><b> Dato a actualizar: </b></h5>

					<form action="actualizar_info_usuario.php" method="post">

					<select name="select_actualizacion" class="form-control">
    					<option value ="apellido"> Apellido </option>
    					<option value ="nombre"> Nombre </option>
    					<option value ="dni"> DNI </option>
    					<option value ="secretaria"> Secretaria </option>
    					<option value ="direccion"> Direccion </option>
    					<option value ="sec_dir"> Sec o Dir </option>
    					<option value ="usuario"> Usuario </option>
    					<option value ="pass"> Contraseña </option>
    					<option value ="privilegio"> Admin </option>
    				</select>	

    				<br>

    				<h5><b> Nuevo valor: </b></h5>

    				<input type="text" class="form-control" name="texto_actualizar" required>
					
    				<br>

    				<center> <input type="submit" class="btn btn-default" value="Actualizar dato" name="actualizar_dato"> </center>

    				</form>

					</div>
				</div>
			</div>
		</div>
	</div>




</body>
</html>