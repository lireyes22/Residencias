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
            <h1 class="display-4">Estadisticas</h1>
         </div>
      </div>

      <!-- Sección de Estadisticas-->
      <div class="row mt-4">
         <!-- Primera gráfica -->
         <div class="container">
            <canvas id="myChart" style="width:100%;max-width:100%"></canvas>
         </div>

         <script>            
            const xValues = ["Blandy Sarai", "Gustavo", "Carlos Azueta", "Julio Rodriguez", "Isaias"];
            const yValues = [55, 49, 44, 24, 15];
            const barColors = ["red", "green","blue","orange","brown"];

            new Chart("myChart", {
               type: "bar",
               data: {
                  labels: xValues,
                  datasets: [{
                     backgroundColor: barColors,
                     data: yValues
                  }]
               },
               options: {
                  legend: {display: false},
                  title: {
                     display: true,
                     text: "Proyectos asignados a profesores",
                     fontSize: 30 
                  }
               }
            });
         </script>
      </div>
      <hr>
      <div class="row mt-4">
         <!-- Segunda gráfica -->
         <div class="container">
            <canvas id="myChart2" style="width:100%;max-width:100%"></canvas>
         </div>

         <script>
            const xValues2 = ["En revisión", "En espera", "Terminados", "USA", "Argentina"];
            const yValues2 = [55, 49, 44, 24, 15];
            const barColors2 = [
               "#b91d47",
               "#00aba9",
               "#2b5797",
               "#e8c3b9",
               "#1e7145"
            ];

            new Chart("myChart2", {
               type: "doughnut",
               data: {
                  labels: xValues2,
                  datasets: [{
                     backgroundColor: barColors2,
                     data: yValues2
                  }]
               },
               options: {
                  title: {
                     display: true,
                     text: "Estatus de Proyectos",
                     fontSize: 30 
                  }
               }
            });
         </script>
      </div>
   </div>
   <br>
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
