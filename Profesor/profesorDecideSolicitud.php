<?php 
$SRID = $_POST['SRID'];
$opcion = $_POST['accion'];
print_r($_POST);

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

	//Prepara la consulta SQL con parametros
	$conection = conn();
	$sql = "CALL DecideResidencia(?, ?)";
	$stmt = mysqli_prepare($conection, $sql);
	//Asigna los valores de los parametros
	mysqli_stmt_bind_param($stmt, 'is', $SRID, $opcion);
	
	if(mysqli_stmt_execute($stmt)) {
		echo"<script>alert('Decisión Guardada Exitosamente.')</script>";
		echo"<script  language='javascript'>window.location='profesorListadoSoliRes.php'</script>";  
	} else {
		echo "Hubo un error al insertar los datos.";
	}
?>