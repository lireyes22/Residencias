<?php
include '../InicioSessionSeg.php';
include('funcAsesor.php');
include 'headAsesorInterno.php';
$SPID = $_POST['SPID'];
$empresa = getEmpresa($SPID);
$ProyectoS = ObtenerSolicitudProyecto($SPID);
?>
<div class="col ms-sm-auto px-4">
    <div class="container col-9">
        <form action="#" class="mb-5 mt-5 shadow-lg" style="background-color: #E9ECEF;">
            <div class="rounded-top p-2" style=" background-color: #384970; color: white;">
                <h2 class="text-center text-white">Datos Proyecto</h2>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="coordinador" class="form-label h6">Nombre Proyecto</label>
                        <input type="text" class="form-control text-capitalize" value="<?php echo $ProyectoS['SPNombreProyecto']; ?>"
                            readonly>
                    </div>
                    <div class="col">
                        <label for="" class="form-label h6">Lugar</label>
                        <input type="text" class="form-control text-capitalize" value="<?php echo $ProyectoS['SPLugar']; ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="jefeDiv" class="form-label h6">Obejtivo</label>
                        <input type="text" class="form-control text-capitalize" value="<?php echo $ProyectoS['SPObjetivo']; ?>"
                            readonly>
                    </div>
                    <div class="col">
                        <label for="tipoProyecto" class="form-label h6">Tipo Proyecto:</label>
                        <input type="text" class="form-control text-capitalize" value="<?php echo $ProyectoS['SPTipo']; ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="coordinador" class="form-label h6">Descripción</label>
                        <input type="text" class="form-control text-capitalize" value="<?php echo $ProyectoS['SPDescripcion']; ?>"
                            readonly>
                    </div>
                    <div class="col">
                        <label for="" class="form-label h6">Impacto</label>
                        <input type="text" class="form-control text-capitalize" value="<?php echo $ProyectoS['SPImpacto'] ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="nomAsesorInterno" class="form-label h6">Linea de investigación</label>
                        <input type="text" class="form-control text-capitalize"
                            value="<?php echo $ProyectoS['SPLineaInvestigacion']; ?>" readonly>
                    </div>
                    <div class="col">
                        <label for="SPVacantes" class="form-label h6">Estudiantes Requeridos</label>
                        <input type="number" class="form-control text-capitalize" min="1" max="4" placeholder="0"
                            value="<?php echo $ProyectoS['SPEstudiantesRequeridos']; ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="fecha" class="form-label h6">Tiempo estimado</label>
                        <input type="text" class="form-control text-capitalize"
                            value="<?php echo $ProyectoS['SDTiempoEstimado'] . ' Meses'; ?>" readonly>
                    </div>
                    <div class="col">
                        <label for="opcionElegida" class="form-label h6">Referencias</label>
                        <input type="text" class="form-control text-capitalize" value="<?php echo $ProyectoS['SPReferencias']; ?>"
                            readonly>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-around p-4 rounded-bottom" style="background-color: #384970;">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                    data-bs-target="#datosEmpresaModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-buildings" viewBox="0 0 16 16">
                        <path
                            d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                        <path
                            d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                    </svg>
                    Datos de la Empresa
                </button>

                <button type="submit" class="btn btn-success" formaction="AsesorInternoResidencias.php">
                    Regresar</button>

                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                    data-bs-target="#datosResidenteModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg>
                    Datos de los alumnos
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal de Datos de la Empresa -->
<div class="modal fade" id="datosEmpresaModal">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content" style="background-color: #E9ECEF;">

            <div class="modal-header" style="background-color: #384970;">
                <h5 class="modal-title text-white">Datos de la Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="mb-2">
                    <label for="ENombre">Nombre:</label>
                    <input type="text" class="form-control" value="<?php echo $empresa['nombre'] ?>" readonly>
                </div>
                <div class="mb-2">
                    <label for="EActPrincipal">Actividad principal de la empresa:</label>
                    <input type="text" class="form-control" value="<?php echo $empresa['eactprincipal'] ?>" readonly>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="Eramo">Ramo:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['ramo'] ?>">
                    </div>
                    <div class="col mb-3">
                        <label for="ESector">Sector:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['esector'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="ERFC">RFC:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['erfc'] ?>" readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="ECp">CP:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['ecp'] ?>" readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="EFax">FAX:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['efax'] ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="EColonia">Colonia:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['ecolonia'] ?>" readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="ECiudad">Ciudad:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['eciudad'] ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class=" col mb-3">
                        <label for="EDomicilio">Domicilio:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['edomicilio'] ?>" readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="ETelefono">Teléfono:</label>
                        <input type="tel" class="form-control" value="<?php echo $empresa['etelefono'] ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nombreTitular">Nombre del titular de la empresa:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['enombretitular'] ?>"
                            readonly>
                    </div>

                    <div class="col mb-3">
                        <label for="puestoTitular">Puesto:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['epuestotitular'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nomAsesorExterno">Nombre del Asesor externo:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['enombreacuerdo'] ?>"
                            readonly>
                    </div>

                    <div class="col mb-3">
                        <label for="puestoAsesor">Puesto:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['epuestoacuerdo'] ?>"
                            readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="ENombreEncargado">Nombre de la persona que firmará el acuerdo de trabajo.
                        Estudiante- Escuela-Empresa:</label>
                    <input type="text" class="form-control" value="<?php echo $empresa['enombreacuerdo'] ?>" readonly>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center" style="background-color: #384970;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="datosResidenteModal">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content" style="background-color: #E9ECEF;">
            <div class="modal-header" style="background-color: #384970;">
                <h5 class="modal-title text-white" id="datosResidenteModalLabel">Datos del Residente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

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
                                    <td class="text-uppercase">
                                        <?php echo $result['NombreCompleto'] ?>
                                    </td>
                                    <td>
                                        <?php echo $result['SemestreActual'] ?>
                                    </td> 
                                    <td class="text-lowercase">
                                        <?php echo $result['CorreoInstitucional'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
            </fieldset>
            <div class="modal-footer d-flex justify-content-center" style="background-color: #384970;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>

</div>


<?php
include 'footer.php';
?>