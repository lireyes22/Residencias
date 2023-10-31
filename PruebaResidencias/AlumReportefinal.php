<?php
include 'headAlumnos.php';
?>
<!-- Main -->
<div class="col ms-sm-auto px-4" style="background: whitesmoke;">
  <!-- Contenido Principal -->
  <!-- Cards -->
  <h1 class="text-center mt-5">Estructura del Reporte Final</h1>
  <br>
  <div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          1.- Portada
        </div>
        <div class="card-body">
          <p class="card-text">Página inicial del informe.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
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
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          6.- Antecedentes
        </div>
        <div class="card-body">
          <p class="card-text">Contexto e investigaciones previas.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
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
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="card">
        <div class="card-header text-white" style="background-color: #384970E6;">
          9.- Metodología
        </div>
        <div class="card-body">
          <p class="card-text">Métodos de investigación.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
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
    <form>
      <div class="mb-3">
        <label for="archivo" class="form-label">Carga aquí tu reporte final</label>
        <input type="file" class="form-control w-25" id="archivo" name="archivo">
      </div>
      <button type="submit" class="btn btn-outline-secondary btn-lg">Enviar</button>
    </form>
  </div>
  <br>
  <!-- Fin Main -->
</div>
<?php
include 'footer.php';
?>