<?php
    include ('../funcProfesor.php');
    $link = conn();
    $nameProy = $_POST['nombreProy'];
    $objetivoProy = $_POST['objetivo'];
    $descripcionProy = $_POST['descripcion'];
    $impactoProy = $_POST['impacto'];
    $lugarProy = $_POST['lugar'];
    $docenteResProy = $_POST['docenteResp'];
    $estudiantesReqProy = $_POST['estudiantes-req'];
    $tiempoEstProy = $_POST['tiempoEst'];
    $carreraReqProy = $_POST['carreraReq'];
    $tipoPropProy = $_POST['tipoProp'];
    $lineaInvsProy = $_POST['lineaInv'];
    $referebciasEProy = $_POST['refEsenciales'];
    $query = "INSERT INTO SolicitudProyecto (SPNombreProyecto, SPObjetivo, SPDescripcion, SPImpacto, SPLugar, SPEstudiantesRequeridos, SPTipo, SDTiempoEstimado, SPLineaInvestigacion , SPReferencias, UIDResponsable) 
    VALUES('$nameProy','$objetivoProy','$descripcionProy','$impactoProy','$lugarProy','$estudiantesReqProy','$tipoPropProy','$tiempoEstProy','$lineaInvsProy','$referebciasEProy','$docenteResProy');";
    $result = mysqli_query($link, $query);

    if($result)
    {
        echo"<script>alert('Se agregaron lo datos')</script>";
    }
    else
    {
        echo"<script>alert('No mi chavo... algo sucedió, pedo de product owner')</script>";
    }


?>