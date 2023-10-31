<?php
    include '../InicioSessionSeg.php';
    include ('Alumfunciones.php');
    //ID del proyecto
    $SPID = $_POST['SPID'];
    
    //Llamo a funciones
    $empresa = getEmpresa($SPID);
    $residente = getResidente($_SESSION['id']); 
    $residencia = getResidencia($SPID);
    $asesorI = getAsesor($SPID);   
    $validar = validarRes($SPID, $_SESSION['id']);
    $administrativo = Division_Coordinador($residente['nomcarrera']);
include 'headAlumnos.php';
?>
<div class="col ms-sm-auto px-4">
    <div class="container col-9">
        <form method="POST" class="mb-5 mt-5 shadow-lg" style="background-color: #E9ECEF;" enctype="multipart/form-data">
            <input type="hidden" name="SPID" value="<?php echo $SPID?>">
            <input type="hidden" name="residente" value="<?php echo $_SESSION['id']?>">
            <div class="rounded-top p-2" style=" background-color: #384970; color: white;">
                <h2 class="text-center text-white">Solicitar Proyecto</h2>
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
                        <input type="text" class="form-control" value="<?php echo $administrativo['jefeDivEst'] ?>" readonly>
                    </div>
                    <div class="col">
                        <label for="tipoProyecto" class="form-label h6">Tipo Proyecto:</label>
                        <input type="text" class="form-control" value="<?php echo $residencia['sptipo']; ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="coordinador" class="form-label h6">Coord. de la Carrera de:</label>
                        <input type="text" class="form-control" value="<?php echo $administrativo['coordinador'] ?>" readonly>
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
                        <?php
                        $conn = conn();
                        $query = "SELECT SolicitudResidencia.`SROpcionElegida` FROM `SolicitudResidencia`
                        INNER JOIN BancoProyectos ON BancoProyectos.BPID = SolicitudResidencia.BPID
                        INNER JOIN SolicitudProyecto ON SolicitudProyecto.SPID = BancoProyectos.SPID
                        WHERE SolicitudResidencia.UAlumno = ".$_SESSION['id']." AND SolicitudProyecto.`SPID` = $SPID";
                        $residenciaOP = mysqli_fetch_array(mysqli_query($conn,$query));
                        if(!empty($residenciaOP)){
                            if($residenciaOP[0] == 'Op1'){
                                echo "<input type='text' class='form-control' value='Propuesta' readonly>";
                            }else if($residenciaOP[0] == 'Op2'){
                                echo "<input type='text' class='form-control' value='Trabajador' readonly>";
                            }else if($residenciaOP[0] == 'Op3'){
                                echo "<input type='text' class='form-control' value='Banco' readonly>";
                            }
                        }else{
                            echo "<input type='text' class='form-control' value='Banco' name='opcionElegida' readonly>";
                        }
                        ?>                        
                    </div>
                    <div class="col">
                        <label for="SPVacantes" class="form-label h6">Número Residentes:</label>
                        <input type="number" class="form-control" min="1" max="4" placeholder="0" value="<?php echo $residencia['spestudiantesrequeridos']; ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="container p-3">
                <label for="anteproyecto" class="form-label h6">Anteproyecto</label>
                <input class="form-control" accept=".pdf" type="file" name="anteproyecto">
            </div>

            <div class="d-flex flex-wrap justify-content-around p-4 rounded-bottom" style="background-color: #384970;">
                <button type="button" class="btn btn-light mb-2" data-bs-toggle="modal"
                    data-bs-target="#datosEmpresaModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-buildings" viewBox="0 0 16 16">
                        <path
                            d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                        <path
                            d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                    </svg> Datos de la Empresa
                </button>

                <button type="button" class="btn btn-light mb-2" data-bs-toggle="modal"
                    data-bs-target="#datosResidenteModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg> Datos del Residente
                </button>
                <?php
                    if ($validar['activo'] == false) {
                        echo '<button type="submit" name="EnviarSolicitud" value="Enviar Solicitud" formaction="AlumSubeSolicitud.php" class="btn btn-success mb-2" onclick="return confirm(\'¿Estás seguro de que deseas enviar la solicitud?\')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> 
                                Enviar Solicitud
                              </button>';
                    } else {
                        echo '<button type="submit" name="EnviarSolicitud" value="Enviar Solicitud" formaction="AlumSubeSolicitud.php" class="btn btn-success mb-2" onclick="alert(\'Esta opción no está disponible por lo siguiente: ' . $validar['mensaje'] . '\'); return false;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> 
                                Enviar Solicitud
                              </button>';
                    }
                ?>
                <a href="AlumListadoProyecto.php" class="btn btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                   </svg> Cancelar   
                </a>
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
                        <input type="text" class="form-control" value="<?php echo $empresa['ramo'] ?>" readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="ESector">Sector:</label>
                        <input type="text" class="form-control" value="<?php echo $empresa['esector'] ?>" readonly>
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
                            <input type="radio" <?php if($residente['institucionseguro'] == 'IMSS') echo 'checked'; ?> readonly>
                            <label for="imss">IMSS</label>
                            <input type="radio" <?php if($residente['institucionseguro'] == 'ISSSTE') echo 'checked'; ?> readonly>
                            <label for="issste">ISSSTE</label>
                            <input type="radio" <?php if(empty($residente['institucionseguro']) || $residente['institucionseguro'] == 'Otro' || ($residente['institucionseguro'] != 'IMSS' && $residente['institucionseguro'] != 'ISSSTE')) echo 'checked'; ?> readonly>
                            <label for="otro">OTROS</label>
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


<?php
include 'footer.php';
?>