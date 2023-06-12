
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


INSERT INTO `solicitudproyecto` (`SPID`, `SPNombreProyecto`, `SPObjetivo`, `SPDescripcion`, `SPImpacto`, `SPLugar`, `SPEstudiantesRequeridos`, `SDTiempoEstimado`, `SPTipo`, `SPLineaInvestigacion`, `SPReferencias`, `UIDResponsable`, `SPEstatus`, `ERFC`, `UPropietario`) VALUES
	(1, 'Estructuracion de Redes ', 'El objetivo principal de este proyecto es diseñar y estructurar una red de comunicaciones eficiente y segura para una organización o empresa. La estructuración de redes implica planificar, implementar y administrar la infraestructura de red necesaria para satisfacer las necesidades de comunicación de la organización.', 'La estructuración de redes es un proyecto que tiene como objetivo diseñar y organizar una red de comunicaciones eficiente y segura para una organización o empresa. Implica planificar, implementar y administrar la infraestructura de red necesaria para satisfacer las necesidades de comunicación de la organización. Algunos objetivos clave incluyen diseñar una arquitectura de red escalable y robusta, mejorar la seguridad de la red, optimizar el rendimiento de la red, facilitar la colaboración y comunicación interna, establecer una infraestructura de red escalable, y documentar y mantener la red. Estos objetivos se adaptan según las necesidades y requisitos específicos de la organización.', 'El proyecto de estructuración de redes tiene un impacto significativo en una organización, ya que permite mejorar la eficiencia operativa, garantizar la seguridad de la información, lograr una mayor escalabilidad, facilitar la comunicación y colaboración interna, proporcionar una mejor experiencia del usuario y reducir los costos a largo plazo. ', 'Chetumal', 6, 6, 'EXTERNO', 'Seguridad informática', 'Tanenbaum, A. S., & Wetherall, D. J. (2011). Redes de computadoras. Pearson Educación.\r\nPeterson, L. L., & Davie, B. S. (2011). Redes de comunicaciones. McGraw-Hill.\r\n', 694, 'REVISION', 'RFCTEC', NULL),
	(2, 'Desarrollo de un sistema de monitoreo inteligente para la conservación de la biodiversidad en áreas protegidas.', 'El objetivo principal de este proyecto es diseñar e implementar un sistema de monitoreo basado en inteligencia artificial y análisis de datos para mejorar la conservación de la biodiversidad en áreas protegidas. El sistema permitirá recolectar y analizar información en tiempo real sobre la flora y fauna, identificar patrones de comportamiento y detectar posibles amenazas para la biodiversidad.', 'El proyecto implicará el despliegue de sensores y cámaras de monitoreo en áreas clave de diferentes ecosistemas protegidos. Estos dispositivos recopilarán datos sobre la presencia y el comportamiento de especies, así como información ambiental como temperatura, humedad y calidad del aire. Los datos serán procesados por algoritmos de inteligencia artificial y técnicas de análisis de datos para identificar patrones, detectar cambios anormales y proporcionar alertas en tiempo real a los responsables de la conservación. Además, se desarrollará una interfaz de usuario intuitiva que permitirá a los investigadores y conservacionistas acceder y visualizar los datos recopilados, facilitando la toma de decisiones informadas.', 'El sistema de monitoreo inteligente contribuirá significativamente a la conservación de la biodiversidad en áreas protegidas. Al proporcionar información en tiempo real sobre la presencia y el comportamiento de especies, así como detectar amenazas como la caza furtiva o la deforestación, se podrán tomar medidas oportunas para proteger y preservar la biodiversidad. ', 'Chetumal', 8, 6, 'EXTERNO', 'Inteligencia Artificial aplicada a la conservación de la biodiversidad', 'Ahumada, J. A., et al. (2011). Community structure and diversity of tropical forest mammals\r\nSwanson, A., et al. (2016). Sensor-based monitoring of the environment: A review of the state of the art and future prospects. Sensors, 16(3), 364.', 694, 'REVISION', 'RFCTEC', NULL),
	(3, 'Desarrollo de una plataforma de aprendizaje en línea para estudiantes de áreas rurales.', ' Brindar acceso a la educación de calidad a estudiantes de áreas rurales a través de una plataforma en línea interactiva y adaptada a sus necesidades.', 'El proyecto tiene como objetivo desarrollar una plataforma de aprendizaje en línea que proporcione a estudiantes de áreas rurales la oportunidad de acceder a recursos educativos, cursos y tutorías en línea. La plataforma estará diseñada para ser intuitiva y adaptable a las condiciones tecnológicas y de conectividad limitadas en estas áreas. Se ofrecerán cursos en diversas áreas de conocimiento, y se fomentará la interacción entre estudiantes y tutores a través de foros y sesiones en vivo.', 'El proyecto tiene como objetivo desarrollar una plataforma de aprendizaje en línea que proporcione a estudiantes de áreas rurales la oportunidad de acceder a recursos educativos, cursos y tutorías en línea. La plataforma estará diseñada para ser intuitiva y adaptable a las condiciones tecnológicas y de conectividad limitadas en estas áreas. Se ofrecerán cursos en diversas áreas de conocimiento, y se fomentará la interacción entre estudiantes y tutores a través de foros y sesiones en vivo.', 'Chetumal', 10, 6, 'EXTERNO', 'Educación a distancia y tecnologías educativas', 'UNESCO. (2019). IITE Policy Brief: ICTs for Rural Education. Moscow: UNESCO Institute for Information Technologies in Education.', 694, 'REVISION', 'RFCTEC', NULL),
	(4, 'Sistema de inteligencia artificial para la detección temprana de enfermedades en cultivos agrícolas', 'Desarrollar un sistema basado en inteligencia artificial que pueda identificar y diagnosticar tempranamente enfermedades en los cultivos agrícolas. ', 'Recopilación de datos de imágenes de cultivos agrícolas afectados por enfermedades, así como de cultivos sanos como referencia. Estas imágenes serán procesadas y analizadas utilizando algoritmos de inteligencia artificial entrenados previamente con datos etiquetados.', 'El sistema de detección temprana de enfermedades en cultivos agrícolas tendrá un impacto significativo en la agricultura al permitir una respuesta rápida y precisa ante la presencia de enfermedades. ', 'Chetumal', 8, 6, 'EXTERNO', 'Aplicaciones de inteligencia artificial en la agricultura y la salud de los cultivos', 'García, E., & Martínez, R. (2017). Metodología de la investigación. Pearson Educación.\r\nHernández, R., Fernández, C., & Baptista, P. (2014). Metodología de la investigación. ', 699, 'REVISION', 'RFCTEC', NULL),
	(5, 'Desarrollo de un sistema de energía renovable para comunidades rurales aisladas.', 'Implementar un sistema de energía renovable sostenible en comunidades rurales aisladas que carecen de acceso confiable a la electricidad.', 'El proyecto implica la instalación de paneles solares y turbinas eólicas en las comunidades rurales seleccionadas, que capturan la energía del sol y del viento respectivamente.', 'La implementación de este sistema de energía renovable tendrá un impacto significativo en las comunidades rurales aisladas. Proporcionará acceso confiable a la electricidad, mejorando la calidad de vida de los residentes al permitirles iluminación en el hogar, carga de dispositivos electrónicos y acceso a servicios básicos como la refrigeración de alimentos y la atención médica.', 'Felipe Carrillo Puerto', 12, 6, 'EXTERNO', 'Energías renovables y desarrollo sostenible', 'Agencia Internacional de Energías Renovables (IRENA). (2018). Energías Renovables en el Sector Rural: Clave para el Desarrollo Sostenible. Abu Dhabi: IRENA.', 699, 'REVISION', 'SDFG', NULL),
	(6, 'Desarrollo de un sistema de detección temprana de incendios forestales utilizando tecnología de drones.', 'El objetivo principal de este proyecto es desarrollar un sistema de detección temprana de incendios forestales utilizando drones equipados con cámaras y sensores de alta tecnología.', 'El proyecto implicará el diseño y la construcción de drones especializados capaces de volar sobre áreas forestales y recopilar información en tiempo real. ', 'El sistema de detección temprana de incendios forestales tendrá un impacto significativo en la protección y conservación del medio ambiente. Al detectar los incendios en etapas iniciales, se podrán implementar medidas de control y extinción rápidamente, evitando la propagación descontrolada del fuego y reduciendo los daños a los ecosistemas forestales.', 'Chetumal', 10, 6, 'EXTERNO', 'Tecnología aplicada a la gestión de desastres naturales', 'Cáceres, M., & González, E. (2018). Drones en la gestión y conservación de áreas naturales protegidas. Revista de Ciencias Ambientales, 32(1), 39-50.\r\nJiménez, R., & Rodríguez, A. (2017). Drones en la detección de incendios forestales. Ciencia y Tecnología para la Salud Visual y Ocular, 15(1), 49-56.', 699, 'REVISION', 'RFCTEC', NULL),
	(7, 'Desarrollo de un sistema de monitoreo inteligente para la gestión eficiente del agua en áreas urbanas.', 'El objetivo principal de este proyecto es implementar un sistema de monitoreo inteligente que permita la supervisión y control eficiente del uso del agua en áreas urbanas. ', 'El proyecto implica la instalación de sensores en puntos estratégicos de la red de suministro de agua, que monitorean en tiempo real los flujos, presiones y calidad del agua.', 'La implementación de este sistema de monitoreo inteligente tendrá un impacto significativo en la gestión del agua en áreas urbanas.', 'Chetumal', 12, 6, 'EXTERNO', 'Tecnologías para la gestión sostenible del agua', 'Organización Mundial de la Salud (OMS). (2017). Agua segura, saneamiento e higiene en el hogar. Ginebra: OMS.\r\nNaciones Unidas. (2018). Informe Mundial sobre el Desarrollo de los Recursos Hídricos: Soluciones basadas en la naturaleza para el agua.', 699, 'REVISION', 'RFCTEC', 11),
	(8, 'Desarrollo de una plataforma educativa en línea para la enseñanza de habilidades tecnológicas a jóvenes en comunidades rurales.', ' El objetivo principal de este proyecto es proporcionar acceso a la educación en habilidades tecnológicas a jóvenes en comunidades rurales, a través de una plataforma educativa en línea.', 'El proyecto implica el diseño y desarrollo de una plataforma educativa en línea que brinde cursos interactivos sobre programación, diseño web, desarrollo de aplicaciones móviles y otras habilidades tecnológicas relevantes.', 'La implementación de esta plataforma educativa en línea tendrá un impacto significativo en el desarrollo de habilidades tecnológicas y el acceso a oportunidades laborales en comunidades rurales. ', 'Chetumal', 10, 6, 'EXTERNO', 'Educación inclusiva y tecnología', 'Programa de las Naciones Unidas para el Desarrollo (PNUD). (2018). Informe sobre Desarrollo Humano 2018', 14, 'REVISION', 'RFCTEC', 32),
	(9, 'Implementación de un sistema de energía solar en escuelas rurales para promover la educación sostenible.', ' El objetivo principal de este proyecto es instalar sistemas de energía solar en escuelas rurales para proporcionar electricidad limpia y sostenible, promoviendo la continuidad de la educación y concienciando sobre el uso de energías renovables.', 'El proyecto implica la instalación de paneles solares en las escuelas rurales, que generarán energía eléctrica a partir de la radiación solar. Esta energía se utilizará para abastecer las necesidades eléctricas de las escuelas, incluyendo iluminación, carga de dispositivos electrónicos y funcionamiento de equipos. ', 'La implementación de sistemas de energía solar en escuelas rurales tendrá un impacto significativo en varias áreas. ', 'Chetumal', 6, 6, 'INTERNO', 'Energías renovables y educación', 'Ministerio para la Transición Ecológica y el Reto Demográfico (MITECO). (2020). Plan Nacional Integrado de Energía y Clima 2021-2030. Madrid: MITECO.\r\n', 698, 'REVISION', 'RFCTEC', 34);

INSERT INTO `carrerassolicitudproyecto` (`CSP`, `CID`, `SPID`) VALUES
	(1, 1, 1),
	(2, 6, 1),
	(3, 1, 2),
	(4, 5, 2),
	(5, 6, 2),
	(6, 1, 3),
	(7, 6, 3),
	(8, 1, 4),
	(9, 6, 4),
	(10, 1, 5),
	(11, 6, 5),
	(12, 1, 6),
	(13, 6, 6),
	(14, 1, 7),
	(15, 6, 7),
	(16, 1, 8),
	(17, 6, 8),
	(18, 1, 9),
	(19, 2, 9),
	(20, 6, 9);

INSERT INTO `comisionproyectoprofesor` (`CPPID`, `UProfesor`, `SPID`, `CPPFechaElaboracion`, `CPPFechaLimite`, `CPPEstatus`, `CPPObservaciones`) VALUES
	(1, 699, 1, '2023-06-12', '0000-00-00', 'PENDIENTE', NULL),
	(2, 699, 2, '2023-06-12', '0000-00-00', 'PENDIENTE', NULL),
	(3, 699, 3, '2023-06-12', '0000-00-00', 'PENDIENTE', NULL),
	(4, 694, 4, '2023-06-12', '0000-00-00', 'PENDIENTE', NULL),
	(5, 694, 5, '2023-06-12', '0000-00-00', 'PENDIENTE', NULL),
	(6, 694, 6, '2023-06-12', '0000-00-00', 'PENDIENTE', NULL),
	(7, 694, 7, '2023-06-12', '0000-00-00', 'PENDIENTE', NULL),
	(8, 699, 8, '2023-06-12', '0000-00-00', 'PENDIENTE', NULL),
	(9, 699, 9, '2023-06-12', '0000-00-00', 'PENDIENTE', NULL);


