<?php
include 'headAsesorInterno.php';
?>
<!-- Main -->
<div class="col ms-sm-auto px-4" style="background-color: whitesmoke;">
  <br>
  <!-- #384970 Color -->
  <!-- Contenido Principal -->
  <div class="row">
    <!-- Informacion General -->
    <div class="col-md-3">
      <div class="card w-100 text-center text-white" style="background-color: #384970;">
        <div class="card-body">
          <h4 class="card-title">Información General</h4>
          <form method="post">
            <div class="form-group">
              <label for="numControl" class="form-label">Número de control:</label>
              <input type="text" id="numControl" class="form-control" value="<!-- NumeroControl -->" readonly>
            </div>
            <div class="form-group">
              <label for="NombreResidente" class="form-label">Nombre del Residente:</label>
              <input type="text" id="NombreResidente" class="form-control" value="<!-- NombreCompleto -->" readonly>
            </div>
            <div class="form-group">
              <label for="NombreProyecto" class="form-label">Nombre del Proyecto:</label>
              <input type="text" id="NombreProyecto" class="form-control" value="<!-- NombreProyecto -->" readonly>
            </div>
            <div class="form-group">
              <label for="ProgramaEducativo" class="form-label">Programa Educativo:</label>
              <input type="text" id="ProgramaEducativo" class="form-control" value="<!-- Nombre -->" readonly>
            </div>
            <div class="form-group">
              <label for="PeriodoRealizacion" class="form-label">Periodo de Realización:</label>
              <input type="text" id="PeriodoRealizacion" class="form-control" value="<!-- Periodo -->" readonly>
            </div>
            <div class="form-group">
              <label for="AsesorInterno" class="form-label">Nombre del Asesor Interno:</label>
              <input type="text" id="AsesorInterno" class="form-control" value="<!-- Nombre -->" readonly>
            </div>
            <div class="form-group">
              <label for="FechaEvaluacion" class="form-label">Fecha de Evaluacion:</label>
              <input type="date" id="FechaEvaluacion" class="form-control" value="<!-- Fecha -->" readonly>
            </div>
            <div class="form-group">
              <label for="TotalPuntos" class="form-label">Total de Puntos:</label>
              <input type="text" id="TotalPuntos" class="form-control" value="<!-- Valor de Calificaciones -->" readonly>
            </div>
            <br>
            <button class="btn btn-outline-primary" type="submit" formaction="" target="_blank">Descargar Evaluación</button>
            <br>
            <br>
            <button class="btn btn-outline-danger" type="submit" formaction="" target="_blank">Descargar Reporte</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Reporte Final en Tabulador -->
    <div class="col-md-9">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item col-md-12 text-center" role="presentation">
          <a class="nav-link active border-2" style="background-color: #384970; color: white;" id="reporteFinal-tab" data-bs-toggle="tab" role="tab" aria-controls="reporteFinal" aria-selected="true">
            <h3>Reporte Final</h3>
          </a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <!-- Reporte Final -->
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
                <h5>Evaluación Asesor Interno</h5>
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
                  <input type="number" name="portada" class="form-control" min="0" max="1" step="1" required>
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
                  <input type="number" name="agradecimiento" class="form-control" min="0" max="0" step="1" required>
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
                  <input type="number" name="resumen" class="form-control" min="0" max="2" step="1" required>
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
                  <input type="number" name="indice" class="form-control" min="0" max="2" step="1" required>
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
                  <input type="number" name="introduccion" class="form-control" min="0" max="5" step="1" required>
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
                  <input type="number" name="antecedentes" class="form-control" min="0" max="5" step="1" required>
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
                  <input type="number" name="justificacion" class="form-control" min="0" max="5" step="1" required>
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
                  <input type="number" name="objetivos" class="form-control" min="0" max="10" step="1" required>
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
                  <input type="number" name="metodologia" class="form-control" min="0" max="10" step="1" required>
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
                  <input type="number" name="resultado" class="form-control" min="0" max="15" step="1" required>
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
                  <input type="number" name="discusion" class="form-control" min="0" max="25" step="1" required>
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
                  <input type="number" name="discusion" class="form-control" min="0" max="15" step="1" required>
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
                  <input type="number" name="fuenteInformacion" class="form-control" min="0" max="5" step="1" required>
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
        <!-- Fin Reporte Final -->
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