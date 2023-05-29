<?php
    include('plugins/tbs_plugin_opentbs.php');
    include('tbs_class.php');
    include('funcionesGD.php');

    $idAlumno = $_POST['idUAlumno'];
    echo $idAlumno.'<br>';
    
    #Evaluaciones de los asesores
    $consultaEvReporteFinalExterno = ObtenerEvaluacionFinal($idAlumno, 1);
    $consultaEvReporteFinalInterno = ObtenerEvaluacionFinal($idAlumno, 0);
    #Datos del alumno
    $consultaAlumno = mysqli_fetch_array(consultaUsuarioAlumno($idAlumno));
    $consultaAlumnoCarrera = mysqli_fetch_array(consultaCarreraAlumno($consultaAlumno['NumeroControl']));
    #ProyectoXAlumno
    $consultaAlumnoProyecto = mysqli_fetch_array(consultaProyectoAlumno($idAlumno));
    #AsesoresDatos
    $idsAsesores = AsesoresxAlumnoIDS($idAlumno);
    echo $idsAsesores['AIID'].','.$idsAsesores['AEID'];
    $AsesorInterno = ProfesorxAsesorI($idsAsesores['AIID']);
    $AsesorExterno = ProfesorxAsesorE($idsAsesores['AEID']);
    #echo implode(',',$consultaEvReporteFinalInterno);

    #Cargar el documento
    $template = 'templates/EvaluacionReporteFinal.docx';
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

    #Poner datos evaluacion AsesorInterno
    $TBS->MergeField('EvaI1',$consultaEvReporteFinalInterno['ERFPortada']);
    $TBS->MergeField('EvaI2',$consultaEvReporteFinalInterno['ERFAgradecimientos']);
    $TBS->MergeField('EvaI3',$consultaEvReporteFinalInterno['ERFResumen']);
    $TBS->MergeField('EvaI4',$consultaEvReporteFinalInterno['ERFIndice']);
    $TBS->MergeField('EvaI5',$consultaEvReporteFinalInterno['ERFIntroduccion']);
    $TBS->MergeField('EvaI6',$consultaEvReporteFinalInterno['ERFAntecedentes']);
    $TBS->MergeField('EvaI7',$consultaEvReporteFinalInterno['ERFJustificacion']);
    $TBS->MergeField('EvaI8',$consultaEvReporteFinalInterno['ERFObjetivos']);
    $TBS->MergeField('EvaI9',$consultaEvReporteFinalInterno['ERFMetodologia']);
    $TBS->MergeField('EvaI10',$consultaEvReporteFinalInterno['ERFResultados']);
    $TBS->MergeField('EvaI11',$consultaEvReporteFinalInterno['ERFDiscusiones']);
    $TBS->MergeField('EvaI12',$consultaEvReporteFinalInterno['ERFConclusiones']);
    $TBS->MergeField('EvaI13',$consultaEvReporteFinalInterno['ERFFuentes']);
    $TBS->MergeField('EvaITotal',$consultaEvReporteFinalInterno['ERFTotal']);

    #Poner datos evaluacion AsesorExterno
    $TBS->MergeField('EvaE1',$consultaEvReporteFinalExterno['ERFPortada']);
    $TBS->MergeField('EvaE2',$consultaEvReporteFinalExterno['ERFAgradecimientos']);
    $TBS->MergeField('EvaE3',$consultaEvReporteFinalExterno['ERFResumen']);
    $TBS->MergeField('EvaE4',$consultaEvReporteFinalExterno['ERFIndice']);
    $TBS->MergeField('EvaE5',$consultaEvReporteFinalExterno['ERFIntroduccion']);
    $TBS->MergeField('EvaE6',$consultaEvReporteFinalExterno['ERFAntecedentes']);
    $TBS->MergeField('EvaE7',$consultaEvReporteFinalExterno['ERFJustificacion']);
    $TBS->MergeField('EvaE8',$consultaEvReporteFinalExterno['ERFObjetivos']);
    $TBS->MergeField('EvaE9',$consultaEvReporteFinalExterno['ERFMetodologia']);
    $TBS->MergeField('EvaE10',$consultaEvReporteFinalExterno['ERFResultados']);
    $TBS->MergeField('EvaE11',$consultaEvReporteFinalExterno['ERFDiscusiones']);
    $TBS->MergeField('EvaE12',$consultaEvReporteFinalExterno['ERFConclusiones']);
    $TBS->MergeField('EvaE13',$consultaEvReporteFinalExterno['ERFFuentes']);
    $TBS->MergeField('EvaETotal',$consultaEvReporteFinalExterno['ERFTotal']);

    #Informacion de los asesores
    $TBS->MergeField('AsesorExterno',$AsesorExterno['AENombre']);
    $TBS->MergeField('AsesorInterno',$AsesorInterno['NombreCompleto']);

    #Fechas
    $TBS->MergeField('FechaUno',$consultaEvReporteFinalInterno['ERFecha']);
    $TBS->MergeField('FechaDos',$consultaEvReporteFinalExterno['ERFecha']);

    #Observaciones
    $observaciones = $consultaEvReporteFinalInterno['ERFObservaciones'];
    if(!empty($observaciones)){
        $observaciones = $observaciones.'. ';
    }
    $observaciones = $observaciones . $consultaEvReporteFinalExterno['ERFObservaciones'];
    $TBS->MergeField('EvaObservaciones',$observaciones);

    #Promedio final
    $PromedioFinal = ($consultaEvReporteFinalInterno['ERFTotal'] + $consultaEvReporteFinalExterno['ERFTotal']) / 2;
    $TBS->MergeField('EvaPromedioFinal',$PromedioFinal);

    $TBS->PlugIn(OPENTBS_DELETE_COMMENTS);
    
    $FileName = 'EvaluacionReporteFinal.docx';
    $TBS->Show(OPENTBS_DOWNLOAD, $FileName);
    #exit();
?>