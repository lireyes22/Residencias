<?php 
    include '../../conectionBD.php'; 
    include '../../InicioSessionSeg.php';
    include ('../Alumfunciones.php');
    $conexion = conn();
    //guardar los valores de formulario
    if($_POST){
        //Nombre del archivo y ruta
        $anteproyecto = $_FILES['anteproyecto']['tmp_name'];
        $SRID = $_POST['SRID'];
        //Lee el contenido del archivo
        $contenido = file_get_contents($anteproyecto);

        //Prepara la consulta SQL con parametros
        $sql = "CALL updateAntProySolicitudResidencia(?,?)";
        $stmt = mysqli_prepare($conexion, $sql);

        //Asigna los valores de los parametros
        mysqli_stmt_bind_param($stmt, "si",$contenido, $SRID);

        //Ejecuta la consulta preparada
        if (mysqli_stmt_execute($stmt)) {
            $sql2 = "UPDATE SolicitudResidencia SET SREstatus = 'PENDIENTE' WHERE SRID = $SRID;";
	        $query2 = mysqli_query($conexion, $sql2);
            echo"<script>alert('Se actualizo correctamente')</script>";
            echo"<script  language='javascript'>window.location='../alumListSolicitudes.php'</script>"; 
        } else {
            echo"<script>alert('Erro al insertar el archivo')</script>";
            echo"<script  language='javascript'>window.location='../alumListSolicitudes.php'</script>"; 
        }

    }
?>