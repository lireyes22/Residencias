<?php
include 'headAlumnos.php';
?>
<!-- Conteido FAQ -->
<div class="col ms-sm-auto px-4">
   <div class="container col-9">
      <br>
      <nav class="navbar navbar-expand-sm bg-light justify-content-center">
         <!-- Links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" href="#">Preguntas y Respuestas</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Imagenes</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#"></a>
            </li>
         </ul>
      </nav>
      <br>
      <!-- Acordeon Faq -->
      <div id="accordion">
         <!-- Pregunta 1 -->
         <div class="card">
            <div class="card-header">
               <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                  1. ¿Qué es una residencia profesional?
               </a>
            </div>
            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
               <div class="card-body">
                  La residencia profesional es una estrategia educativa que permite al estudiante incorporarse profesionalmente a los sectores productivos de bienes y servicios, a través del desarrollo de un proyecto definido de trabajo profesional, asesorado por instancias académicas y/o externas. El proyecto de residencia profesional podrá realizarse de manera individual, grupal o interdisciplinaria; dependiendo de los requerimientos y las características del proyecto de la empresa, organismo o dependencia.
               </div>
            </div>
         </div>

         <!-- Pregunta 2 -->
         <div class="card">
            <div class="card-header">
               <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                  2. ¿Cuál es la duración de una residencia profesional?
               </a>
            </div>
            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
               <div class="card-body">
                  La residencia profesional se deberá realizar en un mínimo de 4 meses y 6 meses como máximo, debiéndose acumular un mínimo de 500 horas.
               </div>
            </div>
         </div>

         <!-- Pregunta 3 -->
         <div class="card">
            <div class="card-header">
               <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                  3. ¿Cuáles son los requisitos para tramitar la residencia profesional?
               </a>
            </div>
            <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
               <div class="card-body">
                  Para tramitar la residencia profesional, se deben cumplir los siguientes requisitos:
                  <ul>
                     <li>Acreditación del servicio social.</li>
                     <li>Acreditación de todas las actividades complementarias.</li>
                     <li>Haber aprobado al menos el 80% de créditos del plan de estudios.</li>
                     <li>No contar con ninguna asignatura en condiciones de curso especial.</li>
                  </ul>
               </div>
            </div>
         </div>

         <!-- Pregunta 4 -->
         <div class="card">
            <div class="card-header">
               <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFour">
                  4. ¿Cómo se elabora el anteproyecto e informe técnico de residencia profesional?
               </a>
            </div>
            <div id="collapseFour" class="collapse" data-bs-parent="#accordion">
               <div class="card-body">
                  El anteproyecto e informe técnico de residencia profesional se elabora siguiendo el manual para la elaboración del anteproyecto e informe técnico de residencia profesional del Instituto Tecnológico.
               </div>
            </div>
         </div>

         <!-- Pregunta 5 -->
         <div class="card">
            <div class="card-header">
               <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFive">
                  5. ¿Cuál es el proceso de selección de la empresa para la residencia profesional?
               </a>
            </div>
            <div id="collapseFive" class="collapse" data-bs-parent="#accordion">
               <div class="card-body">
                  El proceso de selección de la empresa para la residencia profesional se lleva a cabo en coordinación con el departamento de vinculación y el departamento académico correspondiente. El estudiante puede proponer una empresa o elegir una de las empresas que ya han sido vinculadas con el instituto.
               </div>
            </div>
         </div>

         <!-- Pregunta 6 -->
         <div class="card">
            <div class="card-header">
               <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseSix">
                  6. ¿Cuál es el proceso de evaluación de la residencia profesional?
               </a>
            </div>
            <div id="collapseSix" class="collapse" data-bs-parent="#accordion">
               <div class="card-body">
                  La evaluación de la residencia profesional se lleva a cabo en dos etapas: la evaluación del informe técnico y la evaluación del desempeño del estudiante durante su estancia en la empresa. La evaluación del informe técnico se realiza por un comité académico, mientras que la evaluación del desempeño del estudiante se realiza por el tutor académico y el tutor empresarial.
               </div>
            </div>
         </div>

         <!-- Pregunta 7 -->
         <div class="card">
            <div class="card-header">
               <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseSeven">
                  7. ¿Qué sucede si no puedo completar las horas requeridas para la residencia profesional?
               </a>
            </div>
            <div id="collapseSeven" class="collapse" data-bs-parent="#accordion">
               <div class="card-body">
                  Si un estudiante no puede completar las horas requeridas para la residencia profesional debido a circunstancias imprevistas, puede solicitar una prórroga al departamento académico correspondiente. La prórroga debe ser aprobada por el comité académico.
               </div>
            </div>
         </div>
      </div>
      <!-- Fin Acordeon Faq -->
   </div>
</div>
<?php
include 'footer.php';
?>