<?php
include '../InicioSessionSeg.php';
include('funcAsesor.php');
include 'headAsesorInterno.php';
?>

<!-- Contenido principal -->
<div class="col ms-sm-auto px-4">
    <div class="container-fluid mt-3">
        <h2>Proyectos Residencias</h2>
        <div class="table-responsive">
            <table id="example" class="display table-striped table-hover"
                style="width:100%; background-color: #ededed;">
                <thead>
                    <tr>
                        <th>Nombre del proyecto</th>
                        <th>Objetivo del proyecto</th>
                        <th>Descripción</th>
                        <th>Número de Residentes</th>
                        <th>Detalles Proyectos</th>
                    </tr>
                </thead>
                <?php
                $aiid = $_SESSION['AIID'];
                $queryAR = consultaAsesorResidencias($aiid);
                while ($consultaAR = mysqli_fetch_array($queryAR)) {

                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $consultaAR['SPNombreProyecto']; ?>
                            </td>
                            <td>
                                <?php echo $consultaAR['SPObjetivo']; ?>
                            </td>
                            <td>
                                <?php echo $consultaAR['SPDescripcion']; ?>
                            </td>
                            <td>
                                <form method="post">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" min="0" name="nResidentes"
                                            value="<?php echo $consultaAR['SPEstudiantesRequeridos']; ?>" required>
                                        <div class="input-group-append">
                                            <input class="btn btn-outline-primary" type="submit" value="Actualizar"
                                                formaction="procesos/AsesorInternoActualizarResidencia.php">
                                        </div>
                                    </div>
                                    <input type="hidden" name="SPID" value="<?php echo $consultaAR['SPID']; ?>">
                                </form>
                            </td>
                            <td>
                                <div class="input-group mb-3">
                                    <form method="post">
                                        <input type="hidden" name="SPID" value="<?php echo $consultaAR['SPID']; ?>">
                                        <input class="btn btn-primary" type="submit"
                                            formaction="AsesorInternoDetallesProyectos.php" value="Detalles">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
                <!--
                            <tfoot>
                                <tr>
                                    <th>Nombre del proyecto</th>
                                    <th>Objetivo del proyecto</th>
                                    <th>Descripción</th>
                                    <th>Participantes</th>
                                    <th>Start date</th>
                                    <th>Detalles Proyectos</th>
                                    
                                </tr>
                            </tfoot>
                            -->
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>