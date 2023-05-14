<?php 
$SRID = $_POST['SRID'];
$opcion = $_POST['accion'];
// print_r($_POST); // Solo es para imprimir

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

	//Prepara la consulta para insertar la desición
	$conection = conn();
	$sql = "CALL DecideResidencia(?, ?)";
	$stmt = mysqli_prepare($conection, $sql);
	//Asigna los valores de los parametros
	mysqli_stmt_bind_param($stmt, 'is', $SRID, $opcion);

	//Prepara segunda consulta para eliminar solicitudes solo si se aprobó la solicitud
	if($opcion == 'APROBADO'){

        $sql2 = "SELECT SolicitudResidencia.UAlumno
        FROM Alumnos
        INNER JOIN Alumno_Usuarios ON Alumno_Usuarios.NumeroControl = Alumnos.NumeroControl
        INNER JOIN SolicitudResidencia ON SolicitudResidencia.UAlumno = Alumno_Usuarios.UID
        WHERE SolicitudResidencia.SRID = $SRID";
        $query = mysqli_query($conection, $sql2);
        $result = mysqli_fetch_assoc($query);
		$id = $result['UAlumno'];

		$sql3 = "CALL EliminarSolicitudResiduo(?)";
		$stmt2 = mysqli_prepare($conection, $sql3);
		//Asigna los valores de los parametros
		mysqli_stmt_bind_param($stmt2, 'i', $id);
	}
	
	if(mysqli_stmt_execute($stmt)) {
		if($opcion == 'APROBADO'){
			mysqli_stmt_execute($stmt2);
		}
		echo"<script>alert('¡Decisión Confirmada!')</script>";
		echo"<script  language='javascript'>window.location='profesorListadoSoliRes.php'</script>";  
	} else {
		echo "¡Ha ocurrido un error!";
	}
?>