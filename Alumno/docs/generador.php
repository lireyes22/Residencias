<?php
  // Recibir los valores $_POST y asignarlos a las variables correspondientes
  $a1 = $_POST['1'] ?? null;
  $a2 = $_POST['2'] ?? null;
  $a3 = $_POST['3'] ?? null;
  $a4 = $_POST['4'] ?? null;
  $a5 = $_POST['5'] ?? null;
  $a6 = $_POST['6'] ?? null;
  $a7 = $_POST['7'] ?? null;
  $a8 = $_POST['8'] ?? null;
  $a9 = $_POST['9'] ?? null;
  $a10 = $_POST['10'] ?? null;
  $a11 = $_POST['11'] ?? null;
  $a12 = $_POST['12'] ?? null;
  $a13 = $_POST['13'] ?? null;
  $a14 = $_POST['14'] ?? null;
  $a15 = $_POST['15'] ?? null;
  $a16 = $_POST['16'] ?? null;
  $a17 = $_POST['17'] ?? null;
  $a18 = $_POST['18'] ?? null;
  $a19 = $_POST['19'] ?? null;
  $a20 = $_POST['20'] ?? null;
  $a21 = $_POST['21'] ?? null;
  $a22 = $_POST['22'] ?? null;
  $a23 = $_POST['23'] ?? null;
  $a24 = $_POST['24'] ?? null;
  $a25 = $_POST['25'] ?? null;
  $a26 = $_POST['26'] ?? null;
  $a27 = $_POST['27'] ?? null;
  $a28 = $_POST['28'] ?? null;
  $a29 = $_POST['29'] ?? null;
  $a30 = $_POST['30'] ?? null;
  $a31 = $_POST['31'] ?? null;
  $a32 = $_POST['32'] ?? null;
  $a33 = $_POST['33'] ?? null;
  $a34 = $_POST['34'] ?? null;
  $a35 = $_POST['35'] ?? null;
  $b35 = $_POST['b35'] ?? null;
  $a36 = $_POST['36'] ?? null;

ob_start(); //PARA GUARDAR TODO EL CONTENIDO PHP A CONTINUACION EN UNA VARIABLE
$nombreImagen = "solicitudBG.png";
$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen)); //PARA PODER VISUALIZAR LA IMAGEN
include("solicitud.php"); //AQUI SE ENCUENTRA EL CODIGO GENERADO DE EL PDF
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