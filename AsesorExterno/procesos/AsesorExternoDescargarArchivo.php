<?php
include '../../InicioSessionSegNvl2.php';
include ('../../conectionBD.php');
$conection = conn();


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
}
// Cerrar la conexión
mysqli_close($conection);

?>
