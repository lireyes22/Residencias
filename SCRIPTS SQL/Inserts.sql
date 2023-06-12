
	
INSERT INTO `Departamentos` (`DID`, `DNombre`) VALUES
	(1, 'Departamento División de Estudios Profesionales'),
	(2, 'Departamento Económico Administrativo'),
	(3, 'Departamento Ingeniería, Química y Bioquímica'),
	(4, 'Departamento de Ciencias de la Tierra'),
	(5, 'Departamento Sistemas y Computo'),
	(6, 'Departamento Ingeniería Eléctrica y Electrónica'),
	(7, 'Departamento Servicios Escolares'),
	(8, 'Departamento Gestión y Vinculación');
INSERT INTO `Carreras` (`CID`, `Nombre`, `DID`) VALUES
	(1, 'Ingeniería en Tecnologías de Informacíon y Comunicaciones', 5),
	(2, 'Ingeniería en Administración', NULL),
	(3, 'Arquitectura', NULL),
	(4, 'Contador Público', NULL),
	(5, 'Licenciatura en Biología', NULL),
	(6, 'Ingenieria en Sistemas Computacionales', 5);

INSERT INTO `Usuarios` (`UID`, `URol`, `Ufirma`) VALUES
	(10, 'Alumno', NULL),
	(11, 'Alumno', NULL),
	(12, 'Profesor', NULL),
	(14, 'JefDeptAca', NULL),
	(15, 'Profesor', NULL),
	(16, 'Profesor', NULL),
	(17, 'Profesor', NULL),
	(18, 'Profesor', NULL),
	(19, 'Profesor', NULL),
	(29, 'Alumno', NULL),
	(30, 'Alumno', NULL),
	(31, 'Alumno', NULL),
	(32, 'Alumno', NULL),
	(33, 'Alumno', NULL),
	(34, 'Alumno', NULL),
	(35, 'AsesorExterno', NULL),
	(36, 'Departamento', NULL),
	(37, 'AsesorExterno', NULL),
	(38, 'Coordinador', NULL),
	(694, 'Profesor', NULL),
	(695, 'Profesor', NULL),
	(696, 'Profesor', NULL),
	(697, 'Profesor', NULL),
	(698, 'Profesor', NULL),
	(699, 'Profesor', NULL),
	(700, 'Profesor', NULL),
	(701, 'Profesor', NULL),
	(702, 'Profesor', NULL),
	(703, 'Profesor', NULL),
	(705, 'Profesor', NULL),
	(777, 'JefeDivisonEstudios', NULL);

	INSERT INTO `Empresas` (`ERFC`, `ENombre`, `ERamo`, `ESector`, `EActPrincipal`, `EDomicilio`, `EColonia`, `ECiudad`, `ECp`, `EFax`, `ETelefono`, `EEstatus`, `ENombreTitular`, `ENombreAcuerdo`, `EPuestoTitular`, `EPuestoAcuerdo`) VALUES
	('RFCTEC', 'Instituto Tecnologico de Chetumal', 'Escolar', 'Publico', 'Escolares', 'Constituyentes', 'Solidaridad', 'Chetumal', 77000, NULL, '9831658459', 'Activo', 'Miguel Aleman', 'Arturo Isaias', 'Director', 'Encargado'),
	('SDFG', 'Comision Federal de Electricidad', 'Servicios', 'Privado', 'Suministrar Electricidad', 'Av Insurgentes 919', 'Payo Obispo', 'Chetumal', 77082, -99, '9831234577', 'Activo', 'Jorge Mendez', 'Carlos Angulo', 'Director', 'Gerente');

	INSERT INTO `AsesorExterno` (`AEID`, `UID`, `ERFC`, `AEPuesto`, `AENombre`, `AECorreo`, `AEContrasena`) VALUES
	(2, 37, NULL, 'JEFE DE SISTEMAS', 'Juan Sebastian Perez Dominguez', 'as1@chetumal.tecnm.mx', 'contraseña1');

	INSERT INTO `AsesorInterno` (`AIID`, `UID`) VALUES
	(5, 12),
	(1, 14),
	(2, 15),
	(3, 16),
	(4, 17),
	(7, 18),
	(6, 19),
	(10, 694),
	(11, 695),
	(8, 697),
	(12, 698),
	(13, 699),
	(14, 700),
	(15, 701),
	(16, 702),
	(17, 703),
	(18, 777);

	INSERT INTO `Alumnos` (`NumeroControl`, `NombreCompleto`, `NumeroSeguroSocial`, `SemestreActual`, `Domicilio`, `Email`, `Ciudad`, `Telefono`, `CreditosComplementariosCumplidos`, `NoTenerCursosEspeciales`, `OchentaPorcientoCargaAcademica`, `AcreditacionServicioSocial`, `CorreoInstitucional`, `ContrasenaCorreo`, `DID`, `CID`, `InstitucionSeguro`) VALUES
	('20390001', 'Juan Perez Rodriguez', '12345678901', 8, 'Calle 1 #123, Col. Centro', 'juan.perez@example.com', 'Chetumal', '9981234561', 5, 0, 1, 1, 'L20000001@chetumal.tecnm.mx', 'mi_contrasena', 5, 1, 'IMSS'),
	('20390002', 'Maria Gomez Hernandez', '23456789012', 9, 'Calle 2 #456, Col. Hidalgo', 'maria.gomez@example.com', 'Chetumal', '9982345678', 5, 0, 1, 1, 'L20000002@chetumal.tecnm.mx', 'mi_contrasena', 5, 1, NULL),
	('20390003', 'Pedro Lopez Gomez', '34567890123', 7, 'Calle 3 #789, Col. Benito Juarez', 'pedro.lopez@example.com', 'Chetumal', '9983456789', 5, 1, 1, 0, 'L20000003@chetumal.tecnm.mx', 'mi_contrasena', 5, 1, NULL),
	('20390004', 'Ana Hernandez Perez', '45678901234', 10, 'Calle 4 #1011, Col. Solidaridad', 'ana.hernandez@example.com', 'Chetumal', '9984567890', 5, 0, 1, 1, 'L20000004@chetumal.tecnm.mx', 'mi_contrasena', 5, 1, NULL),
	('20390006', 'Laura Perez Sanchez', '67890123456', 8, 'Calle 6 #1415, Col. Lazaro Cardenas', 'laura.perez@example.com', 'Chetumal', '9986789012', 5, 0, 1, 1, 'L20000006@chetumal.tecnm.mx', 'mi_contrasena', 5, 1, NULL),
	('20390007', 'Daniel Torres Gomez', '78901234567', 11, 'Calle 7 #1617, Col. Francisco I. Madero', 'daniel.torres@example.com', 'Chetumal', '9987890123', 0, 0, 1, 1, 'L20000007@chetumal.tecnm.mx', 'mi_contrasena', 5, 1, NULL),
	('20390693', 'Cesar Antonio Xiu de la Cruz', '12345678910', 6, 'Calle Santa Cruz L18 M772', 'cesarxiu504@gmail.com', 'Chetumal', '9831054419', 5, 0, 1, 1, 'L20390693@chetumal.tecnm.mx', 'mi_contra', 5, 6, NULL),
	('20391004', 'María García López', '10987654321', 7, 'Av. Reforma, Col. San Juan', 'mariagarcia@example.com', 'Bacalar', '9987654321', 5, 0, 1, 1, 'L20234568@chetumal.tecnm.mx', 'micontrasena', 5, 1, NULL);

	INSERT INTO `Alumno_Usuarios` (`IDAU`, `UID`, `NumeroControl`) VALUES
	(1, 10, '20390003'),
	(2, 11, '20390004'),
	(4, 31, '20390693'),
	(5, 29, '20390001'),
	(6, 30, '20390002'),
	(8, 32, '20390006'),
	(9, 33, '20390007'),
	(10, 34, '20391004');

	INSERT INTO `Profesor` (`RFCProfesor`, `NombreCompleto`, `CorreoInstitucional`, `ContrasenaCorreo`, `DID`) VALUES
	('ABC123', 'Juan Carlos Pérez Hernández', 'juan.perez@institucion.edu.mx', 'contraseña1', 5),
	('BCD890', 'Fernando Eduardo Pérez Torres', 'fernando.perez@institucion.edu.mx', 'contraseña10', 5),
	('DEF456', 'María Fernanda García Torres', 'maria.garcia@institucion.edu.mx', 'contraseña2', 5),
	('EFG123', 'Isabel Cristina García Hernández', 'isabel.garcia@institucion.edu.mx', 'contraseña11', 5),
	('F345348189231', 'Blandy Berenice Pamplona Solis', 'BlandyPS@chetumal.tecnm.mx', 'awdawd2312', 5),
	('GHI789', 'Pedro José Hernández Torres', 'pedro.hernandez@institucion.edu.mx', 'contrasena3', 5),
	('HIJ456', 'Omar Alejandro Hernández Torres', 'omar.hernandez@institucion.edu.mx', 'contraseña12', 5),
	('JDDDEP', 'Cecilia Loría Tzab ', 'cecilia.loria@institucion.edu.mx', 'contrasena_cecilia', 5),
	('JKL012', 'Ana Laura López Fernández', 'ana.lopez@institucion.edu.mx', 'contraseña4', 5),
	('KLM789', 'Sofía Paola Pérez Rodríguez', 'sofia.perez@institucion.edu.mx', 'contraseña13', 5),
	('MNO345', 'Miguel Ángel Rodríguez Sánchez', 'miguel.rodriguez@institucion.edu.mx', 'contraseña5', 5),
	('NOP012', 'Ricardo Antonio Torres Sánchez', 'ricardo.torres@institucion.edu.mx', 'contraseña14', 5),
	('PQR678', 'Laura Gabriela Martínez Hernández', 'laura.martinez@institucion.edu.mx', 'contraseña6', 5),
	('QRS345', 'Marisol Alejandra Flores Pérez', 'marisol.flores@institucion.edu.mx', 'contraseña15', 5),
	('STU901', 'Carlos Eduardo Sánchez Torres', 'carlos.sanchez@institucion.edu.mx', 'contraseña7', 5),
	('VWX234', 'Luisa María Torres González', 'luisa.torres@institucion.edu.mx', 'contraseña8', 5),
	('XAX123', 'Juan Roberto Martinez Lugo', 'juan.ml@tecnm.mx', 'contraseña17', 5),
	('YZA567', 'Jorge Arturo Flores Pérez', 'jorge.flores@institucion.edu.mx', 'contraseña9', 5),
	('ZZZZZ', 'Zeta Zete Zeta', 'zeta.zeta@outlook.com', 'contraXD', 5);

	INSERT INTO `Profesor_Usuarios` (`IDPU`, `UID`, `RFCProfesor`) VALUES
	(1, 14, 'ABC123'),
	(2, 15, 'DEF456'),
	(3, 16, 'GHI789'),
	(4, 17, 'JKL012'),
	(5, 12, 'QRS345'),
	(6, 18, 'VWX234'),
	(7, 19, 'EFG123'),
	(101, 694, 'F345348189231'),
	(102, 695, 'BCD890'),
	(104, 697, 'HIJ456'),
	(105, 698, 'KLM789'),
	(106, 699, 'MNO345'),
	(107, 38, 'NOP012'),
	(108, 701, 'PQR678'),
	(219, 702, 'STU901'),
	(220, 703, 'XAX123'),
	(223, 705, 'YZA567'),
	(224, 777, 'JDDDEP'),
	(225, 30, 'ZZZZZ');

	INSERT INTO `UsuariosDepartamentos` (`UDID`, `UID`, `DID`) VALUES
	(1, 14, 5),
	(2, 12, 5),
	(3, 15, 5),
	(4, 16, 5),
	(6, 17, 5),
	(7, 18, 5),
	(8, 19, 5),
	(9, 694, 5),
	(10, 695, 5),
	(11, 696, 5),
	(12, 697, 5),
	(13, 698, 5),
	(14, 699, 5),
	(15, 700, 5),
	(16, 701, 5),
	(17, 702, 5),
	(18, 703, 5),
	(19, 705, 5),
	(20, 38, 5),
	(21, 30, 5),
	(22, 29, 5),
	(23, 11, 5),
	(24, 10, 5),
	(25, 31, 5),
	(26, 32, 5),
	(27, 33, 5),
	(28, 34, 5),
	(29, 35, 5),
	(30, 36, 5),
	(31, 37, 5),
	(32, 777, 5);

	INSERT INTO `FechasVencimiento` (`FVTramite`, `FVFechaLimite`, `FVDescripcionTramite`) VALUES
	('AsesoresEvaluacionReporteFinal', '2023-08-10', 'Evaluacion de reporte final'),
	('AsesoresEvaluacionSeguimiento', '2023-08-05', 'Evaluacion de seguimiento'),
	('ProponerProyecto', '2023-08-20', 'Espacio para proponer proyectos'),
	('SolicitarResidencia', '2023-08-14', 'Solicitar Residencia');
