<?php
$SPID = $_POST['SPID'];
$residente = $_POST['residente'];
$anteproyecto = $_FILES['anteproyecto']['tmp_name'];
$antearchivo = file_get_contents($anteproyecto);
$antearchivo = base64_encode($antearchivo);
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

$conection=conn();
//BUSCAR LA SOLICITUD DEL RESIDENTE
$sql="SELECT BPID FROM BancoProyectos WHERE SPID=$SPID";
$BPID = mysqli_query($conection, $sql);
$BPID = mysqli_fetch_assoc($BPID);
$BPID = $BPID['BPID'];
//INSERTAR EL NUEVO ANTEPROYECTO...
$sql = "UPDATE SolicitudResidencia SET SRAnteProyecto ='$antearchivo' WHERE UAlumno = $residente AND
BPID = $BPID";

if(mysqli_query($conection, $sql)){
    echo '<script>alert("Se agrego su nuevo anteproyecto");</script>';
}else{
    echo '<script>alert("Ocurrio un error inesperado");</script>';
}
echo '<script>
setTimeout(function () {
        // Redirigir con JavaScript
        window.location.href="AlumTraking.php";
     }, 2000);
</script>';
?>
