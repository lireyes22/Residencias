<?php
    include_once('tbs_class.php'); 
    include_once('plugins/tbs_plugin_opentbs.php'); 

    $TBS = new clsTinyButStrong; 
    $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); 

    //Parametros
    $nomResidente = 'Emiliano Reyes Andrade';
    $noControl = '20390300';
    $primerP1 = "1";
    $primerP2 = "2";
    $primerP3 = "3";
    $primerP4 = "4";
    $primerP5 = "5";
    $primerP6 = "6";
    $primerP7 = "7";
    $primerP8 = "8";
    $primerP9 = "9";
    $primerPF = "10";

    //Cargando template
    $template = 'templates/Evaluacion_Seguimiento.docx';
    $TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
    
    //Escribir Nuevos campos
    $TBS->MergeField('eva.nombreResidente', $nomResidente);
    $TBS->MergeField('eva.noControl', $noControl);
    $TBS->MergeField('eva.E1P1', $primerP1);
    $TBS->MergeField('eva.E1P2', $primerP2);
    $TBS->MergeField('eva.E1P3', $primerP3);
    $TBS->MergeField('eva.E1P4', $primerP4);
    $TBS->MergeField('eva.E1P5', $primerP5);
    $TBS->MergeField('eva.E1P6', $primerP6);
    $TBS->MergeField('eva.E1P7', $primerP7);
    $TBS->MergeField('eva.E1P8', $primerP8);
    $TBS->MergeField('eva.E1P9', $primerP9);
    $TBS->MergeField('eva.E1PF', $primerPF);
    /*$TBS->MergeField('eva.2P1', $primerP1);
    $TBS->MergeField('eva.2P2', $primerP2);
    $TBS->MergeField('eva.2P3', $primerP3);
    $TBS->MergeField('eva.2P4', $primerP4);
    $TBS->MergeField('eva.2P5', $primerP5);
    $TBS->MergeField('eva.2P6', $primerP6);
    $TBS->MergeField('eva.2P7', $primerP7);
    $TBS->MergeField('eva.2P8', $primerP8);
    $TBS->MergeField('eva.2P9', $primerP9);
    $TBS->MergeField('eva.2PF', $primerPF);*/

    //$TBS->VarRef['x'] = $firmadecano;

    $TBS->PlugIn(OPENTBS_DELETE_COMMENTS);

    $save_as = (isset($_POST['save_as']) && (trim($_POST['save_as'])!=='') && ($_SERVER['SERVER_NAME']=='localhost')) ? trim($_POST['save_as']) : '';
    $output_file_name = str_replace('.', '_'.date('Y-m-d').$save_as.'.', $template);
    if ($save_as==='') {
        $TBS->Show(OPENTBS_DOWNLOAD, $output_file_name); 
        exit();
    } else {
        $TBS->Show(OPENTBS_FILE, $output_file_name);
        exit("File [$output_file_name] has been created.");
    }
?>