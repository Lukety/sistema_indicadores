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

    // Nombre:
    $nom = $_SESSION['nombre'];

    // Apellido
    $apellido = $_SESSION['apellido'];

    // Conexion con la base de datos:
    $mysqli = new mysqli('localhost','root','root','modernizacion');
    mysqli_query($mysqli,"SET NAMES 'utf8'");

    $sql = "SELECT * FROM indicadores WHERE 1";
    $inter = $mysqli -> query($sql);
    $cantidad = mysqli_num_rows($inter);

    $sql_2 = "SELECT * FROM secretaria WHERE 1 ORDER BY nombre";
    $inter_2 = $mysqli -> query($sql_2);
    $cantidad_2 = mysqli_num_rows($inter_2);

    $sql_6 = "SELECT DISTINCT Secretaria FROM indicadores WHERE 1 ORDER BY Secretaria";
    $inter_6 = $mysqli -> query($sql_6);
    $cantidad_6 = mysqli_num_rows($inter_6);

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


<div class="container">
    <div class="row">
        <br>
        <center>
            <img src="img/icono_estadisticas.png" class="img-responsive">
            <br>
            <h3> Cantidad total de indicadores: <?php echo $cantidad ?> </h3> </li>
        </center>
    </div>

    <br>

    <div class="row">
        <div class="col-md-5">  
        <br>
        <center>
        <div class="table-responsive">
        <table class="table-bordered">

            <tr>
                <th width="100" nowrap style="text-align:center"> Información </th>
                <th width="200" nowrap style="text-align:center"> Secretaría </th>
                <th width="100" nowrap style="text-align:center"> Cantidad </th>
            </tr>

            <form action="bd_actualizacion_3.php" method="post">

            <?php
                 while ($row = $inter_2 -> fetch_assoc()) {
            ?>

                <tr style="height:40px">
                <td class="centro"> <input type="image" src="img/icono_flecha.png" name="Actualizar" value = "<?php echo $row['nombre'] ?>">  </td>  
                <td style="text-align:center"> <?php echo $row['nombre'] ?> </td>
                <td style="text-align:center"> 

                <?php
                
                 $sec = $row['nombre'];
                 $sql_3 = "SELECT * FROM indicadores WHERE secretaria='$sec'";
                 $inter_3 = $mysqli -> query($sql_3);
                 $cantidad_3 = mysqli_num_rows($inter_3);    

                 echo $cantidad_3;

                ?> 

                </td>
            </tr>

            <?php
                }
            ?>
        </table>
        </div>
        </center>
    
    </div>
            </form>
    <div class="col-md-7">    

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
        text: 'Cantidad de indicadores por secretaria'
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
                while ($row = $inter_6 -> fetch_assoc()) {
            ?>

            ['<?php echo $row['Secretaria'] ?>', 

            <?php
            
                $sec = $row['Secretaria'];
                $sql_7 = "SELECT * FROM indicadores WHERE secretaria='$sec'";
                $inter_7 = $mysqli -> query($sql_7);
                $cantidad_7 = mysqli_num_rows($inter_7);    

                echo $cantidad_7;

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

<br>
<br>
<br>

</div>
</div>

</body>
</html>