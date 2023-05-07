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
    }else if($nFuncion == 'reAsignacion'){
        $message = "Realizado.";
        try{
        $rBPID = $_POST['BPID'];
        $rCAPeriodo = $_POST['periodo'];
        $RFCProfesor = $_POST['docente'];
        $rRazon = $_POST['razon'];
        $UID = mysqli_fetch_array(UProfesor($RFCProfesor));
        $AIID = mysqli_fetch_array(esAsesor($UID[0]));
        if( empty($AIID)){ //REVISAMOS SI EXISTE EN LA TABLA DE ASESORES
            insertAsesor($UID[0]); //SI NO EXISTE LO AGREGAMOS
            $AIID = mysqli_fetch_array(esAsesor($UID[0]));
        }
        insertComisionAsesor($UID[0], $rBPID, $rCAPeriodo, $rRazon); //GENERAMOS UNA COMISION DE ASESOR
        nuevoAsesor($rBPID, $AIID[0]); //ACTUALIZAMOS EL BANCO AL NUEVO ASESOR, YA QUE ESTA ES UNA FUNCION PARA REASIGNACION
        }catch(Exception $e){
            $message = "Ocurrio un error - ".$e;
        }?>
        <script>alert('<?php echo $message; ?>')</script>
        <?php
    }else if($nFuncion == 'asignacion'){
        $rRazon = '';
        $rBPID = $_POST['BPID'];
        $rCAPeriodo = $_POST['periodo'];
        $RFCProfesor = $_POST['docente'];
        $UID = mysqli_fetch_array(UProfesor($RFCProfesor));
        $AIID = mysqli_fetch_array(esAsesor($UID[0]));
        if( empty($AIID)){ //REVISAMOS SI EXISTE EN LA TABLA DE ASESORES
            insertAsesor($UID[0]); //SI NO EXISTE LO AGREGAMOS
            $AIID = mysqli_fetch_array(esAsesor($UID[0]));//OBTENEMOS EL AIID CREADO
        }
        insertComisionAsesor($UID[0], $rBPID, $rCAPeriodo, $rRazon); //GENERAMOS UNA COMISION DE ASESOR
        nuevoAsesor($rBPID, $AIID[0]); //ACTUALIZAMOS EL BANCO AL ASESOR SELECCIONADO
        ?>
            <script>alert('<?php echo $message; ?>')</script>
        <?php
    }  
    //Código JavaScript para cerrar la ventana
   echo "<script>window.close();</script>";
?>