<?php
  // Recibir los valores $_POST y asignarlos a las variables correspondientes
  
  //$a1 = $_POST['1'] ?? null; Ejemplo
  

ob_start(); //PARA GUARDAR TODO EL CONTENIDO PHP A CONTINUACION EN UNA VARIABLE
$nombreImagen = "ReporteParcialBG.png";
$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen)); //PARA PODER VISUALIZAR LA IMAGEN
include("ReporteParcial.php"); //AQUI SE ENCUENTRA EL CODIGO GENERADO DE EL PDF
$doc = ob_get_clean(); //SE DEJA DE LEER EL CODIGO HTML Y SE GUARDA EN $doc
    //echo $doc; //CON ESTE ECHO SE PUEDE VER QUE ES LO QUE SE GUARDO
    require_once '../../lib/dompdf/autoload.inc.php'; //LIBRERIA (CHEQUEN BIEN LA RUTA)
    use Dompdf\Dompdf;
    $dompdf = new Dompdf(); //INSTANCIA

    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true)); //FALSE SI LO QUEREMOS GUARDAR
    $dompdf->setOptions($options);

    $dompdf->loadHtml($doc); //CARGAMOS EL DOCUMENTO
    $dompdf->setPaper(array(0,0,750,990)); //DIMENSIONES DE LA PAGINA
    $dompdf->render();
    $dompdf->stream("comision_.pdf",array("Attachment"=>false)); //NOMBRE DEL DOCUMENTO
    
?>