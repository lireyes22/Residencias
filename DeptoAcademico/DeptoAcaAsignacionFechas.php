<?php
	include ('../InicioSessionSeg.php');
	include ('funcionesDepto.php');
	$UID = $_SESSION['id'];
	$query = getFechas();
	$limites  = [];
	$fechaID = [];
	$i = 0;
	while($consulta = mysqli_fetch_assoc($query)){
		$limites[$i] = $consulta['FVFechaLimite'];
		$fechaID[$i] = $consulta['FVTramite'];
		$i++;
	}
?> 
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
         <div class="col-md-6" id="evaRepFin">
            <div class="card mb-4">
               <div class="card-header text-white" style="background-color: #384970E6;">
                  <h2 class="h5">Evaluación Reporte Final</h2>
               </div>
               <div class="card-body">
                  <p class="mb-0"> <strong>Fecha Límite: <?php echo $limites[0];  ?></strong></p>
				  <form action="exc/UpdateFechaLimite.php" method="POST">
                  <div class="form-group mt-3">
                     <label for="nueva_fecha_1">Nueva Fecha:</label>
                     <input type="date" class="form-control" id="nueva_fecha_1" name="FVNewFechaLimite" required>
                  </div>
				  <input type="hidden" name="FVTramite" value="<?php echo $fechaID[0]; ?>">
                  <button class="btn btn-outline-danger btn-block mt-3 actualizarFecha">Actualizar Fecha</button>
				  </form>
               </div>
            </div>
         </div>
         <div class="col-md-6" id="evaSeg">
            <div class="card mb-4">
               <div class="card-header text-white" style="background-color: #384970E6;">
                  <h2 class="h5">Evaluación de Seguimiento</h2>
               </div>
               <div class="card-body">
                  <p class="mb-0"><strong>Fecha Límite: <?php echo $limites[1];  ?></strong></p>
				  <form action="exc/UpdateFechaLimite.php" method="POST">
                  <div class="form-group mt-3">
                     <label for="nueva_fecha_2">Nueva Fecha:</label>
                     <input type="date" class="form-control" id="nueva_fecha_2" name="FVNewFechaLimite" required>
                  </div>
				  <input type="hidden" name="FVTramite" value="<?php echo $fechaID[1]; ?>">
                  <button class="btn btn-outline-danger btn-block mt-3 actualizarFecha">Actualizar Fecha</button>
				  </form>
				</div>
            </div>
         </div>
      </div>
      <!-- Sección de Trámite 3 y 4 -->
      <div class="row mt-4">
         <div class="col-md-6" id="">
            <div class="card mb-4">
               <div class="card-header text-white" style="background-color: #384970E6;">
                  <h2 class="h5">Espacio para proponer proyectos</h2>
               </div>
               <div class="card-body">
                  <p class="mb-0"><strong>Fecha Límite: <?php echo $limites[2];  ?></strong></p>
				  <form action="exc/UpdateFechaLimite.php" method="POST">
                  <div class="form-group mt-3">
                     <label for="nueva_fecha_3">Nueva Fecha:</label>
                     <input type="date" class="form-control" id="nueva_fecha_3" name="FVNewFechaLimite" required>
                  </div>
				  <input type="hidden" name="FVTramite" value="<?php echo $fechaID[2];  ?>">
                  <button class="btn btn-outline-danger btn-block mt-3 actualizarFecha">Actualizar Fecha</button>
				  </form>
				</div>
            </div>
         </div>
         <div class="col-md-6" id="solRes">
            <div class="card mb-4">
               <div class="card-header text-white" style="background-color: #384970E6;">
                  <h2 class="h5">Solicitar Residencia</h2>
               </div>
               <div class="card-body">
                  <p class="mb-0"><strong>Fecha Límite: <?php echo $limites[3];  ?></strong></p>
                 <form action="exc/UpdateFechaLimite.php" method="POST"> 
				  <div class="form-group mt-3">
                     <label for="nueva_fecha_4">Nueva Fecha:</label>
                     <input type="date" class="form-control" id="nueva_fecha_4" name="FVNewFechaLimite" required>
                  </div>
				  <input type="hidden" name="FVTramite" value="<?php echo $fechaID[3];  ?>">
                  <button class="btn btn-outline-danger btn-block mt-3 actualizarFecha">Actualizar Fecha</button>
				  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script> 
  /*function enviarFecha(enviado){
      $(enviado).animate({height: '50px', opacity: '0.8'}, "fast");
      $(enviado).animate({width: '50px', opacity: '0.8'}, "fast");
      $(enviado).animate({height: '100px', opacity: '0.8'}, "slow");
      $(enviado).animate({width: '600px', opacity: '0.8'}, "slow");
  }*/
</script> 
<?php
include 'footer.php';
?>