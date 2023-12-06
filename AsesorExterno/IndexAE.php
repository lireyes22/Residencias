<?php
include '../InicioSessionSeg.php';
include('funcAsesorE.php');
$idAsesor = $_SESSION['id'];
include 'headAsesorExterno.php';
?>

<!-- Contenido principal -->
<div class="col ms-sm-auto px-4">
    <div class="container-fluid mt-3">
        <h2>Residentes</h2>
        <div class="d-flex justify-content-start">
			<button id='slideToggleButton'type="submit" class="btn btn-primary">Extender/Contraer</button>
		</div>
        <div id="slideToggleDiv" class="table-responsive">
            <table id="example" class="table display table-primary table-striped table-hover"
                style="width:100%; background-color: #ededed;">
                <thead>
                    <tr class="table-dark">
                        <th>Nombre del proyecto</th>
                        <th>Número de control</th>
                        <th>Nombre Completo</th>
                        <th>Semestre Actual</th>
                        <th>Correo Institucional</th>
                        <th>Evaluación de Seguimiento</th>
                        <th>Evaluación de Reporte Final</th>
                    </tr>
                </thead>
                <?php
                $query = consultaAsesorAlumno($idAsesor);
                while ($consulta = mysqli_fetch_array($query)) {
                    $idAlumno = $consulta['UAlumno'];
                    $queryInfoAlumno = consultaUsuarioAlumno($idAlumno);
                    $consultaAlumno = mysqli_fetch_array($queryInfoAlumno);
                    $ProyectoS = ObtenerSolicitudProyecto($consulta['SPID']);

                    ?>
                    <tbody>
                        <td>
                            <?php echo $ProyectoS['SPNombreProyecto'] ?>
                        </td>
                        <td>
                            <?php echo $consultaAlumno['NumeroControl'] ?>
                        </td>
                        <td>
                            <?php echo $consultaAlumno['NombreCompleto'] ?>
                        </td>
                        <td>
                            <?php echo $consultaAlumno['SemestreActual'] ?>
                        </td>
                        <td>
                            <?php echo $consultaAlumno['CorreoInstitucional'] ?>
                        </td>
                        <td class="text-center">
                            <form method="POST">
                                <input type="hidden" name="idAlumno" value="<?php echo $idAlumno; ?>">
                                <input type="hidden" name="idAsesor" value="<?php echo $idAsesor; ?>">
                                <input name="EvSeg" type="submit" formaction="AsesorExternoEvaluacionSeguimiento.php"
                                    value="Evaluar" class="btn btn-primary text-center">
                            </form>
                        </td>
                        <td class="text-center">
                            <form method="POST">
                                <input type="hidden" name="idAlumno" value="<?php echo $idAlumno; ?>">
                                <input type="hidden" name="idAsesor" value="<?php echo $idAsesor; ?>">
                                <input name="EvRep" type="submit" formaction="AsesorExternoEvaluacionReporte.php"
                                    value="Evaluar" class="btn btn-primary">
                            </form>
                        </td>
                    </tbody>
                <?php } //fin del while ?>
                <!-- <tfoot>
                        <tr>
                            <th>Nombre del proyecto</th>
                            <th>Objetivo del proyecto</th>
                            <th>Descripción</th>
                            <th>Participantes</th>
                            <th>Start date</th>
                            <th>Detalles Proyectos</th>
                        </tr>
                    </tfoot> -->
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>