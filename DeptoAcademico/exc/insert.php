<?php //INSERCION DE DATOS 
    include ('../funcionesDepto.php');
    $nFuncion = $_POST['IDfuncion'];
    if($nFuncion == 'ComisionProyectoProfesor'){
        $_SPID = $_POST['SPID'];
        $prevUPROF = $_POST['UProfesor'];
        $_UProfesor = mysqli_fetch_array(UProfesor($prevUPROF));
        $_CPPFecha = date("Y-m-d");
        $_MES = $_POST['mes'];
        $_DIA = $_POST['dia'];
        $_CPPFechaLimite = date('Y').'-0'.$_MES.'-0'.$_DIA;

        insertComisionProyectoProfesor($_SPID, $_UProfesor[0], $_CPPFecha, $_CPPFechaLimite);
        $_Estatus = 'REVISION';
        //alterSolicitudProyecto($_SPID, $_Estatus);
        //Generar código JavaScript para cerrar la ventana
        echo "<script>window.close();</script>";
    }
?>