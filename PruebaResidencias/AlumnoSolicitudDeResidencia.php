<?php
include 'headAlumnos.php';
?>
            <div class="col ms-sm-auto px-4">
                <div class="container col-9">
                   <form action="#" class="mb-5 mt-5 shadow-lg" style="background-color: #E9ECEF;">
                        <div class="rounded-top p-2" style=" background-color: #384970; color: white;">
                            <h2 class="text-center text-white">Solicitar Proyecto</h2>
                        </div>

                        <div class="mt-3 p-3">
                            <label for="NombreProyecto" class="form-label h6">Nombre del Proyecto:</label>
                            <input type="text" class="form-control" value="" readonly>
                        </div>

                        <div class="container p-3">
                          <div class="row">
                            <div class="col">
                                <label for="jefeDiv" class="form-label h6">Jefe(a) de la Div. de Estudios
                                    Profesionales:</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                            <div class="col">
                                <label for="tipoProyecto" class="form-label h6">Tipo Proyecto:</label>
                                <select class="form-control" readonly>
                                    <option>Interno</option>
                                    <option>Externo</option>
                                    <option>Dual</option>
                                    <option>CIIE</option>
                                </select>
                            </div>
                          </div>
                        </div>

                        <div class="container p-3">
                          <div class="row">
                            <div class="col">
                                <label for="coordinador" class="form-label h6">Coord. de la Carrera de:</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                            <div class="col">
                                <label for="" class="form-label h6">AT'N C:</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                          </div>
                        </div>

                        <div class="container p-3">
                        <div class="row">
                            <div class="col">
                                <label for="periodoProyect" class="form-label h6">Periodo proyectado:</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                            <div class="col">
                                <label for="nomAsesorInterno" class="form-label h6">Nombre Asesor Interno:</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                        </div>
                        </div>

                        <div class="container p-3">
                        <div class="row">
                            <div class="col">
                                <label for="fecha" class="form-label h6">Fecha:</label>
                                <input type="date" class="form-control" value="" readonly>
                            </div>
                            <div class="col">
                                <label for="opcionElegida" class="form-label h6">Opción elegida:</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                            <div class="col">
                                <label for="SPVacantes" class="form-label h6">Número Residentes:</label>
                                <input type="number" class="form-control" min="1" max="4" placeholder="0" value=""
                                    readonly>
                            </div>
                        </div>
                        </div>

                        <div class="col-9 d-flex justify-content-around mb-3 p-3">
                                <label for="Anteproyecto" class="form-label h6">Anteproyecto</label>
                                <input type="file" class="form-control" name="Anteproyecto" accept="application/pdf">
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

                            <button type="submit" class="btn btn-success"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Enviar Solicitud</button>

                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#datosResidenteModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                </svg>
                                Datos del Residente
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal de Datos de la Empresa -->
            <div class="modal fade" id="datosEmpresaModal">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content"  style="background-color: #E9ECEF;">

                        <div class="modal-header" style="background-color: #384970;">
                            <h5 class="modal-title text-white">Datos de la Empresa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-2">
                                <label for="ENombre">Nombre:</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                            <div class="mb-2">
                                <label for="EActPrincipal">Actividad principal de la empresa:</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="Eramo">Ramo:</label>
                                    <select class="form-control" value="" readonly>
                                        <option>Industrial</option>
                                        <option>Servicios</option>
                                        <option>Escolar</option>
                                        <option>Otro</option>
                                    </select>
                                </div>
                                <div class="col mb-3">
                                    <label for="ESector">Sector:</label>
                                    <select class="form-control" value="" readonly>
                                        <option>Público</option>
                                        <option>Privado</option>
                                        <option>Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="ERFC">RFC:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                                <div class="col mb-3">
                                    <label for="ECp">CP:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                                <div class="col mb-3">
                                    <label for="EFax">FAX:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="EColonia">Colonia:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                                <div class="col mb-3">
                                    <label for="ECiudad">Ciudad:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col mb-3">
                                    <label for="EDomicilio">Domicilio:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                                <div class="col mb-3">
                                    <label for="ETelefono">Teléfono:</label>
                                    <input type="tel" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nombreTitular">Nombre del titular de la empresa:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>

                                <div class="col mb-3">
                                    <label for="puestoTitular">Puesto:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nomAsesorExterno">Nombre del Asesor externo:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>

                                <div class="col mb-3">
                                    <label for="puestoAsesor">Puesto:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="ENombreEncargado">Nombre de la persona que firmará el acuerdo de trabajo.
                                    Estudiante- Escuela-Empresa:</label>
                                <input type="text" class="form-control" value="" readonly>
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
                    <div class="modal-content"  style="background-color: #E9ECEF;">
                        <div class="modal-header" style="background-color: #384970;">
                            <h5 class="modal-title text-white" id="datosResidenteModalLabel">Datos del Residente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nombreResidente">Nombre:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                                <div class="col mb-3">
                                    <label for="carrera">Carrera:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="numControl">Número de Control:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                                <div class="col mb-3">
                                    <label for="numSemestre">Semestre a cursar:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="numeroSeguro">Para seguridad social acudir:</label>
                                    <input type="text" class="form-control" placeholder="No.:" value="" readonly>
                                    <div class="mb-3">
                                        <input type="radio" readonly>
                                        <label for="imss">IMSS</label>
                                        <input type="radio" readonly>
                                        <label for="issste">ISSSTE</label>
                                        <input type="radio" readonly>
                                        <label for="otro">OTROS</label>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="domicilio">Domicilio:</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="cuidad">Ciudad:</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                                <div class="col mb-3">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="tel" class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center" style="background-color: #384970;">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>

            </div>


<?php
include 'footer.php';
?>