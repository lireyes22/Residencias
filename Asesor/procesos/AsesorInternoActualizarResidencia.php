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

mysqli_close($conectionn);


?>