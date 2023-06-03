
DROP TABLE IF EXISTS ObservacionesSolicitudes;
DROP TABLE IF EXISTS CarrerasSolicitudProyecto;
DROP TABLE IF EXISTS UsuariosDepartamentos;
DROP TABLE IF EXISTS Profesor_Usuarios;
DROP TABLE IF EXISTS Profesor;
DROP TABLE IF EXISTS Alumno_Usuarios;
DROP TABLE IF EXISTS Alumnos;
DROP TABLE IF EXISTS Carreras;
DROP TABLE IF EXISTS Departamentos;
DROP TABLE IF EXISTS EvaReportes;
DROP TABLE IF EXISTS EvaReporteFinal;
DROP TABLE IF EXISTS EvaReporteFinal;
DROP TABLE IF EXISTS ReporteFinal;
DROP TABLE IF EXISTS FormatoQueja;
DROP TABLE IF EXISTS EvaluacionSolicitudResidencia;
DROP TABLE IF EXISTS ComisionesAsesores;
DROP TABLE IF EXISTS DictamenAnteproyecto;
DROP TABLE IF EXISTS SolicitudResidencia;
DROP TABLE IF EXISTS BancoProyectos;
DROP TABLE IF EXISTS ForoFAQ;
DROP TABLE IF EXISTS Asesorias;
DROP TABLE IF EXISTS HorarioAsesorias;
DROP TABLE IF EXISTS AsesorInterno;
DROP TABLE IF EXISTS AsesorExterno;
DROP TABLE IF EXISTS CartaAgradecimiento;
DROP TABLE IF EXISTS Notificaciones;
DROP TABLE IF EXISTS ComisionProyectoProfesor;
DROP TABLE IF EXISTS SolicitudProyecto;
DROP TABLE IF EXISTS Empresas;
DROP TABLE IF EXISTS Usuarios;

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