<?php
include '../InicioSessionSeg.php';
$idAlumno = $_SESSION['id'];
include 'headAlumnos.php';
?>

<!-- Main -->
<div class="col ms-sm-auto px-4" style="background: whitesmoke;">
  <!-- Contenido Principal -->
  <!-- Cards -->
  <h1 class="text-center mt-5">Estructura del Reporte Final</h1>
  <br>

  <script>
    $(document).ready(function(){
      $("h4").first().css("background-color", "#cccccc");
    });  
    $(document).ready(function(){
      $(".card-footer").last().css("background-color", "#cccccc");
    });
    $(document).ready(function(){
      $(".card-text").eq(0).css("background-color", "#f4f4f4");
    });
    $(document).ready(function(){
      $("div").filter("#hermano3").css("background-color", "#cccccc");
    });
    $(document).ready(function(){
      $(".card").not("#hermano32").css("background-color", "#ededed");
    });
    $(document).ready(function(){
      $("#hermano3").find("p").css({"color": "grey"});
    });
    $(document).ready(function(){
      $("#hermano33").parentsUntil("#hermano3").css({"border": "2px solid black"});
    });
  </script>
  <div class="card"  id="hermano32">
    <div class="card-body">
      <h4 class="card-title">Bienvenido, aquí podrás visualizar los componentes necesarios para tu reporte final</h4>
      <p class="card-text">El reporte final es el último paso para concluir tu residencia profesional, por lo que es importante
        desarrollarlo correctemente. Si tienes dudas sobre los requerimientos necesarios para tu reporte, puedes consultarlo más
        abajo en el orden indicado y con una breve descripción.
      </p>
      <a href="#reporteLink" class="card-link">¿Tu reporte final está listo? Subelo aquí</a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4" id="hermano1">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          1.- Portada
        </div>
        <div class="card-body">
          <p class="card-text">Página inicial del informe.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4" id="hermano3">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;" id="hermano33">
          2.- Agradecimientos
        </div>
        <div class="card-body">
          <p class="card-text">Expresión de gratitud a colaboradores.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          3.- Resumen
        </div>
        <div class="card-body">
          <p class="card-text">Resumen breve del informe.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          4.- Índices
        </div>
        <div class="card-body">
          <p class="card-text">Listas de contenido y referencias.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          5.- Introducción
        </div>
        <div class="card-body">
          <p class="card-text">Presentación del tema y objetivos.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4" id="hermano6">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          6.- Antecedentes
        </div>
        <div class="card-body">
          <p class="card-text">Contexto e investigaciones previas.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4" id="hermano5">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          7.- Justificación
        </div>
        <div class="card-body">
          <p class="card-text">Razón de importancia del informe.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          8.- Objetivos
        </div>
        <div class="card-body">
          <p class="card-text">Objetivos generales y específicos.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4" id="hermano2">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          9.- Metodología
        </div>
        <div class="card-body">
          <p class="card-text">Métodos de investigación.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4" id="hermano10">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          10.- Resultados
        </div>
        <div class="card-body">
          <p class="card-text">Presentación de hallazgos.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          11.- Discusiones
        </div>
        <div class="card-body">
          <p class="card-text">Análisis e interpretación.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          12.- Conclusiones
        </div>
        <div class="card-body">
          <p class="card-text">Resumen de puntos clave.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 mx-auto">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          13.- Fuentes
        </div>
        <div class="card-body">
          <p class="card-text">Referencias bibliográficas.</p>
        </div>
        <div class="card-footer">Procura tener este apartado correctamente estructurado</div>
      </div>
    </div>

  </div>
  <!-- Boton enviar -->
  <div class="container">
    <form action="AlumnoInsertarReporte.php" method="post" enctype="multipart/form-data">
    <div class="input-group mb-3" id="reporteLink">
      <label for="archivo" class="form-label w-25 h6">Carga aquí tu reporte final</label>
      <input type="file" class="form-control" id="archivo" name="ReporteFinal">
      <button type="submit" class="btn btn-outline-primary btn-sm">Enviar</button>
    </div>

    </form>
  </div>



  <br>
  <!-- Fin Main -->
</div>
<?php
include 'footer.php';
?>