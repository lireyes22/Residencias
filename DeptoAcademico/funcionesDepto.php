<?php
include ('../conectionBD.php');



function Ejemplo() {
    $conection = conn();
    $consulta = "select xd............";
    $query = mysqli_query($conection, $consulta);
    return $query;
}
function bienvenida($UID){
    $conection = conn();
    $sql = "SELECT Profesor.NombreCompleto FROM profesor INNER JOIN profesor_usuarios ON profesor.`RFCProfesor` = profesor_usuarios.`RFCProfesor` WHERE profesor_usuarios.UID = '$UID'";
    $query = mysqli_fetch_assoc(mysqli_query($conection, $sql));
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query['NombreCompleto'];
}
    //Funciones NEFTALI logueo
function GenerarLogAlum($correo) {
    $sql = "SELECT Alumnos.CorreoInstitucional, Alumnos.ContrasenaCorreo, Usuarios.URol, Usuarios.UID
    FROM Alumnos 
    INNER JOIN Alumno_Usuarios ON Alumnos.NumeroControl = Alumno_Usuarios.NumeroControl
    INNER JOIN Usuarios ON Alumno_Usuarios.UID = Usuarios.UID WHERE Alumnos.CorreoInstitucional='$correo'";
    return $sql;
}
function GenerarLogAProf($correo) {
    $sql="SELECT Profesor.CorreoInstitucional, Profesor.ContrasenaCorreo, Usuarios.URol, Usuarios.UID
    FROM Profesor 
    INNER JOIN Profesor_Usuarios ON Profesor.RFCProfesor = Profesor_Usuarios.RFCProfesor
    INNER JOIN Usuarios ON Profesor_Usuarios.UID = Usuarios.UID WHERE Profesor.CorreoInstitucional='$correo'";
    return $sql;
}
function GenerarLogJefDept($correo) {
    $sql="SELECT DepartamentoAcademico.CorreoInstitucional, DepartamentoAcademico.ContrasenaCorreo, Usuarios.URol, Usuarios.UID
    FROM DepartamentoAcademico 
    INNER JOIN DepartamentoAcademico_Usuarios ON DepartamentoAcademico.RFCDepartamentoAcademico = DepartamentoAcademico_Usuarios.RFCDepartamentoAcademico
    INNER JOIN Usuarios ON DepartamentoAcademico_Usuarios.UID = Usuarios.UID WHERE DepartamentoAcademico.CorreoInstitucional='$correo'";
    return $sql;
}
/*
function GenerarLogADeptVin() {
    return $sql;
}*/
function DID($UID){ //OBTIENE EL DEPARTAMENTO ID CON EL ID DEL USUARIO
    $conection = conn();
    $sql = "SELECT Departamentos.`DID` FROM `Departamentos` INNER JOIN `UsuariosDepartamentos` ON `Departamentos`.DID= `UsuariosDepartamentos`.DID WHERE `UsuariosDepartamentos`.UID = $UID;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function listSolicProy($DID){ //LISTA DE SPID PENDIENTES Y EN EL DEPARTAMENTO SOLICITADO
    $conection = conn();
    $sql = "SELECT SolicitudProyecto.`SPID` FROM UsuariosDepartamentos INNER JOIN `SolicitudProyecto` ON UsuariosDepartamentos.`UID` = SolicitudProyecto.`UIDResponsable` WHERE UsuariosDepartamentos.`DID` = 5 AND SolicitudProyecto.`SPEstatus`='PENDIENTE';";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function listSolicProyV2($DID){ //LISTA DE SPID PENDIENTES Y EN EL DEPARTAMENTO SOLICITADO
    $conection = conn();
    $sql = "SELECT * FROM UsuariosDepartamentos INNER JOIN `SolicitudProyecto` ON UsuariosDepartamentos.`UID` = SolicitudProyecto.`UIDResponsable` WHERE UsuariosDepartamentos.`DID` = 5 AND SolicitudProyecto.`SPEstatus`='PENDIENTE';";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function listSolicProyAcep($DID){ //LISTA DE SPID ACEPTADOS Y EN EL DEPARTAMENTO SOLICITADO
    $conection = conn();
    $sql = "SELECT SolicitudProyecto.`SPID` FROM `SolicitudProyecto` INNER JOIN `UsuariosDepartamentos` ON SolicitudProyecto.`UIDResponsable` = UsuariosDepartamentos.`UID` WHERE UsuariosDepartamentos.`DID` = $DID AND SolicitudProyecto.`SPEstatus`='ACEPTADO';";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function basicInfoProy($SPID){ //SPID, Nombre del proyecto, Objetivo, Numero Estudiantes, Tiempo Estimado, Nombre del Responsable
    $conection = conn();
    $sql = "CALL basicInfo($SPID);";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function listaDocentes($DID, $RFC){ //LISTA DE DOCENTES EN EL DEPARTAMENTO EXCEPTUANDO A UNO (UN RESPONSABLE O ASESOR), CONTIENE TODO DE PROFESORES
    $conection = conn();
    $sql = "SELECT * FROM Profesor WHERE Profesor.DID = $DID AND Profesor.RFCProfesor != '$RFC';";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function listaDocentes2($DID){ //LISTA DE DOCENTES EN EL DEPARTAMENTO 
    $conection = conn();
    $sql = "SELECT * FROM Profesor WHERE Profesor.DID = $DID;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function RFCprofesor($SPID){
    $conection = conn();
    $sql = "SELECT Profesor.`RFCProfesor` FROM Profesor INNER JOIN `SolicitudProyecto` INNER JOIN `Profesor_Usuarios` ON Profesor.`RFCProfesor` = Profesor_Usuarios.`RFCProfesor` AND Profesor_Usuarios.`UID` = SolicitudProyecto.`UIDResponsable`  WHERE SolicitudProyecto.`SPID` = $SPID;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function insertComisionProyectoProfesor($_SPID, $_UProfesor, $_CPPFecha, $_CPPFechaLimite){ //INSERTAR UNA COMISION A UN ASESOR (REVISION DE PROPUESTA DE PROYECTO)
    $conection = conn();
    $sql = "INSERT INTO ComisionProyectoProfesor(UProfesor,SPID,CPPFechaElaboracion, CPPFechaLimite) VALUES(".$_UProfesor.",".$_SPID.",'$_CPPFecha','$_CPPFechaLimite');";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
}
function alterSolicitudProyecto($_SPID, $_Estatus){ //ACTUALIZAR EL ESTADO DE UNA SOLICITUD DE PROYECTO
    $conection = conn();
    $sql = "UPDATE SolicitudProyecto SET SolicitudProyecto.SPEstatus = '$_Estatus' WHERE SolicitudProyecto.SPID = $_SPID;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
}
function UProfesor($RFCProfesor){ //OBTIENE EL UID DEL PROFESOR CON SU RFC
    $conection = conn();
    $sql = "SELECT Profesor_Usuarios.UID FROM Profesor INNER JOIN Profesor_Usuarios ON Profesor_Usuarios.RFCProfesor = Profesor.RFCProfesor WHERE Profesor.RFCProfesor = '$RFCProfesor';";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function bancoSPID($SPID){
    $conection = conn();
    $sql = "SELECT BancoProyectos.BPID FROM BancoProyectos INNER JOIN SolicitudProyecto ON BancoProyectos.SPID = SolicitudProyecto.SPID WHERE SolicitudProyecto.SPID = $SPID;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function alumnosResidencia($BPID){ //DEBERIA DE SER UNA RELACION MUCHOS A MUCHOS 
    $conection = conn();
    $sql = "SELECT Alumnos.`NombreCompleto`, Carreras.`Nombre` FROM `Alumnos` INNER JOIN `Alumno_Usuarios` INNER JOIN `SolicitudResidencia` INNER JOIN `Carreras` ON Alumnos.`NumeroControl` = Alumno_Usuarios.`NumeroControl` AND SolicitudResidencia.`UAlumno` = Alumno_Usuarios.`UID` AND Alumnos.`CID` = Carreras.`CID` WHERE SolicitudResidencia.BPID = $BPID AND SolicitudResidencia.SREstatus = 'APROBADO';";
    $query = mysqli_query($conection, $sql); 
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function residenciaSol($BPID){
    $conection = conn();
    $sql = "SELECT * FROM SolicitudResidencia WHERE SolicitudResidencia.BPID = $BPID;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function empresa($SPID){
    $conection = conn();
    $sql = "SELECT Empresas.ENombre FROM Empresas INNER JOIN SolicitudProyecto ON Empresas.ERFC = SolicitudProyecto.ERFC WHERE SolicitudProyecto.SPID = $SPID;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function asesorInterno($BPID){
    $conection = conn();
    $sql = "SELECT Profesor.`RFCProfesor`, Profesor.NombreCompleto FROM `Profesor` INNER JOIN `BancoProyectos` INNER JOIN `AsesorInterno` INNER JOIN `Profesor_Usuarios` ON AsesorInterno.`AIID` = BancoProyectos.`AIID` AND Profesor.`RFCProfesor` = Profesor_Usuarios.`RFCProfesor` AND Profesor_Usuarios.`UID` = AsesorInterno.`UID` WHERE BancoProyectos.BPID = $BPID;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function esAsesor($UID){
    $conection = conn();
    $sql = "SELECT AsesorInterno.AIID FROM AsesorInterno WHERE AsesorInterno.UID = $UID";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function insertAsesor($UID){
    $conection = conn();
    $sql = "INSERT INTO AsesorInterno(UID) VALUES ($UID);";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
}
function insertComisionAsesor($UProfesor, $BPID, $CAPeriodo,$Razon){
    $conection = conn();
    $sql = "INSERT INTO ComisionesAsesores(UProfesor, BPID, CAPeriodo, Motivo) VALUES ($UProfesor, $BPID, '$CAPeriodo','$Razon');";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
}
function nuevoAsesor($BPID, $AIID){ 
    $conection = conn();
    $sql = "UPDATE BancoProyectos SET BancoProyectos.AIID = $AIID, BancoProyectos.AEID = 2 WHERE BancoProyectos.BPID = $BPID";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
}
function nombreDepartamento($DID){
    $conection = conn();
    $sql = "SELECT Departamentos.Dnombre FROM Departamentos WHERE Departamentos.DID = $DID";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function existeBanco($SPID){
    $conection = conn();
    $sql = "SELECT * FROM BancoProyectos WHERE SPID = $SPID";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function responsableResidencia($SPID){  
    $conection = conn();
    $sql = "SELECT Profesor.RFCProfesor FROM Profesor INNER JOIN Profesor_Usuarios INNER JOIN SolicitudProyecto ON Profesor.RFCProfesor = Profesor_Usuarios.RFCProfesor AND Profesor_Usuarios.UID = SolicitudProyecto.UIDResponsable WHERE SolicitudProyecto.SPID = $SPID;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function comisionProyecto($SPID){
    $conection = conn();
    $sql = "SELECT count(*) FROM ComisionProyectoProfesor WHERE ComisionProyectoProfesor.SPID = '$SPID'; ";
    $query = mysqli_fetch_array(mysqli_query($conection, $sql));
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query[0];
}
function asesorBPID($rBPID){
    $conection = conn();
    $sql = "SELECT count(*) FROM BancoProyectos WHERE BancoProyectos.BPID = '$rBPID' AND BancoProyectos.AIID IS NOT NULL; ";
    $query = mysqli_fetch_array(mysqli_query($conection, $sql));
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query[0];
}
function solicitudesProyecto($DID){
    $conn = conn();
    $sql = "SELECT * FROM UsuariosDepartamentos INNER JOIN `SolicitudProyecto` ON UsuariosDepartamentos.`UID` = SolicitudProyecto.`UIDResponsable` WHERE UsuariosDepartamentos.`DID` = $DID AND SolicitudProyecto.`SPEstatus`='PENDIENTE';";
    $query = $conn->query($sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conn)) { }
    return $query;
}
//----------------------------------------------------------------------------------------------------------//
function plantilla(){
    $conection = conn();
    $sql = "";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}

function getFechas(){
    $conection = conn();
    $sql = "SELECT * FROM FechasVencimiento";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function profesoresXProyecto($DID){
    $result = array();
    $i = 0;
    $conection = conn();
    $sql = "SELECT solicitudProyecto.`UIDResponsable`, count(*) AS Proyectos FROM solicitudproyecto INNER JOIN usuariosdepartamentos INNER JOIN usuarios 
    ON  solicitudproyecto.`UIDResponsable` = usuarios.`UID`
    AND  solicitudproyecto.`UIDResponsable` = usuariosdepartamentos.`UID`
    WHERE usuariosdepartamentos.`DID` = $DID AND solicitudproyecto.`SPEstatus` = 'ACEPTADO'
    GROUP BY solicitudProyecto.`UIDResponsable`;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    while($UID = mysqli_fetch_array($query)){ //
        $id = $UID['UIDResponsable'];
        $sql2 = "SELECT profesor.`NombreCompleto` FROM profesor INNER JOIN profesor_usuarios 
        ON profesor.`RFCProfesor` = profesor_usuarios.`RFCProfesor`
        WHERE profesor_usuarios.`UID` = '$id';";
        $query2 = mysqli_fetch_array(mysqli_query($conection, $sql2));
        $result[$i] = $query2['NombreCompleto'];
        $i++;
        $result[$i] = $UID['Proyectos'];
        $i++;
     }

    return $result;
}
function estatusDeProyectos($DID){
    $conection = conn();
    $sql = "SELECT solicitudproyecto.`SPEstatus`,count(*) AS 'cake' FROM solicitudproyecto INNER JOIN usuariosdepartamentos INNER JOIN usuarios 
    ON  solicitudproyecto.`UIDResponsable` = usuarios.`UID`
    AND  solicitudproyecto.`UIDResponsable` = usuariosdepartamentos.`UID`
    WHERE usuariosdepartamentos.`DID` = '$DID' GROUP BY solicitudproyecto.`SPEstatus`;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    $i = 0;
    $result = array();
    while($data = mysqli_fetch_array($query)){ //
        $result[$i] = $data['SPEstatus'];
        $i++;
        $result[$i] = $data['cake'];
        $i++;
     }
    return $result;
}
?>