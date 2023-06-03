CREATE DEFINER=`admin`@`%` PROCEDURE `ActualizarNResidentes`(
    IN p_SPID INT,
    IN p_SPEstudiantesRequeridos INT
)
BEGIN
    UPDATE SolicitudProyecto
    SET SPEstudiantesRequeridos = p_SPEstudiantesRequeridos
    WHERE SPID = p_SPID;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `AlumnoXCarrera`(IN NC VARCHAR(20))
BEGIN 
	SELECT *
	FROM Alumnos AL
	    INNER JOIN Carreras CA ON AL.CID = CA.CID
	WHERE AL.NumeroControl = NC;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `AlumnoxNombreProyecto`(IN id_alumno INT)
BEGIN
    SELECT SP.SPNombreProyecto
    FROM SolicitudProyecto SP
    INNER JOIN BancoProyectos BP ON SP.SPID = BP.SPID
    INNER JOIN SolicitudResidencia SR ON BP.BPID = SR.BPID
    WHERE SR.UAlumno = id_alumno AND SR.SREstatus= 'APROBADO';
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `AlumnoxProyecto`(IN id_alumno INT)
BEGIN
    SELECT *
    FROM SolicitudProyecto SP
    INNER JOIN BancoProyectos BP ON SP.SPID = BP.SPID
    INNER JOIN SolicitudResidencia SR ON BP.BPID = SR.BPID
    WHERE SR.UAlumno = id_alumno AND SR.SREstatus= 'APROBADO';
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `AsesorExternoxAlumno`(IN asesor_id INT)
BEGIN
    SELECT SR.UAlumno, SR.SRID, BP.AEID, AE.UID, BP.SPID
    FROM SolicitudResidencia SR
    INNER JOIN BancoProyectos BP ON SR.BPID = BP.BPID
    INNER JOIN AsesorExterno AE ON BP.AEID = AE.AEID
    WHERE AE.UID = asesor_id AND SR.SREstatus = 'APROBADO';
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `AsesorxAlumno`(IN asesor_id INT)
BEGIN
    SELECT SR.UAlumno, SR.SRID, BP.AIID, AI.UID, BP.SPID
    FROM SolicitudResidencia SR
    INNER JOIN BancoProyectos BP ON SR.BPID = BP.BPID
    INNER JOIN AsesorInterno AI ON BP.AIID = AI.AIID
    WHERE AI.UID = asesor_id AND SR.SREstatus = 'APROBADO';
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `bancoProyecto`(
    IN v_DID int
)
BEGIN
    SELECT SolicitudProyecto.`SPID`, SolicitudProyecto.`SPNombreProyecto`, SolicitudProyecto.`SPObjetivo`, SolicitudProyecto.`SPEstudiantesRequeridos`, SolicitudProyecto.`SDTiempoEstimado`, Profesor.`NombreCompleto` FROM `SolicitudProyecto` INNER JOIN `Profesor_Usuarios` INNER JOIN `Profesor` ON `SolicitudProyecto`.`UIDResponsable` = Profesor_Usuarios.`UID` AND Profesor_Usuarios.`RFCProfesor` = Profesor.`RFCProfesor` WHERE SolicitudProyecto.SPEstatus = 'ACEPTADO' AND Profesor.DID = v_DID;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `basicInfo`(IN SPID_IN int)
BEGIN
    SELECT SolicitudProyecto.`SPID`, SolicitudProyecto.`SPNombreProyecto`, SolicitudProyecto.`SPObjetivo`, SolicitudProyecto.`SPEstudiantesRequeridos`, SolicitudProyecto.`SDTiempoEstimado`, Profesor.`NombreCompleto` FROM `SolicitudProyecto` INNER JOIN `Profesor_Usuarios` INNER JOIN `Profesor` ON `SolicitudProyecto`.`UIDResponsable` = Profesor_Usuarios.`UID` AND Profesor_Usuarios.`RFCProfesor` = Profesor.`RFCProfesor` WHERE SolicitudProyecto.`SPID` = SPID_IN;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `DecideResidencia`(
    IN v_SRID INT,
    IN v_SREstatus varchar(10)
)
BEGIN
    UPDATE SolicitudResidencia
    SET SREstatus = v_SREstatus
    WHERE v_SRID = SRID;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `EliminarSolicitudResiduo`(
    IN v_UAlumno INT
)
BEGIN
    DELETE FROM `SolicitudResidencia`
    WHERE `UAlumno` = v_UAlumno AND `SREstatus` 
        IN (
            'ESPERA', 'ASIGNADO', 'RECHAZADO', 'PENDIENTE'
            );
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `InsertarEvaluacionReporte`(
    IN v_SRID INT,
    IN v_ERFecha date,
    IN v_ERPuntualidad INT,
    IN v_ERConocimiento INT,
    IN v_ERTrabajoEquipo INT,
    IN v_ERDedicacion INT,
    IN v_EROrdenado INT,
    IN v_ERDaMejoras INT,
    IN v_ERCalificacion INT,
    IN v_ERObservaciones VARCHAR(200),
    IN v_ERNoParcial INT,
    IN v_UAsesor INT,
    IN v_Tipo BIT
    )
BEGIN
    DELETE FROM EvaReportes WHERE SRID = v_SRID AND ERNoParcial = v_ERNoParcial AND Tipo = v_Tipo;

    INSERT INTO EvaReportes (
        SRID,
        ERFecha,
        ERPuntualidad,
        ERConocimiento,
        ERTrabajoEquipo,
        ERDedicacion,
        EROrdenado,
        ERDaMejoras,
        ERCalificacion,
        ERObservaciones,
        ERNoParcial,
        UAsesor,
        Tipo
        ) 
    VALUES (
        v_SRID,
        v_ERFecha,
        v_ERPuntualidad, 
        v_ERConocimiento, 
        v_ERTrabajoEquipo, 
        v_ERDedicacion,   
        v_EROrdenado, 
        v_ERDaMejoras, 
        v_ERCalificacion, 
        v_ERObservaciones, 
        v_ERNoParcial, 
        v_UAsesor,
        v_Tipo
        );
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `InsertarEvaluacionReporteFinal`(IN v_SRID INT, IN v_ERFPortada INT, IN v_ERFAgradecimientos INT, 
    IN v_ERFResumen INT, IN v_ERFIndice INT, IN v_ERFIntroduccion INT, IN v_ERFAntecedentes INT,
    IN v_ERFJustificacion INT, IN v_ERFObjetivos INT, IN v_ERFMetodologia INT, IN v_ERFResultados INT,
    IN v_ERFDiscusiones INT, IN v_ERFConclusiones INT, IN v_ERFFuentes INT, IN v_ERFTotal INT,
    IN v_ERFObservaciones varchar(100), IN v_UID INT, IN v_Tipo BIT)
BEGIN
    
    DECLARE v_RFID INT;
    SELECT RFID INTO v_RFID FROM ReporteFinal WHERE SRID = v_SRID;

    DELETE FROM EvaReporteFinal WHERE RFID=v_RFID AND Tipo = v_Tipo;

    INSERT INTO EvaReporteFinal (
    ERFPortada,
    ERFAgradecimientos,
    ERFResumen,
    ERFIndice,
    ERFIntroduccion,
    ERFAntecedentes,
    ERFJustificacion,
    ERFObjetivos,
    ERFMetodologia,
    ERFResultados,
    ERFDiscusiones,
    ERFConclusiones,
    ERFFuentes,
    ERFTotal,
    ERFObservaciones,
    UAsesor,
    RFID,
    Tipo

) VALUES (
    v_ERFPortada,
    v_ERFAgradecimientos,
    v_ERFResumen,
    v_ERFIndice,
    v_ERFIntroduccion,
    v_ERFAntecedentes,
    v_ERFJustificacion,
    v_ERFObjetivos,
    v_ERFMetodologia,
    v_ERFResultados,
    v_ERFDiscusiones,
    v_ERFConclusiones,
    v_ERFFuentes,
    v_ERFTotal,
    v_ERFObservaciones,
    v_UID,
    v_RFID,
    v_Tipo);
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `InsertarReporteFinal`(IN p_UAlumno INT, IN p_RPContenido LONGBLOB)
BEGIN
    DECLARE v_SRID INT;
    
    START TRANSACTION;

    SELECT SRID INTO v_SRID FROM SolicitudResidencia WHERE UAlumno = p_UAlumno;
    
    DELETE FROM ReporteFinal WHERE SRID = v_SRID;

    INSERT INTO ReporteFinal (SRID, RPContenido) VALUES (v_SRID, p_RPContenido);
    
    COMMIT;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `InsertarSolicitudResidencia`(
    IN v_SRAnteProyecto LONGBLOB,
    
    IN v_SREstatus varchar(10),
    IN v_SRPeriodo varchar(25),
    IN v_UAlumno INT,
    IN v_BPID INT,
    IN v_SROpcionElegida varchar(30)
)
BEGIN
    
    INSERT INTO SolicitudResidencia (
        SRAnteProyecto,
        
        SREstatus,
        SRPeriodo,
        UAlumno,
        BPID,
        SROpcionElegida
        ) 
        VALUES (
            v_SRAnteProyecto,
            
            v_SREstatus,
            v_SRPeriodo,
            v_UAlumno,
            v_BPID,
            v_SROpcionElegida
            );
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `ObtenerAsesorExterno`(IN v_uid INT)
BEGIN
    SELECT *
    FROM AsesorExterno
    WHERE UID = v_uid;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `ObtenerEvaluacionFinal`(
    IN v_UAsesor INT,
    IN v_UAlumno INT,
    IN v_Tipo INT
)
BEGIN
    SELECT ERF.*
    FROM EvaReporteFinal as ERF
    INNER JOIN ReporteFinal as RF ON ERF.RFID = RF.RFID
    INNER JOIN SolicitudResidencia as SR ON SR.SRID = RF.SRID
    WHERE ERF.UAsesor = v_UAsesor 
        AND SR.UAlumno = v_UAlumno
        AND ERF.Tipo = v_Tipo;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `ObtenerEvaluacionReporteFinal`(
    IN v_UAlumno INT,
    IN v_Tipo INT
)
BEGIN
    SELECT ERF.*
    FROM EvaReporteFinal as ERF
    INNER JOIN ReporteFinal as RF ON ERF.RFID = RF.RFID
    INNER JOIN SolicitudResidencia as SR ON SR.SRID = RF.SRID
    WHERE SR.UAlumno = v_UAlumno
        AND ERF.Tipo = v_Tipo;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `ObtenerEvaluacionSeguimiento`(
    IN v_UAsesor INT,
    IN v_UAlumno INT,
    IN v_ERNoParcial INT,
    IN v_Tipo INT
)
BEGIN
    SELECT ER.*
    FROM EvaReportes as ER
    INNER JOIN SolicitudResidencia as SR ON ER.SRID = SR.SRID
    WHERE SR.UAlumno = v_UAlumno
        AND ER.ERNoParcial = v_ERNoParcial
        AND ER.Tipo = v_Tipo;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `ObtenerEvaluacionSeguimientoT`(
    IN v_UAlumno INT,
    IN v_ERNoParcial INT,
    IN v_Tipo INT
)
BEGIN
    SELECT ER.*
    FROM EvaReportes as ER
    INNER JOIN SolicitudResidencia as SR ON ER.SRID = SR.SRID
    WHERE SR.UAlumno = v_UAlumno
        AND ER.ERNoParcial = v_ERNoParcial
        AND ER.Tipo = v_Tipo;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `ObtenerIDAsesoresXAlumno`(IN id_alumno INT)
BEGIN
    SELECT BP.*
    FROM SolicitudProyecto SP
    INNER JOIN BancoProyectos BP ON SP.SPID = BP.SPID
    INNER JOIN SolicitudResidencia SR ON BP.BPID = SR.BPID
    WHERE SR.UAlumno = id_alumno AND SR.SREstatus= 'APROBADO';
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `ObtenerIDAsesorInterno`(IN p_UID INT)
BEGIN
    SELECT AIID
    FROM AsesorInterno
    WHERE UID = p_UID;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `ObtenerResidenciaAIID`(IN v_AIID INT)
BEGIN
    SELECT *
    FROM SolicitudProyecto as SP
    INNER JOIN BancoProyectos as BP ON SP.SPID = BP.SPID
    WHERE BP.AIID = v_AIID;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `ObtenerSolicitudProyecto`(IN v_spid INT)
BEGIN
    SELECT *
    FROM SolicitudProyecto as SP
    WHERE SP.SPID = v_spid;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `ProfesorxAsesor`(IN uid INT)
BEGIN
	SELECT *
	FROM Profesor PR
	INNER JOIN Profesor_Usuarios PU ON PR.RFCProfesor = PU.RFCProfesor
	WHERE PU.UID = uid;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `reenviarSolicitudResidencia`(
    IN v_SRAnteProyecto LONGBLOB
)
BEGIN
    INSERT INTO SolicitudResidencia (
        SRAnteProyecto
        ) 
        VALUES (
            v_SRAnteProyecto
            );
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `updateAntProySolicitudResidencia`(
    IN v_SRAnteProyecto LONGBLOB, IN v_SRID int
)
BEGIN
    UPDATE SolicitudResidencia
    SET SRAnteProyecto = v_SRAnteProyecto
    WHERE SRID = v_SRID;
END;
CREATE DEFINER=`admin`@`%` PROCEDURE `UsuarioxAlumno`(IN alumno_id INT)
BEGIN
    SELECT * 
    FROM Alumnos AL
    INNER JOIN Alumno_Usuarios AU ON AL.NumeroControl = AU.NumeroControl
    INNER JOIN Usuarios US ON US.UID = AU.UID
    WHERE US.UID = alumno_id;
END;