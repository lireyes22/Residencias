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

$idAlumno=$_POST ["uid"];
function descargardoc($idAlumno){
    $conexion = conn();
    $sql = "SELECT ReporteFinal.`RPContenido` FROM `ReporteFinal` INNER JOIN `SolicitudResidencia` ON ReporteFinal.`SRID` = SolicitudResidencia.`SRID` WHERE SolicitudResidencia.`SREstatus`='APROBADO' AND SolicitudResidencia.`UAlumno`=$idAlumno";
    $row = mysqli_fetch_array(mysqli_query($conexion, $sql)); 
    header("Content-type:application/pdf");
    header("Content-Disposition: attachment; filename=Reportefinal.pdf");
    return  $row(0);
  }
  echo descargardoc($idAlumno);
?>

