<?php
    include "../conectionBD.php";
    $SRID = $_GET["SRID"];
    function descargardoc($SRID){
        $conexion = conn();
        $sql = "SELECT SolicitudResidencia.SRAnteProyecto FROM `SolicitudResidencia` WHERE SolicitudResidencia.SRID = '$SRID';";
        $row = mysqli_fetch_array(mysqli_query($conexion, $sql)); 
        return $row;
      } 
      header("Content-type:application/pdf");
      header("Content-Disposition: attachment; filename=AnteProyecto.pdf");
      $documento = descargardoc($SRID); 
      echo $documento[0];
?>