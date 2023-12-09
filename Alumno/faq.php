<?php
include 'headAlumnos.php';
?>
<!-- Conteido FAQ -->
<div class="col ms-sm-auto px-4">
   <div class="container col-9">
      <!-- Imagen circular flotante -->
      <img src="../recursos/image/logo.png" alt="Imagen Circular" class="rounded-circle position-fixed" style="bottom: 20px; right: 20px; width: 200px; height: 150px; z-index: 999;">

      <br>
      <nav class="navbar navbar-expand-sm rounded-2 justify-content-between" style="background-color: #384970;">
         <!-- Logo y texto a la izquierda -->
         <a class="navbar-brand">
            <img src="../recursos/image/faqIco.png" alt="Avatar Logo" style="width:40px; margin-left: 10px;" class="rounded-2">
         </a>
         <!-- Menú de navegación a la derecha -->
         <ul class="navbar-nav btn-group">
            <li class="nav-item">
               <a class="nav-link text-white" href="#acordeon"><button type="button" class="btn btn-primary">Preguntas frecuentes</button></a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white" data-bs-toggle="offcanvas" data-bs-target="#pasos" href=""><button type="button" class="btn btn-primary">Pasos a seguir</button></a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white" href="#contacto"><button type="button" class="btn btn-primary">Contacto</button></a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white" id="BorrarCarrusel"><button type="button" id="BorrarCarrusel" class="btn btn-primary">Borrar Carrusel</button></a>
            </li>
         </ul>
      </nav>
      <br>
      <div class="display-6 text-center ">"La Residencia Profesional como parte de tu formación académica"</div>
      <br>
      <!-- Carousel -->
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
         <!-- indicadores -->
         <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
         </div>

         <!-- carousel -->
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img src="../recursos/image/a.png" alt="Imagen 1" class="d-block w-100">
               <div class="carousel-caption" style="background-color: rgba(0, 0, 0, 0.5);">
                  <h3>¡Realiza tu residencia profesional!</h3>
                  <p>Ofrecemos una amplia variedad de proyectos de residencias profesionales en diferentes áreas de estudio.</p>
               </div>
            </div>
            <div class="carousel-item">
               <img src="../recursos/image/b.png" alt="Imagen 2" class="d-block w-100">
               <div class="carousel-caption" style="background-color: rgba(0, 0, 0, 0.5);">
                  <h3>¡Conoce la Feria de Residencias Profesionales del ITCH!</h3>
                  <p>¿Quieres conocer las últimas tendencias en residencias profesionales? ¡No te pierdas la Feria de Residencias Profesionales del ITCH!</p>
               </div>
            </div>
            <div class="carousel-item">
               <img src="../recursos/image/c.png" alt="Imagen 3" class="d-block w-100">
               <div class="carousel-caption" style="background-color: rgba(0, 0, 0, 0.5);">
                  <h3>¿Tienes todo listo?</h3>
                  <p>Da el siguiente paso en tu carrera profesional, ¡Inscríbete hoy mismo a una residencia profesional en el ITCH! </p>
               </div>
            </div>
         </div>
         <br>
         <!-- controles de navegación -->
         <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
         </button>
      </div>
      <script>
         $(document).ready(function(){
            $("#BorrarCarrusel").click(function(){
               $("#myCarousel").remove();
            });
         });
      </script>
      <br>
      <div class="text-center">
         <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Hagamoslo">¡Estoy Listo!</button>
      </div>
      <br>
      
      <!-- Acordeon Faq -->
      <div class="display-6 text-center " id="acordeon">"Preguntas frecuentes"</div>
      <br>
      <!-- Inicio Acordeon Faq -->
      <div class="card">
         <!-- Pregunta 1 -->
         <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
               1. ¿Qué es una residencia profesional? <span class="badge bg-secondary">Importante</span>
            </a>
         </div>
         <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
            <div class="card-body">
               La residencia profesional es una estrategia educativa que permite al estudiante incorporarse profesionalmente a los sectores productivos de bienes y servicios, a través del desarrollo de un proyecto definido de trabajo profesional, asesorado por instancias académicas y/o externas. El proyecto de residencia profesional podrá realizarse de manera individual, grupal o interdisciplinaria; dependiendo de los requerimientos y las características del proyecto de la empresa, organismo o dependencia.
            </div>
         </div>

         <!-- Pregunta 2 -->
         <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapseTwo">
               2. ¿Cuál es la duración de una residencia profesional?
            </a>
         </div>
         <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
               La residencia profesional se deberá realizar en un mínimo de 4 meses y 6 meses como máximo, debiéndose acumular un mínimo de 500 horas.
            </div>
         </div>

         <!-- Pregunta 3 -->
         <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapseThree">
               3. ¿Cuáles son los requisitos para tramitar la residencia profesional?
            </a>
         </div>
         <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
               <ul class="list-group">
                  <li class="list-group-item active list-group-flush"> Para tramitar la residencia profesional, se deben cumplir los siguientes requisitos:</li>
               </ul>
               <ol class="list-group list-group-numbered">
                  <li class="list-group-item">Acreditación del servicio social.</li>
                  <li class="list-group-item">Acreditación de todas las actividades complementarias.</li>
                  <li class="list-group-item">Haber aprobado al menos el 80% de créditos del plan de estudios.</li>
                  <li class="list-group-item">No contar con ninguna asignatura en condiciones de curso especial.</li>
               </ol>
            </div>
         </div>

         <!-- Pregunta 4 -->
         <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapseFour">
               4. ¿Cómo se elabora el anteproyecto e informe técnico de residencia profesional?
            </a>
         </div>
         <div id="collapseFour" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
               El anteproyecto e informe técnico de residencia profesional se elabora siguiendo el manual para la elaboración del anteproyecto e informe técnico de residencia profesional del Instituto Tecnológico.
            </div>
         </div>

         <!-- Pregunta 5 -->
         <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapseFive">
               5. ¿Cuál es el proceso de selección de la empresa para la residencia profesional?
            </a>
         </div>
         <div id="collapseFive" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
               El proceso de selección de la empresa para la residencia profesional se lleva a cabo en coordinación con el departamento de vinculación y el departamento académico correspondiente. El estudiante puede proponer una empresa o elegir una de las empresas que ya han sido vinculadas con el instituto.
            </div>
         </div>

         <!-- Pregunta 6 -->
         <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapseSix">
               6. ¿Cuál es el proceso de evaluación de la residencia profesional?
            </a>
         </div>
         <div id="collapseSix" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
               La evaluación de la residencia profesional se lleva a cabo en dos etapas: la evaluación del informe técnico y la evaluación del desempeño del estudiante durante su estancia en la empresa. La evaluación del informe técnico se realiza por un comité académico, mientras que la evaluación del desempeño del estudiante se realiza por el tutor académico y el tutor empresarial.
            </div>
         </div>

         <!-- Pregunta 7 -->
         <div class="card-header">
            <a class="btn" data-bs-toggle="collapse" href="#collapseSeven">
               7. ¿Qué sucede si no puedo completar las horas requeridas para la residencia profesional?
            </a>
         </div>
         <div id="collapseSeven" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
               Si un estudiante no puede completar las horas requeridas para la residencia profesional debido a circunstancias imprevistas, puede solicitar una prórroga al departamento académico correspondiente. La prórroga debe ser aprobada por el comité académico.
            </div>
         </div>
      </div>
      <br>
      <!-- Fin Acordeon Faq -->
   </div>
   <br>
   <br>
   <div class="display-6 text-center " id="testimonios">"Increibles testimonios de nuestros Residentes"</div>
   <br>
   <!-- List Group Testimonios -->
   <div class="text-center">
      <button class="btn btn-primary m-2" id="daSlide">Mostrar testimonios</button>
      <button class="btn btn-danger" id="daStop">Parar testimonios</button>
   </div>
   <br>
   <div id="daPanelTestimonio">
      <ul class="list-group mx-auto w-75">
         <li class="list-group-item list-group-item-success">
            <div class="d-flex justify-content-between">
               <h5 class="mb-1">Testimonio de Éxito</h5>
               <small>Moi, Ingeniero</small>
            </div>
            <p class="mb-1">"El proceso de residencias profesionales en el ITCH fue una experiencia increíble.
               Los pasos eran fáciles de seguir y la evaluación fue valiosa para mi crecimiento profesional."</p>
         </li>
         <li class="list-group-item list-group-item-success">
            <div class="d-flex w-100 justify-content-between">
               <h5 class="mb-1">Oportunidad de Carrera</h5>
               <small>Charly, Arquitecto</small>
            </div>
            <p class="mb-1">"Gracias al ITCH, obtuve experiencia laboral relevante. Las empresas
               buscan estudiantes bien preparados, y el proceso fue gratificante y enriquecedor."</p>
         </li>
         <li class="list-group-item list-group-item-success">
            <div class="d-flex w-100 justify-content-between">
               <h5 class="mb-1">Crecimiento Profesional</h5>
               <small>Sofía, Biologa</small>
            </div>
            <p class="mb-1">"Mi residencia profesional en el ITCH fue un paso importante en mi carrera.
               Los pasos eran claros, y gracias a ello, fui contratada por una empresa que valora el crecimiento profesional."</p>
         </li>
      </ul>
   </div>
   <!-- Fin Testimonios -->
   <br>
   <!-- Contacto -->
   <div class="display-6 text-center " id="contacto">"Contactanos"</div>
   <br>
   <div class="text-center">
      <div class="spinner-grow text-primary"></div>
      <div class="spinner-grow text-success"></div>
      <div class="spinner-grow text-info"></div>
      <div class="spinner-grow text-warning"></div>
      <div class="spinner-grow text-danger"></div>
      <div class="spinner-grow text-secondary"></div>
      <div class="spinner-grow text-dark"></div>
      <div class="spinner-grow text-primary"></div>
   </div>
   <div class="container mt-5">
      <div class="row">

         <div class="col-md-4 order-3">
            <div class="card bg-primary border border-black border-3  text-light">
               <div class="card-body">
                  <h5 class="card-title">Juan Pérez</h5>
                  <p class="card-text">Cargo: Coordinador</p>
                  <p class="card-text">Email: contacto1@example.com</p>
                  <p class="card-text">Teléfono: +1 (123) 456-7890</p>
               </div>
            </div>
         </div>

         <div class="col-md-4 order-2">
            <div class="card bg-success border border-black border-3 text-light">
               <div class="card-body">
                  <h5 class="card-title">Carla Hernández</h5>
                  <p class="card-text">Cargo: Jefe de Departamento</p>
                  <p class="card-text">Email: contacto2@example.com</p>
                  <p class="card-text">Teléfono: +1 (234) 567-8901</p>
               </div>
            </div>
         </div>

         <div class="col-md-4 order-1">
            <div class="card bg-danger border border-black border-3 text-light">
               <div class="card-body">
                  <h5 class="card-title">Pedro Zamora</h5>
                  <p class="card-text">Cargo: Servicios Escolares</p>
                  <p class="card-text">Email: contacto3@example.com</p>
                  <p class="card-text">Teléfono: +1 (345) 678-9012</p>
               </div>
            </div>
         </div>
      </div>
      <br>
      <br>
      <figure class="text-center">
         <div class="row">
            <blockquote class="blockquote col-12">
               <pre>Cultura, Ciencia y Tecnología para la Superación de México</pre>
               <figcaption class="blockquote-footer">ITCH</figcaption>
            </blockquote>
         </div>
      </figure>
   </div>

   <!-- Fin contacto -->

   <!-- Offcanvas Sidebar -->
   <div class="offcanvas offcanvas-start" data-bs-theme="dark" id="pasos">
      <div class="offcanvas-header">
         <h1 class="offcanvas-title display-6 ">Pasos para realizar tu Residencia</h1>
         <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
         <ol>
            <li>Asegúrate de no adeudar ningún Curso Especial y haber aprobado el 80% de los créditos de tu plan de estudios.</li><br>
            <li>Asegúrate de haber liberado el Servicio Social y 5 Créditos de Actividades Complementarias.</li><br>
            <li>Asiste a las pláticas informativas por parte de tu coordinador de carrera.</li><br>
            <li>Realiza la solicitud de residencia profesional previamente al semestre inmediato a la reinscripción del estudiante.</li><br>
            <li>Entrega la solicitud a tu coordinador de carrera anexando tu anteproyecto.</li><br>
            <li>Sigue el procedimiento indicado para dar por concluido el trámite.</li><br>
         </ol>
         <!-- Ajax Zone -->
         <div id="div1">
            <h5>Nota importante</h5>
         </div>
         <button id="daImportante">Importante</button>

      </div>
   </div>
   <!-- Fin Offcanvas -->
</div>
<?php
include 'footer.php';
?>