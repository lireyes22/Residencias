<?php
$SPID = $_POST['SPID'];
$residente = $_POST['residente'];
$anteproyecto = $_FILES['anteproyecto']['tmp_name'];
$antearchivo = file_get_contents($anteproyecto);
$antearchivo = base64_encode($antearchivo);

include ('../conectionBD.php');

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
