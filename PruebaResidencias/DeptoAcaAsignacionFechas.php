<?php
include 'headDeptoAca.php';
?>
<!-- Main -->
<div class="col ms-sm-auto px-4" style="background-color: whitesmoke">
   <div class="container">
      <div class="row">
         <div class="col-12 text-center">
            <h1 class="display-4">Lista de Trámites</h1>
         </div>
      </div>

      <!-- Sección de Trámite 1 y 2 -->
      <div class="row mt-4">
         <div class="col-md-6">
            <div class="card mb-4">
               <div class="card-header text-white" style="background-color: #384970E6;">
                  <h2 class="h5">Evaluación Reporte Final</h2>
               </div>
               <div class="card-body">
                  <p class="mb-0"> <strong>Fecha Límite: 2023-01-15</strong></p>
                  <div class="form-group mt-3">
                     <label for="nueva_fecha_1">Nueva Fecha:</label>
                     <input type="date" class="form-control" id="nueva_fecha_1" required>
                  </div>
                  <button class="btn btn-outline-danger btn-block mt-3">Actualizar Fecha</button>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card mb-4">
               <div class="card-header text-white" style="background-color: #384970E6;">
                  <h2 class="h5">Evaluación de Seguimiento</h2>
               </div>
               <div class="card-body">
                  <p class="mb-0"><strong>Fecha Límite: 2023-02-20</strong></p>
                  <div class="form-group mt-3">
                     <label for="nueva_fecha_2">Nueva Fecha:</label>
                     <input type="date" class="form-control" id="nueva_fecha_2" required>
                  </div>
                  <button class="btn btn-outline-danger btn-block mt-3">Actualizar Fecha</button>
               </div>
            </div>
         </div>
      </div>

      <!-- Sección de Trámite 3 y 4 -->
      <div class="row mt-4">
         <div class="col-md-6">
            <div class="card mb-4">
               <div class="card-header text-white" style="background-color: #384970E6;">
                  <h2 class="h5">Espacio para proponer proyectos</h2>
               </div>
               <div class="card-body">
                  <p class="mb-0"><strong>Fecha Límite: 2023-03-10</strong></p>
                  <div class="form-group mt-3">
                     <label for="nueva_fecha_3">Nueva Fecha:</label>
                     <input type="date" class="form-control" id="nueva_fecha_3" required>
                  </div>
                  <button class="btn btn-outline-danger btn-block mt-3">Actualizar Fecha</button>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card mb-4">
               <div class="card-header text-white" style="background-color: #384970E6;">
                  <h2 class="h5">Solicitar Residencia</h2>
               </div>
               <div class="card-body">
                  <p class="mb-0"><strong>Fecha Límite: 2023-04-05</strong></p>
                  <div class="form-group mt-3">
                     <label for="nueva_fecha_4">Nueva Fecha:</label>
                     <input type="date" class="form-control" id="nueva_fecha_4" required>
                  </div>
                  <button class="btn btn-outline-danger btn-block mt-3">Actualizar Fecha</button>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
<?php
include 'footer.php';
?>