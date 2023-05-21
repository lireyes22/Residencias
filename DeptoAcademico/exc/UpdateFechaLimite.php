<?php
    include ('../funcionesDepto.php');

    $newFecha = $_POST['FVNewFechaLimite'];
    $FVTramite = $_POST['FVTramite'];
    $conectionn = conn();    

    $sql = "UPDATE FechasVencimiento
    SET FVFechaLimite = '$newFecha'
    WHERE FVTramite = '$FVTramite'";

    $query = mysqli_query($conectionn, $sql);

    if (!$query) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conectionn);
    } else {
        echo"<script>alert('Registro Actualizado exitosamente.')</script>";
        echo"<script  language='javascript'>window.location='../DeptoAcaAsignacionFechas.php'</script>";  
    }
    mysqli_close($conectionn);
?>