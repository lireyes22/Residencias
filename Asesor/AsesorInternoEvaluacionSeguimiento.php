<?php
    include '../InicioSessionSeg.php';
    include('funcAsesor.php');
    $idAsesor = $_POST['idAsesor'];
    $idAlumno = $_POST['idAlumno'];

    #Esto es para poder usar las consultas mas adelante
    $consultaAlumno;$consultaAlumnoProyecto;$consultaAlumnoCarrera;
    #Se consulta la informacion del alumno
    if (!($consultaAlumno = mysqli_fetch_array(consultaUsuarioAlumno($idAlumno)))) {
        echo 'error1';
    }
    #La informacion del Pro
    if (!($consultaAlumnoProyecto = mysqli_fetch_array(consultaProyectoAlumno($idAlumno)))) {
        echo 'error2';
    }
    if (!($consultaAlumnoCarrera = mysqli_fetch_array(consultaCarreraAlumno($consultaAlumno['NumeroControl'])))) {
        echo 'error3';
    }

    #Se obtiene la id de la solicitud de residencia para saber con que solicitud se guarda la ev. Parcial
    $idSolicitudResidencia = $consultaAlumnoProyecto['SRID'];

    #Obtienen datos del asesor
    $queryAsesor = consultaProfesorAsesor($idAsesor);
    $consultaAsesor;
    if (!($consultaAsesor = mysqli_fetch_array($queryAsesor))) {
        echo 'error4';
    }

    #Obtener calificaciones parciales
    $ParcialUno = consultaEvaluacionSeguimiento($idAsesor, $idAlumno, 1, 0);
    $ParcialDos = consultaEvaluacionSeguimiento($idAsesor, $idAlumno, 2, 0);
?>

<!DOCTYPE html>
<html>

    <?php include ('encabezado.php'); encabezadox('Evaluación de Seguimiento') #encabezado xd?>
    <div class="containerEv">
        <!-- Columna izquierda  -->
        <div class="column-Ev1">
            <form method="post" style="all: unset;">
                <input type="hidden" name="redireccionar" value="../Asesor/AsesorInternoAlumnos.php">
                <input type="hidden" name="idUAlumno" value="<?php echo $idAlumno; ?>">
                <label class="lb-inp txtSizeEv">Información:</label><br><br>
                <label class="lb-inp">Número de control:</label> <br>
                <input type="text" name="numControl" class="lb-inp" value="<?php echo $consultaAlumno['NumeroControl']; ?>" readonly><br><br>
                <label class="lb-inp">Nombre del residente:</label> <br>
                <input type="text" class="lb-inp" name="NombreResidente" value="<?php echo $consultaAlumno['NombreCompleto']; ?>" readonly><br><br>
                <label class="lb-inp">Nombre del Proyecto:</label> <br>
                <input type="text" class="lb-inp" name="NombreProyecto" value="<?php echo $consultaAlumnoProyecto['SPNombreProyecto']; ?>" readonly><br><br>
                <label class="lb-inp">Programa Educativo:</label> <br>
                <input type="text" class="lb-inp" name="ProgramaEducativo" value="<?php echo $consultaAlumnoCarrera['Nombre']; ?>" readonly><br><br>
                <label class="lb-inp">Periodo de Realización:</label> <br>
                <input type="text" class="lb-inp" name="PeriodoRealizacion" value="<?php echo $consultaAlumnoProyecto['SRPeriodo']; ?>" readonly><br><br>
                <label class="lb-inp">Nombre del Asesor Interno:</label>
                <input class="lb-inp" type="text" name="AsesorInterno" value="<?php echo $consultaAsesor['NombreCompleto']; ?>" readonly><br><br>
                <label class="lb-inp">Fecha:</label> <br>
                <input class="lb-inp" type="date" value="<?php echo date('Y-m-d'); ?>" readonly><br><br>
                <label class="lb-inp">Total Puntos:</label> <br>
                <input type="text" class="lb-inp" name="TotalPuntos" value="<?php  echo $ParcialUno['ERCalificacion'] + $ParcialDos['ERCalificacion']?>" readonly><br><br>
                <input class="btn btn-actualizar btn-evrf" type="submit" value="Descargar Evaluacion" formaction="../GenerarDocs/GenerarEvaluacionSeguimiento.php" target="_blank"><br>        
            </form>
        </div>
        <!-- Columna central tabla  -->
        <div class="column-Ev2">
            <div id="parcial1">
                <!-- PARCIAL 1  -->
                <form method="post">
                    <fieldset style="background-color: rgb(75, 75, 75)">
                        <legend style="color: white;"><button type="button" class="btn btn-actualizar btn-evrf">Primer Parcial</button>
                        <button type="button" class="btn btn-actualizar btn-evrf" onclick="intercambiarDivs()">Segundo Parcial</button></legend>
                        <table class="tb-ev">
                            <tr>
                                <th>Criterios a evaluar para el primer parcial</th>
                                <th>Valor Máximo</th>
                                <th>Puntuación</th>
                            </tr>
                            <tr>
                                <td>Asistió puntualmente a las reuniones de asesoría</td>
                                <td>10</td>
                                <td><input type="number" name="PuntualidadP1" min="0" max="10" step="1" value="<?php  echo $ParcialUno['ERPuntualidad'] ?>" required></td>
                            </tr>
                            <tr>
                                <td>Demuestra conocimiento en el área de su especialidad</td>
                                <td>20</td>
                                <td><input type="number" name="ConocimientoP1" min="0" max="20" step="1" value="<?php  echo $ParcialUno['ERConocimiento'] ?>" required></td>
                            </tr>
                            <tr>
                                <td>Trabaja en equipo y se comunica en forma efectiva (oral y escrita)</td>
                                <td>15</td>
                                <td><input type="number" name="TrabajoEquipoP1" min="0" max="15" step="1" value="<?php  echo $ParcialUno['ERTrabajoEquipo'] ?>" required></td>
                            </tr>
                            <tr>
                                <td>Es dedicado y proactivo en las actividades encomendadas</td>
                                <td>20</td>
                                <td><input type="number" name="DedicacionP1" min="0" max="20" step="1" value="<?php  echo $ParcialUno['ERDedicacion'] ?>" required></td>
                            </tr>
                            <tr>
                                <td>Es ordenado y cumple satisfactoriamente con las actividades encomendadas en los tiempos establecidos</td>
                                <td>20</td>
                                <td><input type="number" name="OrdenadoP1" min="0" max="20" step="1" value="<?php  echo $ParcialUno['EROrdenado'] ?>" required></td>
                            </tr>
                            <tr>
                                <td>Propone mejoras al proyecto</td>
                                <td>15</td>
                                <td><input type="number" name="DaMejorasP1" min="0" max="15" step="1" value="<?php  echo $ParcialUno['ERDaMejoras'] ?>" required></td>
                            </tr>
                            <tr style="background-color: cadetblue;">
                                <td><strong>TOTAL DE PUNTOS DEL PARCIAL 1</strong></td>
                                <td>100</td>
                                <td><input type="number" name="ERCalificacionP1" min="0" max="15" step="1" value="<?php  echo $ParcialUno['ERCalificacion'] ?>" readonly></td>
                            </tr>
                            <tr style="background-color: cadetblue;">
                                <?php getBoton('Par1'); ?>
                            </tr>
                        </table>
                        <label class="txtSizeEvC3 mrgEvC3 lb-inp" style="color: white; font-size: 20px;"><strong>Observaciones:</strong></label> <br>
                        <textarea name="Observaciones" id="" rows="5" style="width: 80%; margin: 10px; resize: none;"><?php  echo $ParcialUno['ERObservaciones'] ?></textarea>
                    </fieldset>
                    <input type="hidden" name="idSoliRes" value="<?php echo $idSolicitudResidencia; ?>">
                    <input type="hidden" name="idUAsesor" value="<?php echo $idAsesor; ?>">
                    <input class="txtSizeEvC3 lb-inp" type="hidden" value="<?php echo date('Y-m-d'); ?>" disabled>
                </form>
            </div>
            <div id="parcial2">
                <!-- PARCIAL 2  -->
                <form method="post">
                    <fieldset style="background-color: darkcyan">
                    <legend style="color: white;"><button type="button" class="btn btn-actualizar btn-evrf" onclick="intercambiarDivs()">Primer Parcial</button>
                        <button type="button" class="btn btn-actualizar btn-evrf">Segundo Parcial</button></legend>
                        <table class="tb-ev">
                            <tr>
                                <th>Criterios a evaluar para el segundo parcial</th>
                                <th>Valor Máximo</th>
                                <th>Puntuación</th>
                            </tr>
                            <tr>
                                <td>Asistió puntualmente a las reuniones de asesoría</td>
                                <td>10</td>
                                <td><input type="number" name="PuntualidadP2" min="0" max="10" step="1" value="<?php  echo $ParcialDos['ERPuntualidad'] ?>" required></td>
                            </tr>
                            <tr>
                                <td>Demuestra conocimiento en el área de su especialidad</td>
                                <td>20</td>
                                <td><input type="number" name="ConocimientoP2" min="0" max="20" step="1" value="<?php  echo $ParcialDos['ERConocimiento'] ?>" required></td>
                            </tr>
                            <tr>
                                <td>Trabaja en equipo y se comunica en forma efectiva (oral y escrita)</td>
                                <td>15</td>
                                <td><input type="number" name="TrabajoEquipoP2" min="0" max="15" step="1" value="<?php  echo $ParcialDos['ERTrabajoEquipo'] ?>" required></td>
                            </tr>
                            <tr>
                                <td>Es dedicado y proactivo en las actividades encomendadas</td>
                                <td>20</td>
                                <td><input type="number" name="DedicacionP2" min="0" max="20" step="1" value="<?php  echo $ParcialDos['ERDedicacion'] ?>" required></td>
                            </tr>
                            <tr>
                                <td>Es ordenado y cumple satisfactoriamente con las actividades encomendadas en los tiempos establecidos</td>
                                <td>20</td>
                                <td><input type="number" name="OrdenadoP2" min="0" max="20" step="1" value="<?php  echo $ParcialDos['EROrdenado'] ?>" required></td>
                            </tr>
                            <tr>
                                <td>Propone mejoras al proyecto</td>
                                <td>15</td>
                                <td><input type="number" name="DaMejorasP2" min="0" max="15" step="1" value="<?php  echo $ParcialDos['ERDaMejoras'] ?>" required></td>
                            </tr>
                            <tr style="background-color: cadetblue;">
                                <td><strong>TOTAL DE PUNTOS DEL PARCIAL 2</strong></td>
                                <td>100</td>
                                <td><input type="number" name="ERCalificacionP2" min="0" max="15" step="1" value="<?php  echo $ParcialDos['ERCalificacion'] ?>" readonly></td>
                            </tr>
                            <tr style="background-color: cadetblue;">
                                <?php getBoton('Par2'); ?>
                            </tr>
                        </table>
                        <label class="txtSizeEvC3 mrgEvC3 lb-inp" style="color: white; font-size: 20px;"><strong>Observaciones:</strong></label> <br>
                        <textarea name="Observaciones" id="" rows="5" style="width: 80%; margin: 10px; resize: none;"><?php  echo $ParcialDos['ERObservaciones'] ?></textarea>
                    </fieldset>
                    <input type="hidden" name="idSoliRes" value="<?php echo $idSolicitudResidencia; ?>">
                    <input type="hidden" name="idUAsesor" value="<?php echo $idAsesor; ?>">
                    <input class="txtSizeEvC3 lb-inp" type="hidden" value="<?php echo date('Y-m-d'); ?>" disabled>
                </form>
            </div>
        </div>
        <!-- Columna derecha  -->
        <div>
        </div>
    </div>
</body>

</html>