<?php	
	$mysqli = new mysqli('localhost','root','root','modernizacion');
	mysqli_query($mysqli,"SET NAMES 'utf8'");

	$sql = "SELECT * FROM indicadores WHERE 1";
	$contenido = $mysqli -> query($sql);
	$repetidos = 0;

	if (isset($_POST['Secretaria'])) {
    	$Secretaria = $_POST['Secretaria'];
	}
	else {
    	$Secretaria = NULL;
	}

	if (isset($_POST['Direccion'])) {
    	$Direccion = $_POST['Direccion'];
	}
	else {
    	$Direccion = NULL;
	}

	if (isset($_POST['Responsable'])) {
    	$Responsable = $_POST['Responsable'];
	}
	else {
    	$Responsable = NULL;
	}

	if (isset($_POST['Eje_gestion'])) {
    	$Eje_gestion = $_POST['Eje_gestion'];
	}
	else {
    	$Eje_gestion = NULL;
	}

	if (isset($_POST['Prioridad'])) {
    	$Prioridad = $_POST['Prioridad'];
	}
	else {
    	$Prioridad = NULL;
	}


	if (isset($_POST['Nombre_proyecto'])) {
    	$Nombre_proyecto = $_POST['Nombre_proyecto'];
	}
	else {
    	$Nombre_proyecto = NULL;
	}

	if (isset($_POST['RIL'])) {
    	$RIL = $_POST['RIL'];
	}
	else {
    	$RIL = NULL;
	}


	if (isset($_POST['Indicador'])) {
    	$Indicador = $_POST['Indicador'];
	}
	else {
    	$Indicador = NULL;
	}

	if (isset($_POST['Unidad_medida'])) {
    	$Unidad_medida = $_POST['Unidad_medida'];
	}
	else {
    	$Unidad_medida = NULL;
	}

	if (isset($_POST['Ene_2017'])) {
    	$pre_Ene_2017 = $_POST['Ene_2017'];
    	$pre2_Ene_2017 = str_replace(",", ".", $pre_Ene_2017);
    	$pre3_Ene_2017 = str_replace("$", "", $pre2_Ene_2017);
    	$Ene_2017 = str_replace("%", "", $pre3_Ene_2017);

	}
	else {
    	$Ene_2017 = NULL;
	}

	if($_POST['Ene_2017']==""){
		$Ene_2017 = "0";
	}

	if (isset($_POST['Feb_2017'])) {
    	$pre_Feb_2017 = $_POST['Feb_2017'];
    	$pre2_Feb_2017 = str_replace(",", ".", $pre_Feb_2017);
    	$pre3_Feb_2017 = str_replace("$", "", $pre2_Feb_2017);
    	$Feb_2017 = str_replace("%", "", $pre3_Feb_2017);
	}
	else {
    	$Feb_2017 = NULL;
	}

	if($_POST['Feb_2017']==""){
		$Feb_2017 = "0";
	}

	if (isset($_POST['Mar_2017'])) {
    	$pre_Mar_2017 = $_POST['Mar_2017'];
    	$pre2_Mar_2017 = str_replace(",", ".", $pre_Mar_2017);
    	$pre3_Mar_2017 = str_replace("$", "", $pre2_Mar_2017);
    	$Mar_2017 = str_replace("%", "", $pre3_Mar_2017);	

	}
	else {
    	$Mar_2017 = NULL;
	}

	if($_POST['Mar_2017']==""){
		$Mar_2017 = "0";
	}

	if (isset($_POST['Abr_2017'])) {
    	$pre_Abr_2017 = $_POST['Abr_2017'];
    	$pre2_Abr_2017 = str_replace(",", ".", $pre_Abr_2017);
    	$pre3_Abr_2017 = str_replace("$", "", $pre2_Abr_2017);
    	$Abr_2017 = str_replace("%", "", $pre3_Abr_2017);
	}
	else {
    	$Abr_2017 = NULL;
	}

	if($_POST['Abr_2017']==""){
		$Abr_2017 = "0";
	}

	if (isset($_POST['May_2017'])) {
    	$pre_May_2017 = $_POST['May_2017'];
    	$pre2_May_2017 = str_replace(",", ".", $pre_May_2017);
    	$pre3_May_2017 = str_replace("$", "", $pre2_May_2017);
    	$May_2017 = str_replace("%", "", $pre3_May_2017);
	}
	else {
    	$May_2017 = NULL;
	}

	if($_POST['May_2017']==""){
		$May_2017 = "0";
	}

	if (isset($_POST['Jun_2017'])) {
    	$pre_Jun_2017 = $_POST['Jun_2017'];
    	$pre2_Jun_2017 = str_replace(",", ".", $pre_Jun_2017);
    	$pre3_Jun_2017 = str_replace("$", "", $pre2_Jun_2017);
    	$Jun_2017 = str_replace("%", "", $pre3_Jun_2017);
	}
	else {
    	$Jun_2017 = NULL;
	}

	if($_POST['Jun_2017']==""){
		$Jun_2017 = "0";
	}

	if (isset($_POST['Jul_2017'])) {
    	$pre_Jul_2017 = $_POST['Jul_2017'];
    	$pre2_Jul_2017 = str_replace(",", ".", $pre_Jul_2017);
    	$pre3_Jul_2017 = str_replace("$", "", $pre2_Jul_2017);
    	$Jul_2017 = str_replace("%", "", $pre3_Jul_2017);
	}
	else {
    	$Jul_2017 = NULL;
	}

	if($_POST['Jul_2017']==""){
		$Jul_2017 = "0";
	}

	if (isset($_POST['Ago_2017'])) {
    	$pre_Ago_2017 = $_POST['Ago_2017'];
    	$pre2_Ago_2017 = str_replace(",", ".", $pre_Ago_2017);
    	$pre3_Ago_2017 = str_replace("$", "", $pre2_Ago_2017);
    	$Ago_2017 = str_replace("%", "", $pre3_Ago_2017);
	}
	else {
    	$Ago_2017 = NULL;
	}

	if($_POST['Ago_2017']==""){
		$Ago_2017 = "0";
	}


	if (isset($_POST['Sep_2017'])) {
    	$pre_Sep_2017 = $_POST['Sep_2017'];
    	$pre2_Sep_2017 = str_replace(",", ".", $pre_Sep_2017);
		$pre3_Sep_2017 = str_replace("$", "", $pre2_Sep_2017);
    	$Sep_2017 = str_replace("%", "", $pre3_Sep_2017);
	}
	else {
    	$Sep_2017 = NULL;
	}

	if($_POST['Sep_2017']==""){
		$Sep_2017 = "0";
	}


	if (isset($_POST['Oct_2017'])) {
    	$pre_Oct_2017 = $_POST['Oct_2017'];
    	$pre2_Oct_2017 = str_replace(",", ".", $pre_Oct_2017);
		$pre3_Oct_2017 = str_replace("$", "", $pre2_Oct_2017);
    	$Oct_2017 = str_replace("%", "", $pre3_Oct_2017);
	}
	else {
    	$Oct_2017 = NULL;
	}

	if($_POST['Oct_2017']==""){
		$Oct_2017 = "0";
	}

	if (isset($_POST['Nov_2017'])) {
    	$pre_Nov_2017 = $_POST['Nov_2017'];
    	$pre2_Nov_2017 = str_replace(",", ".", $pre_Nov_2017);
    	$pre3_Nov_2017 = str_replace("$", "", $pre2_Nov_2017);
    	$Nov_2017 = str_replace("%", "", $pre3_Nov_2017);
	}
	else {
    	$Nov_2017 = NULL;
	}

	if($_POST['Nov_2017']==""){
		$Nov_2017 = "0";
	}


	if (isset($_POST['Dic_2017'])) {
    	$pre_Dic_2017 = $_POST['Dic_2017'];
    	$pre2_Dic_2017 = str_replace(",", ".", $pre_Dic_2017);
		$pre3_Dic_2017 = str_replace("$", "", $pre2_Dic_2017);
    	$Dic_2017 = str_replace("%", "", $pre3_Dic_2017);
	}
	else {
    	$Dic_2017 = NULL;
	}

	if($_POST['Dic_2017']==""){
		$Dic_2017 = "0";
	}

	while($comparando = $contenido -> fetch_assoc()){
		
		if(strtolower($comparando['Nombre_proyecto']) == strtolower($Nombre_proyecto) && strtolower($comparando['Indicador']) == strtolower($Indicador)){
			$repetidos = 1;
			break;
		}else{
			$repetidos = 0;	
		}

	}

	if($repetidos == 0){

	$sql = "INSERT INTO `indicadores`(`Secretaria`, `Direccion`, `Responsable`, `Eje_gestion`, `Prioridad`, `Nombre_proyecto`, `RIL`, `Indicador`, `Unidad_medida`, `Ene_2017`, `Feb_2017`, `Mar_2017`, `Abr_2017`, `May_2017`, `Jun_2017`, `Jul_2017`, `Ago_2017`, `Sep_2017`, `Oct_2017`, `Nov_2017`, `Dic_2017`) VALUES ('$Secretaria','$Direccion','$Responsable','$Eje_gestion','$Prioridad','$Nombre_proyecto','$RIL','$Indicador','$Unidad_medida','$Ene_2017','$Feb_2017','$Mar_2017','$Abr_2017','$May_2017','$Jun_2017','$Jul_2017','$Ago_2017','$Sep_2017','$Oct_2017','$Nov_2017','$Dic_2017')";

	mysqli_query($mysqli,$sql);
	header("location: indicadores.php?cargar=si");
	
	}else{

	header("location: carga.php?error=si");

	}

?>
	

