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
    
    if (!($consultaAlumnoProyecto = mysqli_fetch_array($query))) {
            $consultaAlumnoProyecto['ERPuntualidad'] = 0;
            $consultaAlumnoProyecto['ERConocimiento'] = 0;
            $consultaAlumnoProyecto['ERTrabajoEquipo'] = 0;
            $consultaAlumnoProyecto['ERDedicacion'] = 0;
            $consultaAlumnoProyecto['EROrdenado'] = 0;
            $consultaAlumnoProyecto['ERDaMejoras'] = 0;
            $consultaAlumnoProyecto['ERObservaciones'] = '';
            $consultaAlumnoProyecto['ERCalificacion'] = 0;
    }
    return $consultaAlumnoProyecto;
}
function ObtenerEvaluacionFinal($UAsesor, $UAlumno) {
    $conection = conn();
    $sql = "CALL ObtenerEvaluacionFinal($UAsesor, $UAlumno, 0)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    
    if (!($consultaAlumnoProyecto = mysqli_fetch_array($query))) {
            $consultaAlumnoProyecto['ERFPortada'] = 0;
            $consultaAlumnoProyecto['ERFAgradecimientos'] = 0;
            $consultaAlumnoProyecto['ERFResumen'] = 0;
            $consultaAlumnoProyecto['ERFIndice'] = 0;
            $consultaAlumnoProyecto['ERFIntroduccion'] = 0;
            $consultaAlumnoProyecto['ERFAntecedentes'] = 0;
            $consultaAlumnoProyecto['ERFJustificacion'] = 0;
            $consultaAlumnoProyecto['ERFObjetivos'] = 0;
            $consultaAlumnoProyecto['ERFMetodologia'] = 0;
            $consultaAlumnoProyecto['ERFResultados'] = 0;
            $consultaAlumnoProyecto['ERFDiscusiones'] = 0;
            $consultaAlumnoProyecto['ERFConclusiones'] = 0;
            $consultaAlumnoProyecto['ERFFuentes'] = 0;
            $consultaAlumnoProyecto['ERFTotal'] = 0;
            $consultaAlumnoProyecto['ERFObservaciones'] = '';
            #se puede hacer un foreach, pero se me olvido que existe en php xd.
    }
    return $consultaAlumnoProyecto;
}
?>