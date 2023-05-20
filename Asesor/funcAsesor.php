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

function consultaAsesorAlumno($idAsesor) {
    $conection = conn();
    $sql = "CALL AsesorxAlumno($idAsesor)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function consultaUsuarioAlumno($idAlumno) {
    $conection = conn();
    $sql = "CALL UsuarioxAlumno($idAlumno)";
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
function consultaCarreraAlumno($NumAlumno) {
    $conection = conn();
    $sql = "CALL AlumnoxCarrera($NumAlumno)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function consultaProfesorAsesor($idAsesor) {
    $conection = conn();
    $sql = "CALL ProfesorxAsesor($idAsesor)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function getIDAsesorInterno($uid) {
    $conection = conn();
    $sql = "CALL ObtenerIDAsesorInterno($uid)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    $consulta = mysqli_fetch_array($query);
    $idAsInt = $consulta['AIID'];
    return $idAsInt;
}

function consultaAsesorResidencias($AIID) {
    $conection = conn();
    $sql = "CALL ObtenerResidenciaAIID($AIID)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function consultaEvaluacionSeguimiento($UAsesor, $UAlumno, $NParcial, $Tipo) {
    $conection = conn();
    $sql = "CALL ObtenerEvaluacionSeguimiento($UAsesor, $UAlumno, $NParcial, $Tipo)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    
    if (!($consultaEvSeguimiento = mysqli_fetch_array($query))) {
            $consultaEvSeguimiento['ERPuntualidad'] = 0;
            $consultaEvSeguimiento['ERConocimiento'] = 0;
            $consultaEvSeguimiento['ERTrabajoEquipo'] = 0;
            $consultaEvSeguimiento['ERDedicacion'] = 0;
            $consultaEvSeguimiento['EROrdenado'] = 0;
            $consultaEvSeguimiento['ERDaMejoras'] = 0;
            $consultaEvSeguimiento['ERObservaciones'] = '';
            $consultaEvSeguimiento['ERCalificacion'] = 0;
    }
    return $consultaEvSeguimiento;
}
function ObtenerEvaluacionFinal($UAsesor, $UAlumno) {
    $conection = conn();
    $sql = "CALL ObtenerEvaluacionFinal($UAsesor, $UAlumno, 0)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    
    if (!($consultaEvReporteFina = mysqli_fetch_array($query))) {
            $consultaEvReporteFina['ERFPortada'] = 0;
            $consultaEvReporteFina['ERFAgradecimientos'] = 0;
            $consultaEvReporteFina['ERFResumen'] = 0;
            $consultaEvReporteFina['ERFIndice'] = 0;
            $consultaEvReporteFina['ERFIntroduccion'] = 0;
            $consultaEvReporteFina['ERFAntecedentes'] = 0;
            $consultaEvReporteFina['ERFJustificacion'] = 0;
            $consultaEvReporteFina['ERFObjetivos'] = 0;
            $consultaEvReporteFina['ERFMetodologia'] = 0;
            $consultaEvReporteFina['ERFResultados'] = 0;
            $consultaEvReporteFina['ERFDiscusiones'] = 0;
            $consultaEvReporteFina['ERFConclusiones'] = 0;
            $consultaEvReporteFina['ERFFuentes'] = 0;
            $consultaEvReporteFina['ERFTotal'] = 0;
            $consultaEvReporteFina['ERFObservaciones'] = '';
            #se puede hacer un foreach, pero se me olvido que existe en php xd.
    }
    return $consultaEvReporteFina;
}
function ObtenerSolicitudProyecto($idBancoProyecto) {
    $conection = conn();
    $sql = "CALL ObtenerSolicitudProyecto($idBancoProyecto)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    
    if (!($consultaSolicProy = mysqli_fetch_array($query))) {
            $consultaSolicProy['SPNombreProyecto'] = '';
            #se puede hacer un foreach, pero se me olvido que existe en php xd.
    }
    return $consultaSolicProy;
}
?>