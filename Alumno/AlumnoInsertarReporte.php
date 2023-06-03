<?php
include ('conectionBD.php');

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

echo"<script language='javascript'>window.location='AlumReportefinal.php'</script>";

?>

