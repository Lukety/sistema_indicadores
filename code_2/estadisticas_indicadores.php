<!DOCTYPE html>
<html>

<?php 

    session_start();

    if(empty($_SESSION['usuario'])){
        header("location:login.php");
    }

    $admin = $_SESSION['privilegio'];
    $sec_dir = $_SESSION['sec_dir'];
    $sec = $_SESSION['secretaria'];
    $dir = $_SESSION['direccion'];
    $nombre_dir = $_SESSION['nombre_dir'];

    // Nombre:
    $nom = $_SESSION['nombre'];

    // Apellido
    $apellido = $_SESSION['apellido'];

    // Conexion con la base de datos:
    $mysqli = new mysqli('localhost','root','root','modernizacion');
    mysqli_query($mysqli,"SET NAMES 'utf8'");

    $sql = "SELECT * FROM indicadores WHERE Direccion='$nombre_dir'";
    $inter = $mysqli -> query($sql);
    $cantidad = mysqli_num_rows($inter);

    $sql_2 = "SELECT * FROM indicadores WHERE Direccion='$nombre_dir'";
    $inter_2 = $mysqli -> query($sql_2);

    $proyecto = $_SESSION['primer_proyecto'];

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

                        <li class="active"><a href="estadisticas.php"> Estadisticas </a></li>
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
        <center><h2><b> Dirección: </b> <?php echo $nombre_dir ?> </h2></center>    
        <center><h4> Cantidad de indicadores: <?php echo $cantidad ?> </h4></center>
        
        <br>

    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-md-4 col-xs-3"></div>
        <div class="col-md-4 col-xs-5">

        <center>
 
        <form action="bd_actualizacion_5.php" method="post">

        <select name = "xproyecto" class="form-control">

             <option value ="vacio"> Seleccionar </option>

            <?php while($row_2 = $inter_2 -> fetch_assoc()){ ?>

            <option value="<?php echo $row_2['ID'] ?>"> Proyecto: <?php echo $row_2['Nombre_proyecto'] ?> &nbsp - &nbsp Indicador: <?php echo $row_2['Indicador'] ?> </option>
            
            <?php
                }
            ?>

        </select>

        &nbsp &nbsp


        </div>

        <div class="col-md-4 col-xs-3">

                 <input type="submit" class="btn btn-default" name="Mostrar" value="Mostrar">

        </form>

        </center>

        <br>

        </div>

    </div>
</div>

<div class="container">
    <div class="row">


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script>
        
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: '<b> Proyecto: </b> <?php echo $proyecto['Nombre_proyecto'] ?>'
    },
    subtitle: {
        text: '<b>Indicador:</b> <?php echo $proyecto['Indicador']?> (<?php echo $proyecto['Unidad_medida'] ?>)'
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
                enabled: true
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
</div>
</body>
</html>