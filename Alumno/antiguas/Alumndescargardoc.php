<?php
include ('../conectionBD.php');

$idAlumno=$_POST ["uid"];
function descargardoc($idAlumno){
    $conexion = conn();
    $sql = "SELECT ReporteFinal.`RPContenido` FROM `ReporteFinal` INNER JOIN `SolicitudResidencia` ON ReporteFinal.`SRID` = SolicitudResidencia.`SRID` WHERE SolicitudResidencia.`SREstatus`='APROBADO' AND SolicitudResidencia.`UAlumno`=$idAlumno;";
    $row = mysqli_fetch_array(mysqli_query($conexion, $sql)); 
    return $row;
  } 
  header("Content-type:application/pdf");
  header("Content-Disposition: attachment; filename=Reportefinal.pdf");
  $documento = descargardoc($idAlumno); 
  echo $documento[0];
?>
