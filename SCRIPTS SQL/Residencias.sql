CREATE DATABASE Residencias;
USE Residencias;

-- USUARIOS
CREATE TABLE IF NOT EXISTS `Usuarios` (
    `UID` int(10) NOT NULL AUTO_INCREMENT,
    `URol` varchar(20) DEFAULT NULL,
    `Ufirma` longblob DEFAULT NULL,
    PRIMARY KEY (`UID`)
);

-- EMPRESAS
CREATE TABLE IF NOT EXISTS `Empresas` (
    `ERFC` varchar(13) NOT NULL,
    `ENombre` varchar(50) DEFAULT NULL,
    `ERamo` varchar(50) DEFAULT NULL,
    `ESector` varchar(50) DEFAULT NULL,
    `EActPrincipal` varchar(50) DEFAULT NULL,
    `EDomicilio` varchar(50) DEFAULT NULL,
    `EColonia` varchar(50) DEFAULT NULL,
    `ECiudad` varchar(50) DEFAULT NULL,
    `ECp` int(5) DEFAULT NULL,
    `EFax` int(10) DEFAULT NULL,
    `ETelefono` varchar(10) DEFAULT NULL,
    `EEstatus` varchar(10) DEFAULT NULL,
    `ENombreTitular` varchar(100) DEFAULT NULL,
    `ENombreAcuerdo` varchar(100) DEFAULT NULL,
    `EPuestoTitular` varchar(100) DEFAULT NULL,
    `EPuestoAcuerdo` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`ERFC`)
);

-- SOLICITUD PROYECTO
CREATE TABLE IF NOT EXISTS `SolicitudProyecto` (
    `SPID` int(10) NOT NULL AUTO_INCREMENT,
    `SPNombreProyecto` varchar(255) DEFAULT NULL,
    `SPObjetivo` varchar(1000) DEFAULT NULL,
    `SPDescripcion` varchar(1000) DEFAULT NULL,
    `SPImpacto` varchar(1000) DEFAULT NULL,
    `SPLugar` varchar(255) DEFAULT NULL,
    `SPEstudiantesRequeridos` int(11) DEFAULT NULL,
    `SDTiempoEstimado` int(11) DEFAULT NULL COMMENT 'MESES',
    `SPTipo` varchar(10) DEFAULT 'INTERNO' COMMENT 'INTERNO, EXTERNO, DUAL, CIIE',
    `SPLineaInvestigacion` varchar(255) DEFAULT NULL,
    `SPReferencias` varchar(1000) DEFAULT NULL,
    `UIDResponsable` int(11) DEFAULT NULL COMMENT 'El responsable es el que registra el proyecto',
    `SPEstatus` varchar(10) DEFAULT 'PENDIENTE' COMMENT 'PENDIENTE, REVISION, ACEPTADO, RECHAZADP',
    `ERFC` varchar(13) DEFAULT NULL,
    `UPropietario` int(11) DEFAULT NULL,
    PRIMARY KEY (`SPID`),
    KEY `UIDResponsable` (`UIDResponsable`),
    KEY `ERFC` (`ERFC`),
    KEY `UPropietario` (`UPropietario`),
    CONSTRAINT `SolicitudProyecto_ibfk_1` FOREIGN KEY (`ERFC`) REFERENCES `Empresas` (`ERFC`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `SolicitudProyecto_ibfk_2` FOREIGN KEY (`UPropietario`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `UIDResponsable` FOREIGN KEY (`UIDResponsable`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- COMISION PROYECTO PROFESOR
CREATE TABLE IF NOT EXISTS `ComisionProyectoProfesor` (
    `CPPID` int(11) NOT NULL AUTO_INCREMENT,
    `UProfesor` int(10) DEFAULT NULL,
    `SPID` int(10) DEFAULT NULL,
    `CPPFechaElaboracion` date DEFAULT NULL,
    `CPPFechaLimite` date DEFAULT NULL,
    `CPPEstatus` varchar(10) DEFAULT 'PENDIENTE' COMMENT 'PENDIENTE, ACEPTADO, RECHAZADO',
    `CPPObservaciones` varchar(200) DEFAULT NULL,
    PRIMARY KEY (`CPPID`),
    KEY `UProfesor` (`UProfesor`),
    KEY `SPID` (`SPID`),
    CONSTRAINT `ComisionProyectoProfesor_ibfk_1` FOREIGN KEY (`UProfesor`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `ComisionProyectoProfesor_ibfk_2` FOREIGN KEY (`SPID`) REFERENCES `SolicitudProyecto` (`SPID`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- NOTIFICACIONES
CREATE TABLE IF NOT EXISTS `Notificaciones` (
    `NID` int(10) NOT NULL AUTO_INCREMENT,
    `UReceptor` int(10) DEFAULT NULL,
    `UEmisor` int(10) DEFAULT NULL,
    `NMensaje` varchar(100) DEFAULT NULL,
    `NTipo` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`NID`),
    KEY `UReceptor` (`UReceptor`),
    KEY `UEmisor` (`UEmisor`),
    CONSTRAINT `Notificaciones_ibfk_1` FOREIGN KEY (`UReceptor`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `Notificaciones_ibfk_2` FOREIGN KEY (`UEmisor`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- CARTA AGRADECIMIENTO
CREATE TABLE IF NOT EXISTS `CartaAgradecimiento` (
    `CAID` int(10) NOT NULL AUTO_INCREMENT,
    `UAlumno` int(10) DEFAULT NULL,
    `CACartaOficio` int(5) DEFAULT NULL,
    `CAFecha_Elaboracion` date DEFAULT NULL,
    `CALugar` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`CAID`),
    KEY `UAlumno` (`UAlumno`),
    CONSTRAINT `CartaAgradecimiento_ibfk_1` FOREIGN KEY (`UAlumno`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ASESOR EXTERNO
CREATE TABLE IF NOT EXISTS `AsesorExterno` (
    `AEID` int(10) NOT NULL AUTO_INCREMENT,
    `UID` int(10) DEFAULT NULL,
    `ERFC` varchar(13) DEFAULT NULL,
    `AEPuesto` varchar(45) DEFAULT 'Profesor',
    `AENombre` varchar(255) DEFAULT NULL COMMENT 'nombre del asesor',
    `AECorreo` varchar(50) DEFAULT NULL,
    `AEContrasena` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`AEID`),
    KEY `UID` (`UID`),
    KEY `ERFC` (`ERFC`),
    CONSTRAINT `AsesorExterno_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `ERFC` FOREIGN KEY (`ERFC`) REFERENCES `Empresas` (`ERFC`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- ASESOR INTERNO
CREATE TABLE IF NOT EXISTS `AsesorInterno` (
    `AIID` int(10) NOT NULL AUTO_INCREMENT,
    `UID` int(10) DEFAULT NULL,
    PRIMARY KEY (`AIID`),
    KEY `UID` (`UID`),
    CONSTRAINT `AsesorInterno_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- HORARIO ASESORIA
CREATE TABLE IF NOT EXISTS `HorarioAsesorias` (
    `HAID` int(10) NOT NULL AUTO_INCREMENT,
    `HADia` tinyint(4) DEFAULT NULL,
    `HAHora` time DEFAULT NULL,
    `UAsesorInterno` int(10) DEFAULT NULL,
    PRIMARY KEY (`HAID`),
    KEY `UAsesorInterno` (`UAsesorInterno`),
    CONSTRAINT `HorarioAsesorias_ibfk_1` FOREIGN KEY (`UAsesorInterno`) REFERENCES `AsesorInterno` (`AIID`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- ASESORIAS
CREATE TABLE IF NOT EXISTS `Asesorias` (
    `AID` int(10) NOT NULL AUTO_INCREMENT,
    `AIID` int(10) DEFAULT NULL,
    `AEstatus` varchar(10) DEFAULT NULL,
    `HAID` int(10) DEFAULT NULL,
    `ATipo` varchar(10) DEFAULT NULL,
    `UAlumno` int(10) DEFAULT NULL,
    PRIMARY KEY (`AID`),
    KEY `AIID` (`AIID`),
    KEY `HAID` (`HAID`),
    KEY `UAlumno` (`UAlumno`),
    CONSTRAINT `Asesorias_ibfk_1` FOREIGN KEY (`AIID`) REFERENCES `AsesorInterno` (`AIID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `Asesorias_ibfk_2` FOREIGN KEY (`HAID`) REFERENCES `HorarioAsesorias` (`HAID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `Asesorias_ibfk_3` FOREIGN KEY (`UAlumno`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- FORO FAQ
CREATE TABLE IF NOT EXISTS `ForoFAQ` (
    `FFID` int(10) NOT NULL AUTO_INCREMENT,
    `UAlumno` int(10) DEFAULT NULL,
    `Comentario` varchar(200) DEFAULT NULL,
    PRIMARY KEY (`FFID`),
    KEY `UAlumno` (`UAlumno`),
    CONSTRAINT `ForoFAQ_ibfk_1` FOREIGN KEY (`UAlumno`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- BANCO PROYECTOS
CREATE TABLE IF NOT EXISTS `BancoProyectos` (
    `BPID` int(10) NOT NULL AUTO_INCREMENT,
    `AIID` int(10) DEFAULT NULL,
    `AEID` int(10) DEFAULT NULL,
    `SPID` int(10) DEFAULT NULL,
    `BPEstado` varchar(10) DEFAULT 'DISPONIBLE' COMMENT 'Disponible, Lleno, Terminado ',
    `BPPeriodo` varchar(25) DEFAULT NULL,
    PRIMARY KEY (`BPID`),
    KEY `AIID` (`AIID`),
    KEY `AEID` (`AEID`),
    KEY `SPID` (`SPID`),
    CONSTRAINT `BancoProyectos_ibfk_1` FOREIGN KEY (`AIID`) REFERENCES `AsesorInterno` (`AIID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `BancoProyectos_ibfk_2` FOREIGN KEY (`AEID`) REFERENCES `AsesorExterno` (`AEID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `BancoProyectos_ibfk_3` FOREIGN KEY (`SPID`) REFERENCES `SolicitudProyecto` (`SPID`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- SOLICITUD RESIDENCIA
CREATE TABLE IF NOT EXISTS `SolicitudResidencia` (
    `SRID` int(10) NOT NULL AUTO_INCREMENT,
    `SRAnteProyecto` longblob DEFAULT NULL,
    `SRConstanciaInicioRes` longblob DEFAULT NULL,
    `SREstatus` varchar(10) DEFAULT NULL COMMENT 'ESPERA, ASIGNADO, APROBADO, RECHAZADO O PENDIENTE',
    `SRPeriodo` varchar(25) DEFAULT NULL,
    `UAlumno` int(10) DEFAULT NULL,
    `BPID` int(10) DEFAULT NULL,
    `SROpcionElegida` varchar(30) DEFAULT NULL,
    PRIMARY KEY (`SRID`),
    KEY `UAlumno` (`UAlumno`),
    KEY `BPID` (`BPID`),
    CONSTRAINT `SolicitudResidencia_ibfk_1` FOREIGN KEY (`UAlumno`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `SolicitudResidencia_ibfk_2` FOREIGN KEY (`BPID`) REFERENCES `BancoProyectos` (`BPID`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- DICTAMEN ANTE PROYECTO
CREATE TABLE IF NOT EXISTS `DictamenAnteproyecto` (
    `DAID` int(10) NOT NULL AUTO_INCREMENT,
    `UDepto` int(10) DEFAULT NULL,
    `AIID` int(10) DEFAULT NULL,
    `AEID` int(10) DEFAULT NULL,
    `SRID` int(10) DEFAULT NULL,
    PRIMARY KEY (`DAID`),
    KEY `UDepto` (`UDepto`),
    KEY `AIID` (`AIID`),
    KEY `AEID` (`AEID`),
    KEY `SRID` (`SRID`),
    CONSTRAINT `DictamenAnteproyecto_ibfk_1` FOREIGN KEY (`UDepto`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `DictamenAnteproyecto_ibfk_2` FOREIGN KEY (`AIID`) REFERENCES `AsesorInterno` (`AIID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `DictamenAnteproyecto_ibfk_3` FOREIGN KEY (`AEID`) REFERENCES `AsesorExterno` (`AEID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `DictamenAnteproyecto_ibfk_4` FOREIGN KEY (`SRID`) REFERENCES `SolicitudResidencia` (`SRID`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- COMISIONES ASESORES
CREATE TABLE IF NOT EXISTS `ComisionesAsesores` (
    `CAID` int(10) NOT NULL AUTO_INCREMENT,
    `UProfesor` int(10) DEFAULT NULL,
    `BPID` int(10) DEFAULT NULL,
    `CAEstatus` varchar(15) DEFAULT 'PENDIENTE' COMMENT 'PENDIENTE,ACEPTADO, RECHAZADO',
    `CAPeriodo` varchar(25) DEFAULT NULL,
    `Motivo` varchar(255) DEFAULT NULL COMMENT 'SOLO SI ES REASIGNACION',
    `NoOficio` varchar(25) DEFAULT NULL,
    PRIMARY KEY (`CAID`),
    KEY `UProfesor` (`UProfesor`),
    KEY `BPID` (`BPID`),
    CONSTRAINT `ComisionesAsesores_ibfk_1` FOREIGN KEY (`UProfesor`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `ComisionesAsesores_ibfk_2` FOREIGN KEY (`BPID`) REFERENCES `BancoProyectos` (`BPID`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- EVALUACION SOLICITUD RESIDENCIA
CREATE TABLE IF NOT EXISTS `EvaluacionSolicitudResidencia` (
    `ESRID` int(10) NOT NULL AUTO_INCREMENT,
    `UProfesor` int(10) DEFAULT NULL,
    `SRID` int(10) DEFAULT NULL,
    `ESRFecha` date DEFAULT NULL,
    `ESRPeriodo` varchar(25) DEFAULT NULL,
    `Num_Oficio` int(10) DEFAULT NULL,
    PRIMARY KEY (`ESRID`),
    KEY `UProfesor` (`UProfesor`),
    KEY `SRID` (`SRID`),
    CONSTRAINT `EvaluacionSolicitudResidencia_ibfk_1` FOREIGN KEY (`UProfesor`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `EvaluacionSolicitudResidencia_ibfk_2` FOREIGN KEY (`SRID`) REFERENCES `SolicitudResidencia` (`SRID`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- FORMATO QUEJA
CREATE TABLE IF NOT EXISTS `FormatoQueja` (
    `FQID` int(10) NOT NULL AUTO_INCREMENT,
    `ESRID` int(10) DEFAULT NULL,
    `FQFecha` date DEFAULT NULL,
    `FQMotivoQueja` varchar(200) DEFAULT NULL,
    PRIMARY KEY (`FQID`),
    KEY `ESRID` (`ESRID`),
    CONSTRAINT `FormatoQueja_ibfk_1` FOREIGN KEY (`ESRID`) REFERENCES `EvaluacionSolicitudResidencia` (`ESRID`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- REPORTE FINAL
CREATE TABLE IF NOT EXISTS `ReporteFinal` (
    `RFID` int(10) NOT NULL AUTO_INCREMENT,
    `SRID` int(10) DEFAULT NULL,
    `RPContenido` longblob DEFAULT NULL,
    PRIMARY KEY (`RFID`),
    KEY `SRID` (`SRID`),
    CONSTRAINT `ReporteFinal_ibfk_1` FOREIGN KEY (`SRID`) REFERENCES `SolicitudResidencia` (`SRID`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- EVA REPORTE FINAL
CREATE TABLE IF NOT EXISTS `EvaReporteFinal` (
    `ERFID` int(10) NOT NULL AUTO_INCREMENT,
    `ERFPortada` int(11) DEFAULT NULL,
    `ERFAgradecimientos` int(11) DEFAULT NULL,
    `ERFResumen` int(11) DEFAULT NULL,
    `ERFIndice` int(11) DEFAULT NULL,
    `ERFIntroduccion` int(11) DEFAULT NULL,
    `ERFAntecedentes` int(11) DEFAULT NULL,
    `ERFJustificacion` int(11) DEFAULT NULL,
    `ERFObjetivos` int(11) DEFAULT NULL,
    `ERFMetodologia` int(11) DEFAULT NULL,
    `ERFResultados` int(11) DEFAULT NULL,
    `ERFDiscusiones` int(11) DEFAULT NULL,
    `ERFConclusiones` int(11) DEFAULT NULL,
    `ERFFuentes` int(11) DEFAULT NULL,
    `ERFTotal` int(11) DEFAULT NULL,
    `ERFObservaciones` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `UAsesor` int(11) DEFAULT NULL,
    `RFID` int(10) DEFAULT NULL,
    `Tipo` bit(1) DEFAULT NULL COMMENT '0=Interno, 1=Externo',
    PRIMARY KEY (`ERFID`),
    KEY `RFID` (`RFID`),
    KEY `UAsesor` (`UAsesor`),
    CONSTRAINT `EvaReporteFinal_ibfk_3` FOREIGN KEY (`RFID`) REFERENCES `ReporteFinal` (`RFID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `EvaReporteFinal_ibfk_4` FOREIGN KEY (`UAsesor`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- EVA REPORTES
CREATE TABLE IF NOT EXISTS `EvaReportes` (
    `ERFID` int(10) NOT NULL AUTO_INCREMENT,
    `SRID` int(10) DEFAULT NULL,
    `ERFecha` date DEFAULT NULL,
    `ERPuntualidad` int(11) DEFAULT NULL,
    `ERCumpleObjetivos` int(11) DEFAULT NULL COMMENT 'Asesor Externo',
    `ERLiderazgo` int(11) DEFAULT NULL COMMENT 'Asesor Externo',
    `ERConocimiento` int(11) DEFAULT NULL,
    `ERComportamiento` int(11) DEFAULT NULL COMMENT 'Asesor Externo',
    `ERTrabajoEquipo` int(11) DEFAULT NULL,
    `ERDedicacion` int(11) DEFAULT NULL,
    `EROrdenado` int(11) DEFAULT NULL,
    `ERDaMejoras` int(11) DEFAULT NULL,
    `ERCalificacion` int(11) DEFAULT NULL,
    `ERObservaciones` varchar(200) DEFAULT NULL,
    `ERNoParcial` int(11) DEFAULT NULL,
    `UAsesor` int(11) DEFAULT NULL COMMENT 'Es id de la tabla usuarios',
    `Tipo` bit(1) DEFAULT NULL COMMENT '1=Externo, 0=Interno nos ahorra la busqueda del interno o externo',
    PRIMARY KEY (`ERFID`),
    KEY `SRID` (`SRID`),
    CONSTRAINT `EvaReportes_ibfk_1` FOREIGN KEY (`SRID`) REFERENCES `SolicitudResidencia` (`SRID`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- DEPARTAMENTOS
CREATE TABLE IF NOT EXISTS `Departamentos` (
    `DID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `DNombre` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`DID`)
);
-- CARRERAS
CREATE TABLE IF NOT EXISTS `Carreras` (
    `CID` int(10) NOT NULL AUTO_INCREMENT,
    `Nombre` varchar(65) DEFAULT NULL,
    `DID` int(11) DEFAULT NULL,
    PRIMARY KEY (`CID`),
    KEY `fk_DeptoCarr` (`DID`),
    CONSTRAINT `fk_DeptoCarr` FOREIGN KEY (`DID`) REFERENCES `Departamentos` (`DID`)
);
-- ALUMNOS
CREATE TABLE IF NOT EXISTS `Alumnos` (
    `NumeroControl` varchar(10) NOT NULL,
    `NombreCompleto` varchar(50) DEFAULT NULL,
    `NumeroSeguroSocial` varchar(11) DEFAULT NULL,
    `SemestreActual` int(2) DEFAULT NULL,
    `Domicilio` varchar(100) DEFAULT NULL,
    `Email` varchar(50) DEFAULT NULL,
    `Ciudad` varchar(50) DEFAULT NULL,
    `Telefono` varchar(20) DEFAULT NULL,
    `CreditosComplementariosCumplidos` tinyint(1) DEFAULT NULL,
    `NoTenerCursosEspeciales` tinyint(1) DEFAULT NULL,
    `OchentaPorcientoCargaAcademica` tinyint(1) DEFAULT NULL,
    `AcreditacionServicioSocial` tinyint(1) DEFAULT NULL,
    `CorreoInstitucional` varchar(50) DEFAULT NULL,
    `ContrasenaCorreo` varchar(50) DEFAULT NULL,
    `DID` int(11) DEFAULT NULL,
    `CID` int(11) DEFAULT NULL,
    `InstitucionSeguro` varchar(6) DEFAULT NULL,
    PRIMARY KEY (`NumeroControl`),
    KEY `DEID` (`DID`),
    KEY `CarreraID` (`CID`),
    CONSTRAINT `CarreraID` FOREIGN KEY (`CID`) REFERENCES `Carreras` (`CID`) ON UPDATE CASCADE,
    CONSTRAINT `DEID` FOREIGN KEY (`DID`) REFERENCES `Departamentos` (`DID`) ON UPDATE CASCADE
);
-- ALUMNOS X USUARIOS
CREATE TABLE IF NOT EXISTS `Alumno_Usuarios` (
    `IDAU` int(10) NOT NULL AUTO_INCREMENT,
    `UID` int(10) DEFAULT NULL,
    `NumeroControl` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`IDAU`),
    KEY `UID` (`UID`),
    KEY `NumeroControl` (`NumeroControl`),
    CONSTRAINT `Alumno_Usuarios_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `Alumno_Usuarios_ibfk_2` FOREIGN KEY (`NumeroControl`) REFERENCES `Alumnos` (`NumeroControl`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- PROFESOR
CREATE TABLE IF NOT EXISTS `Profesor` (
    `RFCProfesor` varchar(20) NOT NULL,
    `NombreCompleto` varchar(100) DEFAULT NULL,
    `CorreoInstitucional` varchar(50) DEFAULT NULL,
    `ContrasenaCorreo` varchar(50) DEFAULT NULL,
    `DID` int(11) DEFAULT NULL,
    PRIMARY KEY (`RFCProfesor`),
    KEY `DID` (`DID`),
    CONSTRAINT `DID` FOREIGN KEY (`DID`) REFERENCES `Departamentos` (`DID`) ON UPDATE CASCADE
);
-- PROFESOR X ALUMNO
CREATE TABLE IF NOT EXISTS `Profesor_Usuarios` (
    `IDPU` int(10) NOT NULL AUTO_INCREMENT,
    `UID` int(10) DEFAULT NULL,
    `RFCProfesor` varchar(20) DEFAULT NULL,
    PRIMARY KEY (`IDPU`),
    KEY `UID` (`UID`),
    KEY `RFCProfesor` (`RFCProfesor`),
    CONSTRAINT `Profesor_Usuarios_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `Profesor_Usuarios_ibfk_2` FOREIGN KEY (`RFCProfesor`) REFERENCES `Profesor` (`RFCProfesor`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- USUARIOS X DEPARTAMENTOS
CREATE TABLE IF NOT EXISTS `UsuariosDepartamentos` (
    `UDID` int(11) NOT NULL AUTO_INCREMENT,
    `UID` int(11) DEFAULT NULL,
    `DID` int(11) DEFAULT NULL,
    PRIMARY KEY (`UDID`),
    KEY `UID` (`UID`),
    KEY `DID` (`DID`),
    CONSTRAINT `UsuariosDepartamentos_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `UsuariosDepartamentos_ibfk_2` FOREIGN KEY (`DID`) REFERENCES `Departamentos` (`DID`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- FECHAS VENCIMIENTO
CREATE TABLE IF NOT EXISTS `FechasVencimiento` (
    `FVTramite` varchar(255) NOT NULL COMMENT 'Palabra Clave del Tramite',
    `FVFechaLimite` date DEFAULT NULL,
    `FVDescripcionTramite` varchar(400) DEFAULT NULL COMMENT 'Aqui se especifica el tramite',
    PRIMARY KEY (`FVTramite`)
);
-- CARRERAS SOLICITUD PROYECTO
CREATE TABLE IF NOT EXISTS `CarrerasSolicitudProyecto` (
    `CSP` int(10) NOT NULL AUTO_INCREMENT,
    `CID` int(10) DEFAULT NULL,
    `SPID` int(10) DEFAULT NULL,
    PRIMARY KEY (`CSP`),
    KEY `SPID` (`SPID`),
    KEY `CID` (`CID`),
    CONSTRAINT `CarrerasSolicitudProyecto_ibfk_1` FOREIGN KEY (`SPID`) REFERENCES `SolicitudProyecto` (`SPID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `CarrerasSolicitudProyecto_ibfk_2` FOREIGN KEY (`CID`) REFERENCES `Carreras` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- OBSERVACIONES SOLICITUDES
CREATE TABLE IF NOT EXISTS `ObservacionesSolicitudes` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `Observvaciones` varchar(255) DEFAULT NULL,
    `idSolicitud` int(11) DEFAULT NULL,
    `UProfesor` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `idSolicitud` (`idSolicitud`),
    KEY `UProfesor` (`UProfesor`),
    CONSTRAINT `ObservacionesSolicitudes_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `SolicitudResidencia` (`SRID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `ObservacionesSolicitudes_ibfk_2` FOREIGN KEY (`UProfesor`) REFERENCES `Usuarios` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================================ PROCEDURES ================================================
-- ============================================ PROCEDURES ================================================
-- ============================================ PROCEDURES ================================================
-- ============================================ PROCEDURES ================================================
-- ============================================ PROCEDURES ================================================
-- ============================================ PROCEDURES ================================================

DELIMITER //
#ActualizarNResidentes
CREATE PROCEDURE ActualizarNResidentes(
    IN p_SPID INT,
    IN p_SPEstudiantesRequeridos INT
)
BEGIN
    UPDATE SolicitudProyecto
    SET SPEstudiantesRequeridos = p_SPEstudiantesRequeridos
    WHERE SPID = p_SPID;
END //
#AlumnoXCarrera
CREATE PROCEDURE AlumnoXCarrera(IN NC VARCHAR(20))
BEGIN 
	SELECT *
	FROM Alumnos AL
		INNER JOIN Carreras CA ON AL.CID = CA.CID
	WHERE AL.NumeroControl = NC;
END //
#AlumnoxNombreProyecto
CREATE PROCEDURE AlumnoxNombreProyecto(IN id_alumno INT)
BEGIN
    SELECT SP.SPNombreProyecto
    FROM SolicitudProyecto SP
    INNER JOIN BancoProyectos BP ON SP.SPID = BP.SPID
    INNER JOIN SolicitudResidencia SR ON BP.BPID = SR.BPID
    WHERE SR.UAlumno = id_alumno AND SR.SREstatus= 'APROBADO';
END //
#AlumnoxProyecto
CREATE PROCEDURE AlumnoxProyecto(IN id_alumno INT)
BEGIN
    SELECT *
    FROM SolicitudProyecto SP
    INNER JOIN BancoProyectos BP ON SP.SPID = BP.SPID
    INNER JOIN SolicitudResidencia SR ON BP.BPID = SR.BPID
    WHERE SR.UAlumno = id_alumno AND SR.SREstatus= 'APROBADO';
END //
#AsesorExternoxAlumno
CREATE PROCEDURE AsesorExternoxAlumno(IN asesor_id INT)
BEGIN
    SELECT SR.UAlumno, SR.SRID, BP.AEID, AE.UID, BP.SPID
    FROM SolicitudResidencia SR
    INNER JOIN BancoProyectos BP ON SR.BPID = BP.BPID
    INNER JOIN AsesorExterno AE ON BP.AEID = AE.AEID
    WHERE AE.UID = asesor_id AND SR.SREstatus = 'APROBADO';
END //
#AsesorxAlumno
CREATE PROCEDURE AsesorxAlumno(IN asesor_id INT)
BEGIN
    SELECT SR.UAlumno, SR.SRID, BP.AIID, AI.UID, BP.SPID
    FROM SolicitudResidencia SR
    INNER JOIN BancoProyectos BP ON SR.BPID = BP.BPID
    INNER JOIN AsesorInterno AI ON BP.AIID = AI.AIID
    WHERE AI.UID = asesor_id AND SR.SREstatus = 'APROBADO';
END //
#bancoProyecto
CREATE PROCEDURE bancoProyecto(
    IN v_DID int
)
BEGIN
    SELECT SolicitudProyecto.`SPID`, SolicitudProyecto.`SPNombreProyecto`, SolicitudProyecto.`SPObjetivo`, SolicitudProyecto.`SPEstudiantesRequeridos`, SolicitudProyecto.`SDTiempoEstimado`, Profesor.`NombreCompleto` FROM `SolicitudProyecto` INNER JOIN `Profesor_Usuarios` INNER JOIN `Profesor` ON `SolicitudProyecto`.`UIDResponsable` = Profesor_Usuarios.`UID` AND Profesor_Usuarios.`RFCProfesor` = Profesor.`RFCProfesor` WHERE SolicitudProyecto.SPEstatus = 'ACEPTADO' AND Profesor.DID = v_DID;
END //
#basicInfo
CREATE PROCEDURE basicInfo(IN SPID_IN int)
BEGIN
    SELECT SolicitudProyecto.`SPID`, SolicitudProyecto.`SPNombreProyecto`, SolicitudProyecto.`SPObjetivo`, SolicitudProyecto.`SPEstudiantesRequeridos`, SolicitudProyecto.`SDTiempoEstimado`, Profesor.`NombreCompleto` FROM `SolicitudProyecto` INNER JOIN `Profesor_Usuarios` INNER JOIN `Profesor` ON `SolicitudProyecto`.`UIDResponsable` = Profesor_Usuarios.`UID` AND Profesor_Usuarios.`RFCProfesor` = Profesor.`RFCProfesor` WHERE SolicitudProyecto.`SPID` = SPID_IN;
END //
#DecideResidencia
CREATE PROCEDURE DecideResidencia(
    IN v_SRID INT,
    IN v_SREstatus varchar(10)
)
BEGIN
    UPDATE SolicitudResidencia
    SET SREstatus = v_SREstatus
    WHERE v_SRID = SRID;
END //
CREATE PROCEDURE EliminarSolicitudResiduo(
    IN v_UAlumno INT
)
BEGIN
    DELETE FROM `SolicitudResidencia`
    WHERE `UAlumno` = v_UAlumno AND `SREstatus` 
        IN (
            'ESPERA', 'ASIGNADO', 'RECHAZADO', 'PENDIENTE'
            );
END //
#InsertarEvaluacionReporte
CREATE PROCEDURE InsertarEvaluacionReporte(
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
END //
#InsertarEvaluacionReporteFinal
CREATE PROCEDURE InsertarEvaluacionReporteFinal(IN v_SRID INT, IN v_ERFPortada INT, IN v_ERFAgradecimientos INT, 
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
END //
#InsertarReporteFinal
CREATE PROCEDURE InsertarReporteFinal(IN p_UAlumno INT, IN p_RPContenido LONGBLOB)
BEGIN
    DECLARE v_SRID INT;
    DECLARE RF_SRID INT;
    
    START TRANSACTION;

        SELECT SRID INTO v_SRID FROM SolicitudResidencia WHERE UAlumno = p_UAlumno AND SREstatus = 'APROBADO';
        SELECT SRID INTO RF_SRID  FROM ReporteFinal WHERE SRID = v_SRID;
        
        IF RF_SRID IS NULL THEN
            INSERT INTO ReporteFinal (SRID, RPContenido) VALUES (v_SRID, p_RPContenido);
        ELSE
            UPDATE ReporteFinal SET RPContenido = p_RPContenido WHERE SRID = v_SRID;
        END IF;   
    
    COMMIT;
END //
#InsertarSolicitudResidencia
CREATE PROCEDURE InsertarSolicitudResidencia(
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
END //
#ObtenerAsesorExterno
CREATE PROCEDURE ObtenerAsesorExterno(IN v_uid INT)
BEGIN
    SELECT *
    FROM AsesorExterno
    WHERE UID = v_uid;
END //
#ObtenerEvaluacionFinal
CREATE PROCEDURE ObtenerEvaluacionFinal(
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
END //
#ObtenerEvaluacionReporteFinal
CREATE PROCEDURE ObtenerEvaluacionReporteFinal(
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
END //
#ObtenerEvaluacionSeguimiento
CREATE PROCEDURE ObtenerEvaluacionSeguimiento(
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
END //
#ObtenerEvaluacionSeguimientoT
CREATE PROCEDURE ObtenerEvaluacionSeguimientoT(
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
END //
#ObtenerIDAsesoresXAlumno
CREATE PROCEDURE ObtenerIDAsesoresXAlumno(IN id_alumno INT)
BEGIN
    SELECT BP.*
    FROM SolicitudProyecto SP
    INNER JOIN BancoProyectos BP ON SP.SPID = BP.SPID
    INNER JOIN SolicitudResidencia SR ON BP.BPID = SR.BPID
    WHERE SR.UAlumno = id_alumno AND SR.SREstatus= 'APROBADO';
END //
#ObtenerIDAsesorInterno
CREATE PROCEDURE ObtenerIDAsesorInterno(IN p_UID INT)
BEGIN
    SELECT AIID
    FROM AsesorInterno
    WHERE UID = p_UID;
END //
#ObtenerResidenciaAIID
CREATE PROCEDURE ObtenerResidenciaAIID(IN v_AIID INT)
BEGIN
    SELECT *
    FROM SolicitudProyecto as SP
    INNER JOIN BancoProyectos as BP ON SP.SPID = BP.SPID
    WHERE BP.AIID = v_AIID;
END //
#ObtenerSolicitudProyecto
CREATE PROCEDURE ObtenerSolicitudProyecto(IN v_spid INT)
BEGIN
    SELECT *
    FROM SolicitudProyecto as SP
    WHERE SP.SPID = v_spid;
END //
#ProfesorxAsesor
CREATE PROCEDURE ProfesorxAsesor(IN uid INT)
BEGIN
	SELECT *
	FROM Profesor PR
	INNER JOIN Profesor_Usuarios PU ON PR.RFCProfesor = PU.RFCProfesor
	WHERE PU.UID = uid;
END //
#ProfesorxAsesor
CREATE PROCEDURE ProfesorxAsesorxAIID(IN uid INT)
BEGIN
	SELECT *
	FROM Profesor PR
	INNER JOIN Profesor_Usuarios PU ON PR.RFCProfesor = PU.RFCProfesor
    INNER JOIN AsesorInterno AI ON AI.UID = PU.UID 
	WHERE AI.AIID = uid;
END //
#reenviarSolicitudResidencia
CREATE PROCEDURE reenviarSolicitudResidencia(
    IN v_SRAnteProyecto LONGBLOB
)
BEGIN
    INSERT INTO SolicitudResidencia (
        SRAnteProyecto
        ) 
        VALUES (
            v_SRAnteProyecto
            );
END //
#updateAntProySolicitudResidencia
CREATE PROCEDURE updateAntProySolicitudResidencia(
    IN v_SRAnteProyecto LONGBLOB, IN v_SRID int
)
BEGIN
    UPDATE SolicitudResidencia
    SET SRAnteProyecto = v_SRAnteProyecto
    WHERE SRID = v_SRID;
END //
#UsuarioxAlumno
CREATE PROCEDURE UsuarioxAlumno(IN alumno_id INT)
BEGIN
    SELECT * 
    FROM Alumnos AL
    INNER JOIN Alumno_Usuarios AU ON AL.NumeroControl = AU.NumeroControl
    INNER JOIN Usuarios US ON US.UID = AU.UID
    WHERE US.UID = alumno_id;
END //
#Insertar evaluacion seguimiento del asesor externo
CREATE PROCEDURE InsertarEvaluacionReporteExterno(
    IN v_SRID INT,
    IN v_ERFecha date,
    IN v_ERPuntualidad INT,
    IN v_ERTrabajoEquipo INT,
    IN v_ERDedicacion INT,
    IN v_ERDaMejoras INT,
    IN v_ERCumpleObjetivos INT,
    IN v_EROrdenado INT,
    IN v_ERLiderazgo INT,
    IN v_ERConocimiento INT,
    IN v_ERComportamiento INT,
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
        ERCumpleObjetivos,
        ERLiderazgo,
        ERConocimiento,
        ERComportamiento,
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
        v_ERCumpleObjetivos,
        v_ERLiderazgo, 
        v_ERConocimiento,
        v_ERComportamiento,
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
END //
DELIMITER ;