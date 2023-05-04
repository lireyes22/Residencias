<?php
    $departamento = $_POST['departamento']; 
    $noOficio = $_POST['noOficio']; 
    $fecha = $_POST['fecha']; 
    $nombProfesor = $_POST['profesor']; 
    $dia = $_POST['dia'];
    $mesBef = $_POST['mes'];
    $nombResidente = $_POST['residente']; 
    $carrera = $_POST['carrera']; 
    $nombProyecto = $_POST['proyecto']; 
    $firma = $_POST['firma']; 
    ob_start();
?>
    <?php
$nombreImagen = "target001.png";
$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
if ($mesBef == '1') {
        $mes = "ENERO";
    } else if( $mesBef == '2'){
        $mes = "FEBRERO";
    } else if( $mesBef == '3'){
        $mes = "MARZO";
    } else if( $mesBef == '4'){
        $mes = "ABRIL";
    } else if( $mesBef == '5'){
        $mes = "MAYO";
    } else if( $mesBef == '6'){
        $mes = "JUNIO";
    } else if( $mesBef == '7'){
        $mes = "JULIO";
    } else if( $mesBef == '8'){
        $mes = "AGOSTO";
    } else if( $mesBef == '9'){
        $mes = "SEPTIEMBRE";
    } else if( $mesBef == '10'){
        $mes = "OCTUBRE";
    } else if( $mesBef == '11'){
        $mes = "NOVIEMBRE";
    } else if( $mesBef == '12'){
        $mes = "DICIEMBTE";
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">
<head>
<title></title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <br/>
<style type="text/css">
<!--
	p {margin: 0; padding: 0;}	.ft10{font-size:16px;font-family:Times;color:#ff0000;}
	.ft11{font-size:14px;font-family:Times;color:#000000;}
	.ft12{font-size:9px;font-family:Times;color:#000000;}
	.ft13{font-size:13px;font-family:Times;color:#000000;}
	.ft14{font-size:9px;font-family:Times;color:#ff0000;}
	.ft15{font-size:16px;font-family:Times;color:#000000;}
	.ft16{font-size:9px;font-family:Times;color:#000000;}
	.ft17{font-size:13px;font-family:Times;color:#000000;}
	.ft18{font-size:18px;font-family:Times;color:#000000;}
	.ft19{font-size:11px;font-family:Times;color:#000000;}
	.ft110{font-size:14px;font-family:Times;color:#000000;}
	.ft111{font-size:16px;font-family:Times;color:#000000;}
	.ft112{font-size:9px;line-height:13px;font-family:Times;color:#000000;}
	.ft113{font-size:9px;line-height:14px;font-family:Times;color:#000000;}
	.ft114{font-size:9px;line-height:12px;font-family:Times;color:#000000;}
	.ft115{font-size:16px;line-height:20px;font-family:Times;color:#000000;}
	.ft116{font-size:13px;line-height:17px;font-family:Times;color:#000000;}
	.ft117{font-size:13px;line-height:16px;font-family:Times;color:#000000;}
	.ft118{font-size:13px;line-height:17px;font-family:Times;color:#000000;}
-->
</style>
</head>
<body bgcolor="#A0A0A0" vlink="blue" link="blue">
<div id="page1-div" style="position:relative;width:918px;height:1188px;">
<img width="918" height="1188" src="<?php echo $imagenBase64 ?>" alt="x"/>

<p style="position:absolute;top:59px;left:85px;white-space:nowrap" class="ft10">&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</p>
<p style="position:absolute;top:60px;left:152px;white-space:nowrap" class="ft11"><b>&#160;</b></p>
<p style="position:absolute;top:61px;left:252px;white-space:nowrap" class="ft12"><b>Nombre&#160;del&#160;formato:&#160;</b></p>
<p style="position:absolute;top:59px;left:364px;white-space:nowrap" class="ft13">Formato&#160;para&#160;Asignación&#160;de&#160;Revisor&#160;de&#160;</p>
<p style="position:absolute;top:76px;left:252px;white-space:nowrap" class="ft13">Residencias&#160;Profesionales</p>
<p style="position:absolute;top:78px;left:409px;white-space:nowrap" class="ft12"><b>&#160;</b></p>
<p style="position:absolute;top:59px;left:617px;white-space:nowrap" class="ft112"><b>Fecha&#160;de&#160;Aprobación:&#160;<br/>16&#160;Agosto&#160;2021&#160;</b></p>
<p style="position:absolute;top:92px;left:617px;white-space:nowrap" class="ft12"><b>Revisión:</b></p>
<p style="position:absolute;top:92px;left:665px;white-space:nowrap" class="ft14"><b>&#160;&#160;</b></p>
<p style="position:absolute;top:92px;left:671px;white-space:nowrap" class="ft12"><b>3&#160;</b></p>
<p style="position:absolute;top:112px;left:252px;white-space:nowrap" class="ft112"><b>Sistema&#160;Integral&#160;de&#160;Gestión:&#160;<br/>ISO&#160;9001:2015&#160;<br/>ISO&#160;14001:2015&#160;&#160;<br/>OSHAS&#160;18001:2007&#160;</b></p>
<p style="position:absolute;top:112px;left:463px;white-space:nowrap" class="ft114"><b>Referencia&#160;a&#160;la&#160;Norma:&#160;<br/>&#160;<br/>ISO&#160;9001:2015:&#160;8.1,&#160;8.2.2,&#160;<br/>8.5.1,8.6&#160;</b></p>
<p style="position:absolute;top:133px;left:617px;white-space:nowrap" class="ft12"><b>Página&#160;1&#160;de&#160;1&#160;</b></p>
<p style="position:absolute;top:170px;left:85px;white-space:nowrap" class="ft15">&#160;</p>
<p style="position:absolute;top:1108px;left:326px;white-space:nowrap" class="ft12"><b>Toda&#160;copia&#160;en&#160;PAPEL&#160;es&#160;un&#160;“Documento&#160;No&#160;Controlado”&#160;&#160;</b></p>
<p style="position:absolute;top:1124px;left:85px;white-space:nowrap" class="ft16">&#160;</p>
<p style="position:absolute;top:187px;left:85px;white-space:nowrap" class="ft17"><b>&#160;</b></p>
<p style="position:absolute;top:205px;left:85px;white-space:nowrap" class="ft18">&#160;</p>
<p style="position:absolute;top:205px;left:138px;white-space:nowrap" class="ft18">&#160;</p>
<p style="position:absolute;top:205px;left:191px;white-space:nowrap" class="ft18">&#160;</p>
<p style="position:absolute;top:205px;left:244px;white-space:nowrap" class="ft18">&#160;</p>
<p style="position:absolute;top:205px;left:297px;white-space:nowrap" class="ft18">&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</p>
<p style="position:absolute;top:230px;left:85px;white-space:nowrap" class="ft18">&#160;</p>
<p style="position:absolute;top:261px;left:722px;white-space:nowrap" class="ft19">ASUNTO</p>
<p style="position:absolute;top:259px;left:779px;white-space:nowrap" class="ft110">:&#160;</p>
<p style="position:absolute;top:260px;left:788px;white-space:nowrap" class="ft17"><b>Revisor&#160;de</b></p>
<p style="position:absolute;top:259px;left:864px;white-space:nowrap" class="ft11"><b>&#160;&#160;</b></p>
<p style="position:absolute;top:279px;left:179px;white-space:nowrap" class="ft11"><b>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</b></p>
<p style="position:absolute;top:280px;left:666px;white-space:nowrap" class="ft17"><b>&#160;Residencias&#160;Profesionales</b></p>
<p style="position:absolute;top:278px;left:860px;white-space:nowrap" class="ft111"><b>.&#160;</b></p>
<p style="position:absolute;top:299px;left:85px;white-space:nowrap" class="ft115"><b>&#160;<br/></b>&#160;</p>
<p style="position:absolute;top:340px;left:788px;white-space:nowrap" class="ft110">FECHA<b><?php echo $fecha ?>&#160;&#160;</b></p>
<p style="position:absolute;top:365px;left:85px;white-space:nowrap" class="ft110">&#160;</p>
<p style="position:absolute;top:389px;left:85px;white-space:nowrap" class="ft118"><b>C.&#160;<?php echo $nombProfesor ?>&#160;&#160;&#160;<br/>CATEDRATICO&#160;DEL&#160;INSTITUTO&#160;TECNOLOGICO&#160;DE&#160;&#160;CHETUMAL&#160;<br/>P&#160;R&#160;E&#160;S&#160;E&#160;N&#160;T&#160;&#160;E.&#160;<br/></b>&#160;<br/>&#160;<br/>Por&#160;&#160;este&#160;&#160;conducto&#160;&#160;solicito&#160;&#160;a&#160;&#160;usted&#160;&#160;tenga&#160;&#160;a&#160;&#160;bien&#160;&#160;revisar&#160;&#160;el&#160;&#160;informe&#160;&#160;técnico&#160;&#160;de&#160;&#160;Residencia&#160;&#160;Profesional&#160;&#160;que&#160;&#160;se&#160;<br/>acompaña,&#160;emitiendo&#160;su&#160;aprobación&#160;o&#160;bien,&#160;señalando&#160;las&#160;observaciones&#160;que&#160;considere&#160;pertinentes&#160;para&#160;mejorar&#160;la&#160;<br/>calidad&#160;del&#160;mismo.&#160;&#160;Asimismo,&#160;le&#160;informo&#160;que&#160;la&#160;fecha&#160;límite&#160;para&#160;la&#160;entrega&#160;de&#160;dicha&#160;revisión&#160;es&#160;el&#160;día&#160;____<?php echo $dia ?>___de&#160;<br/>_____<?php echo $mes ?>_________del&#160;presente&#160;año.&#160;</p>
<p style="position:absolute;top:554px;left:85px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:572px;left:90px;white-space:nowrap" class="ft13">a)&#160;Nombre&#160;&#160;del&#160;&#160;Residente:&#160;</p>
<p style="position:absolute;top:572px;left:306px;white-space:nowrap" class="ft13"><?php echo $nombResidente ?>&#160;</p>
<p style="position:absolute;top:598px;left:306px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:624px;left:90px;white-space:nowrap" class="ft13">b)&#160;Carrera:&#160;</p>
<p style="position:absolute;top:624px;left:306px;white-space:nowrap" class="ft13"><?php echo $carrera ?>&#160;</p>
<p style="position:absolute;top:650px;left:306px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:677px;left:90px;white-space:nowrap" class="ft13">c)&#160;Nombre&#160;del&#160;Proyecto:&#160;&#160;&#160;&#160;</p>
<p style="position:absolute;top:677px;left:306px;white-space:nowrap" class="ft13"><?php echo $nombProyecto ?>&#160;</p>
<p style="position:absolute;top:703px;left:306px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:729px;left:85px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:755px;left:85px;white-space:nowrap" class="ft118">Agradezco&#160;de&#160;antemano&#160;su&#160;valioso&#160;apoyo&#160;en&#160;esta&#160;importante&#160;actividad&#160;para&#160;la&#160;formación&#160;profesional&#160;de&#160;nuestro&#160;<br/>estudiantado.&#160;</p>
<p style="position:absolute;top:799px;left:85px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:825px;left:85px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:852px;left:85px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:875px;left:404px;white-space:nowrap" class="ft13">“A&#160;t&#160;e&#160;n&#160;t&#160;a&#160;m&#160;e&#160;n&#160;t&#160;e”.&#160;</p>
<p style="position:absolute;top:895px;left:322px;white-space:nowrap" class="ft13">JEFE(A)&#160;DE&#160;DEPARTAMENTO&#160;ACADÉMICO&#160;</p>
<p style="position:absolute;top:912px;left:475px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:929px;left:461px;white-space:nowrap" class="ft13"><?php echo $firma ?>&#160;</p>
<p style="position:absolute;top:947px;left:475px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:964px;left:85px;white-space:nowrap" class="ft118">&#160;<br/>C.c.p.&#160;Coordinación&#160;de&#160;Carrera&#160;</p>
<p style="position:absolute;top:981px;left:475px;white-space:nowrap" class="ft13">&#160;</p>
<p style="position:absolute;top:999px;left:85px;white-space:nowrap" class="ft13">C.c.p.&#160;Expediente&#160;&#160;</p>
<p style="position:absolute;top:217px;left:651px;white-space:nowrap" class="ft19">Departamento:&#160;&#160;<?php echo $departamento ?></p>
<p style="position:absolute;top:209px;left:761px;white-space:nowrap" class="ft15">&#160;</p>
<p style="position:absolute;top:230px;left:651px;white-space:nowrap" class="ft19">No.&#160;De&#160;Oficio:&#160;&#160;<?php echo $noOficio ?>&#160;&#160;</p>
</div>
</body>
</html>

<?php 
    $doc = ob_get_clean();
    echo $doc;
    /*
    require_once '../../lib/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($doc);
    $dompdf->setPaper(array(0,0,750,990));
    $dompdf->render();
    $dompdf->stream("comision_.pdf",array("Attachment"=>false));
    */
?>
