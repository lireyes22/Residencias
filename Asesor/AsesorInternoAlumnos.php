<?php
include '../InicioSessionSeg.php';
include('funcAsesor.php');
include 'headAsesorInterno.php';
?>
<!-- Contenido principal -->
<div class="col ms-sm-auto px-4">
    <div class="container-fluid mt-3">
        <h2>Residentes</h2>
        <div class="table-responsive">
            <table id="example" class="display table-striped table-hover"
                style="width:100%; background-color: #ededed;">
                <thead>
                    <tr>
                        <th>Nombre del proyecto</th>
                        <th>Número de control</th>
                        <th>Nombre completo</th>
                        <th>Semestre actual</th>
                        <th>Seguimiento</th>
                        <th>Correo Institucional</th>
                        <th>Reporte final</th>
                    </tr>
                </thead>
                <?php
                $query = consultaAsesorAlumno($_SESSION['id']); //Consulta datos de los alumnos asesorados
                $idAsesor = $_SESSION['id']; //Se guarda el id
                while ($consulta = mysqli_fetch_array($query)) {
                    $idAlumno = $consulta['UAlumno'];
                    $ProyectoS = ObtenerSolicitudProyecto($consulta['SPID']);
                    $queryInfoAlumno = consultaUsuarioAlumno($idAlumno);
                    $consultaAlumno = mysqli_fetch_array($queryInfoAlumno);
                    ?>
                    <tbody>
                        <tr>
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
                            <td>
                                <form action="AsesorInternoEvaluacionSeguimiento.php" method="post" autocomplete="off" novalidate>
                                    <input type="hidden" name="idAlumno" value="<?php echo $idAlumno; ?>">
                                    <input type="hidden" name="idAsesor" value="<?php echo $idAsesor; ?>">
                                    <input type="submit" formaction="AsesorInternoEvaluacionSeguimiento.php"
                                        value="Evaluación de Seguimiento" class="btn btn-primary">
                                </form>
                            </td>
                            <td>
                                <form action="AsesorInternoEvaluacionReporte.php" method="post" autocomplete="off" novalidate>
                                    <input type="hidden" name="idAlumno" value="<?php echo $idAlumno; ?>">
                                    <input type="hidden" name="idAsesor" value="<?php echo $idAsesor; ?>">
                                    <input type="submit" formaction="AsesorInternoEvaluacionReporte.php"
                                        value="Evaluación de Reporte Final" class="btn btn-primary">
                                </form>
                            </td>
                        </tr>
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