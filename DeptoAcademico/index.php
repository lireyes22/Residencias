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
  <!-- href="./deptoAcaAsigProyResV2.php" //<p class="card-text">Nos alegra verte de nuevo, <?php //echo $nombre[0] ?>.</p>-->
  <div class="card-body">
    <h5 class="card-title">Sistema de Residencias Profesionales.</h5>
    <h5 class="card-text">Nos alegra verte de nuevo, <small><?php echo $nombre[0] ?></small>.</h5>
    <button class="btn btn-primary" type="button" class="btn btn-outline-primary"
		data-bs-toggle="modal" data-bs-target="#index">
    ANUNCIOS</button>
  </div>
</div>
</div>
<!--modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5-->
<div class="modal fade" tabindex="-1" role="dialog" id="index">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content rounded-4 shadow">
    <div class="modal-header"> 
      <b class="display-6 mb-0">¿Que hay de nuevo?</b>
      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
      <div class="modal-body p-5">
          <div class="row">
            <div class="col-md-4 col-12">
              <img src="../img/comunicados/periodo_2023.png" alt="x" class="img-responsive img-fluid">
            </div>
            <div class="col-md-4 col-12">
            <img src="../img/comunicados/platicas_2023.jpeg" alt="x" class="img-responsive img-fluid">
            </div>
            <div class="col-md-4 col-12">
            <img src="../img/comunicados/banco_2023.png" alt="x" class="img-responsive img-fluid">
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <button type="button" class="btn btn-lg btn-primary mt-5 w-100" data-bs-dismiss="modal">Listo!</button>
            </div>
            <div class="col-8">
              <a class="btn btn-lg btn-info mt-5 w-100" href="http://www.itchetumal.edu.mx" target="blank">Visita nuestra WEB!</a>
            </div>
          </div>
    </div>
  </div>
</div>
</div>
<?php
include 'footer.php';
?>