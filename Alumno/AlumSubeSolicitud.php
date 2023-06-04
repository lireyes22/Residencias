<?php 
$SPID = $_POST['SPID'];
$residente = $_POST['residente'];
$opcion = $_POST['opcionElegida'];
// $cons = $_FILES['constancia']['tmp_name'];
// $consarchivo = file_get_contents($cons);
$anteproyecto = $_FILES['anteproyecto']['tmp_name'];
$antearchivo = file_get_contents($anteproyecto);
$periodo = ''; 

include ('../conectionBD.php');

	$fechaActual = date('Y-m-d');
	$mesActual = date('m');
	$anioActual = date('Y');
	if ($mesActual >= 1 && $mesActual <= 7) {
		// Si estamos en el primer semestre
		$periodo = 'ENE-JUN ' . $anioActual;
	} else {
		// Si estamos en el segundo semestre
		$periodo = 'AGO-NOV ' . $anioActual;
	}
    $conection = conn();
	$sql2 = "SELECT BancoProyectos.BPID FROM BancoProyectos
	INNER JOIN SolicitudProyecto ON SolicitudProyecto.SPID = BancoProyectos.SPID
	WHERE $SPID = SolicitudProyecto.SPID";
	$query2 =mysqli_query($conection, $sql2);
	$result2 = mysqli_fetch_assoc($query2);
	$BPID = $result2['BPID'];
	
	//Prepara la consulta SQL con parametros
	$sql = "CALL InsertarSolicitudResidencia(?, 'PENDIENTE', ?, ?, ?, ?)";
	$stmt = mysqli_prepare($conection, $sql);
	//Asigna los valores de los parametros
	mysqli_stmt_bind_param($stmt, 'ssiis', $antearchivo, $periodo, $residente, $BPID, $opcion);
	
	if(mysqli_stmt_execute($stmt)) {
		echo"<script>alert('Registro insertado exitosamente.')</script>";
		echo"<script  language='javascript'>window.location='AlumListadoProyecto.php'</script>";  
	} else {
		echo "Hubo un error al insertar los datos.";
	}
?>