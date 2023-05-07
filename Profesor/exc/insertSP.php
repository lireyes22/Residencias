<?php
    include ('../funcProfesor.php');
    $link = conn();
    $nameProy = $_POST['nombreProy'];
    $objetivoProy = $_POST['objetivo'];
    $descripcionProy = $_POST['descripcion'];
    $impactoProy = $_POST['impacto'];
    $lugarProy = $_POST['lugar'];
    $docenteResProy = $_POST['docenteResp'];
    $estudiantesReqProy = $_POST['estudiantesReq'];
    $tiempoEstProy = $_POST['tiempoEst'];
    $carreraReqProy = $_POST['carreraReq'];
    $tipoPropProy = $_POST['tipoProp'];
    $lineaInvsProy = $_POST['lineaInv'];
    $referebciasEProy = $_POST['refEsenciales'];
    #Falta la carrera requerida en la base de datos
    $query = "INSERT INTO SolicitudProyecto (SPNombreProyecto, SPObjetivo, SPDescripcion, SPImpacto, SPLugar, SPEstudiantesRequeridos, SPTipo, SDTiempoEstimado, SPLineaInvestigacion , SPReferencias, UIDResponsable) 
    VALUES('$nameProy','$objetivoProy','$descripcionProy','$impactoProy','$lugarProy','$estudiantesReqProy','$tipoPropProy','$tiempoEstProy','$lineaInvsProy','$referebciasEProy','$docenteResProy');";
    $result = mysqli_query($link, $query);
?>