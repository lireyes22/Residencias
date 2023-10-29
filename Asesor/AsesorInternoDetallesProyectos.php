<?php
include '../InicioSessionSeg.php';
include('funcAsesor.php');
include 'headAsesorInterno.php';
$SPID = $_POST['SPID'];
$empresa = getEmpresa($SPID);
$ProyectoS = ObtenerSolicitudProyecto($SPID);
?>
<!-- Contenido principal -->

<div class="col ms-sm-auto px-4">
    <div class="container-fluid mt-3">
        <h2>Detalles del Proyecto</h2>
        <br>
        <div class="table-responsive">
            <form>
                <fieldset class="bg-fldst container bg-light">
                    <legend class="legend">Datos del Proyecto</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center ">
                                <label for="" class="form-label col-5">Nombre del Proyecto:</label>
                                <input type="text" class="form-control"
                                    value="<?php echo $ProyectoS['SPNombreProyecto']; ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Objetivo:</label>
                                <input type="text" class="form-control" value="<?php echo $ProyectoS['SPObjetivo']; ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for='' class="form-label col-5">Descripción:</label>
                                <input type="text" class="form-control"
                                    value="<?php echo $ProyectoS['SPDescripcion']; ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Impacto:</label>
                                <input type="text" class="form-control" value="<?php echo $ProyectoS['SPImpacto'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Lugar:</label>
                                <input type="text" class="form-control" value="<?php echo $ProyectoS['SPLugar']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Estudiantes Requeridos:</label>
                                <input type="text" class="form-control"
                                    value="<?php echo $ProyectoS['SPEstudiantesRequeridos']; ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Tiempo Estimado:</label>
                                <input type="text" class="form-control"
                                    value="<?php echo $ProyectoS['SDTiempoEstimado'] . ' Meses'; ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Tipo Proyecto:</label>
                                <input type="text" class="form-control" value="<?php echo $ProyectoS['SPTipo']; ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Linea de Investigación:</label>
                                <input type="text" class="form-control"
                                    value="<?php echo $ProyectoS['SPLineaInvestigacion']; ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Referencias:</label>
                                <input type="text" class="form-control"
                                    value="<?php echo $ProyectoS['SPReferencias']; ?>">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                <!------------------------------------------------------- Datos Empresa ---------------------------------------------------------->
                <fieldset class="bg-fldst container bg-light">
                    <legend class="legend">Datos de la empresa</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center">
                                <label for="NombreProyecto" class="form-label col-5">Nombre Empresa:</label>
                                <input type="text" class="form-control" value="<?php echo $empresa['nombre'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Ramo:</label>
                                <input type="text" class="form-control" value="<?php echo $empresa['ramo'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">RFC:</label>
                                <input type="text" class="form-control" value="<?php echo $empresa['erfc'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Sector:</label>
                                <input type="text" class="form-control" value="<?php echo $empresa['esector'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Actividad principal de la empresa:</label>
                                <input type="text" class="form-control" value="<?php echo $empresa['eactprincipal'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Domicilio:</label>
                                <input type="text" class="form-control" value="<?php echo $empresa['edomicilio'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Colonia:</label>
                                <input type="text" class="form-control" value="<?php echo $empresa['ecolonia'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">CP:</label>
                                <input type="text" class="form-control" value="<?php echo $empresa['ecp'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">FAX:</label>
                                <input type="text" class="form-control" value="<?php echo $empresa['efax'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Ciudad:</label>
                                <input type="text" class="form-control" value="<?php echo $empresa['eciudad'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Teléfono:</label>
                                <input type="text" class="form-control" value="<?php echo $empresa['etelefono'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Nombre del titular de la empresa:</label>
                                <input type="text" class="form-control"
                                    value="<?php echo $empresa['enombretitular'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Puesto:</label>
                                <input type="text" class="form-control"
                                    value="<?php echo $empresa['epuestotitular'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Nombre del Asesor Externo:</label>
                                <input type="text" class="form-control"
                                    value="<?php echo $empresa['enombreacuerdo'] ?>">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Puesto:</label>
                                <input type="text" class="form-control"
                                    value="<?php echo $empresa['epuestoacuerdo'] ?>">
                            </div>

                            <div class="mb-3 d-flex align-items-center">
                                <label for="" class="form-label col-5">Nombre de quien firmara el acuerdo:</label>
                                <input type="text" class="form-control"
                                    value="<?php echo $empresa['enombreacuerdo'] ?>">
                            </div>


                        </div>
                    </div>

                </fieldset>
                <br>
                <fieldset class="bg-fldstEst container bg-light">
                    <legend class="legend">Datos De Los Alumnos</legend>
                    <div class="containerSRP">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Número de control</th>
                                    <th>Nombre Completo</th>
                                    <th>Semestre Actual</th>
                                    <th>Correo Institucional</th>
                                </tr>
                            </thead>
                            <?php
                            $Alumnos = alumnosResidentes($SPID);
                            while ($result = mysqli_fetch_array($Alumnos)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $result['NumeroControl'] ?>
                                        </td>
                                        <td>
                                            <?php echo $result['NombreCompleto'] ?>
                                        </td>
                                        <td>
                                            <?php echo $result['SemestreActual'] ?>
                                        </td>
                                        <td>
                                            <?php echo $result['CorreoInstitucional'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </fieldset>
                <br>
                <div class="button-reg container">
                    <form method="post">
                        <input type="submit" formaction="AsesorInternoResidencias.php" value="Regresar" class="btn btn-primary">
                    </form>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>