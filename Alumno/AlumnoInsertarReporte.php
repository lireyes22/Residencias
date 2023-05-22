<?php
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

$conexion = conn();

//Nombre del archivo y ruta
$archivo = $_FILES['ReporteFinal']['tmp_name'];
$idAlumno = $_POST['idAlumno'];

//Lee el contenido del archivo
$contenido = file_get_contents($archivo);

//Prepara la consulta SQL con parametros
$sql = "CALL InsertarReporteFinal(?, ?)";
$stmt = mysqli_prepare($conexion, $sql);

//Asigna los valores de los parametros
mysqli_stmt_bind_param($stmt, "is", $idAlumno, $contenido);

//Ejecuta la consulta preparada
if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Archivo insertado correctamente.');</script>";
} else {
    echo "<script>alert('Error al insertar archivo:');</script>";  mysqli_error($conexion);
}

// Cierra la conexión
mysqli_close($conexion);

?>

<!DOCTYPE html>
<html>
                <script>
					function abrirDocumento() {
					var urlDocumento = $archivo = $_FILES['ReporteFinal']['tmp_name'];
					window.open(urlDocumento);
					}
				</script>
					<button onclick="abrirDocumento()">Abrir documento</button>
               
<br>                
<br>                

<button><a href="AlumReportefinal.php">volver</a></button>
</html>
