<?php
include '../InicioSessionSeg.php';
include('funcAsesor.php');
$idAsesor = $_POST['idAsesor'];
$idAlumno = $_POST['idAlumno'];

#Esto es para poder usar las consultas mas adelante
$consultaAlumno;
$consultaAlumnoProyecto;
$consultaAlumnoCarrera;
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
include 'headAsesorInterno.php';
?>
<div class="col ms-sm-auto px-4" style="background-color: whitesmoke;" id="contbg">
  <br>
  <!-- #384970 Color -->
  <!-- Contenido Principal -->
  <div class="row">
    <!-- Parciales en Tabuladores -->
    <div class="col-md-9 mx-auto my-auto">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active border-3" id="parcial1-tab" data-bs-toggle="tab" href="#parcial1"
            role="tab" aria-controls="parcial1" aria-selected="true">Primer Parcial</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link border-3" id="parcial2-tab" data-bs-toggle="tab" href="#parcial2" role="tab"
            aria-controls="parcial2" aria-selected="false">Segundo Parcial</a>
        </li>
        <li class="nav-item col-md-3 text-center" role="presentation">
          <button class="nav-link border-2 border-2" id="informacionGeneral-tab" data-bs-toggle="modal"
            data-bs-target="#myModal" role="tab" aria-controls="informacionGeneral" aria-selected="false">
            Información General
          </button>
        </li>
        <li class="nav-item col-md-3 text-center">
          <button class="nav-link border-2 border-2" id="btnCmbColor" data-bs-toggle="modal"
            data-bs-target="" role="tab" aria-controls="" aria-selected="false">
            Color
          </button>
        </li>
      </ul>
      <script>
      </script>
      <div class="tab-content" id="myTabContent">
        <!-- Parcial 1 -->
        <div class="tab-pane fade show active" id="parcial1" role="tabpanel" aria-labelledby="parcial1-tab">
          <form class="rounded p-0" style="background-color: whitesmoke;" method="post">
            <div class="row rounded-top p-2 " style=" background-color: #384970; color: white;">
              <div class="col-md-4 text-center">
                <h5>Criterios de evaluación - Primer Parcial</h5>
              </div>
              <div class="col-md-4 text-center">
                <h5>Valor Máximo</h5>
              </div>
              <div class="col-md-4 text-center">
                <h5>Puntuación</h5>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Asistió puntualmente a las reuniones de asesoría</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="PuntualidadP1" class="form-control" min="0" max="10" step="1"
                    value="<?php echo $ParcialUno['ERPuntualidad'] ?>" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Demuestra conocimiento en el área de su especialidad</p>
              </div>
              <div class="col-md-4 text-center">
                <p>20</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="ConocimientoP1" class="form-control" min="0" max="20" step="1"
                    value="<?php echo $ParcialUno['ERConocimiento'] ?>" required>
                </div>
              </div>
            </div>
            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Trabaja en equipo y se comunica en forma efectiva (oral y escrita)</p>
              </div>
              <div class="col-md-4 text-center">
                <p>15</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="TrabajoEquipoP1" class="form-control" min="0" max="15" step="1"
                    value="<?php echo $ParcialUno['ERTrabajoEquipo'] ?>" required>
                </div>
              </div>
            </div>
            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Es dedicado y proactivo en las actividades encomendadas </p>
              </div>
              <div class="col-md-4 text-center">
                <p>20</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="DedicacionP1" class="form-control" min="0" max="20" step="1"
                    value="<?php echo $ParcialUno['ERDedicacion'] ?>" required>
                </div>
              </div>
            </div>
            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Es ordenado y cumple satisfactoriamente con las actividades encomendadas en los tiempos establecidos
                </p>
              </div>
              <div class="col-md-4 text-center">
                <p>20</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="OrdenadoP1" class="form-control" min="0" max="20" step="1"
                    value="<?php echo $ParcialUno['EROrdenado'] ?>" required>
                </div>
              </div>
            </div>
            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Propone mejoras al proyecto</p>
              </div>
              <div class="col-md-4 text-center">
                <p>15</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="DaMejorasP1" class="form-control" min="0" max="15" step="1"
                    value="<?php echo $ParcialUno['ERDaMejoras'] ?>" required>
                </div>
              </div>
            </div>
            <div class="row" style="background-color: #384970E6; padding: 10px;">
              <div id="puntosP1" class="col-md-4">
                <strong style="color: White">Total de Puntos del Primer Parcial:</strong>
              </div>
              <div class="col-md-4 text-center ">
                <strong style="color: white">Al hacer clic en guardar se actualizarán los datos</strong>
              </div>
              <div class="col-md-4">
                <input type="number" name="ERCalificacionP1" disabled class="form-control"
                  value="<?php echo $ParcialUno['ERCalificacion'] ?>">
              </div>
            </div>
            <script>
            </script>
            <div class="row" style="background-color: #384970E6;">
              <div class="col-md-12 text-center">
                <label class="lb-inp" style="color: white; font-size: 20px;"><strong>Observaciones:</strong></label>
              </div>
            </div>
            <div class="row" style="background-color:  #384970E6;">
              <div class="col-md-12">
                <textarea class="form-control" name="Observaciones"
                  style="resize: none;"><?php echo $ParcialUno['ERObservaciones'] ?></textarea>
              </div>
            </div>

            <div class="row rounded-bottom p-2" style="background-color: #384970E6;">
              <div class="col-md-12 text-center ">
                <td id="" colspan="3" style="color: rgb(180, 0, 0);"><strong id="test1"></strong></td>
                <div id="espDivBtn"></div>
                <?php if (getBoton('Par1')) { ?>
                  <script>
                    $("#test1").text('Actualiza mientras no estes fuera del periodo'); //SET TEXT
                    $("#espDivBtn").html('<input id="espBtn1">'); //SET HTML
                    $("#espBtn1").val("Guardar"); //SET VAL
                    $("#espBtn1").attr({ //SET ATTRIBUTO
                      "name": "Par1",
                      "formaction": "procesos/AsesorInternoGuardarEvSeguimiento.php",
                      "type": "submit"
                    });
                    $("#espBtn1").addClass("btn btn-success");// ADD CLASS
                    $("#test1").css("color", "yellow");//ADD CSS
                  </script>
                <?php } else { ?>
                  <script>$("#test1").text("Fuera del Periodo de evaluacion");
                    $("#test1").css("color", "yellow");
                  </script>
                <?php } ?>
              </div>
            </div>
            <input type="hidden" name="idSoliRes" value="<?php echo $idSolicitudResidencia; ?>">
            <input type="hidden" name="idUAsesor" value="<?php echo $idAsesor; ?>">
            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" disabled>
          </form>
        </div>
        <!-- Fin Parcial 1 -->
        <!-- Inicio Parcial 2 -->
        <div class="tab-pane fade" id="parcial2" role="tabpanel" aria-labelledby="parcial2-tab">
          <!-- Parcial 2 -->
          <form class="rounded p-0" style="background-color: whitesmoke;" method="post">
            <div class="row rounded-top p-2 " style=" background-color: #384970; color: white;">
              <div class="col-md-4 text-center">
                <h5>Criterios de evaluación - Segundo Parcial</h5>
              </div>
              <div class="col-md-4 text-center">
                <h5>Valor Máximo</h5>
              </div>
              <div class="col-md-4 text-center">
                <h5>Puntuación</h5>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Asistió puntualmente a las reuniones de asesoría</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="PuntualidadP2" class="form-control" min="0" max="10" step="1"
                    value="<?php echo $ParcialDos['ERPuntualidad'] ?>" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Demuestra conocimiento en el área de su especialidad</p>
              </div>
              <div class="col-md-4 text-center">
                <p>20</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="ConocimientoP2" class="form-control" min="0" max="20" step="1"
                    value="<?php echo $ParcialDos['ERConocimiento'] ?>" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Trabaja en equipo y se comunica en forma efectiva (oral y escrita)</p>
              </div>
              <div class="col-md-4 text-center">
                <p>15</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="TrabajoEquipoP2" class="form-control" min="0" max="15" step="1"
                    value="<?php echo $ParcialDos['ERTrabajoEquipo'] ?>" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Es dedicado y proactivo en las actividades encomendadas </p>
              </div>
              <div class="col-md-4 text-center">
                <p>20</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="DedicacionP2" class="form-control" min="0" max="20" step="1"
                    value="<?php echo $ParcialDos['ERDedicacion'] ?>" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Es ordenado y cumple satisfactoriamente con las actividades encomendadas en los tiempos establecidos
                </p>
              </div>
              <div class="col-md-4 text-center">
                <p>20</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="OrdenadoP2" class="form-control" min="0" max="20" step="1"
                    value="<?php echo $ParcialDos['EROrdenado'] ?>" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Propone mejoras al proyecto</p>
              </div>
              <div class="col-md-4 text-center">
                <p>15</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="DaMejorasP2" class="form-control" min="0" max="15" step="1"
                    value="<?php echo $ParcialDos['ERDaMejoras'] ?>" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #384970E6; padding: 10px;">
              <div class="col-md-4">
                <strong style="color: White">Total de Puntos del Segundo Parcial:</strong>
              </div>
              <div class="col-md-4 text-center ">
                <strong style="color: white">Al hacer clic en guardar se actualizarán los datos</strong>
              </div>
              <div class="col-md-4">
                <input type="number" disabled class="form-control" name="ERCalificacionP2"
                  value="<?php echo $ParcialDos['ERCalificacion'] ?>">
              </div>
            </div>

            <div class="row" style="background-color: #384970E6;">
              <div class="col-md-12 text-center">
                <label class="lb-inp" style="color: white; font-size: 20px;"><strong>Observaciones:</strong></label>
              </div>
            </div>
            <div class="row" style="background-color:  #384970E6;">
              <div class="col-md-12">
                <textarea class="form-control" name="Observaciones"
                  style="resize: none;"><?php echo $ParcialDos['ERObservaciones'] ?></textarea>
              </div>
            </div>

            <div class="row rounded-bottom p-2" style="background-color: #384970E6;">
              <div class="col-md-12 text-center ">
                <td id="" colspan="3" style="color: rgb(180, 0, 0);"><strong id="test2" style="color: yellow"></strong>
                </td>
                <div id="espDivBtn2"></div>
                <?php if (getBoton('Par2')) { ?>
                  <script>
                    $("#espDivBtn2").html('<input id="espBtn2">'); //SET HTML
                    $("#espBtn2").val("Guardar"); //SET VAL
                    $("#espBtn2").attr({ //SET ATTRIBUTO
                      "name": "Par2",
                      "formaction": "procesos/AsesorInternoGuardarEvSeguimiento.php",
                      "type": "submit"
                    });
                    $("#espBtn2").addClass("btn btn-success");//ADD CLASS

                  </script>
                <?php } ?>
                <script>
                  $("#test2").append($("#test1").html());
                </script>
              </div>
            </div>
            <input type="hidden" name="idSoliRes" value="<?php echo $idSolicitudResidencia; ?>">
            <input type="hidden" name="idUAsesor" value="<?php echo $idAsesor; ?>">
            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" disabled>
          </form>
        </div>
        <!-- Fin Parcial 2 -->
        <style>
          .texto-negro {
            color: black;
          }
          .texto-blanco {
            color: white;
          }
          .bg-darks {
            background-color: black;
          }
        </style>

        <!-- Main -->
        <script>
          $("#parcial1-tab, #parcial2-tab, #informacionGeneral-tab, #btnCmbColor").remove("text-white");
            $("#btnCmbColor").click(function () {
              $("#parcial1-tab, #parcial2-tab, #informacionGeneral-tab, #btnCmbColor").toggleClass("text-dark");
              $("#contbg").toggleClass("bg-dark");
              
            });
        </script>
        <!--Tab Informacion General -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Información General</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Número de control:</p>
                  </div>
                  <div class="col-md-8">
                    <p>
                      <?php echo $consultaAlumno['NumeroControl']; ?>
                    </p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Nombre del Residente:</p>
                  </div>
                  <div class="col-md-8">
                    <p id="eNombreCompletoAlumno">
                      <?php echo $consultaAlumno['NombreCompleto']; ?>
                    </p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Nombre del Proyecto:</p>
                  </div>
                  <div class="col-md-8">
                    <p>
                      <?php echo $consultaAlumnoProyecto['SPNombreProyecto']; ?>
                    </p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Programa Educativo:</p>
                  </div>
                  <div class="col-md-8">
                    <p>
                      <?php echo $consultaAlumnoCarrera['Nombre']; ?>
                    </p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Periodo de Realización:</p>
                  </div>
                  <div class="col-md-8">
                    <p>
                      <?php echo $consultaAlumnoProyecto['SRPeriodo']; ?>
                    </p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Nombre del Asesor Interno:</p>
                  </div>
                  <div class="col-md-8">
                    <p>
                      <?php echo $consultaAsesor['NombreCompleto']; ?>
                    </p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Fecha:</p>
                  </div>
                  <div class="col-md-8">
                    <p>
                      <?php echo date('Y-m-d'); ?>
                    </p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <abbr title="Suma de los 2 parciales" class="initialism">
                      <p class="text-capitalize">Total de puntos:</p>
                    </abbr>
                  </div>
                  <div class="col-md-8">
                    <p>
                      <?php echo $ParcialUno['ERCalificacion'] + $ParcialDos['ERCalificacion'] ?>
                    </p>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <form method="post">
                  <input type="hidden" name="redireccionar" value="../Asesor/AsesorInternoAlumnos.php">
                  <input type="hidden" name="idUAlumno" value="<?php echo $idAlumno; ?>">
                  <input type="submit" value="Descargar Evaluacion" class="btn btn-outline-primary"
                    formaction="../GenerarDocs/GenerarEvaluacionSeguimiento.php" target="_blank">
                </form>
              </div>
            </div>
            <script>$("form").prepend("<hr>");</script>
          </div>
        </div>
        <!-- Fin Informacion General -->
      </div>
    </div>
  </div>
  <br>
  <!-- Fin Contenido Principal -->
</div>
<!-- Fin Main -->
</div>
<?php
include 'footer.php';
?>