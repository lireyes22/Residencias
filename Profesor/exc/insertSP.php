<?php
    include '../../InicioSessionSeg.php';
    include ('../funcProfesor.php');
    $link = conn();
    $nameProy = $_POST['nombreProy'];
    $objetivoProy = $_POST['objetivo'];
    $descripcionProy = $_POST['descripcion'];
    $impactoProy = $_POST['impacto'];
    $lugarProy = $_POST['lugar'];
    $estudiantesReqProy = $_POST['numEstudiantes'];   
    $tiempoEst = $_POST['tiempoProy'];
    $tipoPropProy = $_POST['tipoProp'];
    $lineaInvsProy = $_POST['lineaInv'];
    $referebciasEProy = $_POST['refEsenciales'];
    $IDUser=$_SESSION['id'];
    $docenteResProy = $IDUser;
    $estatus="PENDIENTE";
    $RFCEmpresa=$_POST['Empresas'];
    $carreraReqProy = $_POST['carreraReq'];

    echo $nameProy;
    echo $objetivoProy;
    echo $descripcionProy;
    echo $impactoProy;
    echo $lugarProy;
    echo $estudiantesReqProy;
    echo $tipoPropProy;
    echo $lineaInvsProy;
    echo $referebciasEProy;
    echo $docenteResProy;
    echo $RFCEmpresa;
    echo $carreraReqProy;

    $query = "INSERT INTO SolicitudProyecto (SPID,SPNombreProyecto, SPObjetivo, SPDescripcion, SPImpacto, SPLugar, SPEstudiantesRequeridos, SDTiempoEstimado, SPTipo, SPLineaInvestigacion , SPReferencias, UIDResponsable,SPEstatus,ERFC) 
    VALUES(null,'$nameProy','$objetivoProy','$descripcionProy','$impactoProy','$lugarProy','$estudiantesReqProy','$tiempoEst','$tipoPropProy','$lineaInvsProy','$referebciasEProy','$docenteResProy','$estatus','$RFCEmpresa')";
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