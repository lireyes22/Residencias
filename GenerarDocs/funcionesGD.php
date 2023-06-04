<?php
    include ('../conectionBD.php');
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
    function consultaEvaluacionSeguimiento($UAlumno, $NParcial, $Tipo) {
        $conection = conn();
        $sql = "CALL ObtenerEvaluacionSeguimientoT($UAlumno, $NParcial, $Tipo)";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        
        if (!($consultaEvSeguimiento = mysqli_fetch_array($query))) {
            $consultaEvSeguimiento['ERPuntualidad'] = 0;
            $consultaEvSeguimiento['ERTrabajoEquipo'] = 0;
            $consultaEvSeguimiento['ERDedicacion'] = 0;
            $consultaEvSeguimiento['ERDaMejoras'] = 0;
            $consultaEvSeguimiento['ERCumpleObjetivos'] = 0;
            $consultaEvSeguimiento['EROrdenado'] = 0;
            $consultaEvSeguimiento['ERLiderazgo'] = 0;
            $consultaEvSeguimiento['ERConocimiento'] = 0;
            $consultaEvSeguimiento['ERComportamiento'] = 0;
            $consultaEvSeguimiento['ERCalificacion'] = 0;
            $consultaEvSeguimiento['ERObservaciones'] = 0;
        }
        return $consultaEvSeguimiento;
    }
    function AsesoresxAlumnoIDS($idAlumno) {
        $conection = conn();
        $sql = "CALL ObtenerIDAsesoresXAlumno($idAlumno)";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        if (!($consultaOAA = mysqli_fetch_array($query))) {
            echo 'error';
            $consultaOAA = -1;
        }
        return $consultaOAA;
    }
    function ProfesorxAsesorI($idAsesor) {
        $conection = conn();
        $sql = "CALL ProfesorxAsesor($idAsesor)";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        if (!($consulta = mysqli_fetch_array($query))) {
            echo 'error';
            $consulta = -1;
        }
        return $consulta;
    }
    function ProfesorxAsesorE($idAsesor) {
        $conection = conn();
        $sql = "SELECT * FROM AsesorExterno WHERE AEID = $idAsesor";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        if (!($consulta = mysqli_fetch_array($query))) {
            echo 'error';
            $consulta = -1;
        }
        return $consulta;
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