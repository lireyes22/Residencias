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
        echo '<td  colspan="3" style="color: rgb(180, 0, 0);"><strong>NOTA: Fuera de periodo de evaluacion</strong></td>';
        #echo '<td></td>';
        #echo '<td></td>';
    } elseif ($fechaActual <= $fechaComparar) {
        echo '<td><strong>NOTA: Al hacer clic en guardar se actualizarán los datos</strong></td>';
        #echo '<td></td>';
        echo '<td  colspan="2" ><input type="submit" class="btn btn-actualizar btn-evrf" value="Guardar" name="'.$botonName.'" formaction="procesos/AsesorInternoGuardarEvSeguimiento.php"></td>';
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
        echo '<input style="color: rgb(255, 255, 255); background-color: transparent;" class="lb-inp" type="text" value="Fuera de periodo de evaluación" disabled>';
    } elseif ($fechaActual <= $fechaComparar) {
        echo '<input type="submit" value="Guardar Cambios" class="btn btn-actualizar btn-evrf" formaction="procesos/AsesorInternoGuardarEvReporte.php">';
    }
}
   function getEmpresa($SPID){
        $conection = conn();
        $sql = "SELECT Empresas.`ENombre`, Empresas.`ERFC`, Empresas.`ERamo`, Empresas.`ESector`, Empresas.`EActPrincipal`, Empresas.`EDomicilio`, Empresas.`EColonia`, Empresas.`ECiudad`, Empresas.`ECp`, Empresas.`EFax`, Empresas.`ETelefono`,Empresas.`EEstatus`, Empresas.`ENombreTitular`, Empresas.`ENombreAcuerdo`, Empresas.`EPuestoTitular`, Empresas.`EPuestoAcuerdo`
        FROM `Empresas`
        INNER JOIN SolicitudProyecto ON SolicitudProyecto.`ERFC` = Empresas.`ERFC`
        INNER JOIN BancoProyectos ON BancoProyectos.`SPID` = SolicitudProyecto.`SPID`
        WHERE SolicitudProyecto.`SPID` = $SPID";
        $query = mysqli_query($conection, $sql);
        $result = mysqli_fetch_assoc($query);
    
        return array(
            'nombre' => $result['ENombre'],
            'ramo' => $result['ERamo'],
            'erfc' => $result['ERFC'],
            'esector' => $result['ESector'],
            'eactprincipal' => $result['EActPrincipal'],
            'edomicilio' => $result['EDomicilio'],
            'ecolonia' => $result['EColonia'],
            'ecp' => $result['ECp'],
            'efax' => $result['EFax'],
            'eciudad' => $result['ECiudad'],
            'etelefono' => $result['ETelefono'],
            'enombretitular' => $result['ENombreTitular'],
            'epuestotitular' => $result['EPuestoTitular'],
            'enombreacuerdo' => $result['ENombreAcuerdo'],
            'epuestoacuerdo' => $result['EPuestoAcuerdo']
        );
    }  
function RFCprofesor($SPID){
    $conection = conn();
    $sql = "SELECT Profesor.`RFCProfesor` FROM Profesor INNER JOIN `SolicitudProyecto` INNER JOIN `Profesor_Usuarios` ON Profesor.`RFCProfesor` = Profesor_Usuarios.`RFCProfesor` AND Profesor_Usuarios.`UID` = SolicitudProyecto.`UIDResponsable`  WHERE SolicitudProyecto.`SPID` = $SPID;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function alumnosResidentes($SPID){
    $conection = conn();
    $sql = "SELECT * FROM Alumnos 
      INNER JOIN Alumno_Usuarios ON Alumno_Usuarios.`NumeroControl` = Alumnos.`NumeroControl` 
      INNER JOIN SolicitudResidencia ON Alumno_Usuarios.`UID` = SolicitudResidencia.`UAlumno` 
      INNER JOIN BancoProyectos ON BancoProyectos.`BPID` = SolicitudResidencia.`BPID`
      INNER JOIN SolicitudProyecto ON BancoProyectos.`SPID` = SolicitudProyecto.`SPID`
      WHERE SolicitudResidencia.`SREstatus` ='APROBADO' AND SolicitudProyecto.`SPID` = $SPID;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
?>