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
		

		// Control de sesiones:
		session_start();

		// Nombre de usuario:
		$usuario = $_SESSION['usuario'];

		// Identificador de usuario:
		$id_usuario = $_SESSION['id_usuario'];

		// Es administrador o usuario comun?:
		$admin = $_SESSION['privilegio'];

		// Direccion en la que trabaja:
		$dir = $_SESSION['direccion'];

		// Secretaria en la que trabaja:
		$sec = $_SESSION['secretaria'];
		
		// Trabaja en una secretaria o direccion?:
		// 0 = Secretaria
		// 1 = Direccion
		$sec_dir = $_SESSION['sec_dir'];

		// si no hay sesion abierta se re-direcciona al login:
		if(empty($usuario)){
			header("location:login.php");
		}

		echo $usuario;
		echo $id_usuario;
		echo $admin;
		echo $dir;
		echo $sec;
		echo $sec_dir;

		// Conexion con la base de datos:
		$mysqli = new mysqli('localhost','root','root','modernizacion');
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		
		// --------------- Inicializacion de variables ------------
		// $where
		// $nombre
		// $Sele_secretaria

		$where="";
		
		if(empty($_POST['xnombre'])){
			$nombre = "";	
		}
		else{	
			$nombre = $_POST ['xnombre'];	
		}
		
		if(empty($_POST['xsecretaria'])){
			$sele_secretaria = "";	
		}
		else{	
			$sele_secretaria = $_POST ['xsecretaria'];	
		}

		if(empty($_POST['xdireccion'])){
			$sele_direccion = "";	
		}
		else{	
			$sele_direccion = $_POST ['xdireccion'];	
		}
		
		

		// ---------------- Boton buscar ------------------------

		if (isset($_POST['buscar'])){

			if (empty($_POST['xsecretaria']) and empty($_POST['xdireccion']) ){
				$where="WHERE Nombre_proyecto LIKE '".$nombre."%'";
			}

			else if (empty($_POST['xnombre']) and empty($_POST['xdireccion']))
			{
				$where="WHERE Secretaria='".$sele_secretaria."'";
			}

			else if (empty($_POST['xnombre']) and empty($_POST['xsecretaria']))
			{
				$where="WHERE Direccion='".$sele_direccion."'";
			}

			else
			{
				$where="WHERE Secretaria LIKE '".$nombre."%' AND Secretaria='".$sele_secretaria."' AND Direccion='".$sele_direccion."'";
			}
		}


		// Funciones SQL:		

		$sql_completo = "SELECT DISTINCT Secretaria FROM indicadores ORDER BY Secretaria";
		$completo_secretaria = $mysqli -> query($sql_completo);

		$sql_completo_2 = "SELECT DISTINCT Direccion FROM indicadores ORDER BY Direccion";
		$completo_direccion = $mysqli -> query($sql_completo_2);


		$sql = "SELECT * FROM indicadores $where AND ID='2' ";
		$result = $mysqli -> query($sql);
		$resSecretaria = $mysqli -> query($sql);
		$resDireccion = $mysqli -> query($sql);

		// Mensaje de grilla vacia:

		$mensaje = "";
		if(mysqli_num_rows($resSecretaria)==0){
			$mensaje = "<h1> No se detectaron resultados coincidentes </h1>";
		}

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
				<a class="navbar-brand" href="indicadores_usuario.php"> Modernizacion </a>
				</div>

				<div class ="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="indicadores_usuario.php"> Inicio </a></li>
						<li><a href="#"> Cargar </a></li>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Usuario <b class="caret"></b>
						</a>	
						<ul class="dropdown-menu">
							<li><a href="#"> Información </a></li>
							<li><a href="cerrar.php"><b> Cerrar Sesión </b></a></li>
						</ul>
						</li>
						<li><a href="estadisticas.php"> Estadisticas </a></li>
					</ul>
				</div>	
			</nav>
		</div>
		</header>

		<br>

		<div class ="container">
		<div class="row">

		<div class="col-md-0"></div>
		<div class="col-md-12">
		<div class="panel panel-default">
		
		<div class="panel-heading">
			
			<h4> <?php
				$cantidad = mysqli_num_rows($resSecretaria);
				echo "Cantidad de indicadores: $cantidad";
			?>
			</h4>

		</div>

		<div class="panel-body">

			<form method="post">

				<?php

				if($sec_dir == 0){

				?>

				<select name = "xdireccion">
					<option value=""> Dirección </option>
					<?php	
						while($direccion = $completo_direccion -> fetch_assoc()){
							echo '<option value="'.$direccion['Direccion'].'">'.$direccion['Direccion'].'</option>';
						}
					?>	
				</select>

				&nbsp &nbsp

				<?php

					}
				
				?>

				<input type="text" placeholder="Nombre de proyecto" name="xnombre">

				&nbsp &nbsp

				<button name="buscar" type="submit"  class="btn btn-default">Buscar</button>

				&nbsp &nbsp

				<button name="eliminar" type="submit"  class="btn btn-default">Eliminar Filtro</button>

			</form>

		</div>
		</div>
		</div>
		</div>
		
		<div class="row">
		<div class="col-md-0"></div>
		<div class="col-md-12">

			<div class="table-responsive">
			<table class="table table-bordered">
					<tr>
						<th width="100" nowrap style="text-align:center" class="bg-success"> Identidicador </th>
						<th width="200" nowrap style="text-align:center" class="bg-success"> Nombre de proyecto </th>
						<th width="200" nowrap style="text-align:center" class="bg-success"> Secretaria </th>
						<th width="200" nowrap style="text-align:center" class="bg-success"> Dirección </th>
						<th width="200" nowrap style="text-align:center" class="bg-success"> Responsable </th>
						<th width="200" nowrap style="text-align:center" class="bg-success"> Eje de gestión </th> 
						<th nowrap style="text-align:center" class="bg-success"> Prioridad </th>
						<th class="bg-success"> RIL </th>
						<th width="200" nowrap style="text-align:center"; class="bg-success"> Indicador </th>
						<th width="200" nowrap style="text-align:center"; class="bg-success"> Unidad </th>
						<th width="150" nowrap style="text-align:center"; class=" bg-warning"> Enero </th>
						<th width="150" nowrap style="text-align:center"; class=" bg-warning"> Febrero</th>
						<th width="150" nowrap style="text-align:center"; class=" bg-warning"> Marzo </th>
						<th width="150" nowrap style="text-align:center"; class=" bg-warning"> Abril </th>
						<th width="150" nowrap style="text-align:center"; class=" bg-warning"> Mayo </th>
						<th width="150" nowrap style="text-align:center"; class=" bg-warning"> Junio </th>
						<th width="150" nowrap style="text-align:center"; class=" bg-warning"> Julio </th>
						<th width="150" nowrap style="text-align:center"; class=" bg-warning"> Agosto </th>
						<th width="150" nowrap style="text-align:center"; class=" bg-warning"> Septiembre </th>
						<th width="150" nowrap style="text-align:center"; class=" bg-warning"> Octubre </th>
						<th width="150" nowrap style="text-align:center"; class=" bg-warning"> Noviembre </th>
						<th width="150" nowrap style="text-align:center"; class=" bg-warning"> Diciembre </th>
					</tr>

					<form action="bd_actualizacion.php" method="post" >

					<?php
						while($row = $result -> fetch_assoc()){
					?>

					<tr style="height:70px">
						<td class="centro"> <input type="submit" class="btn btn-default" name="Actualizar" value = "<?php echo $row["ID"]?>">  </td>
						<td class="centro" style="text-align:center"> <?php echo $row["Nombre_proyecto"]; ?> </td>
						<td class="centro"> <?php echo $row["Secretaria"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Direccion"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Responsable"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Eje_gestion"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Prioridad"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["RIL"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Indicador"]; ?> </td>
						<td style="text-align:center";> <?php echo $row["Unidad_medida"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Ene_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Feb_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Mar_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Abr_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["May_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Jun_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Jul_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Ago_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Sep_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Oct_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Nov_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $row["Dic_2017"]; ?> </td>
					</tr>
						
						<?php 
							} 
						?>
		
					</form>
			</table>
		</div>

	</div>

	<?php
		echo $mensaje;
	?>

	</div>

	<br>
	<br>
	<br>

	</div>

</body>
</html>