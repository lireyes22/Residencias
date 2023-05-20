<?php 
    include ('funcAsesorE.php');
    $idAsesor = $_POST['idAsesor'];
    $idAlumno = $_POST['idAlumno'];
    //echo $idAsesor;echo '<br>';echo $idAlumno;
    $evaluacionReporte = ObtenerEvaluacionFinal($idAsesor, $idAlumno);

?>

<!DOCTYPE html>
<html>

    <?php include ('encabezado.php'); encabezadox('Evaluacion Reporte Final') #encabezado xd?>

    <form method="post">
        <?php 
            $queryAlumno = consultaUsuarioAlumno($idAlumno);
            $queryProyectoAlumno = consultaProyectoAlumno($idAlumno);
            $consultaAlumno;$consultaAlumnoProyecto;$consultaAlumnoCarrera;
            if(!($consultaAlumno = mysqli_fetch_array($queryAlumno))){echo 'error';}
            $queryProyectoCarrera = consultaCarreraAlumno($consultaAlumno['NumeroControl']);
            if(!($consultaAlumnoProyecto = mysqli_fetch_array($queryProyectoAlumno))){echo 'error';}
            if(!($consultaAlumnoCarrera = mysqli_fetch_array($queryProyectoCarrera))){echo 'error';}
            $idSolicitudResidencia = $consultaAlumnoProyecto['SRID'];
        ?>
        <div class="containerEv">
            <!-- Columna izquierda  -->
            <div class="column-Ev1">
                <label for="" class="lb-inp txtSizeEv">Información:</label>
                <label for="" class="lb-inp">Numero de control:</label> <br>
                <input type="text" name="numControl" class="lb-inp" value="<?php echo $consultaAlumno['NumeroControl']; ?>" disabled> <br>
                <label for="" class="lb-inp">Nombre del residente:</label> <br>
                <input type="text" class="lb-inp" name="NombreResidente" value="<?php echo $consultaAlumno['NombreCompleto']; ?>" disabled> <br>
                <label for="" class="lb-inp">Nombre del Proyecto:</label> <br>
                <input type="text" class="lb-inp" name="NombreProyecto" value="<?php echo $consultaAlumnoProyecto['SPNombreProyecto']; ?>" disabled> <br>
                <label for="" class="lb-inp">Programa Educativo:</label> <br>
                <input type="text" class="lb-inp" name="ProgramaEducativo" value="<?php echo $consultaAlumnoCarrera['Nombre']; ?>" disabled> <br>
                <label for="" class="lb-inp">Periodo de Realizacion:</label> <br>
                <input type="text" class="lb-inp" name="PeriodoRealizacion" value="<?php echo $consultaAlumnoProyecto['SRPeriodo']; ?>" disabled> <br>
                <input type="submit" value="Guardar Cambios" class="lb-inp btnEnviarEv" formaction="procesos/AsesorExternoGuardarEvReporte.php">
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
                        <td><input type="number" name="Portada" min="0" max="1" step="1" value="<?php echo $evaluacionReporte['ERFPortada'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Agradecimientos</td>
                        <td>0</td>
                        <td><input type="number" name="Agradecimientos" min="0" max="0" step="1" value="<?php echo $evaluacionReporte['ERFAgradecimientos'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Resumen</td>
                        <td>2</td>
                        <td><input type="number" name="Resumen" min="0" max="2" step="1" value="<?php echo $evaluacionReporte['ERFResumen'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Índice</td>
                        <td>2</td>
                        <td><input type="number" name="Indice" min="0" max="2" step="1" value="<?php echo $evaluacionReporte['ERFIndice'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Introducción</td>
                        <td>5</td>
                        <td><input type="number" name="Introduccion" min="0" max="5" step="1" value="<?php echo $evaluacionReporte['ERFIntroduccion'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Antecedentes o marco Teórico</td>
                        <td>5</td>
                        <td><input type="number" name="Antecedentes" min="0" max="5" step="1" value="<?php echo $evaluacionReporte['ERFAntecedentes'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Justificación</td>
                        <td>5</td>
                        <td><input type="number" name="Justificacion" min="0" max="5" step="1" value="<?php echo $evaluacionReporte['ERFJustificacion'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Objetivos</td>
                        <td>10</td>
                        <td><input type="number" name="Objetivos" min="0" max="10" step="1" value="<?php echo $evaluacionReporte['ERFObjetivos'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Metodología</td>
                        <td>10</td>
                        <td><input type="number" name="Metodologia" min="0" max="10" step="1" value="<?php echo $evaluacionReporte['ERFMetodologia'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Resultados</td>
                        <td>15</td>
                        <td><input type="number" name="Resultados" min="0" max="15" step="1" value="<?php echo $evaluacionReporte['ERFResultados'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Discusiones</td>
                        <td>25</td>
                        <td><input type="number" name="Discusiones" min="0" max="25" step="1" value="<?php echo $evaluacionReporte['ERFDiscusiones'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Conclusiones</td>
                        <td>15</td>
                        <td><input type="number" name="Conclusiones" min="0" max="15" step="1" value="<?php echo $evaluacionReporte['ERFConclusiones'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Fuentes de Información</td>
                        <td>5</td>
                        <td><input type="number" name="FuentesInformacion" min="0" max="5" step="1" value="<?php echo $evaluacionReporte['ERFFuentes'] ?>" required></td>
                    </tr>
                </table>
                <label class="txtSizeEvC3 mrgEvC3 lb-inp" style="color: white; font-size: 20px;" ><strong>Observaciones:</strong></label>
                <textarea name="Observaciones" id="" rows="5" style="width: 80%; margin: 10px; resize: none;" required><?php echo $evaluacionReporte['ERFObservaciones'] ?></textarea>
            </div>
            <!-- Columna derecha  -->
            <div class="column-Ev3">
                <?php 
                    $queryAsesor = consultaProfesorAsesor($idAsesor);
                    $consultaAsesor;
                    if(!($consultaAsesor = mysqli_fetch_array($queryAsesor))){echo 'error';}
                ?>
                <label class="txtSizeEvC3 mrgEvC3 lb-inp">Nombre del Asesor Interno:</label>
                <input class="txtSizeEvC3 lb-inp" type="text" name="AsesorInterno" value="<?php echo $consultaAsesor['NombreCompleto']; ?>" disabled>
                <label class="txtSizeEvC3 mrgEvC3 lb-inp">Firma electronica:</label>
                <input class="txtSizeEvC3 lb-inp" type="file" name="archivo">
                <label class="txtSizeEvC3 mrgEvC3 lb-inp">Fecha de evaluación</label>
                <input class="txtSizeEvC3 lb-inp" type="date" name="FechaEvaluacion" value="<?php echo date('Y-m-d'); ?>" disabled>
                <label class="txtSizeEvC3 mrgEvC3 lb-inp">Total Puntos:</label>
                <input class="txtSizeEvC3 lb-inp" type="text" name="TotalPuntos" value="<?php echo $evaluacionReporte['ERFTotal'] ?>" disabled>
                <input type="hidden" name="idSoliRes" value="<?php echo $idSolicitudResidencia; ?>">
                <input type="hidden" name="idUAsesor" value="<?php echo $idAsesor; ?>">
                <input class="txtSizeEvC3 mrgEvC3 lb-inp" type="submit" value="Descargar Reporte" formaction="procesos/AsesorInternoDescargarArchivo.php">
            </div>
        </div>
        
    </form>
</body>
</html>