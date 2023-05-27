<?php
    include('plugins/tbs_plugin_opentbs.php');
    include('tbs_class.php');
    include('funcionesGD.php');

    $idAlumno = $_POST['idUAlumno'];
    echo $idAlumno.'<br>';
    
    $consultaEvReporteFinalInterno = ObtenerEvaluacionFinal($idAlumno, 0);

    #echo implode(',',$consultaEvReporteFinalInterno);
    


    #Cargar el documento
    $template = 'templates/EvaluacionReporteFinal.docx';
    $TBS = new clsTinyButStrong;
    $TBS -> PlugIn(TBS_INSTALL, OPENTBS_PLUGIN);
    $TBS -> LoadTemplate($template, OPENTBS_ALREADY_UTF8); 
    
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
    $TBS->MergeField('EvaI14',$consultaEvReporteFinalInterno['ERFTotal']);

    $TBS->PlugIn(OPENTBS_DELETE_COMMENTS);
    
    $FileName = 'EvaluacionReporteFinal.docx';
    $TBS->Show(OPENTBS_DOWNLOAD, $FileName);
    #exit();
?>