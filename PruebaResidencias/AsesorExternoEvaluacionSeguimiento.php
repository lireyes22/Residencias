<?php
include 'headAsesorExterno.php';
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
          <a class="nav-link active border-3" id="parcial1-tab" data-bs-toggle="tab" href="#parcial1" role="tab" aria-controls="parcial1" aria-selected="true">Primer Parcial</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link border-3" id="parcial2-tab" data-bs-toggle="tab" href="#parcial2" role="tab" aria-controls="parcial2" aria-selected="false">Segundo Parcial</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link border-3 bg-danger text-white" id="informacionGeneral-tab" data-bs-toggle="tab" href="#informacionGeneral" role="tab" aria-controls="informacionGeneral" aria-selected="false">Información General</a>
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
                <p>Asiste puntualmente en el horario establecido</p>
              </div>
              <div class="col-md-4 text-center">
                <p>5</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="PuntualidadP1" class="form-control" min="0" max="5" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Trabaja en equipo y se comunica en forma efectiva (oral y escrita)</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="TrabajoEquipoP1" class="form-control" min="0" max="10" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Tiene iniciativa para colaborar</p>
              </div>
              <div class="col-md-4 text-center">
                <p>5</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="DedicacionP1" class="form-control" min="0" max="5" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Propone mejoras al proyecto</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="DaMejorasP1" class="form-control" min="0" max="10" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Cumple con los objetivos correspondientes al proyecto</p>
              </div>
              <div class="col-md-4 text-center">
                <p>15</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="CumpleObjetivosP1" class="form-control" min="0" max="15" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Es ordenado y cumple satisfactoriamente con las actividades encomendadas en los tiempos establecidos en el cronograma</p>
              </div>
              <div class="col-md-4 text-center">
                <p>15</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="OrdenadoP1" class="form-control" min="0" max="15" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Demuestra liderazgo en su actuar</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="LiderazgoP1" class="form-control" min="0" max="10" step="1" required>
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
                <p>Demuestra un comportamiento ético (es disciplinado, acata órdenes, respeta a sus compañeros de trabajo, entre otros)</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="ComportamientoP1" class="form-control" min="0" max="10" step="1" required>
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
                <p>Asiste puntualmente en el horario establecido</p>
              </div>
              <div class="col-md-4 text-center">
                <p>5</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="PuntualidadP1" class="form-control" min="0" max="5" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Trabaja en equipo y se comunica en forma efectiva (oral y escrita)</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="TrabajoEquipoP1" class="form-control" min="0" max="10" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Tiene iniciativa para colaborar</p>
              </div>
              <div class="col-md-4 text-center">
                <p>5</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="DedicacionP1" class="form-control" min="0" max="5" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Propone mejoras al proyecto</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="DaMejorasP1" class="form-control" min="0" max="10" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Cumple con los objetivos correspondientes al proyecto</p>
              </div>
              <div class="col-md-4 text-center">
                <p>15</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="CumpleObjetivosP1" class="form-control" min="0" max="15" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #FFFFFF; padding: 10px;">
              <div class="col-md-4">
                <p>Es ordenado y cumple satisfactoriamente con las actividades encomendadas en los tiempos establecidos en el cronograma</p>
              </div>
              <div class="col-md-4 text-center">
                <p>15</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="OrdenadoP1" class="form-control" min="0" max="15" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #E9ECEF; padding: 10px;">
              <div class="col-md-4">
                <p>Demuestra liderazgo en su actuar</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="LiderazgoP1" class="form-control" min="0" max="10" step="1" required>
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
                <p>Demuestra un comportamiento ético (es disciplinado, acata órdenes, respeta a sus compañeros de trabajo, entre otros)</p>
              </div>
              <div class="col-md-4 text-center">
                <p>10</p>
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="number" name="ComportamientoP1" class="form-control" min="0" max="10" step="1" required>
                </div>
              </div>
            </div>

            <div class="row" style="background-color: #384970E6; padding: 10px;">
              <div class="col-md-4">
                <strong style="color: White">Total de Puntos del Segundo Parcial:</strong>
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
        <div class="tab-pane fade" id="informacionGeneral" role="tabpanel">
          <div class="card w-100 text-center text-white" style="background-color: #384970;">
            <div class="card-body">
              <h4 class="card-title">Información General</h4>
              <form method="post">
                <div class="form-group">
                  <label for="numControl" class="form-label">Número de control:</label>
                  <input type="text" id="numControl" class="form-control text-center" placeholder="<!-- NumeroControl -->" readonly>
                </div>
                <div class="form-group">
                  <label for="NombreResidente" class="form-label">Nombre del Residente:</label>
                  <input type="text" id="NombreResidente" class="form-control text-center" placeholder="<!-- NombreCompleto -->" readonly>
                </div>
                <div class="form-group">
                  <label for="NombreProyecto" class="form-label">Nombre del Proyecto:</label>
                  <input type="text" id="NombreProyecto" class="form-control text-center" placeholder="<!-- NombreProyecto -->" readonly>
                </div>
                <div class="form-group">
                  <label for="ProgramaEducativo" class="form-label">Programa Educativo:</label>
                  <input type="text" id="ProgramaEducativo" class="form-control text-center" placeholder="<!-- Nombre -->" readonly>
                </div>
                <div class="form-group">
                  <label for="PeriodoRealizacion" class="form-label">Periodo de Realización:</label>
                  <input type="text" id="PeriodoRealizacion" class="form-control text-center" placeholder="<!-- Periodo -->" readonly>
                </div>
                <div class="form-group">
                  <label for="AsesorExterno" class="form-label">Nombre del Asesor Externo:</label>
                  <input type="text" id="AsesorExterno" class="form-control text-center" placeholder="<!-- Nombre -->" readonly>
                </div>
                <div class="form-group">
                  <label for="FechaEvaluacion" class="form-label">Fecha:</label>
                  <input type="text" id="FechaEvaluacion" class="form-control text-center" placeholder="<!-- Fecha -->" readonly>
                </div>
                <div class="form-group">
                  <label for="TotalPuntos" class="form-label">Total de Puntos:</label>
                  <input type="text" id="TotalPuntos" class="form-control text-center" placeholder="<!-- Valor de Calificaciones -->" readonly>
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