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
		data-bs-toggle="modal" data-bs-target="#index" >
    ANUNCIOS <span class="badge bg-danger" id="alerta">!</span></button>
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
          <button type="button" class="btn btn-outline-info" id="zoom">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-search" viewBox="0 0 16 16">
              <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
            <style>
              .btn-outline-info:hover::after {
                content: "Zoom";
              }
            </style>
          </button>
          <div class="row" id="">
            <div class="col-md-4 col-12 imagenes">
              <img src="../img/comunicados/periodo_2023.png" alt="x" class="img-responsive img-fluid">
            </div>
            <div class="col-md-4 col-12 imagenes">
            <img src="../img/comunicados/platicas_2023.jpeg" alt="x" class="img-responsive img-fluid">
            </div>
            <div class="col-md-4 col-12 imagenes">
            <img src="../img/comunicados/banco_2023.png" alt="x" class="img-responsive img-fluid">
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <button type="button" class="btn btn-lg btn-primary mt-5 w-100" data-bs-dismiss="modal" id="listo">Listo!</button>
            </div>
            <div class="col-8">
              <a class="btn btn-lg btn-info mt-5 w-100" href="http://www.itchetumal.edu.mx" target="blank">Visita nuestra WEB!</a>
            </div>
          </div>
    </div>
  </div>
</div>
</div>
<script>
  var jq = $.noConflict();
  jq(document).ready(function(){
    jq("#listo").click(function(){
      jq("#alerta").text("");
    });
  });
  jq("#zoom").click(function(){
    //console.log(jq(".imagenes").height()+'-'+jq(".imagenes").width())
    if(jq(".imagenes").height()<=1000 && jq(".imagenes").width()<=1000){
      jq(".imagenes").animate({
        left: '250px',
        height: '+=150px',
        width: '+=150px'
      });
    }else{
      jq("#zoom").attr('disabled','true')
      alert('¡Ha llegado al maximo del zoom posible!')
    }

  });
</script>
<?php
include 'footer.php';
?>