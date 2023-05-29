<?php  
    include '../InicioSessionSeg.php';
    include ('funcAsesor.php');
    $idAsesor = $_POST['idAsesor'];
    $idAlumno = $_POST['idAlumno'];
    //echo $idAsesor;echo '<br>';echo $idAlumno;
    $evaluacionReporte = ObtenerEvaluacionFinal($idAsesor, $idAlumno);

    $queryAlumno = consultaUsuarioAlumno($idAlumno);
    $queryProyectoAlumno = consultaProyectoAlumno($idAlumno);
    $consultaAlumno;$consultaAlumnoProyecto;$consultaAlumnoCarrera;
    if(!($consultaAlumno = mysqli_fetch_array($queryAlumno))){echo 'error';}
    $queryProyectoCarrera = consultaCarreraAlumno($consultaAlumno['NumeroControl']);
    if(!($consultaAlumnoProyecto = mysqli_fetch_array($queryProyectoAlumno))){echo 'error';}
    if(!($consultaAlumnoCarrera = mysqli_fetch_array($queryProyectoCarrera))){echo 'error';}

    $idSolicitudResidencia = $consultaAlumnoProyecto['SRID'];

    $queryAsesor = consultaProfesorAsesor($idAsesor);
            $consultaAsesor;
            if(!($consultaAsesor = mysqli_fetch_array($queryAsesor))){echo 'error';}

?>

<!DOCTYPE html>
<html>

    <?php include ('encabezado.php'); encabezadox('Evaluacion de Reporte Final') #encabezado xd?>
    
    <form method="post">
        <div class="containerEv">
            <!-- Columna izquierda  -->
            <div class="column-Ev1">
                <label for="" class="lb-inp txtSizeEv">Información:</label>
                <label for="" class="lb-inp">Número de control:</label>
                <input type="text" name="numControl" class="lb-inp" value="<?php echo $consultaAlumno['NumeroControl']; ?>" readonly> <br>
                <label for="" class="lb-inp">Nombre del residente:</label>
                <input type="text" class="lb-inp" name="NombreResidente" value="<?php echo $consultaAlumno['NombreCompleto']; ?>" readonly> <br>
                <label for="" class="lb-inp">Nombre del Proyecto:</label>
                <input type="text" class="lb-inp" name="NombreProyecto" value="<?php echo $consultaAlumnoProyecto['SPNombreProyecto']; ?>" readonly> <br>
                <label for="" class="lb-inp">Programa Educativo:</label>
                <input type="text" class="lb-inp" name="ProgramaEducativo" value="<?php echo $consultaAlumnoCarrera['Nombre']; ?>" readonly> <br>
                <label for="" class="lb-inp">Periodo de Realización:</label>
                <input type="text" class="lb-inp" name="PeriodoRealizacion" value="<?php echo $consultaAlumnoProyecto['SRPeriodo']; ?>" readonly> <br>
                <label class="lb-inp">Nombre del Asesor Interno:</label>
                <input class="lb-inp" type="text" name="AsesorInterno" value="<?php echo $consultaAsesor['NombreCompleto']; ?>" readonly> <br>
                <label class="lb-inp">Fecha de evaluación</label>
                <input class="lb-inp" type="date" name="FechaEvaluacion" value="<?php echo date('Y-m-d'); ?>" readonly> <br>
                <label class="lb-inp">Total Puntos:</label>
                <input class="lb-inp" type="text" name="TotalPuntos" value="<?php echo $evaluacionReporte['ERFTotal'] ?>" readonly> <br>
                <?php getBotonRF(); ?> <br>
                <input class="btn btn-actualizar btn-evrf" type="submit" value="Descargar Reporte" formaction="procesos/AsesorInternoDescargarArchivo.php"> <br>  
                <input class="btn btn-actualizar btn-evrf" type="submit" value="Descargar Evaluación" formaction="../GenerarDocs/GenerarEvaluacionReporteFinal.php" target="_blank"> <br>        
            </div>
            <!-- Columna central tabla  -->
            <div class="column-Ev2">
                <table class="tb-ev">
                    <tr>
                        <th>Criterios a evaluar</th>
                        <th>Valor Máximo</th>
                        <th>Evaluación Asesor Interno</th>
                    </tr>
                    <tr>
                        <td>Portada</td>
                        <td>1</td>
                        <td><input type="number" name="Portada" min="0" max="1" step="1" value="<?php echo $evaluacionReporte['ERFPortada'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Agradecimientos</td>
                        <td>0</td>
                        <td><input type="number" name="Agradecimientos" min="0" max="0" step="1" value="<?php echo $evaluacionReporte['ERFAgradecimientos'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Resumen</td>
                        <td>2</td>
                        <td><input type="number" name="Resumen" min="0" max="2" step="1" value="<?php echo $evaluacionReporte['ERFResumen'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Índice</td>
                        <td>2</td>
                        <td><input type="number" name="Indice" min="0" max="2" step="1" value="<?php echo $evaluacionReporte['ERFIndice'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Introducción</td>
                        <td>5</td>
                        <td><input type="number" name="Introduccion" min="0" max="5" step="1" value="<?php echo $evaluacionReporte['ERFIntroduccion'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Antecedentes o marco Teórico</td>
                        <td>5</td>
                        <td><input type="number" name="Antecedentes" min="0" max="5" step="1" value="<?php echo $evaluacionReporte['ERFAntecedentes'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Justificación</td>
                        <td>5</td>
                        <td><input type="number" name="Justificacion" min="0" max="5" step="1" value="<?php echo $evaluacionReporte['ERFJustificacion'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Objetivos</td>
                        <td>10</td>
                        <td><input type="number" name="Objetivos" min="0" max="10" step="1" value="<?php echo $evaluacionReporte['ERFObjetivos'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Metodología</td>
                        <td>10</td>
                        <td><input type="number" name="Metodologia" min="0" max="10" step="1" value="<?php echo $evaluacionReporte['ERFMetodologia'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Resultados</td>
                        <td>15</td>
                        <td><input type="number" name="Resultados" min="0" max="15" step="1" value="<?php echo $evaluacionReporte['ERFResultados'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Discusiones</td>
                        <td>25</td>
                        <td><input type="number" name="Discusiones" min="0" max="25" step="1" value="<?php echo $evaluacionReporte['ERFDiscusiones'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Conclusiones</td>
                        <td>15</td>
                        <td><input type="number" name="Conclusiones" min="0" max="15" step="1" value="<?php echo $evaluacionReporte['ERFConclusiones'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Fuentes de Información</td>
                        <td>5</td>
                        <td><input type="number" name="FuentesInformacion" min="0" max="5" step="1" value="<?php echo $evaluacionReporte['ERFFuentes'] ?>"></td>
                    </tr>
                </table>
                <label class="txtSizeEvC3 mrgEvC3 lb-inp" style="color: white; font-size: 20px;" ><strong>Observaciones:</strong></label>
                <textarea name="Observaciones" id="" rows="5" style="width: 80%; margin: 10px; resize: none;"><?php echo $evaluacionReporte['ERFObservaciones'] ?></textarea>
            </div>
        
            <!-- Columna con parametros no visibles  -->
            <div>
                <input type="hidden" name="idSoliRes" value="<?php echo $idSolicitudResidencia; ?>">
                <input type="hidden" name="idUAsesor" value="<?php echo $idAsesor; ?>">
                <input type="hidden" name="idUAlumno" value="<?php echo $idAlumno; ?>">
            </div>
        </div>
    </form>
</body>
</html>