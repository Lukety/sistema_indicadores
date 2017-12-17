<!DOCTYPE html>
<html>

<?php

	// Control de sesiones:
	session_start();

	if(empty($_SESSION['usuario'])){
		header("location:login.php");
	}
	
	// Nombre:
	$nom = $_SESSION['nombre'];

	// Apellido
	$apellido = $_SESSION['apellido'];

	// Nombre:
	$nom = $_SESSION['nombre'];

	// Apellido
	$apellido = $_SESSION['apellido'];

	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	//$acentos = $mysqli->query("SET NAMES 'utf8'");

	$sql = "SELECT * FROM secretaria WHERE 1 ORDER BY nombre";
	$res = $mysqli -> query($sql);

	$sql_2 = "SELECT * FROM direccion WHERE 1 ORDER BY nombre";
	$res_2 = $mysqli -> query($sql_2);

	$sql_3 = "SELECT * FROM unidad WHERE 1 ORDER BY nombre";
	$res_3 = $mysqli -> query($sql_3);


?>

<head>
	<meta charset="utf-8"> 
	<title> Indicadores Municipalidad </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

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
						<li class="active"><a href="carga.php"> Cargar </a></li>
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

		<br>
	
			<div class = "row">
			
			<center> <img class="img-responsive" src="img/icono_carga.png" align="center"> </center>

			<br>

			<div class="col-xs-2 col-md-3"></div>
			<div class="col-xs-4 col-md-3">
	
			<form action="insertar.php" method="post" name="form">
				<form class="form-inline">

				<div class="form-group">
    				<label for="Secretaria"> Secretaria: </label>
    				
    				    <select name="Secretaria" class="form-control">
    				
    				    <?php 
							while($comp = $res -> fetch_assoc()){
						?>

    					<option value ="<?php echo $comp['nombre'] ?>"> <?php echo $comp['nombre'] ?> </option>
    		
    					<?php
    						}
    					?>

    				</select>
  				</div>


  				<div class="form-group">
    				<label for="Responsable"> Responsable: </label>
    				<input type="text" class="form-control" id="Responsable" name="Responsable">
  				</div>		

  				<div class="form-group">
    				<label for="Eje_gestion"> Eje de gestión: </label>
    				<input type="text" class="form-control" id="Eje_gestion" name="Eje_gestion">
  				</div>

  				<div class="form-group">
    				<label for="RIL"> RIL: </label>
    				    <select name="RIL" class="form-control">
    					<option value ="A"> A </option>
    					<option value ="B"> B </option>
    					<option value ="C"> C </option>
    				</select>
  				</div>	

  				</div>

				<div class="col-xs-4 col-md-3">

  				<div class="form-group">
  					
    					<label for="Direccion"> Dirección: </label>
    				    <select name="Direccion" class="form-control">
    					
    				    <?php 
							while($comp_2 = $res_2 -> fetch_assoc()){
						?>

    					<option value ="<?php echo $comp_2['nombre'] ?>"> <?php echo $comp_2['nombre'] ?> </option>
    		
    					<?php
    						}
    					?>

    				</select>
  				</div>
  			
  				<div class="form-group">
    				<label for="Nombre_proyecto"> Nombre del proyecto: </label>
    				<input type="text" class="form-control" id="Nombre_proyecto" name="Nombre_proyecto">
  				</div>

  				<div class="form-group">
    				<label for="Indicador"> Indicador: </label>
    				<input type="text" class="form-control" id="Indicador" name="Indicador">
  				</div>	

  				<div class="form-group">
    				<label for="Prioridad"> Prioridad: </label>
    				    <select name="Prioridad" class="form-control">
    					<option value ="NO"> NO </option>
    					<option value ="SI"> SI </option>
    				</select>
  				</div>	

  				</div>
  			</div>
  				<div class="col-xs-2 col-md-3"></div>

  			</div>
  			</div>
			
			<br>

			<div class = row>
				<div class="col-xs-2 col-md-1"></div>
				<div class="col-xs-8 col-md-10">
			
			<div class="table-responsive">
			
			<table class="table table-bordered">
					<tr class="bg-warning">
						<th style="text-align:center" class="bg-success"> Unidad </th> 
						<th style="text-align:center;"> Enero 2017 </th>
						<th style="text-align:center;"> Febrero 2017 </th>
						<th style="text-align:center;"> Marzo 2017 </th>
						<th style="text-align:center;"> Abril 2017 </th>
						<th style="text-align:center;"> Mayo 2017 </th>
						<th style="text-align:center;"> Junio 2017 </th>
						<th style="text-align:center;"> Julio 2017 </th>
						<th style="text-align:center;"> Agosto 2017 </th>
						<th style="text-align:center;"> Septiembre 2017 </th>
						<th style="text-align:center;"> Octubre 2017 </th>
						<th style="text-align:center;"> Noviembre 2017 </th>
						<th style="text-align:center;"> Diciembre 2017 </th>
					</tr>

					<tr>
						<td>
							<select name="Unidad_medida" style="width:120px" class="form-control">

								<?php 
									while($comp_3 = $res_3 -> fetch_assoc()){
								?>

    							<option value ="<?php echo $comp_3['nombre'] ?>"> <?php echo $comp_3['nombre'] ?></option>
								
								<?php
									}
								?>


							</select>
						</td>

						<td> <input type="text" name="Ene_2017" style="width:120px" class="form-control"> </td>
						<td> <input type="text" name="Feb_2017" style="width:120px" class="form-control"> </td>
						<td> <input type="text" name="Mar_2017" style="width:120px" class="form-control"> </td>
						<td> <input type="text" name="Abr_2017" style="width:120px" class="form-control"> </td>
						<td> <input type="text" name="May_2017" style="width:120px" class="form-control"> </td>
						<td> <input type="text" name="Jun_2017" style="width:120px" class="form-control"> </td>
						<td> <input type="text" name="Jul_2017" style="width:120px" class="form-control"> </td>
						<td> <input type="text" name="Ago_2017" style="width:120px" class="form-control"> </td>
						<td> <input type="text" name="Sep_2017" style="width:120px" class="form-control"> </td>
						<td> <input type="text" name="Oct_2017" style="width:120px" class="form-control"> </td>
						<td> <input type="text" name="Nov_2017" style="width:120px" class="form-control"> </td>
						<td> <input type="text" name="Dic_2017" style="width:120px" class="form-control"> </td>
					</tr>

			</table>

			</div>	

			<br>

			<center>
				<input type="submit" class="btn btn-default" value="Cargar datos">
			</center>
			
			<br>

			</div>
			<div class="col-xs-2 col-md-1"> </div>
			</div>
			</form>
			</form>
	</body>
</html>