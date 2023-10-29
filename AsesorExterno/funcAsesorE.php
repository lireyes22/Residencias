<?php
include('../conectionBD.php');

function consultaProyectoAlumno($idAlumno)
{
    $conection = conn();
    $sql = "CALL AlumnoxProyecto($idAlumno)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }
    return $query;
}
function consultaCarreraAlumno($NumAlumno)
{
    $conection = conn();
    $sql = "CALL AlumnoxCarrera($NumAlumno)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }
    return $query;
}
function consultaProfesorAsesor($idAsesor)
{
    $conection = conn();
    $sql = "CALL ProfesorxAsesor($idAsesor)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }
    return $query;
}
function ProfesorxAsesorE($idAsesor)
{
    $conection = conn();
    $sql = "SELECT * FROM AsesorExterno WHERE AEID = $idAsesor";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }
    if (!($consulta = mysqli_fetch_array($query))) {
        echo 'error';
        $consulta = -1;
    }
    return $consulta;
}
function getIDAsesorInterno($uid)
{
    $conection = conn();
    $sql = "CALL ObtenerIDAsesorInterno($uid)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }
    $consulta = mysqli_fetch_array($query);
    $idAsInt = $consulta['AIID'];
    return $idAsInt;
}

function consultaAsesorResidencias($AIID)
{
    $conection = conn();
    $sql = "CALL ObtenerResidenciaAIID($AIID)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }
    return $query;
}

function ObtenerEvaluacionFinal($UAsesor, $UAlumno)
{
    $conection = conn();
    $sql = "CALL ObtenerEvaluacionFinal($UAsesor, $UAlumno, 1)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }

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
function consultaAsesorAlumno($idAsesor)
{
    $conection = conn();
    $sql = "CALL AsesorExternoxAlumno($idAsesor)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }
    return $query;
}
function ObtenerAsesorExterno($idAsesor)
{
    $conection = conn();
    $sql = "CALL ObtenerAsesorExterno($idAsesor)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }
    if (!($consultaAsesor = mysqli_fetch_array($query))) {
        $consultaAsesor['UID'] = -1;
        #se puede hacer un foreach, pero se me olvido que existe en php xd.
    }
    return $consultaAsesor;
}
function consultaUsuarioAlumno($idAlumno)
{
    $conection = conn();
    $sql = "CALL UsuarioxAlumno($idAlumno)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }
    return $query;
}
function ObtenerSolicitudProyecto($idBancoProyecto)
{
    $conection = conn();
    $sql = "CALL ObtenerSolicitudProyecto($idBancoProyecto)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }

    if (!($consultaSolicProy = mysqli_fetch_array($query))) {
        $consultaSolicProy['SPNombreProyecto'] = '';
        #se puede hacer un foreach, pero se me olvido que existe en php xd.
    }
    return $consultaSolicProy;
}
function consultaEvaluacionSeguimiento($UAsesor, $UAlumno, $NParcial, $Tipo)
{
    $conection = conn();
    $sql = "CALL ObtenerEvaluacionSeguimiento($UAsesor, $UAlumno, $NParcial, $Tipo)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }

    if (!($consultaAlumnoProyecto = mysqli_fetch_array($query))) {
        $consultaAlumnoProyecto['ERPuntualidad'] = 0;
        $consultaAlumnoProyecto['ERTrabajoEquipo'] = 0;
        $consultaAlumnoProyecto['ERDedicacion'] = 0;
        $consultaAlumnoProyecto['ERDaMejoras'] = 0;
        $consultaAlumnoProyecto['ERCumpleObjetivos'] = 0;
        $consultaAlumnoProyecto['EROrdenado'] = 0;
        $consultaAlumnoProyecto['ERLiderazgo'] = 0;
        $consultaAlumnoProyecto['ERConocimiento'] = 0;
        $consultaAlumnoProyecto['ERComportamiento'] = 0;
        $consultaAlumnoProyecto['ERObservaciones'] = '';
        $consultaAlumnoProyecto['ERCalificacion'] = 0;
    }
    return $consultaAlumnoProyecto;
}
function consultaFecha($tramite)
{
    $conection = conn();
    $sql = "SELECT * FROM FechasVencimiento WHERE FVTramite = '$tramite'";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }
    if (!($consultaFechaVencimiento = mysqli_fetch_array($query))) {
        $consultaFechaVencimiento['FVFechaLimite'] = date('Y-m-d');
    }
    return $consultaFechaVencimiento;
}
function getBoton($botonName)
{
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
        #echo '<td ></td>';
        echo '<input type="submit" class="btn btn-success" value="Guardar" name="' . $botonName . '" formaction="procesos/AsesorExternoGuardarEvSeguimiento.php"></td>';
    }
}
function existRF($idSRID)
{
    $conection = conn();
    $sql = "SELECT * FROM reportefinal WHERE SRID = '$idSRID'";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) {
    }
    if (!mysqli_fetch_array($query)) {
        return false;
    }
    return true;
}
function getBotonRF($idSRID)
{
    if (existRF($idSRID)) {
        #Obtener resultado de la consulta
        $consultaFec = consultaFecha('AsesoresEvaluacionReporteFinal');
        #convertir a formato fecha
        $fechaComparar = DateTime::createFromFormat('Y-m-d', $consultaFec['FVFechaLimite']);
        #obtener fecha actual
        $fechaActual = new DateTime();

        #compararlas
        if ($fechaActual > $fechaComparar) {
            echo '<strong style="color: white">Fuera de periodo de evaluación</strong>';
        } elseif ($fechaActual <= $fechaComparar) {
            echo '<input type="submit" value="Guardar Cambios" class="btn btn-success" formaction="procesos/AsesorExternoGuardarEvReporte.php">';
        }
    } else {
        echo '<strong style="color: white">El alumno no ah subido su reporte final</strong>';
    }
}
?>