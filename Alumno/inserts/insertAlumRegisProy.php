<?php
include '../../InicioSessionSegNvl2.php';
include ('../Alumfunciones.php');
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
$alumnoResProy = $IDUser;
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
echo $alumnoResProy;
echo $RFCEmpresa;


$query = "INSERT INTO SolicitudProyecto (SPID,SPNombreProyecto, SPObjetivo, SPDescripcion, SPImpacto, SPLugar, SPEstudiantesRequeridos, SDTiempoEstimado, SPTipo, SPLineaInvestigacion , SPReferencias, UIDResponsable,SPEstatus,ERFC) 
VALUES(null,'$nameProy','$objetivoProy','$descripcionProy','$impactoProy','$lugarProy','$estudiantesReqProy','$tiempoEst','$tipoPropProy','$lineaInvsProy','$referebciasEProy','$alumnoResProy','$estatus','$RFCEmpresa')";
$result = mysqli_query($link, $query);

$id_generado = mysqli_insert_id($link);
foreach($carreraReqProy as $checkbox){
    $query2 = "INSERT INTO CarrerasSolicitudProyecto (CSP,CID, SPID) 
    VALUES(null,'$checkbox','$id_generado')";
    $result2 = mysqli_query($link, $query2);
}

    if($result)
    {
        echo"<script>alert('Se agregaron lo datos')</script>";
        echo"<script  language='javascript'>window.location='../AlumRegisProy.php'</script>"; 

    }
    else
    {
        echo"<script>alert('No mi chavo... algo sucedió, pedo de product owner')</script>";
        echo"<script  language='javascript'>window.location='../AlumRegisProy.php'</script>"; 
    }

?>