<!DOCTYPE html>
<html>

<?php

	// Control de sesiones:
	session_start();

	$usuario = $_SESSION['usuario'];

	// Nombre:
	$nom = $_SESSION['nombre'];

	// Apellido
	$apellido = $_SESSION['apellido'];

	

	if(empty($usuario)){
		header("location:login.php");
	}
	
	// Conexion con la base de datos:
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");
	
	$sql = "SELECT * FROM secretaria WHERE 1 ORDER BY nombre";
	$res = $mysqli -> query($sql);

	$sql_2 = "SELECT * FROM direccion WHERE 1 ORDER BY nombre";
	$res_2 = $mysqli -> query($sql_2);

	$sql_3 = "SELECT * FROM login ORDER BY apellido";
	$res_3 = $mysqli -> query($sql_3);
	$cantidad = mysqli_num_rows($res_3);

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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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
							<li><a href="secretarias_direcciones.php"> Secretarias y Direcciones </a></li>
							<li><a href="#"> Usuarios </a></li>
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

		<style type="text/css">
	
			#limitar{
				height: 200px;
				width: 1145px;
				overflow: scroll;
			}

		</style>
		
		<br>
	
		<div class="row">
			<center> <img class="img-responsive" src="img/icono_usuarios.png" align="center"> </center>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12">

				<?php if(isset($_GET['cargar'])) { ?>
			
					<br>
					<div class="alert alert-warning alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					El usuario fue <b><u>cargado</u></b> correctamente
					</div>

				<?php } ?>

				<?php if(isset($_GET['vacio'])) { ?>
			
					<br>
					<div class="alert alert-danger alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					<b>Error:</b> Debe rellenar todos los campos del formulario.
					</div>

				<?php } ?>

				<?php if(isset($_GET['eliminar'])) { ?>
			
					<br>
					<div class="alert alert-warning alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					El usuario fue <b><u>eliminado</u></b> correctamente
					</div>

				<?php } ?>

				<?php if(isset($_GET['error'])) { ?>
				
				<div class="alert alert-danger alert-dismissable">
  				<button type="button" class="close" data-dismiss="alert">&times;</button>
  				<b>Error:</b> El usuario <b><u>ya fue cargado</u></b> anteriormente.
				</div>

				<?php } ?>





					<div class="panel panel-default">
						<div class="panel-heading">
							<h4> 
								<?php
									echo "Cantidad de usuarios: $cantidad";
								?>
							</h4>
						</div>

					<div class="panel-body">
		
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"> Nuevo usuario </button>
						
					 <!-- Modal -->	
					 <div class="modal fade" id="myModal" role="dialog">
					 	<div class="modal-dialog">
					 		<!-- Modal content-->
      						<div class="modal-content">
        						<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal">&times;</button>
          							<h4 class="modal-title"> Nuevo usuarios </h4>
        						</div>

        					   <div class="modal-body">
          						
        					   	<div class="container">
        					   		<div class="row">

        					   		<form action="insertar_usuarios.php" method="post">

         					   		<div class="col-md-3">
    
        					   		<div class="form-group">
										<label for="Usuario"> Usuario: </label>
										<input type="text" id="Usuario" name="Usuario" class="form-control" required>
									</div>
									
									<div class="form-group">
										<label for="Nombre"> Nombre: </label>
										<input type="text" class="form-control" id="Usuario" name="Nombre" required>
									</div>
					
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
    									<label for="Administrador"> Administrador: </label>
    				    				<select name="Administrador" class="form-control">
    										<option value ="0"> NO </option>
    										<option value ="1"> SI </option>
    									</select>
  									</div>	
				
  									<div class="form-group">
										<label for="Contrasena"> Contraseña: </label>
										<input type="text" class="form-control" id="Contrasena" name="Contrasena" required>
									</div>

									</div>

									<div class="col-md-3">

									<div class="form-group">
										<label for="Apellido"> Apellido: </label>
										<input type="text" class="form-control" id="Apellido" name="Apellido" required>
									</div>

									<div class="form-group">
										<label for="DNI"> DNI: </label>
										<input type="text" class="form-control" id="DNI" name="DNI" required>
									</div>

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
    									<label for="Secretaria_Direccion"> Secretaría/Dirección: </label>
    			   						<select name="Secretaria_Direccion" class="form-control">
    										<option value ="0"> Secretaría </option>
    										<option value ="1"> Dirección </option>
    									</select>
  									</div>	

  									<br>

									</div>

									</div>
								</div>

        						</div>	

        						<div class="modal-footer">
        							<input type="submit" class="btn btn-default" value="Cargar datos">
        						</form>
          							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          						</div>
          					</div>
          				</div>
          			</div>



					</div>
				</div>

				<div id="limitar">
					<table class="table-bordered">
						<tr>
							<th width="100" nowrap style="text-align:center"> Actualizar </th>
							<th width="100" nowrap style="text-align:center"> Eliminar </th>
							<th width="100" nowrap style="text-align:center"> Admin </th>
							<th width="200" nowrap style="text-align:center"> Usuario </th> 
							<th width="200" nowrap style="text-align:center"> Apellido </th> 
							<th width="200" nowrap style="text-align:center"> Nombre </th> 
							<th width="200" nowrap style="text-align:center"> DNI </th>
							<th width="200" nowrap style="text-align:center"> Secretaría </th>
							<th width="200" nowrap style="text-align:center"> Dirección </th>
							<th width="200" nowrap style="text-align:center"> Sec o Dir </th>
						</tr>
					
						<form action="bd_actualizacion_2.php" method="post">

						<?php
							while ($row = $res_3 -> fetch_assoc()) {
						?>

						<tr style="height:40px"> 

							<td style="text-align:center">  

								<input type="image" src="img/icono_actualizar.png" name="boton_actualizar" value = "<?php echo $row['ID'] ?>">

							</td>
						
							<td style="text-align:center">  

								<input type="image" src="img/icono_borrar.png" name="boton_eliminar" value = "<?php echo $row['ID'] ?>">

							</td>

							<td style="text-align:center"> 

								<?php
									if($row['privilegio'] == 1){
								?> 

									<img src="img/icono_tilde.png" align="center">
								
								<?php
									}else{
								?>
							
									<img src="img/icono_cruz.png" align="center">
								
								<?php
									}
								?>

							</td>

							<td style="text-align:center"> <?php echo $row['usuario'] ?> </td>
							<td style="text-align:center"> <?php echo $row['apellido'] ?> </td>
							<td style="text-align:center"> <?php echo $row['nombre'] ?> </td>
							<td style="text-align:center"> <?php echo $row['dni'] ?> </td>
							<td style="text-align:center"> <?php echo $row['secretaria'] ?> </td>
							<td style="text-align:center"> <?php echo $row['direccion'] ?> </td>
							<td style="text-align:center"> 

								<?php 

								if($row['sec_dir'] == 0){
									echo "Secretaría";
								}
								else{
									echo "Dirección"; 
								}
							?> 

							</td>
							
						</tr>	

						<?php
							}
						?>

						</form>

					</table>
				</div>
			</div>
		</div>
		<br>
		<br>
	</div>
	</body>
</html>
