<?php
    include ('../funcProfesor.php');
    $nFuncion = $_POST['IDfuncion'];
    echo ''.$nFuncion.'';
    $message = 'REALIZADO';
    if($nFuncion == 'desicionProyecto'){
        try{
        $_SPID = $_POST['SPID'];
        echo $_SPID;
        if(revision($_SPID) == 'REVISION'){
        $_CPPEstatus = $_POST['desicion'];
        echo $_CPPEstatus;
        $_CPPObservaciones = $_POST['observaciones'];
        echo $_CPPObservaciones;        
        updateComision($_SPID, $_CPPEstatus, $_CPPObservaciones); //SE ACTUALIZA A LA DESICION
        updateSolicitudProyecto($_SPID, $_CPPEstatus); //SE ACTUALIZA A LA DESICION
        $existe = existeBanco($_SPID);
        if($_CPPEstatus == 'ACEPTADO'){
            cargarBanco($_SPID); //SE SUBE AL BANCO SI FUE ACEPTADO
        
        }else{
            $message = "Este proyecto ya ha sido revisado... Recargue la pagina. :)";    
        }
    }        
    }catch(Exception $e){
        $message = "Ocurrio un error - ".$e;
    }
    ?>
        <script>alert('<?php echo $message; ?>')</script>
    <?php
    }else{
        echo 'n_';
    } 
    //Código JavaScript para cerrar la ventana
    echo "<script>window.close();</script>";
?>