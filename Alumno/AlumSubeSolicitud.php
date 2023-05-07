<?php 
$SPID = $_POST['SPID'];
$residente = $_POST['residente'];
$opcion = $_POST['opcionElegida'];
$cons = $_FILES['constancia']['tmp_name'];
$consarchivo = file_get_contents($cons);
$anteproyecto = $_FILES['anteproyecto']['tmp_name'];
$antearchivo = file_get_contents($anteproyecto);
$periodo = '';
function conn(){
    $host = 'mapachitos.cisuktad1m53.us-east-2.rds.amazonaws.com';
    $user = 'admin';
    $password = 'mapachitos123';
    $db = 'Residencias';
    $conection = @mysqli_connect($host, $user, $password, $db);

    if(!$conection){
        echo 'Error de conexion';
        return null;
    }
    mysqli_set_charset($conection, "utf8");
    return $conection;
}
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
	WHERE SolicitudProyecto.SPID = ?";
	$stmt2 = mysqli_prepare($conection, $sql2);
	mysqli_stmt_bind_param($stmt2, 'i', $SPID);
	mysqli_stmt_execute($stmt2);
	$query2 = mysqli_stmt_get_result($stmt2);
	$result2 = mysqli_fetch_assoc($query2);
	$BPID = $result2['BPID'];

	$sql = "INSERT INTO SolicitudResidencia 
	(SRAnteProyecto, SRConstanciaInicioRes, SREstatus, SRPeriodo, UAlumno, BPID, SROpcionElegida) 
	VALUES (?, ?, 'PENDIENTE', ?, ?, ?, ?)";
	$stmt = mysqli_prepare($conection, $sql);
	mysqli_stmt_bind_param($stmt, 'bbsii', $antearchivo, $consarchivo, $periodo, $residente, $BPID, $opcion);
	mysqli_stmt_execute($stmt);

	if(mysqli_affected_rows($conection) > 0) {
		echo "La inserción fue exitosa.";
	} else {
		echo "Hubo un error al insertar los datos.";
	}

?>