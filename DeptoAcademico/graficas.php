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
$result = profesoresXProyecto('5');
$result2 = estatusDeProyectos('5');
/*while($profesorxd = $result){
   var_dump($profesorxd);
}*/

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
            // Función para generar un color aleatorio
            function getRandomColor() {
              const letters = "0123456789ABCDEF";
              let color = "#";
              for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
              }
              return color;
            }
            let xValues = []
            let yValues = []
            <?php 
               $lml = 0;
               foreach ($result as $r) {
                  if($lml%2==0){
                     echo 'xValues.push("'.$r.'");';
                  }else{
                     echo 'yValues.push("'.$r.'");';
                  }
                  $lml++;
               }
            ?>
            //const xValues = ["Blandy Sarai", "Gustavo", "Carlos Azueta", "Julio Rodriguez", "Isaias"];
            //const yValues = [55, 49, 44, 24, 15];
            const barColors = Array.from({ length: 5 }, () => getRandomColor());

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
                  scales: {
                     yAxes: [{
                     ticks: {
                        beginAtZero: true
                     }
                     }],
                  },
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
            let xValues2 = []
            let yValues2 = []
            <?php  
               $lml = 0;
               foreach ($result2 as $r2) {
                  if($lml%2==0){
                     echo 'xValues2.push("'.$r2.'");';
                  }else{
                     echo 'yValues2.push("'.$r2.'");';
                  }
                  $lml++;
               }
            ?>
            //const xValues2 = ["Pendiente", "En revision", "Aceptado", "Cancelado"];
            //const yValues2 = [55, 49, 44, 24];
            // Array para almacenar colores generados aleatoriamente
            const barColors2 = Array.from({ length: 5 }, () => getRandomColor());

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
