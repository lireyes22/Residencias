<?php
    include('plugins/tbs_plugin_opentbs.php');
    include('tbs_class.php');
    include('funcionesGD.php');

    $idAlumno = $_POST['idUAlumno'];
    #echo $idAlumno.'<br>';
    
    #Evaluaciones Del Asesor Interno
    $ParcialUnoAI = consultaEvaluacionSeguimiento($idAlumno, 1, 0);
    $ParcialDosAI = consultaEvaluacionSeguimiento($idAlumno, 2, 0);
    #Evaluaciones Del Asesor Externo
    $ParcialUnoAE = consultaEvaluacionSeguimiento($idAlumno, 1, 1);
    $ParcialDosAE = consultaEvaluacionSeguimiento($idAlumno, 2, 1);
    #Datos del alumno
    $consultaAlumno = mysqli_fetch_array(consultaUsuarioAlumno($idAlumno));
    $consultaAlumnoCarrera = mysqli_fetch_array(consultaCarreraAlumno($consultaAlumno['NumeroControl']));
    #ProyectoXAlumno
    $consultaAlumnoProyecto = mysqli_fetch_array(consultaProyectoAlumno($idAlumno));

    #AsesoresDatos
    $idsAsesores = AsesoresxAlumnoIDS($idAlumno);
    #echo $idsAsesores;
    echo $idsAsesores['AIID'].','.$idsAsesores['AEID'].'<br>';
    if(empty($idsAsesores['AIID']) || empty($idsAsesores['AEID']) ){
        echo"<script>alert('No se han asignado todos los asesores')</script>";
        if(!empty($_POST['redireccionar'])){
            echo"<script  language='javascript'>window.location='".$_POST['redireccionar']."'</script>";  
        }else echo"<script  language='javascript'>window.close()</script>";  
    }
    $AsesorInterno = ProfesorxAsesorI($idsAsesores['AIID']);
    $AsesorExterno = ProfesorxAsesorE($idsAsesores['AEID']);

    #echo implode(',',$consultaEvReporteFinalInterno);

    #Cargar el documento
    $template = 'templates/EvaluacionSeguimiento.docx';
    $TBS = new clsTinyButStrong;
    $TBS -> PlugIn(TBS_INSTALL, OPENTBS_PLUGIN);
    $TBS -> LoadTemplate($template, OPENTBS_ALREADY_UTF8); 
    
    #Poner datos de alumno
    $TBS->MergeField('EvaNoCon',$consultaAlumno['NumeroControl']);
    $TBS->MergeField('EvaNombreResidente',$consultaAlumno['NombreCompleto']);
    $TBS->MergeField('EvaProgramaEducativo',$consultaAlumnoCarrera['Nombre']);

    #Poner nombre del proyecto y periodo
    $TBS->MergeField('EvaNombreProyecto',$consultaAlumnoProyecto['SPNombreProyecto']);
    $TBS->MergeField('EvaPeriodoResidencia',$consultaAlumnoProyecto['SRPeriodo']);

    #Poner Evaluacion Seguimiento Parcial 1 Asesor Interno
    $TBS->MergeField('EvaP1I1',$ParcialUnoAI['ERPuntualidad']);
    $TBS->MergeField('EvaP1I2',$ParcialUnoAI['ERConocimiento']);
    $TBS->MergeField('EvaP1I3',$ParcialUnoAI['ERTrabajoEquipo']);
    $TBS->MergeField('EvaP1I4',$ParcialUnoAI['ERDedicacion']);
    $TBS->MergeField('EvaP1I5',$ParcialUnoAI['EROrdenado']);
    $TBS->MergeField('EvaP1I6',$ParcialUnoAI['ERDaMejoras']);
    $TBS->MergeField('EvaP1IT',$ParcialUnoAI['ERCalificacion']);
    #Poner Evaluacion Seguimiento Parcial 2 Asesor Interno
    $TBS->MergeField('EvaP2I1',$ParcialDosAI['ERPuntualidad']);
    $TBS->MergeField('EvaP2I2',$ParcialDosAI['ERConocimiento']);
    $TBS->MergeField('EvaP2I3',$ParcialDosAI['ERTrabajoEquipo']);
    $TBS->MergeField('EvaP2I4',$ParcialDosAI['ERDedicacion']);
    $TBS->MergeField('EvaP2I5',$ParcialDosAI['EROrdenado']);
    $TBS->MergeField('EvaP2I6',$ParcialDosAI['ERDaMejoras']);
    $TBS->MergeField('EvaP2IT',$ParcialDosAI['ERCalificacion']);

    #Poner Evaluacion Seguimiento Parcial 1 Asesor Externo
    $TBS->MergeField('EvaP1E1',$ParcialUnoAE['ERPuntualidad']);
    $TBS->MergeField('EvaP1E2',$ParcialUnoAE['ERTrabajoEquipo']);
    $TBS->MergeField('EvaP1E3',$ParcialUnoAE['ERDedicacion']);
    $TBS->MergeField('EvaP1E4',$ParcialUnoAE['ERDaMejoras']);
    $TBS->MergeField('EvaP1E5',$ParcialUnoAE['ERCumpleObjetivos']);
    $TBS->MergeField('EvaP1E6',$ParcialUnoAE['EROrdenado']);
    $TBS->MergeField('EvaP1E7',$ParcialUnoAE['ERLiderazgo']);
    $TBS->MergeField('EvaP1E8',$ParcialUnoAE['ERConocimiento']);
    $TBS->MergeField('EvaP1E9',$ParcialUnoAE['ERComportamiento']);
    $TBS->MergeField('EvaP1ET',$ParcialUnoAE['ERCalificacion']);
    #Poner Evaluacion Seguimiento Parcial 2 Asesor Externo
    $TBS->MergeField('EvaP2E1',$ParcialDosAE['ERPuntualidad']);
    $TBS->MergeField('EvaP2E2',$ParcialDosAE['ERTrabajoEquipo']);
    $TBS->MergeField('EvaP2E3',$ParcialDosAE['ERDedicacion']);
    $TBS->MergeField('EvaP2E4',$ParcialDosAE['ERDaMejoras']);
    $TBS->MergeField('EvaP2E5',$ParcialDosAE['ERCumpleObjetivos']);
    $TBS->MergeField('EvaP2E6',$ParcialDosAE['EROrdenado']);
    $TBS->MergeField('EvaP2E7',$ParcialDosAE['ERLiderazgo']);
    $TBS->MergeField('EvaP2E8',$ParcialDosAE['ERConocimiento']);
    $TBS->MergeField('EvaP2E9',$ParcialDosAE['ERComportamiento']);
    $TBS->MergeField('EvaP2ET',$ParcialDosAE['ERCalificacion']);

    #Fechas
    $TBS->MergeField('EvaP1IFecha',$ParcialUnoAI['ERFecha']);
    $TBS->MergeField('EvaP2IFecha',$ParcialDosAI['ERFecha']);
    $TBS->MergeField('EvaP1EFecha',$ParcialUnoAE['ERFecha']);
    $TBS->MergeField('EvaP2EFecha',$ParcialDosAE['ERFecha']);

    #Calificaciones promedio
    $CalificacionParcialUnoAE = $ParcialUnoAE['ERCalificacion'];
    $CalificacionParcialDosAE = $ParcialDosAE['ERCalificacion'];
    $CalificacionParcialUnoAI = $ParcialUnoAI['ERCalificacion'];
    $CalificacionParcialDosAI = $ParcialDosAI['ERCalificacion'];
    #calculos
    $PromedioParcialUno = (($CalificacionParcialUnoAI+$CalificacionParcialUnoAE)/2)*0.10;
    $PromedioParcialDos = (($CalificacionParcialDosAI+$CalificacionParcialDosAE)/2)*0.10;
    $PromedioTotal = $PromedioParcialUno+$PromedioParcialDos;
    $TBS->MergeField('EvaP1Cal',$PromedioParcialUno);
    $TBS->MergeField('EvaP2Cal',$PromedioParcialDos);
    $TBS->MergeField('EvaCalTotal',$PromedioTotal);
    
    #Informacion de los asesores
    $TBS->MergeField('AsesorExterno',$AsesorExterno['AENombre']);
    $TBS->MergeField('AsesorInterno',$AsesorInterno['NombreCompleto']);

    #Observaciones
    $ObservacionesInterno = $ParcialUnoAI['ERObservaciones'];
    if(!empty($ObservacionesInterno)){
        $ObservacionesInterno = $ObservacionesInterno.'. ';
    }
    $ObservacionesInterno = $ObservacionesInterno . $ParcialDosAI['ERObservaciones'];
    $ObservacionesExterno = $ParcialUnoAE['ERObservaciones'];
    if(!empty($ObservacionesExterno)){
        $ObservacionesExterno = $ObservacionesExterno . '. ';
    }
    $ObservacionesExterno = $ObservacionesExterno . $ParcialDosAE['ERObservaciones'];

    $TBS->MergeField('InternoObs',$ObservacionesInterno);
    $TBS->MergeField('ExternoObs',$ObservacionesExterno);

    #Generar documento
    $TBS->PlugIn(OPENTBS_DELETE_COMMENTS);
    $FileName = 'EvaluacionSeguimiento.docx';
    $TBS->Show(OPENTBS_DOWNLOAD, $FileName);
    exit();
?>