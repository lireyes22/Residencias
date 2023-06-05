<?php
    include '../../InicioSessionSegNvl2.php';
    include ('../../conectionBD.php');
    if(isset($_POST['Par1'])) {
        $nParcial = 1;
        $Puntualidad = $_POST['PuntualidadP1'];
        $Conocimiento = $_POST['ConocimientoP1'];
        $Equipo = $_POST['TrabajoEquipoP1'];
        $Dedicacion = $_POST['DedicacionP1'];
        $Ordenado = $_POST['OrdenadoP1'];
        $DaMejoras = $_POST['DaMejorasP1'];
    }     
    if(isset($_POST['Par2'])) {
        $nParcial = 2;
        $Puntualidad = $_POST['PuntualidadP2'];
        $Conocimiento = $_POST['ConocimientoP2'];
        $Equipo = $_POST['TrabajoEquipoP2'];
        $Dedicacion = $_POST['DedicacionP2'];
        $Ordenado = $_POST['OrdenadoP2'];
        $DaMejoras = $_POST['DaMejorasP2'];
    } 
    $idSolicitudResidencia = $_POST['idSoliRes'];
    $Fecha = date('Y-m-d');
    $Observaciones = $_POST['Observaciones'];
    $idAsesor = $_POST['idUAsesor'];

    $conectionn = conn();
    $total = $Puntualidad + $Conocimiento + $Equipo + $Dedicacion + $Ordenado + $DaMejoras;

    $sql = "CALL InsertarEvaluacionReporte($idSolicitudResidencia, '$Fecha', $Puntualidad, $Conocimiento, $Equipo, $Dedicacion, $Ordenado, $DaMejoras, $total, '$Observaciones', $nParcial, $idAsesor, 0)";
    $query = mysqli_query($conectionn, $sql);
    if (!$query) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conectionn);
    } else {
        echo"<script>alert('Registro insertado exitosamente.')</script>";
        echo"<script  language='javascript'>window.location='../AsesorInternoAlumnos.php'</script>";  
    }



    mysqli_close($conectionn);

?>