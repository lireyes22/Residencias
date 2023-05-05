<?php 
    include ('../funcProfesor.php');
    $nFuncion = $_POST['IDfuncion'];
    if($nFuncion == 'desicionProyecto'){
        $_SPID = $_POST['SPID'];
        $_CPPEstatus = $_POST['desicion'];
        $_CPPObservaciones = $_POST['observaciones'];        
        //updateComision($_SPID, $_CPPEstatus, $_CPPObservaciones); //SE ACTUALIZA A LA DESICION
        //updateSolicitudProyecto($_SPID, $CPPEstatus); //SE ACTUALIZA A LA DESICION
    }else{
        echo 'n_';
    }
     //Código JavaScript para cerrar la ventana
     echo "<script>window.close();</script>";
?>