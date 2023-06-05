<?php

include ('../../conectionBD.php');

#Especiales
$idSolicitudResidencia = $_POST['idSoliRes'];
$idAsesor = $_POST['idUAsesor'];
if(empty($idSolicitudResidencia) || empty($idAsesor)){
    echo "<script>alert('Campos clave hiden vacios')</script>";
    echo"<script  language='javascript'>window.location='../AsesorInternoAlumnos.php'</script>";  
    exit();
}
#validar campos vacios
$campos = array('Portada','Resumen','Indice','Introduccion','Antecedentes','Justificacion','Objetivos','Metodologia','Resultados','Discusiones','Conclusiones','FuentesInformacion');
$campos_vacios = array();
foreach ($campos as $campo) {
    if (empty($_POST[$campo])) {
        $campos_vacios[] = $campo;
    }
}
#Inicio con el proceso una vez validado
if (!empty($campos_vacios)) {#si hay algo, significa que hay campos vacios
    echo "<script>alert('Los siguientes campos están vacíos: " . implode(', ', $campos_vacios) . "')</script>";
    echo"<script  language='javascript'>window.location='../IndexAE.php'</script>";  
    exit();
}
##################################################################################
#Si todo bien.......
$conection = conn();
$Portada = $_POST['Portada'];
$Agradecimientos  = 0;
$Resumen = $_POST['Resumen'];
$Indice = $_POST['Indice'];
$Introduccion = $_POST['Introduccion'];
$Antecedentes = $_POST['Antecedentes'];
$Justificacion = $_POST['Justificacion'];
$Objetivos = $_POST['Objetivos'];
$Metodologia = $_POST['Metodologia'];
$Resultados = $_POST['Resultados'];
$Discusiones = $_POST['Discusiones'];
$Conclusiones = $_POST['Conclusiones'];
$FuentesInformacion = $_POST['FuentesInformacion'];
$Observaciones = $_POST['Observaciones'];if(empty($Observaciones)) $Observaciones = " ";


#Total de puntos obtenidos de la evaluacion
$total = $Portada + $Agradecimientos + $Resumen + $Indice + $Introduccion + $Antecedentes + $Justificacion
+ $Objetivos + $Metodologia + $Resultados + $Discusiones + $Conclusiones + $FuentesInformacion;

#Se prepara el sql
$conectionn = conn();
$sql = "CALL InsertarEvaluacionReporteFinal($idSolicitudResidencia, $Portada, $Agradecimientos, $Resumen, $Indice, $Introduccion, $Antecedentes, $Justificacion, $Objetivos, $Metodologia, $Resultados, $Discusiones, $Conclusiones, $FuentesInformacion, $total,'$Observaciones', $idAsesor, 1)";
$query = mysqli_query($conectionn, $sql);

if (!$query) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conectionn);
} else {
    echo"<script>alert('Registro insertado exitosamente.')</script>";
	echo"<script  language='javascript'>window.location='../IndexAE.php'</script>";  
}

mysqli_close($conectionn);

?>
