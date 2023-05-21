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

function ObtenerEvaluacionFinal($UAsesor, $UAlumno) {
    $conection = conn();
    $sql = "CALL ObtenerEvaluacionFinal($UAsesor, $UAlumno, 1)";
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
######################################################################
function consultaAsesorAlumno($idAsesor) {
    $conection = conn();
    $sql = "CALL AsesorExternoxAlumno($idAsesor)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function ObtenerAsesorExterno($idAsesor) {
    $conection = conn();
    $sql = "CALL ObtenerAsesorExterno($idAsesor)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    if (!($consultaAsesor = mysqli_fetch_array($query))) {
        $consultaAsesor['UID'] = -1;
        #se puede hacer un foreach, pero se me olvido que existe en php xd.
    }
    return $consultaAsesor;
}
function consultaUsuarioAlumno($idAlumno) {
    $conection = conn();
    $sql = "CALL UsuarioxAlumno($idAlumno)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
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
function consultaFecha($tramite) {
    $conection = conn();
    $sql = "SELECT * FROM FechasVencimiento WHERE FVTramite = '$tramite'";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    if(!($consultaFechaVencimiento = mysqli_fetch_array($query))){
        $consultaFechaVencimiento['FVFechaLimite'] = date('Y-m-d');
    }
    return $consultaFechaVencimiento;
}
function getBoton($botonName){
    #Obtener resultado de la consulta
    $consultaFec = consultaFecha('AsesoresEvaluacionSeguimiento');
    #convertir a formato fecha
    $fechaComparar = DateTime::createFromFormat('Y-m-d', $consultaFec['FVFechaLimite']);
    #obtener fecha actual
    $fechaActual = new DateTime();

    #compararlas
    if ($fechaActual > $fechaComparar) {
        echo '<td colspan="3" style="color: rgb(180, 0, 0);"><strong>NOTA: Fuera de periodo de evaluacion</strong></td>';
        #echo '<td></td>';
        #echo '<td></td>';
    } elseif ($fechaActual <= $fechaComparar) {
        echo '<td><strong>NOTA: Al hacer clic en guardar se actualizaran los datos</strong></td>';
        #echo '<td ></td>';
        echo '<td colspan="2" ><input type="submit" class="btn btn-actualizar" value="Guardar" name="'.$botonName.'" formaction="procesos/AsesorExternoGuardarEvSeguimiento.php"></td>';
    }
}
function getBotonRF(){
    #Obtener resultado de la consulta
    $consultaFec = consultaFecha('AsesoresEvaluacionReporteFinal');
    #convertir a formato fecha
    $fechaComparar = DateTime::createFromFormat('Y-m-d', $consultaFec['FVFechaLimite']);
    #obtener fecha actual
    $fechaActual = new DateTime();

    #compararlas
    if ($fechaActual > $fechaComparar) {
        echo '<input style="color: rgb(255, 255, 255); background-color: transparent;" class="lb-inp" type="text" value="Fuera de periodo de evaluacion" disabled>';
    } elseif ($fechaActual <= $fechaComparar) {
        echo '<input type="submit" value="Guardar Cambios" class="btn btn-actualizar" formaction="procesos/AsesorExternoGuardarEvReporte.php">';
    }
}
?>