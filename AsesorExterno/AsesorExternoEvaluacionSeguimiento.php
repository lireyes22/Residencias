<?php
    include('funcAsesorE.php');
    $idAsesor = $_POST['idAsesor'];
    $idAlumno = $_POST['idAlumno'];
    #echo $idAsesor;echo '<br>';echo $idAlumno;
    $consultaAsesor = ObtenerAsesorExterno($idAsesor);
?>

<!DOCTYPE html>
<html>

    <?php include ('encabezado.php'); encabezadox('Evaluacion de Seguimiento') #encabezado xd?>

    <?php
    $queryAlumno = consultaUsuarioAlumno($idAlumno);
    $queryProyectoAlumno = consultaProyectoAlumno($idAlumno);
    $consultaAlumno;
    $consultaAlumnoProyecto;
    $consultaAlumnoCarrera;
    if (!($consultaAlumno = mysqli_fetch_array($queryAlumno))) {
        echo 'error';
    }
    $queryProyectoCarrera = consultaCarreraAlumno($consultaAlumno['NumeroControl']);
    if (!($consultaAlumnoProyecto = mysqli_fetch_array($queryProyectoAlumno))) {
        echo 'error';
    }
    if (!($consultaAlumnoCarrera = mysqli_fetch_array($queryProyectoCarrera))) {
        echo 'error';
    }

    $idSolicitudResidencia = $consultaAlumnoProyecto['SRID'];
    ?>
    <div class="containerEv">
        <!-- Columna izquierda  -->
        <div class="column-Ev1">
            <form method="post">
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
            </form>
        </div>
        <!-- Columna central tabla  -->
        <?php
            $ParcialUno = consultaEvaluacionSeguimiento($idAsesor, $idAlumno, 1, 1);
            $ParcialDos = consultaEvaluacionSeguimiento($idAsesor, $idAlumno, 2, 1);
            
        ?>
        <div class="column-Ev2">
            <div id="parcial1">
                <!-- PARCIAL 1  -->
                <form method="post">
                    <fieldset style="background-color: rgb(139, 0, 79)">
                        <legend style="color: white;"><button type="button" onclick="intercambiarDivs()">Primer Parcial</button></legend>
                        <table class="tb-ev">
                            <tr>
                                <th>Criterios a evaluar para el primer parcial</th>
                                <th>Valor Máximo</th>
                                <th>Puntuación</th>
                            </tr>
                            <tr>
                                <td>Asistio puntualmente a las reuniones de asesoria</td>
                                <td>10</td>
                                <td><input type="number" name="PuntualidadP1" min="0" max="10" step="1" value="<?php  echo $ParcialUno['ERPuntualidad'] ?>" required></td>
                            </tr>
                            <tr>
                                <td>Demuestra conocimento en el area de su especialidad</td>
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
                                <td><input type="number" name="DaMejorasP2" min="0" max="15" step="1" value="<?php  echo $ParcialUno['ERCalificacion'] ?>" disabled></td>
                            </tr>
                            <tr style="background-color: cadetblue;">
                                <td><strong>NOTA: Al hacer clic en guardar se actualizaran los datos</strong></td>
                                <td></td>
                                <td><input type="submit" value="Guardar" name="Par1" formaction="procesos/AsesorExternoGuardarEvSeguimiento.php"></td>
                            </tr>
                        </table>
                        <label class="txtSizeEvC3 mrgEvC3 lb-inp" style="color: white; font-size: 20px;"><strong>Observaciones:</strong></label> <br>
                        <textarea name="Observaciones" id="" rows="5" style="width: 80%; margin: 10px; resize: none;" required><?php  echo $ParcialUno['ERObservaciones'] ?></textarea>
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
                    <legend style="color: white;"><button type="button" onclick="intercambiarDivs()">Segundo Parcial</button></legend>
                        <table class="tb-ev">
                            <tr>
                                <th>Criterios a evaluar para el segundo parcial</th>
                                <th>Valor Máximo</th>
                                <th>Puntuación</th>
                            </tr>
                            <tr>
                                <td>Asistio puntualmente a las reuniones de asesoria</td>
                                <td>10</td>
                                <td><input type="number" name="PuntualidadP2" min="0" max="10" step="1" value="<?php  echo $ParcialDos['ERPuntualidad'] ?>" required></td>
                            </tr>
                            <tr>
                                <td>Demuestra conocimento en el area de su especialidad</td>
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
                                <td><input type="number" name="DaMejorasP2" min="0" max="15" step="1" value="<?php  echo $ParcialDos['ERCalificacion'] ?>" disabled></td>
                            </tr>
                            <tr style="background-color: cadetblue;">
                                <td><strong>NOTA: Al hacer clic en guardar se actualizaran los datos</strong></td>
                                <td></td>
                                <td><input type="submit" value="Guardar" name="Par2" formaction="procesos/AsesorExternoGuardarEvSeguimiento.php"></td>
                            </tr>
                        </table>
                        <label class="txtSizeEvC3 mrgEvC3 lb-inp" style="color: white; font-size: 20px;"><strong>Observaciones:</strong></label> <br>
                        <textarea name="Observaciones" id="" rows="5" style="width: 80%; margin: 10px; resize: none;" required><?php  echo $ParcialDos['ERObservaciones'] ?></textarea>
                    </fieldset>
                    <input type="hidden" name="idSoliRes" value="<?php echo $idSolicitudResidencia; ?>">
                    <input type="hidden" name="idUAsesor" value="<?php echo $idAsesor; ?>">
                    <input class="txtSizeEvC3 lb-inp" type="hidden" value="<?php echo date('Y-m-d'); ?>" disabled>
                </form>
            </div>
        </div>
        
        <!-- Columna derecha  -->
        <div class="column-Ev3">
            <?php
                #de donde saco la info del asesorexterno xd
            ?>
            <label class="txtSizeEvC3 mrgEvC3 lb-inp">Nombre del Asesor Interno:</label>
            <input class="txtSizeEvC3 lb-inp" type="text" name="AsesorExterno" value="<?php echo $consultaAsesor['AENombre']; ?>" disabled>
            <label class="txtSizeEvC3 mrgEvC3 lb-inp">Firma electronica:</label>
            <input class="txtSizeEvC3 lb-inp" type="file" name="archivo">
            <label class="txtSizeEvC3 mrgEvC3 lb-inp">Fecha de evaluación</label>
            <input class="txtSizeEvC3 lb-inp" type="date" value="" disabled>
            <label class="txtSizeEvC3 mrgEvC3 lb-inp">Total Puntos:</label>
            <input class="txtSizeEvC3 lb-inp" type="text" name="TotalPuntos" value="<?php  echo $ParcialUno['ERCalificacion'] + $ParcialDos['ERCalificacion']?>" disabled>
        </div>
    </div>
</body>

</html>