<?php
include '../../InicioSessionSegNvl2.php';
include ('../../conectionBD.php');



$conection = conn();
$spid = $_POST['SPID'];
$nResidentes = $_POST['nResidentes'];

$sql = "CALL ActualizarNResidentes($spid, $nResidentes)";
$query = mysqli_query($conection, $sql);

if (!$query) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conectionn);
} else {
    echo"<script>alert('Actualizacion exitosa.')</script>";
	echo"<script  language='javascript'>window.location='../AsesorInternoResidencias.php'</script>";  
}

mysqli_close($conection);


?>