<?php
    /*function conn(){
        $host = 'mapachitos.cisuktad1m53.us-east-2.rds.amazonaws.com';
        $user = 'admin';
        $password = 'mapachitos123';
        $db = 'Residencias';
        $conection = @mysqli_connect($host, $user, $password, $db);

        if(!$conection){
            echo 'Error de conexion';
            return null;
        }
        mysqli_set_charset($conection, "utf8");
        return $conection;
    }*/
    include ('../conectionBD.php');

    if(isset($_POST['Par1'])) {
        $nParcial = 1;
        $Puntualidad = $_POST['PuntualidadP1'];
        $Equipo = $_POST['TrabajoEquipoP1'];
        $Dedicacion = $_POST['DedicacionP1'];
        $DaMejoras = $_POST['DaMejorasP1'];
        $Objetivos = $_POST['CumpleObjetivosP1'];
        $Ordenado = $_POST['OrdenadoP1'];
        $Liderazgo = $_POST['LiderazgoP1'];
        $Conocimiento = $_POST['ConocimientoP1'];
        $Comportamiento = $_POST['ComportamientoP1'];        
        
        
    }     
    if(isset($_POST['Par2'])) {
        $nParcial = 2;
        $Puntualidad = $_POST['PuntualidadP2'];
        $Equipo = $_POST['TrabajoEquipoP2'];
        $Dedicacion = $_POST['DedicacionP2'];
        $DaMejoras = $_POST['DaMejorasP2'];
        $Objetivos = $_POST['CumpleObjetivosP2'];
        $Ordenado = $_POST['OrdenadoP2'];
        $Liderazgo = $_POST['LiderazgoP2'];
        $Conocimiento = $_POST['ConocimientoP2'];
        $Comportamiento = $_POST['ComportamientoP2'];      
    } 
    $idSolicitudResidencia = $_POST['idSoliRes'];
    $Fecha = date('Y-m-d');
    $Observaciones = $_POST['Observaciones'];
    $idAsesor = $_POST['idUAsesor'];

    $conectionn = conn();
    $total = $Puntualidad + $Conocimiento + $Equipo + $Dedicacion + $Ordenado + $DaMejoras;

    $sql = "CALL InsertarEvaluacionReporteExterno($idSolicitudResidencia, '$Fecha', $Puntualidad, $Equipo, $Dedicacion, $DaMejoras, $Objetivos, $Ordenado, $Liderazgo, $Conocimiento, $Comportamiento, $total, '$Observaciones', $nParcial, $idAsesor, 1)";
    $query = mysqli_query($conectionn, $sql);
    if (!$query) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conectionn);
    } else {
        echo"<script>alert('Registro insertado exitosamente.')</script>";
        echo"<script  language='javascript'>window.location='../IndexAE.php'</script>";  
    }



    mysqli_close($conectionn);

?>