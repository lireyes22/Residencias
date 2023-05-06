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

$conection = conn();
$Portada = $_POST['Portada'];
$Agradecimientos  = $_POST['Agradecimientos'];
$Resumen = $_POST['Resumen'];
$Indice = $_POST['Indice'];
$Introduccion = $_POST['Introduccion'];
$Antecedentes = $_POST['Antecedentes'];
$Justificacion = $_POST['Justificacion'];
$Objetivos = $_POST['Objetivos'];
$Metodologia = $_POST['Metodologia'];
$Resultados = $_POST['Resultados'];
$Discusiones = $_POST['Discusiones'];
$Conclusiones = $_POST['Conclusiones'];
$FuentesInformacion = $_POST['FuentesInformacion'];
$Observaciones = $_POST['Observaciones'];
$idSolicitudResidencia = $_POST['idSoliRes'];

echo $idSolicitudResidencia;/*
$conectionn = conn();
$sql = "CALL InsertarEvaluacionReporteFinal($idSolicitudResidencia, $Portada, $Agradecimientos, $Resumen, $Indice, $Introduccion, $Antecedentes, $Justificacion, $Objetivos, $Metodologia, $Resultados, $Discusiones, $Conclusiones, $FuentesInformacion, '$Observaciones')";
$query = mysqli_query($conectionn, $sql);

if (!$query) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conectionn);
} else {
    echo "Registro insertado exitosamente.";
}

mysqli_close($conectionn);
*/
?>
