<?php
include '../../InicioSessionSegNvl2.php';
echo '<br>';
$host = 'mapachitos.cisuktad1m53.us-east-2.rds.amazonaws.com';
$user = 'admin';
$password = 'mapachitos123';
$db = 'Residencias';
$conection = @mysqli_connect($host, $user, $password, $db);

if (!$conection) {
    echo 'Error de conexion';
    return null;
}
mysqli_set_charset($conection, "utf8");

$idSolicitudResidencia = $_POST['idSoliRes'];
echo $idSolicitudResidencia;

// Consulta para obtener la información del archivo
$sql = "SELECT * FROM ReporteFinal WHERE SRID = $idSolicitudResidencia";
echo $sql;

$resultado = mysqli_query($conection, $sql);
// Obtener la información del archivo
if ($fila = mysqli_fetch_assoc($resultado)) {
    $archivo = $fila['RPContenido'];
    // Establecer las cabeceras para la descarga
    header("Content-Type: application/pdf");
    header("Content-Disposition: attachment; filename=documento.pdf");
    // Imprimir el archivo
    echo $archivo;
} else {
    echo"<script>alert('No hay documento.')</script>";
    echo"<script  language='javascript'>window.location='../AsesorInternoAlumnos.php'</script>";  
}
// Cerrar la conexión
mysqli_close($conection);

?>
