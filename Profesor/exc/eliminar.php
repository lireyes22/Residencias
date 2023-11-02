<?php
    include "../conectionBD.php";
    $SPID = $_POST["SPID"];
    function cancelaProyecto($SPID){
        $conexion = conn();
        $sql = "UPDATE solicitudproyecto SET SPEstatus = 'CANCELADO' WHERE SPID = '$SPID';";
        return mysqli_query($conexion, $sql);
    } 
    if(cancelaProyecto($SPID)){
        echo "<script>alert('Eliminado Correctamete, Para cualquier correccion contacte al administrador.')</script>";
    }else{
        echo "<script>alert('Ha ocurrido un error, contacte al administrador si el error persiste.')</script>";
    }
    echo"<script  language='javascript'>window.location='../profesorMisProyectos.php'</script>";
?>