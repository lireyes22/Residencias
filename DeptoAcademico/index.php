<?php
	include ('../InicioSessionSeg.php');
	$UID = $_SESSION['id'];
	include 'funcionesDepto.php';
	$nombreCompleto = bienvenida($UID);
	$nombre = explode(" ", $nombreCompleto);
	include 'headDeptoAca.php';
?>
<div class="container col ms-sm-auto px-4">
<div class="card mt-4">
  <div class="card-header">
    ¡BIENVENIDO!
  </div>
  <div class="card-body">
    <h5 class="card-title">Sistema de Residencias Profesionales.</h5>
    <p class="card-text">Nos alegra verte de nuevo, <?php echo $nombre[0] ?>.</p>
    <a href="./deptoAcaAsigProyResV2.php" class="btn btn-primary">Nuevos Proyectos</a>
  </div>
</div>
</div>
<?php
include 'footer.php';
?>