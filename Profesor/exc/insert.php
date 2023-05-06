<?php 
    include ('../funcProfesor.php');
    $nFuncion = $_POST['IDfuncion'];
    if($nFuncion == 'desicionProyecto'){
        $_SPID = $_POST['SPID'];
        $_CPPEstatus = $_POST['desicion'];
        $_CPPObservaciones = $_POST['observaciones'];        
        updateComision($_SPID, $_CPPEstatus, $_CPPObservaciones); //SE ACTUALIZA A LA DESICION
        updateSolicitudProyecto($_SPID, $CPPEstatus); //SE ACTUALIZA A LA DESICION
        $existe = existeBanco($SPID);
        if($_CPPEstatus == 'ACEPTADO' AND empty($existe)){
            cargarBanco($_SPID); //SE SUBE AL BANCO SI FUE ACEPTADO
        }
    }else{
        echo 'n_';
    } 
     //Código JavaScript para cerrar la ventana
     echo "<script>window.close();</script>";
?>