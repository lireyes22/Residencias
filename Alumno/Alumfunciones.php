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

// if(isset($_POST['EnviarSolicitud'])){
//     setProyecto();
// }

function generarBancoProyecto($IDUsuario){
    $conection = conn();

    $IDDepUser = "SELECT Alumnos.DID FROM Alumnos
    INNER JOIN Alumno_Usuarios ON Alumnos.NumeroControl= Alumno_Usuarios.NumeroControl
    INNER JOIN Usuarios ON Alumno_Usuarios.UID= Usuarios.UID
    WHERE Usuarios.UID='$IDUsuario'";

}
function getNombreProyecto($idAlumno){
    $conection = conn();
    $sql = "CALL AlumnoxNombreProyecto($idAlumno)";
    $query = mysqli_query($conection, $sql);

    //Obtengo datos del profesor
    $result = mysqli_fetch_assoc($query);

    return array(
        'nombreProyecto' => $result['SPNombreProyecto']
    );
}
function getAsesor($SPID){
    $conection = conn();
    $sql = "SELECT Profesor.NombreCompleto FROM Profesor
    INNER JOIN `Profesor_Usuarios` ON Profesor.`RFCProfesor` = Profesor_Usuarios.RFCProfesor
    INNER JOIN `AsesorInterno`ON Profesor_Usuarios.`UID` = AsesorInterno.`UID`
    INNER JOIN `BancoProyectos` ON AsesorInterno.`AIID` = BancoProyectos.`AIID`
    INNER JOIN `SolicitudProyecto`ON BancoProyectos.`SPID` = SolicitudProyecto.`SPID`
    WHERE SolicitudProyecto.`SPID`= $SPID";
    $query = mysqli_query($conection, $sql);

    //Obtengo datos del profesor
    $result = mysqli_fetch_assoc($query);
    if(empty($result)) $result['NombreCompleto'] = "";
    return array(
        'nombreasesor' => $result['NombreCompleto']
    );
}

function getCoordinador($UID){
    $conection = conn();
    $sql = "SELECT * FROM `Usuarios` 
    INNER JOIN `UsuariosDepartamentos` ON Usuarios.`UID`=UsuariosDepartamentos.`UID`
    WHERE Usuarios.`UID`=$UID";
    $query = mysqli_query($conection, $sql);
    $result = mysqli_fetch_assoc($query);

    $depto = $result['Urol'];

    $sql2 = "SELECT * FROM `Usuarios` 
    INNER JOIN `UsuariosDepartamentos` ON Usuarios.`UID`=UsuariosDepartamentos.`UID` 
    INNER JOIN `Profesor_Usuarios` on Profesor_Usuarios.`UID`=Usuarios.`UID`
    INNER JOIN `Profesor` ON Profesor_Usuarios.`RFCProfesor`=Profesor.`RFCProfesor` 
    WHERE Usuarios.`URol`='Coordinador' AND UsuariosDepartamentos.DID='$depto'";
    $query2 = mysqli_query($conection, $sql2);
    $result2 = mysqli_fetch_assoc($query2);
}

function getResidente($UID){
    $conection = conn();
    $sql = "SELECT * FROM Alumnos
    INNER JOIN Alumno_Usuarios ON Alumnos.NumeroControl = Alumno_Usuarios.NumeroControl 
    WHERE $UID = Alumno_Usuarios.UID";
    $query = mysqli_query($conection, $sql);
    
    // Obtener los valores de las columnas
    $result = mysqli_fetch_assoc($query);
    $nombre = $result['NombreCompleto'];
    $NumControl = $result['NumeroControl'];
    $domicilio = $result['Domicilio'];
    $email = $result['Email'];
    $semestre = $result['SemestreActual'];
    $seguro = $result['NumeroSeguroSocial'];
    $ciudad = $result['Ciudad'];
    $tel = $result['Telefono'];
    $CID = $result['CID'];

    $sql2 = "SELECT Nombre FROM Carreras WHERE $CID = CID";
    $query2 = mysqli_query($conection, $sql2);
    $result2 = mysqli_fetch_assoc($query2);

    // Obtener los valores de las columnas
    $nomCarrera = $result2['Nombre'];

    // Retornar un arreglo asociativo con los valores
    return array(
        'nombre' => $nombre,
        'numcontrol' => $NumControl,
        'domicilio' => $domicilio,
        'semestre' => $semestre,
        'seguro_social' => $seguro,
        'email' => $email,
        'ciudad' => $ciudad,
        'tel' => $tel,
        'nomcarrera' => $nomCarrera,
        'institucionseguro' => $result['InstitucionSeguro']
    ); 
}

function getEmpresa($SPID){
    $conection = conn();
    $sql = "SELECT * FROM Empresas 
    INNER JOIN SolicitudProyecto ON SolicitudProyecto.ERFC = Empresas.ERFC 
    WHERE $SPID = SolicitudProyecto.SPID";
    $query = mysqli_query($conection, $sql);

    $result = mysqli_fetch_assoc($query);
    $nombre = $result['ENombre'];
    $ramo = $result['ERamo'];
    $erfc = $result['ERFC'];
    $esector = $result['ESector'];
    $eactprincipal = $result['EActPrincipal'];

    return array(
        'nombre' => $nombre,
        'ramo' => $ramo,
        'erfc' => $erfc,
        'esector' => $esector,
        //Otra forma de hacerlo sin la necesidad de copiarlo en otra variable
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

function getResidencia($SPID){
    $conection = conn();
    $sql = "SELECT SolicitudProyecto.SPNombreProyecto, SolicitudProyecto.SPTipo, 
    SolicitudProyecto.SPEstudiantesRequeridos, SolicitudProyecto.SDTiempoEstimado
    FROM SolicitudProyecto
    WHERE $SPID = SolicitudProyecto.SPID";
    $query = mysqli_query($conection, $sql);
    $result = mysqli_fetch_assoc($query);

    // $sql2 = "SELECT SolicitudResidencia.SROpcionElegida FROM SolicitudResidencia
    // WHERE $SPID = SolicitudResidencia.SPID";
    // $query2 = mysqli_query($conection, $sql2);
    // $result2 = mysqli_fetch_assoc($query2);

    // SolicitudResidencia.SROpcionElegida

    return array (
        'spnombreproyecto' => $result['SPNombreProyecto'],
        'sptipo' => $result['SPTipo'],
        'spestudiantesrequeridos' => $result['SPEstudiantesRequeridos'],
        'sdtiempoestimado' => $result['SDTiempoEstimado']
    );
}

function getProyecto($UID){
    //SELECT Profesor.`NombreCompleto` FROM `Profesor` INNER JOIN `Profesor_Usuarios` ON Profesor_Usuarios.`RFCProfesor` = Profesor.`RFCProfesor` WHERE Profesor_Usuarios.`UID` = 10;
    $conection = conn();
    $sql = "SELECT Profesor.`NombreCompleto` FROM `Profesor` INNER JOIN `Profesor_Usuarios` ON Profesor_Usuarios.`RFCProfesor` = Profesor.`RFCProfesor` WHERE Profesor_Usuarios.`UID` = $UID;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
        return $query;
}

function getCarreras(){
    $conection = conn();
    $sql = "SELECT * FROM Carreras";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}

function validarRes($SPID, $ID){
    $activo = false;
    $conection = conn();
    $sql = "SELECT SolicitudResidencia.SREstatus, SolicitudProyecto.SPID FROM `SolicitudResidencia`
    INNER JOIN BancoProyectos ON BancoProyectos.BPID = SolicitudResidencia.BPID
    INNER JOIN SolicitudProyecto ON SolicitudProyecto.SPID = BancoProyectos.SPID
    WHERE SolicitudResidencia.UAlumno = $ID";
    $query = mysqli_query($conection, $sql);

    // Verifica que el  alumno no mande 2 veces la misma solicitud a menos que sea rechazada
    if (mysqli_num_rows($query)  >0) {
        // Loop a través de cada fila en el resultado
        while ($fila = mysqli_fetch_assoc($query)) {
            // Validar el contenido de cada fila
            if ($fila['SREstatus'] != 'RECHAZADO' && $fila['SPID'] == $SPID) {
                return array(
                    'activo' => true,
                    'mensaje' => 'Ya tienes una solicitud de esta residencia previamente'
                );
            }
            if ($fila['SREstatus'] == 'APROBADO') {
                return array(
                    'activo' => true,
                    'mensaje' => 'Ya tienes aprobada una residencia'
                );
            }
        }
    } else {
        $activo = false;
    }

    return array(
        'activo' => $activo,
    );
}

function candidato($ID){
    $candidato = false;
    $conection = conn();
    $sql2 = "SELECT Alumnos.CreditosComplementariosCumplidos, Alumnos.NoTenerCursosEspeciales,
    Alumnos.OchentaPorcientoCargaAcademica, Alumnos.AcreditacionServicioSocial
    FROM Alumnos
    INNER JOIN Alumno_Usuarios ON Alumnos.NumeroControl = Alumno_Usuarios.NumeroControl 
    WHERE Alumno_Usuarios.UID = $ID";
    $query2 = mysqli_query($conection, $sql2);
    $result2 = mysqli_fetch_assoc($query2);

    //Verfificar si el alumno cumple los criterios
    if ($result2['CreditosComplementariosCumplidos'] == 5 && $result2['NoTenerCursosEspeciales'] == 0
        && $result2['OchentaPorcientoCargaAcademica'] == 1 && $result2['AcreditacionServicioSocial'] == 1) {
        $candidato = true;
} else {
    $candidato = false;
}

return array(
    'candidato' => $candidato
);
}

//validar que el alumno tenga almenos una solicitud de proyecto
function validarProyEnBancoProy($ID){
    $res = false;
    $conection = conn();
    //crear la conculta que traera el array
    $sql = "SELECT SolicitudResidencia.UAlumno FROM SolicitudResidencia WHERE SolicitudResidencia.UAlumno = $ID"; 
    $query = mysqli_query($conection, $sql);
    if (mysqli_num_rows($query) > 0)
        $res=true;
    
    return $res;
}
function getListSoliProyect($ID){
    $conection = conn();
    //crear la conculta que traera el array con el nombre de los proyectos
    $sql = "SELECT SolicitudProyecto.SPNombreProyecto, SolicitudProyecto.SPID, SolicitudResidencia.SRID 
    FROM SolicitudResidencia INNER JOIN BancoProyectos ON SolicitudResidencia.BPID = BancoProyectos.BPID 
    INNER JOIN SolicitudProyecto ON BancoProyectos.SPID = SolicitudProyecto.SPID 
    WHERE SolicitudResidencia.UAlumno = $ID";
    $query= mysqli_query($conection, $sql);
    return $query;
}
function rechazado($SRID){
    $conection = conn();
    //crear la conculta que traera el array con el nombre de los proyectos
    $sql = "SELECT SREstatus FROM SolicitudResidencia WHERE SolicitudResidencia.SRID = $SRID;";
    $query= mysqli_fetch_array(mysqli_query($conection, $sql));
    return $query[0];
}
function estudiantesActuales($SPID){ //DEVUELVE EL NUMERO DE ESPACIOS LIBRES QUE QUEDAN EN UN PROYECTO
    $conection = conn();
    $sql = "SELECT Count(*) FROM SolicitudResidencia INNER JOIN BancoProyectos ON SolicitudResidencia.BPID = BancoProyectos.BPID WHERE BancoProyectos.SPID = $SPID AND SolicitudResidencia.SREstatus = 'APROBADO';";
    $query = mysqli_fetch_array(mysqli_query($conection, $sql));
    $numeroDeResidentes = intval($query[0]);
    $sql = "SELECT SPEstudiantesRequeridos FROM SolicitudProyecto WHERE SolicitudProyecto.SPID = $SPID;";
    $query = mysqli_fetch_array(mysqli_query($conection, $sql));
    $estudiantesRequeridos = intval($query[0]);
    $n = $estudiantesRequeridos - $numeroDeResidentes;
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
        return $n;
}

function verificarSolicitudProyecto($estatus){
    switch ($estatus) {
      case 'ACEPTADO':
      $clase = 'progress-bar-fill-100';
      break;
      case 'REVISION':
      $clase = 'progress-bar-fill-50';
      break;
      case 'PENDIENTE':
      $clase = 'progress-bar-fill-0';
      break;
      case 'RECHAZADO':
      $clase = 'progress-bar-fill-R';
      break;
      default:
      $clase = 'progress-bar-fill-0';
      break;
  }
  return $clase;

}
function verificarSolicitudResidencia($estatus){
    switch ($estatus) {
      case 'APROBADO':
      $clase = 'progress-bar-fill-100';
      break;
      case 'ASIGNADO':
      $clase = 'progress-bar-fill-50';
      break;
      case 'ESPERA':
      $clase = 'progress-bar-fill-0';
      break;
      case 'RECHAZADO':
      $clase = 'progress-bar-fill-R';
      break;
      default:
      $clase = 'progress-bar-fill-0';
      break;
  }
  return $clase;

}

function verificarSolicitudReporteParcial1($respuesta,$alumno){
    $conection = conn();
    $sql ="SELECT COUNT(*) AS TotalRegistros FROM EvaReportes 
    INNER JOIN SolicitudResidencia ON EvaReportes.SRID = SolicitudResidencia.SRID 
    WHERE EvaReportes.ERNoParcial='1' AND SolicitudResidencia.UAlumno='$alumno'";
    $result = $conection->query($sql);
    $row = $result->fetch_assoc();
    $totalRegistros = $row["TotalRegistros"];
    $clase = '';
    $mensaje= '';
    switch ($totalRegistros) {
      case 0:
      $mensaje= 'Sin registros';
      $clase = 'progress-bar-fill-0';
      break;
      case 1:
      $mensaje= 'Calificación de 1 asesor';
      $clase = 'progress-bar-fill-50';
      break;
      case 2:
      $mensaje= 'Ambos asesores han calificado';
      $clase = 'progress-bar-fill-100';
      break;
      default:
      $mensaje= 'Sin registros';
      $clase = 'progress-bar-fill-0';
      break;
  }
  if($respuesta){
    return $mensaje;
}else{
    return $clase;
}

}
function verificarSolicitudReporteParcial2($respuesta,$alumno){
    $conection = conn();
    $sql ="SELECT COUNT(*) AS TotalRegistros FROM EvaReportes 
    INNER JOIN SolicitudResidencia ON EvaReportes.SRID = SolicitudResidencia.SRID 
    WHERE EvaReportes.ERNoParcial='2' AND SolicitudResidencia.UAlumno='$alumno'";
    $result = $conection->query($sql);
    $row = $result->fetch_assoc();
    $totalRegistros = $row["TotalRegistros"];
    $clase = '';
    $mensaje= '';
    switch ($totalRegistros) {
      case 0:
      $mensaje= 'Sin registros';
      $clase = 'progress-bar-fill-0';
      break;
      case 1:
      $mensaje= 'Calificación de 1 asesor';
      $clase = 'progress-bar-fill-50';
      break;
      case 2:
      $mensaje= 'Ambos asesores han calificado';
      $clase = 'progress-bar-fill-100';
      break;
      default:
      $mensaje= 'Sin registros';
      $clase = 'progress-bar-fill-0';
      break;
  }
  if($respuesta){
    return $mensaje;
}else{
    return $clase;
}

}
function verificarSolicitudReporteFinal($respuesta,$alumno){
    $conection = conn();
    $sql ="SELECT COUNT(*) AS NReportes FROM SolicitudResidencia 
    INNER JOIN ReporteFinal ON ReporteFinal.SRID = SolicitudResidencia.SRID 
    INNER JOIN EvaReporteFinal ON ReporteFinal.RFID = EvaReporteFinal.RFID 
    WHERE SolicitudResidencia.UAlumno='$alumno'";
    $result = $conection->query($sql);
    $row = $result->fetch_assoc();
    $totalRegistros = $row["NReportes"];
    $clase = '';
    $mensaje= '';
    switch ($totalRegistros) {
      case 0:
      $mensaje= 'Sin registros';
      $clase = 'progress-bar-fill-0';
      break;
      case 1:
      $mensaje= 'Calificación de 1 asesor';
      $clase = 'progress-bar-fill-50';
      break;
      case 2:
      $mensaje= 'Ambos asesores han calificado';
      $clase = 'progress-bar-fill-100';
      break;
      default:
      $mensaje= 'Sin registros';
      $clase = 'progress-bar-fill-0';
      break;
  }
  if($respuesta){
    return $mensaje;
}else{
    return $clase;
}

}

function retornarFechaLimite($id){
    $conection = conn();
    $sql ="SELECT * FROM FechasVencimiento 
WHERE FVTramite='$id'";
    $result = $conection->query($sql);
    $row = $result->fetch_assoc();
    $totalRegistros = $row["FVFechaLimite"];
    return $totalRegistros;
  }
  function comentarios($SRID){ //DEVUELVE LAS OBSERVACIONES DE UNA SOLICITUD DE RESIDENCIA
    $conection = conn();
    $sql = "SELECT Observvaciones FROM ObservacionesSolicitudes WHERE idSolicitud = $SRID;";
    $query = mysqli_fetch_array(mysqli_query($conection, $sql));
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
        return $query;
    }    
    function Division_Coordinador($nomCarrera){ //DEVUELVE LAS OBSERVACIONES DE UNA SOLICITUD DE RESIDENCIA
        $conection = conn();
        $sql = "SELECT Profesor.`NombreCompleto` 
        FROM `Profesor` 
        INNER JOIN `Carreras` 
        INNER JOIN `UsuariosDepartamentos` 
        INNER JOIN `Usuarios` 
        INNER JOIN `Profesor_Usuarios`
        ON Profesor.`RFCProfesor` = Profesor_Usuarios.`RFCProfesor`
        AND Profesor_Usuarios.`UID` = UsuariosDepartamentos.`UID`
        AND Usuarios.`UID` = Profesor_Usuarios.`UID`
        AND Carreras.`DID` = UsuariosDepartamentos.`DID`
            WHERE Usuarios.`URol`='Coordinador' AND
            Carreras.`Nombre` = '$nomCarrera';";
        $coord = mysqli_fetch_array(mysqli_query($conection, $sql));
        $sql = "SELECT Profesor.`NombreCompleto` 
        FROM `Profesor`
        INNER JOIN `Usuarios` 
        INNER JOIN `Profesor_Usuarios`
        ON Profesor.`RFCProfesor` = Profesor_Usuarios.`RFCProfesor`
        AND Usuarios.`UID` = Profesor_Usuarios.`UID`
            WHERE Usuarios.`URol`='JefeDivisonEstudios';";
        $jefeEstPrf = mysqli_fetch_array(mysqli_query($conection, $sql));
        
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return array(
            'coordinador' => $coord[0],
            'jefeDivEst' => $jefeEstPrf[0]
        );
    }
    function DID($UID){ //OBTIENE EL DEPARTAMENTO ID CON EL ID DEL USUARIO
        $conection = conn();
        $sql = "SELECT Departamentos.`DID` FROM `Departamentos` INNER JOIN `UsuariosDepartamentos` ON `Departamentos`.DID= `UsuariosDepartamentos`.DID WHERE `UsuariosDepartamentos`.UID = $UID;";
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
    function UProfesor($RFCProfesor){ //OBTIENE EL UID DEL PROFESOR CON SU RFC
        $conection = conn();
        $sql = "SELECT Profesor_Usuarios.UID FROM Profesor INNER JOIN Profesor_Usuarios ON Profesor_Usuarios.RFCProfesor = Profesor.RFCProfesor WHERE Profesor.RFCProfesor = '$RFCProfesor';";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
  
  
?>
