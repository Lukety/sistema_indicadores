<?php  

		// Control de sesiones:
		session_start();

		if(empty($_SESSION['usuario'])){
		header("location:login.php");
		}

		// Conexion con la base de datos:
		$mysqli = new mysqli('localhost','root','root','modernizacion');
		mysqli_query($mysqli,"SET NAMES 'utf8'");
		
		// Se recibe el ID del proyecto a actualizar:
		//$sql_1 = "SELECT * FROM estado WHERE ID = '1'";
		//$res = $mysqli -> query($sql_1);
		//$identificador = $res -> fetch_assoc();
		//$ID = $identificador['id_proyecto'];

		$ID = $_SESSION['id_proyecto'];
		$admin = $_SESSION['privilegio'];

		$nom = $_SESSION['nombre'];
		$apellido = $_SESSION['apellido'];

		// Se utiliza la sentencia mysql para obtener los resultados:
		$sql_2 = "SELECT * FROM indicadores WHERE ID = $ID";
		$resultados = $mysqli -> query($sql_2);
		$proyecto = $resultados -> fetch_assoc();
	
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

	<script src="Graficas/code/highcharts.js"></script>
	<script src="Graficas/code/modules/series-label.js"></script>
	<script src="Graficas/code/modules/exporting.js"></script>

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
						<li class="active"><a href="indicadores.php"> Inicio </a></li>
						
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
							<li><a href="info_usuario.php"> Información </a></li>
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

<div container>

	<div class = "row">
		<div class="col-md-1"></div>	

		<div class="col-md-5">

			<br>
			<br>

			<?php if(isset($_GET['actualizado'])) { ?>
				
				<div class="alert alert-warning alert-dismissable">
  				<button type="button" class="close" data-dismiss="alert">&times;</button>
  				Los datos se <b><u>actualizaron</u></b> correctamente
				</div>

			<?php } ?>


			<div class="panel panel-default">
	
			<div class="panel-heading">
				<h4> <b> Proyecto: </b> <?php echo $proyecto['Nombre_proyecto'] ?> </h4>
			</div>

			<div class="panel-body">

			<ul>
				<li><h4> <b>Secretaria:</b> <?php echo $proyecto['Secretaria'] ?> </h4></li>
				<li><h4> <b>Dirección:</b> <?php echo $proyecto['Direccion'] ?> </h4></li>
				<li><h4> <b>Responsable:</b> <?php echo $proyecto['Responsable'] ?> </h4></li>
				<li><h4> <b>Eje de gestión:</b> <?php echo $proyecto['Eje_gestion'] ?> </h4></li>
				<li><h4> <b>Prioridad:</b> <?php echo $proyecto['Prioridad'] ?> </h4></li>
				<li><h4> <b>RIL:</b> <?php echo $proyecto['RIL'] ?> </h4></li>
				<li><h4> <b>Indicador:</b> <?php echo $proyecto['Indicador'] ?> </h4></li>
			</ul>
		
			</div>

			<div class="panel-footer">

				<div class="container">
					<div class="col-md-2">

				<form action="actualizar.php" method="post">

			<select name = "selector" class="form-control">
				<option value=""> -- Seleccionar -- </option>
				<option value="Secretaria""> Secretaria </option>
				<option value="Direccion"> Dirección </option>
				<option value="Responsable"> Responsable </option>
				<option value="Eje_gestion"> Eje de gestión </option>
				<option value="Prioridad"> Prioridad </option>
				<option value="RIL"> RIL </option>
				<option value="Indicador"> Indicador </option>
				<option value="Unidad_medida"> Unidad </option>
				<option value="Ene_2017"> Mes: Enero </option>
				<option value="Feb_2017"> Mes: Febrero </option>
				<option value="Mar_2017"> Mes: Marzo </option>
				<option value="Abr_2017"> Mes: Abril </option>
				<option value="May_2017"> Mes: Mayo </option>
				<option value="Jun_2017"> Mes: Junio </option>
				<option value="Jul_2017"> Mes: Julio </option>
				<option value="Ago_2017"> Mes: Agosto </option>
				<option value="Sep_2017"> Mes: Septiembre </option>
				<option value="Oct_2017"> Mes: Octubre </option>
				<option value="Nov_2017"> Mes: Noviembre </option>
				<option value="Dic_2017"> Mes: Diciembre </option>
			</select>	

			</div>

			<div class="col-md-2">

			<input type="text" name="texto_actualizando" class="form-control">

			</div>

			

			<?php
				if($admin == 0){
			?>

				<div class="col-md-2">
					<input type="submit" name="cambiar" class="btn btn-default" value="Actualizar">
				</div>


			<?php
			
				}else{
			
			?>

			<div class="col-md-2">

			<div class="btn-group">
  				<input type="submit" class="btn btn-default" name="cambiar" value="Actualizar">
 				<button type="button" class="btn btn-default dropdown-toggle"
          			data-toggle="dropdown">
    				<span class="caret"></span>
    				<span class="sr-only">Desplegar menú</span>
  				</button>
 
  			<ul class="dropdown-menu" role="menu">
    			<li><a href="eliminar.php">Eliminar Indicador</a></li>  		
  			</ul>
			
			</div>

			</div>

			<?php

				}
			
			?>

			</div>

			</form>

			</div>	

		</div>
		</div>

		<br>
		<br>

		<div class="col-md-5">
		

			<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


		</div>

	</div>

	<div class = "row">
		
		<br>

		<div class="col-md-1"></div>

		<div class="col-md-10">

			<br>

			<div class="table-responsive">
			<table class="table table-bordered">
					<tr class="bg-warning">
						<th width="200" nowrap style="text-align:center"; class="bg-success"> Unidad </th>
						<th width="150" nowrap style="text-align:center"> Enero </th>
						<th width="150" nowrap style="text-align:center"> Febrero</th>
						<th width="150" nowrap style="text-align:center"> Marzo </th>
						<th width="150" nowrap style="text-align:center"> Abril </th>
						<th width="150" nowrap style="text-align:center"> Mayo </th>
						<th width="150" nowrap style="text-align:center"> Junio </th>
						<th width="150" nowrap style="text-align:center"> Julio </th>
						<th width="150" nowrap style="text-align:center"> Agosto </th>
						<th width="150" nowrap style="text-align:center"> Septiembre </th>
						<th width="150" nowrap style="text-align:center"> Octubre </th>
						<th width="150" nowrap style="text-align:center"> Noviembre </th>
						<th width="150" nowrap style="text-align:center"> Diciembre </th>
					</tr>

					<tr style="height:40px">
						<td style="text-align:center";> <?php echo $proyecto["Unidad_medida"]; ?> </td>
						<td style="text-align:center"> <?php echo $proyecto["Ene_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $proyecto["Feb_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $proyecto["Mar_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $proyecto["Abr_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $proyecto["May_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $proyecto["Jun_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $proyecto["Jul_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $proyecto["Ago_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $proyecto["Sep_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $proyecto["Oct_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $proyecto["Nov_2017"]; ?> </td>
						<td style="text-align:center"> <?php echo $proyecto["Dic_2017"]; ?> </td>
					</tr>
			</table>
			</div>
		
		</div>
		<div class="col-md-1"></div>
	</div>

<script>
		
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: '<b> Proyecto: </b> <?php echo $proyecto['Nombre_proyecto'] ?>'
    },
    subtitle: {
        text: '<?php echo $proyecto['Indicador']?>'
    },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    yAxis: {
        title: {
            text: '<?php echo $proyecto['Unidad_medida'] ?>'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: false
            },
            enableMouseTracking: true
        }
    },
    series: [{
        name: '<?php echo $proyecto['Unidad_medida'] ?>',
        data: [<?php echo $proyecto['Ene_2017'] ?>, <?php echo $proyecto['Feb_2017'] ?>, <?php echo $proyecto['Mar_2017'] ?>, <?php echo $proyecto['Abr_2017'] ?>, <?php echo $proyecto['May_2017'] ?>, <?php echo $proyecto['Jun_2017'] ?>, <?php echo $proyecto['Jul_2017'] ?>, <?php echo $proyecto['Ago_2017'] ?>, <?php echo $proyecto['Sep_2017'] ?>, <?php echo $proyecto['Oct_2017'] ?>, <?php echo $proyecto['Nov_2017'] ?>, <?php echo $proyecto['Dic_2017'] ?>]
    }]
});

</script>

		</div>

		<div class="col-md-2"></div>

</div>

<br>
<br>
<br>

</body>

</html>