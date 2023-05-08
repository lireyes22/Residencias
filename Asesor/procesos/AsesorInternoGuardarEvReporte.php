<?php
include '../../InicioSessionSegNvl2.php';
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
$idAsesor = $_POST['idUAsesor'];

$total = $Portada + $Agradecimientos + $Resumen + $Indice + $Introduccion + $Antecedentes + $Justificacion
+ $Objetivos + $Metodologia + $Resultados + $Discusiones + $Conclusiones + $FuentesInformacion;


$conectionn = conn();
$sql = "CALL InsertarEvaluacionReporteFinal($idSolicitudResidencia, $Portada, $Agradecimientos, $Resumen, $Indice, $Introduccion, $Antecedentes, $Justificacion, $Objetivos, $Metodologia, $Resultados, $Discusiones, $Conclusiones, $FuentesInformacion, $total,'$Observaciones', $idAsesor)";
$query = mysqli_query($conectionn, $sql);

if (!$query) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conectionn);
} else {
    echo"<script>alert('Registro insertado exitosamente.')</script>";
	echo"<script  language='javascript'>window.location='../AsesorInternoAlumnos.php'</script>";  
}

mysqli_close($conectionn);

?>
