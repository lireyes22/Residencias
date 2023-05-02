<!DOCTYPE html>
<html>
    
<head>
    <link rel="stylesheet" type="text/css" href="styleAlumno.css" title="styleSolicRes">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud para la residencia profesional</title>
</head>
<body style="margin: 0;">
    <div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="a.html">
					<h2><span style="margin-right: 10px;">Alumno</span></h2>
					<img src="../img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h1>Solicitud de Residencia</h1>
			</div>
			<div class="right-column">
				<a href="a.html"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
			<a href="" class="button-link">Profesores</a>
			<a href="a.html" class="button-link">Solicitudes de Residencia</a>
			<a href="a.html" class="button-link">Solicitudes de Proyectos</a>
			<a href="a.html" class="button-link">Lista Proyectos</a>
		</div>
	</div>
    <br>
    <!----------------------------------------------------- Fieldset Proyecto ---------------------------------------------------------->
    <form action="">
    <fieldset class="bg-fldst">
    <legend class="legend">Proyecto</legend>
    <article>
            <section id="projectData">
            <div class="columnaL">
                <div class="form-row">
                    <label for="jefeDiv">Jefe(a) de la Div. de Estudios Profesionales:</label>
                    <input type="text" id="jefeDiv" name="jefeDiv" value="<?php echo 'Juan Cocio' ?>" disabled='disabled' required>
                </div>
                <div class="form-row">
                    <label for='coordinador'>Coord. de la Carrera de:</label>
                    <input type="text" id="coordinador" name="coordinador" value="<?php echo 'Benja' ?>" disabled='disabled' required>
                </div>
                <div class="form-row">
                    <label for="">AT'N C:</label>
                    <input type="text" id="" name="" value="<?php echo '' ?>" required>
                </div>
                <div class="form-row">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" required>
                </div>
                <div class="form-row">
                    <label for="NombreProyecto">Nombre del Proyecto:</label>
                    <input type="text" id="NombreProyecto" name="NombreProyecto" value="<?php echo 'Inteligencia Artificial' ?>" disabled='disabled' required>
                </div>
            </div>
            <div class="columnaR">
                <div class="form-row">
                    <label for="tipoProyecto">Tipo Proyecto:</label>
                    <select id="tipoProyecto" name="tipoProyecto">
                        <option value="interno">Interno</option>
                        <option value="externo">Externo</option>
                        <option value="dual">Dual</option>
                        <option value="CIIE">CIIE</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="opcionElegida">Opcion Elegida:</label>
                    <select id="opcionElegida" name="opcionElegida">
                        <option value="Propuesta Propia">Propuesta Propia</option>
                        <option value="Trabajador">Trabajador</option>
                        <option value="bancoProyectos">Banco de Proyectos</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="peridoProyect">Periodo proyectado:</label>
                    <input type="text" name="peridoProyect" id = "peridoProyect" required>
                </div>
                <div class="form-row">
                    <label for="nomAsesorInterno">Nombre Asesor Interno:</label>
                    <input type="text" id="nomAsesorInterno" name="nomAsesorInterno" value="<?php echo 'Blandy' ?>" disabled='disabled' required>
                </div>
                <div class="form-row">
                    <label for="SPVacantes">Numero Residentes:</label>
                    <input type="number" name="SPVacantes" id="SPVacantes" min="1" max="4" placeholder="0" required>
                </div>
            </div>
            </section>
    </article>
    </fieldset>
    <br>
    <!------------------------------------------------------- Fieldset Datos Empresa ---------------------------------------------------------->
    <fieldset class="bg-fldst">
    <legend class="legend">Datos de la empresa</legend>
        <article id="fm-re">
            <section id="enterpriseData">
                <div class="columnaL">
                    <div class="form-row">
                    <label for="ENombre">Nombre:</label>
                    <input type="text" id="ENombre" name="ENombre" value="<?php echo 'Bon Ice' ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="Eramo">Ramo:</label>
                        <select id="Eramo" name="Eramo">
                            <option value="industrial">Industrial</option>
                            <option value="servicios">Servicios</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="ERFC">RFC:</label>
                        <input type="text" id="ERFC" name="ERFC" value="<?php echo 'VECJ880326' ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="ESector">Sector:</label>
                        <select id="ESector" name="ESector">
                            <option value="publico">Publico</option>
                            <option value="Privado">Privado</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="EActPrincipal">Actividad principal de la empresa:</label>
                        <input type="text" id="EActPrincipal" name="EActPrincipal" value="<?php echo 'Venta de Saborines' ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="EDomicilio">Domicilio:</label>
                        <input type="text" id="EDomicilio" name="EDomicilio" value="<?php echo 'C.robles #354 ' ?>" disabled='disabled'>  required 
                    </div>
                </div>

                <div class="columnaC">
                    <div class="form-row">
                        <label for="EColonia">Colonia:</label>
                        <input type="text" id="EColonia" name="EColonia" value="<?php echo 'Forjadores' ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="ECp">CP:</label>
                        <input type="text" id="ECp" name="ECp" value="<?php echo '77000' ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="EFax">FAX:</label>
                        <input type="text" id="EFax" name="EFax" value="<?php echo '484464848' ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="ECiudad">Ciudad:</label>
                        <input type="text" id="ECiudad" name="ECiudad" value="<?php echo 'Chetumal' ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="ETelefono">Teléfono:</label>
                        <input type="tel" id="ETelefono" name="ETelefono" value="<?php echo '983-445-6778' ?>" required>
                    </div>
                    <div class="form-row">
                        <label for="ETelefonoDos">Segundo Telefono:</label>
                        <input type="tel" id="ETelefonoDos" name="ETelefonoDos" placeholder="983-445-6778" required>
                    </div>
                </div>
                
                <div class="columnaR">
                    <div class="form-row">
                        <label for="nombreTitular">Nombre del titular de la empresa:</label>
                        <input type="text" id="nombreTitular" name="nombreTitular" required>
                    </div>
                    <div class="form-row">
                        <label for="puestoTitular">Puesto:</label>
                        <input type="text" name="puestoTitular" id="puestoTitular" required>
                    </div>
                    <div class="form-row">
                        <label for="nomAsesorExterno">Nombre del Asesor externo:</label>
                        <input type="text" name="nomAsesorExterno" id="nomAsesorExterno" value="<?php echo 'Juan Perez'?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="puestoAsesor">Puesto:</label>
                        <input type="text" name="puestoAsesor" id="puestoAsesor" required>
                    </div>
                    <div class="form-row">
                        <label for="ENombreEncargado">Nombre de la persona que firmará el acuerdo de trabajo. Estudiante- Escuela-Empresa:</label>
                        <input type="text" name="ENombreEncargado" id="ENombreEncargado" required>
                    </div>
                    <div class="form-row">
                        <label for="puestoEncargado">Puesto:</label>
                        <input type="text" name="puestoEncargado" id="puestoEncargado" required>
                    </div>                      
                </div>
            </section>
        </article>
    </fieldset>
    <br>
        <!------------------------------------------------------------ Datos del residente --------------------------------------------->
    <fieldset class="bg-fldst">
    <legend class="legend">Datos del residente</legend>
    <article>
        <section id = "residentData">
            <div class="columnaL">
                <div class="form-row">
                    <label for="nombreResidente">Nombre:</label>
                    <input type="text" id="nombreResidente" name="nombreResidente" value="<?php echo 'Maria De Todos los Angeles' ?>" disabled='disabled' required>
                </div>
                <div class="form-row">
                    <label for="carrera">Carrera:</label>
                    <input type="text" id="carrera" name="carrera" value="<?php echo 'Ing. en Sistemas' ?>" disabled='disabled' required>
                </div>
                <div class="form-row">
                    <label for="numControl">Numero de Control:</label>
                    <input type="text" id="numControl" name="numControl" value="<?php echo '20152255' ?>" disabled='disabled' required>
                </div>
                <div class="form-row">
                    <label for="numSemestre">Semestre a cursar:</label>
                    <input type="number" id="numSemestre" name="numSemestre" min="8" max="15" value="8" required>
                </div>
                <div class="form-row">
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" id="domicilio" name="domicilio" value="<?php echo '#254' ?>" disabled='disabled' required>
                </div>
                <div class="form-row">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo 'l20152255@chetumal.tecnm.mx' ?>" disabled='disabled' required>
                </div>
            </div>

            <div class="columnaR">
                <div class="form-row">
                    <label for="numeroSeguro">Para seguridad social acudir:</label>
                    <input type="text" name="numeroSeguro" placeholder="Numero" required>
                </div>
                <div class="form-row">
                    <input type="radio" id="imss" name="tipoSeguro" value="IMSS" required>
                    <label for="imss">IMSS</label>
                    <input type="radio" id="issste" name="tipoSeguro" value="ISSSTE" required>
                    <label for="issste">ISSSTE</label>
                    <input type="radio" id="otro" name="tipoSeguro" value="OTROS" required>
                    <label for="otro">OTROS</label>
                </div>
                <div class="form-row">
                    <label for="cuidad">Ciudad:</label>
                    <input type="text" id="cuidad" name="cuidad" value="<?php echo 'Chetumal' ?>" disabled ='disabled' required>
                </div>
                <div class="form-row">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telAlumno" id="telefono" placeholder="983-445-6778" required>
                </div>
                <div id="firma" class="form-row">
                    <div>
                        <label for="firma">Firma del Estudiante: </label>
                        <input type="file" id="firma" name="firma" required>
                    </div>
                </div>
                <div id="antepro" class="form-row">
                    <div>
                        <label for="SRAnteProyecto">Anteproyecto: </label>
                        <input type="file" id="SRAnteProyecto" name="SRAnteProyecto" required>
                    </div>
                </div>                  
            </div>
            </form>
            <div class="caja tb-th-asp">
                <input type="submit" value="Enviar Solicitud">
            </div>
        </section>
    </article>
    </fieldset>
    <footer></footer>
</body>
</html>
