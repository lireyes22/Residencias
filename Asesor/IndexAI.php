<?php
include '../InicioSessionSeg.php';
include('funcAsesor.php');
$UID = $_SESSION['id'];
$nombreCompleto = bienvenida($UID);
$nombre = explode(" ", $nombreCompleto);
include 'headAsesorInterno.php';
?>
<div class="container col ms-sm-auto px-4">
<div class="card">
  <div class="card-header">
    ¡BIENVENIDO!
  </div>
  <div class="card-body">
    <h5 class="card-title">Sistema de Residencias Profesionales.</h5>
    <p class="card-text">Nos alegra verte de nuevo, <?php echo $nombre[0] ?>.</p>
    <a href="./AsesorInternoAlumnos.php" class="btn btn-primary">¿Que hay de nuevo?</a>
  </div>
</div>
</div>
<?php include 'footer.php'; ?>