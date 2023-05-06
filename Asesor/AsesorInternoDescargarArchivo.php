<?php
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

// ID del archivo que queremos descargar
$idSolicitudResidencia = $_POST['idSoliRes'];
echo $idSolicitudResidencia;

// Consulta para obtener la información del archivo
$sql = "SELECT * FROM ReporteFinal WHERE SRID = $idSolicitudResidencia";
echo $sql;

$resultado = mysqli_query($conection, $sql);
// Obtener la información del archivo
if ($fila = mysqli_fetch_assoc($resultado)) {
    $archivo = $fila['archivo'];
    // Establecer las cabeceras para la descarga
    header("Content-Type: application/pdf");
    header("Content-Disposition: attachment; filename=documento.pdf");
    // Imprimir el archivo
    echo $archivo;
}
// Cerrar la conexión
mysqli_close($conection);

?>
