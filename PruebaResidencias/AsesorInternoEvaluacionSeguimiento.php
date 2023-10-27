<?php
include 'headAsesorInterno.php';
?>
<!-- Main -->
<div class="col ms-sm-auto px-4" style="background-color: whitesmoke;">
  <br>
  <!-- #384970 Color -->
  <!-- Contenido Principal -->
  <div class="row">
    <!-- Parciales en Tabuladores -->
    <div class="col-md-9 mx-auto my-auto">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active border-3 text-black" id="parcial1-tab" data-bs-toggle="tab" href="#parcial1" role="tab" aria-controls="parcial1" aria-selected="true">Primer Parcial</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link border-3 text-black" id="parcial2-tab" data-bs-toggle="tab" href="#parcial2" role="tab" aria-controls="parcial2" aria-selected="false">Segundo Parcial</a>
        </li>
        <li class="nav-item col-md-3 text-center" role="presentation">
          <a class="nav-link border-2 border-2 text-black" id="informacionGeneral-tab" data-bs-toggle="modal" data-bs-target="#myModal" role="tab" aria-controls="informacionGeneral" aria-selected="false">
            Información General
          </a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <!-- Parcial 1 -->
        <div class="tab-pane fade show active" id="parcial1" role="tabpanel" aria-labelledby="parcial1-tab">
          <form class="rounded p-0" style="background-color: whitesmoke;">
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
                <p>Asistió puntualmente en el horario establecido</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="PuntualidadP1" class="form-control" min="0" max="10" step="1" required>
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
                  <input type="number" name="ConocimientoP1" class="form-control" min="0" max="20" step="1" required>
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
                  <input type="number" name="TrabajoEquipoP1" class="form-control" min="0" max="15" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Es dedicado y proactivo en las actividades encomendadas	</p>
              </div>
              <div class="col-md-4 text-center">
                <p>20</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="DedicacionP1" class="form-control" min="0" max="20" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Es ordenado y cumple satisfactoriamente con las actividades encomendadas en los tiempos establecidos	</p>
              </div>
              <div class="col-md-4 text-center">
                <p>20</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="DaMejorasP1" class="form-control" min="0" max="20" step="1" required>
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
                  <input type="number" name="ProponeMejorasP1" class="form-control" min="0" max="15" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #384970E6; padding: 10px;">
              <div class="col-md-4">
                <strong style="color: White">Total de Puntos del Primer Parcial:</strong>
              </div>
              <div class="col-md-4 text-center ">
                <strong style="color: red">AQUI PUEDE IR LA ALERTA</strong>
              </div>
              <div class="col-md-4">
                <input type="number" name="" disabled class="form-control">
              </div>
            </div>

            <div class="row" style="background-color: #384970E6;">
              <div class="col-md-12 text-center">
                <label class="lb-inp" style="color: white; font-size: 20px;"><strong>Observaciones:</strong></label>
              </div>
            </div>
            <div class="row" style="background-color:  #384970E6;">
              <div class="col-md-12">
                <textarea class="form-control" name="Observaciones" style="resize: none;"></textarea>
              </div>
            </div>

            <div class="row rounded-bottom p-2" style="background-color: #384970E6;">
              <div class="col-md-12 text-center ">
                <button class="btn btn-outline-primary" type="submit">Enviar</button>
              </div>
            </div>

          </form>
        </div>
        <!-- Fin Parcial 1 -->
        <!-- Inicio Parcial 2 -->
        <div class="tab-pane fade" id="parcial2" role="tabpanel" aria-labelledby="parcial2-tab">
          <!-- Parcial 2 -->
          <form class="rounded p-0" style="background-color: whitesmoke;">
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
                <p>Asistió puntualmente en el horario establecido</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="PuntualidadP2" class="form-control" min="0" max="10" step="1" required>
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
                  <input type="number" name="ConocimientoP2" class="form-control" min="0" max="20" step="1" required>
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
                  <input type="number" name="TrabajoEquipoP2" class="form-control" min="0" max="15" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Es dedicado y proactivo en las actividades encomendadas	</p>
              </div>
              <div class="col-md-4 text-center">
                <p>20</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="DedicacionP2" class="form-control" min="0" max="20" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Es ordenado y cumple satisfactoriamente con las actividades encomendadas en los tiempos establecidos	</p>
              </div>
              <div class="col-md-4 text-center">
                <p>20</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="DaMejorasP2" class="form-control" min="0" max="20" step="1" required>
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
                  <input type="number" name="ProponeMejorasP2" class="form-control" min="0" max="15" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #384970E6; padding: 10px;">
              <div class="col-md-4">
                <strong style="color: White">Total de Puntos del Primer Parcial:</strong>
              </div>
              <div class="col-md-4 text-center ">
                <strong style="color: red">AQUI PUEDE IR LA ALERTA</strong>
              </div>
              <div class="col-md-4">
                <input type="number" name="" disabled class="form-control">
              </div>
            </div>

            <div class="row" style="background-color: #384970E6;">
              <div class="col-md-12 text-center">
                <label class="lb-inp" style="color: white; font-size: 20px;"><strong>Observaciones:</strong></label>
              </div>
            </div>
            <div class="row" style="background-color:  #384970E6;">
              <div class="col-md-12">
                <textarea class="form-control" name="Observaciones" style="resize: none;"></textarea>
              </div>
            </div>

            <div class="row rounded-bottom p-2" style="background-color: #384970E6;">
              <div class="col-md-12 text-center ">
                <button class="btn btn-outline-primary" type="submit">Enviar</button>
              </div>
            </div>

          </form>
        </div>
        <!-- Fin Parcial 2 -->
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
                    <p>20390231</p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Nombre del Residente:</p>
                  </div>
                  <div class="col-md-8">
                    <p>Moy Acevedo Pérez</p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Nombre del Proyecto:</p>
                  </div>
                  <div class="col-md-8">
                    <p>Drones</p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Programa Educativo:</p>
                  </div>
                  <div class="col-md-8">
                    <p>Ingeniería en Tecnologías de Informacíon y Comunicaciones</p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Periodo de Realización:</p>
                  </div>
                  <div class="col-md-8">
                    <p>AGO-NOV 2023</p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Nombre del Asesor Interno:</p>
                  </div>
                  <div class="col-md-8">
                    <p>Juan Sebastian Perez Dominguez</p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Fecha:</p>
                  </div>
                  <div class="col-md-8">
                    <p>11/11/2011</p>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4">
                    <p>Total de puntos:</p>
                  </div>
                  <div class="col-md-8">
                    <p>25</p>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary">Descargar Evaluación</button>
              </div>
            </div>

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