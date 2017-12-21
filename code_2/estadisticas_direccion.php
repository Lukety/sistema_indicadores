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
    $nombre_sec = $_SESSION['nombre_sec'];

    // Nombre:
    $nom = $_SESSION['nombre'];

    // Apellido
    $apellido = $_SESSION['apellido'];

    // Conexion con la base de datos:
    $mysqli = new mysqli('localhost','root','root','modernizacion');
    mysqli_query($mysqli,"SET NAMES 'utf8'");

    $sql = "SELECT DISTINCT Direccion FROM indicadores WHERE Secretaria='$nombre_sec'";
    $inter = $mysqli -> query($sql);

    $sql_2 = "SELECT Direccion FROM indicadores WHERE Secretaria='$nombre_sec'";
    $inter_2 = $mysqli -> query($sql_2);
    $cantidad = mysqli_num_rows($inter_2);

    $sql_4 = "SELECT DISTINCT Direccion FROM indicadores WHERE Secretaria='$nombre_sec'";
    $inter_4 = $mysqli -> query($sql_4);
    $cantidad_4 = mysqli_num_rows($inter_4);


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
    <script src="Graficas/code/highcharts-3d.js"></script>
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

<br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
        <center><h2> <b> Secretaria: </b> <?php echo $_SESSION['nombre_sec'] ?> </h2></center>
        <center><h4> Cantidad total de indicadores: <?php echo $cantidad ?> </h4></center>

        <br>
        <br>

        <center>
        <div class="table-resposive">
            <table class="table-bordered">
                <tr>
                    <th width="100" nowrap style="text-align:center"> Información </th>
                    <th width="200" nowrap style="text-align:center"> Dirección </th>
                    <th width="100" nowrap style="text-align:center"> Cantidad </th>
                </tr>


                <form action="bd_actualizacion_4.php" method="post">

                <?php
                    while ($row = $inter -> fetch_assoc()) {
                ?>


                <tr style="height:70px">
                    <td class="centro"> <input type="image" src="img/icono_flecha.png" name="act_valor" value = "<?php echo $row['Direccion'] ?>">  </td> 
                    <td style="text-align:center">  <?php echo $row['Direccion'] ?> </td>
                    <td style="text-align:center"> 

                    <?php
                
                        $dir = $row['Direccion'];
                        $sql_3 = "SELECT * FROM indicadores WHERE Direccion='$dir'";
                        $inter_3 = $mysqli -> query($sql_3);
                        $cantidad_3 = mysqli_num_rows($inter_3);    

                        echo $cantidad_3;

                    ?> 

                    </td>
                </tr>

                <?php
                    }
                ?>

                </form>

            </table>
        </div>
        </center>
        </div>

        <div class="col-md-6">
            <br>
            <br>
            <br>
            <br>
            <br>

 <div id="container" style="height: 400px"></div>

    <script>

    Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Cantidad de indicadores por dirección'
    },
    subtitle: {
        text: 'Grafica'
    },
    plotOptions: {
        pie: {
            innerSize: 120,
            depth: 45
        }
    },
    series: [{
        name: 'Cantidad',
        data: [
  
            <?php
                while ($row = $inter_4 -> fetch_assoc()) {
            ?>

            ['<?php echo $row['Direccion'] ?>', 

            <?php
            
                $dir = $row['Direccion'];
                $sql_5 = "SELECT DISTINCT * FROM indicadores WHERE Direccion='$dir'";
                $inter_5 = $mysqli -> query($sql_5);
                $cantidad_5 = mysqli_num_rows($inter_5);    

                echo $cantidad_5;

            ?>    

            ],
         
            <?php
                }
            ?>
        ]
    }]
});

</script>           

        </div>
    </div>
</div>
</body>
</html>