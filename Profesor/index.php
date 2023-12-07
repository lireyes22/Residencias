<?php
include '../InicioSessionSeg.php';
include 'funcProfesor.php';
$UID = $_SESSION['id'];
$nombreCompleto = bienvenida($UID);
$nombre = explode(" ", $nombreCompleto);
include 'headprofesores.php';
?>


<div class="container col ms-sm-auto px-4">
  <div class="d-flex justify-content-start mt-3 mb-3 btn-group col-2">
		<button id='fadeInButton' type="submit" class="btn btn-primary">Ver Tarjeta</button>
		<button id='fadeOutButton' type="submit" class="btn btn-primary">Ocultar Tarjeta</button>
	</div>
<div id="cardDiv" class="card">
  <div class="card-header">
    ¡BIENVENIDO!
  </div>
  <div class="card-body">
    <h5 class="card-title">Sistema de Residencias Profesionales.</h5>
    <p class="card-text">Nos alegra verte de nuevo, <?php echo $nombre[0] ?>.</p>
    <a href="./profesorMisProyectos.php" class="btn btn-primary">¿Que hay de nuevo?</a>
  </div>
</div>
</div>
<?php
include 'footer.php';
?>