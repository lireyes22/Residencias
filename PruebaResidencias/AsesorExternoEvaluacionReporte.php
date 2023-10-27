<?php
include 'headAsesorExterno.php';
?>
<!-- Main -->
<div class="col ms-sm-auto px-4" style="background: whitesmoke;">
  <br>
  <!-- #384970 Color -->
  <!-- Contenido Principal -->
  <div class="row">
    <!-- Tabuladores -->
    <div class="col-md-9 mx-auto my-auto">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item col-md-3 text-center" role="presentation">
          <a class="nav-link active border-2" id="reporteFinal-tab" data-bs-toggle="tab" href="#reporteFinal" role="tab" aria-controls="reporteFinal" aria-selected="true">
            <h5>Reporte Final</h5>
          </a>
        </li>
        <li class="nav-item col-md-4 text-center" role="presentation">
          <a class="nav-link border-2 bg-danger text-white" id="informacionGeneral-tab" data-bs-toggle="modal" data-bs-target="#myModal" role="tab" aria-controls="informacionGeneral" aria-selected="false">
            <h5>Información General</h5>
          </a>
        </li>
      </ul>
      <!-- Contenido de los Tab -->
      <div class="tab-content" id="myTabContent">
        <!-- Tab Reporte Final -->
        <div class="tab-pane fade show active" id="reporteFinal" role="tabpanel" aria-labelledby="reporteFinal-tab">
          <form class="rounded p-0" style="background-color: whitesmoke;">
            <div class="row rounded-top p-2 " style=" background-color: #384970; color: white;">
              <div class="col-md-4 text-center">
                <h5>Criterios de evaluación - Reporte Final</h5>
              </div>
              <div class="col-md-4 text-center">
                <h5>Valor Máximo</h5>
              </div>
              <div class="col-md-4 text-center">
                <h5>Evaluación Asesor Externo</h5>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Portada</p>
              </div>
              <div class="col-md-4 text-center">
                <p>1</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="portada" class="form-control text-center" min="0" max="1" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Agradecimientos</p>
              </div>
              <div class="col-md-4 text-center">
                <p>0</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="agradecimiento" class="form-control text-center" min="0" max="0" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Resúmen</p>
              </div>
              <div class="col-md-4 text-center">
                <p>2</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="resumen" class="form-control text-center" min="0" max="2" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>índice</p>
              </div>
              <div class="col-md-4 text-center">
                <p>2</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="indice" class="form-control text-center" min="0" max="2" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Introducción</p>
              </div>
              <div class="col-md-4 text-center">
                <p>5</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="introduccion" class="form-control text-center" min="0" max="5" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Antecedentes o Marco Teórico</p>
              </div>
              <div class="col-md-4 text-center">
                <p>5</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="antecedentes" class="form-control text-center" min="0" max="5" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Justificación</p>
              </div>
              <div class="col-md-4 text-center">
                <p>5</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="justificacion" class="form-control text-center" min="0" max="5" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Objetivos</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="objetivos" class="form-control text-center" min="0" max="10" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Metodología</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="metodologia" class="form-control text-center" min="0" max="10" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Resultados</p>
              </div>
              <div class="col-md-4 text-center">
                <p>15</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="resultado" class="form-control text-center" min="0" max="15" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Discusiones</p>
              </div>
              <div class="col-md-4 text-center">
                <p>25</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="discusion" class="form-control text-center" min="0" max="25" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Conclusiones</p>
              </div>
              <div class="col-md-4 text-center">
                <p>15</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="discusion" class="form-control text-center" min="0" max="15" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Fuentes de información</p>
              </div>
              <div class="col-md-4 text-center">
                <p>15</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="fuenteInformacion" class="form-control text-center" min="0" max="5" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #384970E6; padding: 10px;">
              <div class="col-md-4">
                <strong style="color: White">Puntuación Total Reporte Final:</strong>
              </div>
              <div class="col-md-4 text-center ">
                <strong style="color: red">AQUI PUEDE IR LA ALERTA</strong>
              </div>
              <div class="col-md-4">
                <input type="number" name="" disabled class="form-control text-center">
              </div>
            </div>

            <div class="row" style="background-color: #384970E6;">
              <div class="col-md-12 text-center">
                <label class="lb-inp" style="color: white; font-size: 20px;"><strong>Observaciones:</strong></label>
              </div>
            </div>

            <div class="row" style="background-color: #384970E6;">
              <div class="col-md-12 d-flex align-items-center">
                <textarea class="form-control text-center mx-auto my-auto" name="Observaciones" style="resize: none; width: 1000px; height: 150px;"></textarea>
              </div>
            </div>

            <div class="row rounded-bottom p-2" style="background-color: #384970E6;">
              <div class="col-md-12 text-center ">
                <button class="btn btn-outline-primary" type="submit">Enviar</button>
              </div>
            </div>

          </form>
        </div>
        <!-- Fin Reporte Final -->
        <!-- Modal de Información General -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Información General</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
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
                <!-- ... (Otros campos de información genérica) -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary">Descargar Evaluación</button>
                <button type="button" class="btn btn-outline-danger">Descargar Reporte</button>
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