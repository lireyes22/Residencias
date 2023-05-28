<?php
    function conn(){
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
    }
    function ObtenerEvaluacionFinal($UAlumno, $tipo) {
        $conection = conn();
        $sql = "CALL ObtenerEvaluacionReporteFinal($UAlumno, $tipo)";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        
        if (!($consultaEvReporteFinal = mysqli_fetch_array($query))) {
                $consultaEvReporteFinal['ERFPortada'] = 0;
                $consultaEvReporteFinal['ERFAgradecimientos'] = 0;
                $consultaEvReporteFinal['ERFResumen'] = 0;
                $consultaEvReporteFinal['ERFIndice'] = 0;
                $consultaEvReporteFinal['ERFIntroduccion'] = 0;
                $consultaEvReporteFinal['ERFAntecedentes'] = 0;
                $consultaEvReporteFinal['ERFJustificacion'] = 0;
                $consultaEvReporteFinal['ERFObjetivos'] = 0;
                $consultaEvReporteFinal['ERFMetodologia'] = 0;
                $consultaEvReporteFinal['ERFResultados'] = 0;
                $consultaEvReporteFinal['ERFDiscusiones'] = 0;
                $consultaEvReporteFinal['ERFConclusiones'] = 0;
                $consultaEvReporteFinal['ERFFuentes'] = 0;
                $consultaEvReporteFinal['ERFTotal'] = 0;
                $consultaEvReporteFinal['ERFObservaciones'] = '';
        }
        return $consultaEvReporteFinal;
    }
    function consultaUsuarioAlumno($idAlumno) {
        $conection = conn();
        $sql = "CALL UsuarioxAlumno($idAlumno)";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function consultaCarreraAlumno($NumAlumno) {
        $conection = conn();
        $sql = "CALL AlumnoxCarrera($NumAlumno)";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function consultaProyectoAlumno($idAlumno) {
        $conection = conn();
        $sql = "CALL AlumnoxProyecto($idAlumno)";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
?>