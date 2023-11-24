<?php 
include '../InicioSessionSeg.php';
include ('funcProfesor.php');
    //ID del proyecto
    $SRID = $_POST['SRID'];
    $UID = $_SESSION['id'];
    //Llamo a funciones
    $residente = getResidente($SRID); //Accedo al residente (alumno)
    $empresa = getEmpresa($SRID);
    $DID = mysqli_fetch_array(DID($UID));
    $residencia = getResidencia($SRID);
    $asesorI = getAsesor($SRID);
    $coordinador = coordinador($DID[0]);
    $jefeDivision = jefeDivision();
?>
<?php
include 'headprofesores.php';
?>
<div class="col ms-sm-auto px-4">
    <div class="container col-9">
        <form method="POST" action="funcionesFProfesor.php" class="mb-5 mt-5 shadow-lg" style="background-color: #E9ECEF;" id="myForm">
            <input type="hidden" name="SRID" value="<?php echo $SRID?>">
            <input type="hidden" id="accion" name="accion" value=""> 
            <div class="rounded-top p-2" style=" background-color: #384970; color: white;">
                <h2 class="text-center text-white">Revisión Solicitud de Residencia</h2>
            </div>

            <div class="mt-3 p-3">
                <label for="NombreProyecto" class="form-label h6">Nombre del Proyecto:</label>
                <input type="text" class="form-control" value="<?php echo $residencia['spnombreproyecto']; ?>" readonly>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="jefeDiv" class="form-label h6">Jefe(a) de la Div. de Estudios
                            Profesionales:</label>
                        <input type="text" class="form-control" value="<?php echo $jefeDivision['jefeDivision']?>" readonly>
                    </div>
                    <div class="col">
                        <label for="tipoProyecto" class="form-label h6">Tipo Proyecto:</label>
                        <select id="tipoProyecto" name="tipoProyecto" class="form-select" disabled>
                            <option class="form-control" value="interno" <?php if($residencia['sptipo'] == 'INTERNO') echo 'selected'; ?>>Interno</option>
                            <option class="form-control" value="externo" <?php if($residencia['sptipo'] == 'EXTERNO') echo 'selected'; ?>>Externo</option>
                            <option class="form-control" value="dual" <?php if($residencia['sptipo'] == 'DUAL') echo 'selected'; ?>>Dual</option>
                            <option class="form-control" value="CIIE" <?php if($residencia['sptipo'] == 'CIIE') echo 'selected'; ?>>CIIE</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="coordinador" class="form-label h6">Coord. de la Carrera de:</label>
                        <input type="text" class="form-control" value="<?php echo $coordinador['coordinador']?>" readonly>
                    </div>
                    <div class="col">
                        <label for="" class="form-label h6">AT'N C:</label>
                        <input type="text" class="form-control" value="<?php echo $residente['nomcarrera'] ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="periodoProyect" class="form-label h6">Periodo proyectado:</label>
                        <input type="text" class="form-control" value="<?php echo $residencia['sdtiempoestimado'] . ' meses'; ?>" readonly>
                    </div>
                    <div class="col">
                        <label for="nomAsesorInterno" class="form-label h6">Nombre Asesor Interno:</label>
                        <input type="text" class="form-control" value="<?php echo $asesorI['nombreasesor'] ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="fecha" class="form-label h6">Fecha:</label>
                        <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
                    </div>
                    <div class="col">
                        <label for="opcionElegida" class="form-label h6">Opción elegida:</label>
                        <select id="opcionElegida" name="opcionElegida" disabled class="form-select">
                            <option class="form-control" value="Op1" <?php if ($residencia['sropcionelegida'] == 'Op1') echo 'selected'; ?>>Propuesta Propia</option>
                            <option class="form-control" value="Op2" <?php if ($residencia['sropcionelegida'] == 'Op2') echo 'selected'; ?>>Trabajador</option>
                            <option class="form-control" value="Op3" <?php if ($residencia['sropcionelegida'] == 'Op3') echo 'selected'; ?>>Banco de Proyectos</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="SPVacantes" class="form-label h6">Número Residentes:</label>
                        <input type="number" class="form-control" min="1" max="4" placeholder="0" value="<?php echo $residencia['spestudiantesrequeridos']; ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="container p-3">
                <label for="Anteproyecto" class="form-label h6">Anteproyecto:</label>
                <a href="exc/downloadAnteproy.php?SRID=<?php echo $SRID?>" download target="blank">Descargar Anteproyecto</a>
            </div>

               <div class="p-4 rounded-bottom" style="background-color: #384970;">
                    <div class="d-flex flex-wrap justify-content-around">
                            <button type="button" class="btn btn-light mb-2" data-bs-toggle="modal"
                                    data-bs-target="#datosEmpresaModal"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-buildings"
                                    viewBox="0 0 16 16">
                                <path
                                    d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                                <path
                                    d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                                    </svg> Datos de la Empresa
                            </button>
                            <button type="button" class="btn btn-light mb-2" data-bs-toggle="modal"
                                    data-bs-target="#datosResidenteModal"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-person-fill"
                                    viewBox="0 0 16 16">
                                <path
                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg> Datos del Residente
                            </button>
                        </div>
                       <div class="mb-3 form-floating">
                             <textarea class="form-control" id="comment" name="observaciones" placeholder="0" rows="3"></textarea>
                             <label for="observaciones" class="form-label h6">Observaciones:</label>
                      </div>
                    <div class="d-flex flex-wrap justify-content-around">
                            <button type="button" class="btn btn-success" onclick="enviarValor('APROBADO')"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-check-circle"
                                    viewBox="0 0 16 16">
                                <path
                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                    </svg> Aceptar
                            </button>
                            <button type="button" class="btn btn-danger" onclick="enviarValor('RECHAZADO')">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-x-circle"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg> Rechazar
                            </button>
                            <a href="./profesorListadoSoliRes.php" class="btn btn-secondary mt-md-0 mt-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                           </svg> Cancelar</a>
                  </div>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" ></button>
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
                        <select id="Eramo" name="Eramo" disabled class="form-select">
                            <option value="Industrial" <?php if($empresa['ramo'] == 'Industrial') echo 'selected'; ?>>Industrial</option>
                            <option value="Servicios" <?php if($empresa['ramo'] == 'Servicios') echo 'selected'; ?>>Servicios</option>
                            <option value="Escolar" <?php if($empresa['ramo'] == 'Escolar') echo 'selected'; ?>>Escolar</option>
                            <option value="Otro" <?php if(empty($empresa['ramo']) || $empresa['ramo'] == 'Otro' || ($empresa['ramo'] != 'Industrial' && $empresa['ramo'] != 'Servicios' && $empresa['ramo'] != 'Escolar')) echo 'selected'; ?>>Otro</option>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="ESector">Sector:</label>
                        <select id="ESector" name="ESector" disabled class="form-select">
                            <option value="Publico" <?php if($empresa['esector'] == 'Publico') echo 'selected'; ?>>Publico</option>
                            <option value="Privado" <?php if($empresa['esector'] == 'Privado') echo 'selected'; ?>>Privado</option>
                            <option value="Otro" <?php if(empty($empresa['esector']) || $empresa['esector'] == 'Otro' || ($empresa['esector'] != 'Publico' && $empresa['esector'] != 'Privado')) echo 'selected'; ?>>Otro</option>
                        </select>
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
                        <input type="text" class="form-control" value="<?php echo $empresa['enombretitular']?>" readonly>
                    </div>

                    <div class="col mb-3">
                        <label for="puestoTitular">Puesto:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['epuestotitular']?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nomAsesorExterno">Nombre del Asesor externo:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['enombreacuerdo']?>" readonly>
                    </div>

                    <div class="col mb-3">
                        <label for="puestoAsesor">Puesto:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['epuestoacuerdo']?>" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="ENombreEncargado">Nombre de la persona que firmará el acuerdo de trabajo.
                        Estudiante- Escuela-Empresa:</label>
                    <input type="text" class="form-control" value="<?php echo $empresa['enombreacuerdo']?>" readonly>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center" style="background-color: #384970;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL DE EL RESIDENTE-->
<div class="modal fade" id="datosResidenteModal">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content" style="background-color: #E9ECEF;">
            <div class="modal-header" style="background-color: #384970;">
                <h5 class="modal-title text-white" id="datosResidenteModalLabel">Datos del Residente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nombreResidente">Nombre:</label>
                        <input type="text" class="form-control" value="<?php echo $residente['nombre'] ?>" readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="carrera">Carrera:</label>
                        <input type="text" class="form-control" value="<?php echo $residente['nomcarrera'] ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="numControl">Número de Control:</label>
                        <input type="text" class="form-control" value="<?php echo $residente['numcontrol'] ?>" readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="numSemestre">Semestre a cursar:</label>
                        <input type="text" class="form-control" value="<?php echo $residente['semestre'] ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="numeroSeguro">Para seguridad social acudir:</label>
                        <input type="text" class="form-control" placeholder="No.:" value="<?php echo $residente['seguro_social'] ?>" readonly>
                        <div class="mb-3">
                            <input class="form-check-input" type="radio" id="imss" name="tipoSeguro" value="IMSS" <?php if($residente['institucionseguro'] == 'IMSS') echo 'checked'; ?> readonly disabled>
                            <label class="form-check-label" for="imss">IMSS</label>
                            <input class="form-check-input" type="radio" id="issste" name="tipoSeguro" value="ISSSTE" <?php if($residente['institucionseguro'] == 'ISSSTE') echo 'checked'; ?> readonly disabled>
                            <label class="form-check-label" for="issste">ISSSTE</label>
                            <input class="form-check-input" type="radio" id="otro" name="tipoSeguro" value="OTROS" <?php if(empty($residente['institucionseguro']) || $residente['institucionseguro'] == 'Otro' || ($residente['institucionseguro'] != 'IMSS' && $residente['institucionseguro'] != 'ISSSTE')) echo 'checked'; ?> readonly disabled>
                            <label class="form-check-label" for="otro">OTROS</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" value="<?php echo $residente['email'] ?>" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" class="form-control" value="<?php echo $residente['domicilio'] ?>" readonly>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="cuidad">Ciudad:</label>
                        <input type="text" class="form-control" value="<?php echo $residente['ciudad'] ?>" readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" class="form-control" value="<?php echo $residente['tel'] ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center" style="background-color: #384970;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function enviarValor(valor) {
        document.getElementById("accion").value = valor;
        document.getElementById("myForm").submit();
    }
</script>
<?php
include 'footer.php';
?>