<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css" title="style" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud para la residencia profesional</title>
</head>
<body>
    <div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="a.html">
					<h2><span style="margin-right: 10px;">Alumno</span></h2>
					<img src="img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h1>Solicitud de Residencia</h1>
			</div>
			<div class="right-column">
				<a href="a.html"><img src="img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
			<a href="" class="button-link">Profesores</a>
			<a href="a.html" class="button-link">Solicitudes de Residencia</a>
			<a href="a.html" class="button-link">Solicitudes de Proyectos</a>
			<a href="a.html" class="button-link">Lista Proyectos</a>
		</div>
	</div>
    <article id="fm-re">
        <form action="" >
            <section id="datosProyecto">
                <table class='form'>
                    <tr>
                        <td>
                            <label for="jefeDiv">Jefe(a) de la Div. de Estudios Profesionales:</label>
                            <input type="text" id="jefeDiv" name="jefeDiv" value="<?php echo 'Juan Cocio' ?>" disabled='disabled'>
                        </td>
                        <td>
                            <label for='coordinador'>Coord. de la Carrera de:</label>
                            <input type="text" id="coordinador" name="coordinador" value="<?php echo 'Benja' ?>" disabled='disabled'>
                        </td>
                        <td>
                            <label for="">AT'N C:</label>
                            <input type="text" id="" name="" value="<?php echo '' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fecha">Fecha:</label>
                            <input type="date" id="fecha" name="fecha">
                        </td>
                        <td>
                            <label for="NombreProyecto">Nombre del Proyecto:</label>
                            <input type="text" id="NombreProyecto" name="NombreProyecto" value="<?php echo 'Inteligencia Artificial' ?>" disabled='disabled'>
                        </td>
                        <td>
                            <label for="tipoProyecto">Tipo Proyecto:</label>
                            <select id="tipoProyecto" name="tipoProyecto">
                                <option value="interno">Interno</option>
                                <option value="externo">Externo</option>
                                <option value="dual">Dual</option>
                                <option value="CIIE">CIIE</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="opcionElegida">Opcion Elegida:</label>
                            <select id="opcionElegida" name="opcionElegida">
                                <option value="Propuesta Propia">Propuesta Propia</option>
                                <option value="Trabajador">Trabajador</option>
                                <option value="bancoProyectos">Banco de Proyectos</option>
                            </select>
                        </td>
                        <td>
                            <label for="peridoProyect">Periodo proyectado:</label>
                            <input type="text" name="peridoProyect" id = "peridoProyect">
                        </td>
                        <td>
                            <label for="nomAsesorInterno">Nombre Asesor Interno:</label>
                            <input type="text" id="nomAsesorInterno" name="nomAsesorInterno" value="<?php echo 'Blandy' ?>" disabled='disabled'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <label for="SPVacantes">Numero Residentes:</label>
                        <input type="number" name="SPVacantes" id="SPVacantes" min="1" max="4" placeholder="0">
                        </td>
                    </tr>
                </table>
            </section>

            <h4>Datos Empresa:</h4><br><br>

            <section id="datosEmpresa">
                <table class='form'>
                    <tr>
                        <td>
                            <label for="ENombre">Nombre:</label>
                            <input type="text" id="ENombre" name="ENombre" value="<?php echo 'Bon Ice' ?>" disabled='disabled'>
                        </td>
                        <td>
                            <label for="Eramo">Ramo:</label>
                            <select id="Eramo" name="Eramo">
                                <option value="industrial">Industrial</option>
                                <option value="servicios">Servicios</option>
                                <option value="otro">Otro</option>
                            </select>
                        </td>
                        <td>
                            <label for="ERFC">RFC:</label>
                            <input type="text" id="ERFC" name="ERFC" value="<?php echo 'VECJ880326' ?>" disabled='disabled'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ESector">Sector:</label>
                            <select id="ESector" name="ESector">
                                <option value="publico">Publico</option>
                                <option value="Privado">Privado</option>
                            </select>
                        </td>
                        <td>
                            <label for="EActPrincipal">Actividad principal de la empresa:</label>
                            <input type="text" id="EActPrincipal" name="EActPrincipal" value="<?php echo 'Venta de Saborines' ?>" disabled='disabled'>
                        </td>
                        <td>
                            <label for="EDomicilio">Domicilio:</label>
                            <input type="text" id="EDomicilio" name="EDomicilio" value="<?php echo 'C.robles #354 ' ?>" disabled='disabled'>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="EColonia">Colonia:</label>
                            <input type="text" id="EColonia" name="EColonia" value="<?php echo 'Forjadores' ?>" disabled='disabled'>
                        </td>
                        <td>
                            <label for="ECp">CP:</label>
                            <input type="text" id="ECp" name="ECp" value="<?php echo '77000' ?>" disabled='disabled'>
                        </td>
                        <td>
                            <label for="EFax">FAX:</label>
                            <input type="text" id="EFax" name="EFax" value="<?php echo '484464848' ?>" disabled='disabled'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ECiudad">Ciudad:</label>
                            <input type="text" id="ECiudad" name="ECiudad" value="<?php echo 'Chetumal' ?>" disabled='disabled'>
                        </td>
                        <td>
                            <label for="ETelefono">Teléfono:</label>
                            <input type="tel" id="ETelefono" name="ETelefono" value="<?php echo '983-445-6778' ?>">
                        </td>
                        <td>
                            <label for="ETelefonoDos">Segundo Telefono:</label>
                            <input type="tel" id="ETelefonoDos" name="ETelefonoDos" placeholder="983-445-6778">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nombreTitular">Nombre del titular de la empresa:</label>
                            <input type="text" id="nombreTitular" name="nombreTitular">
                        </td>
                        <td>
                            <label for="puestoTitular">Puesto:</label>
                            <input type="text" name="puestoTitular" id="puestoTitular">
                        </td>
                        <td>
                            <label for="nomAsesorExterno">Nombre del Asesor externo:</label>
                            <input type="text" name="nomAsesorExterno" id="nomAsesorExterno" value='<?php echo 'Juan Perez'?>' disabled='disabled'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="puestoAsesor">Puesto:</label>
                            <input type="text" name="puestoAsesor" id="puestoAsesor">
                        </td>
                        <td>
                            <label for="ENombreEncargado">Nombre de la persona que firmará el acuerdo de trabajo. Estudiante- Escuela-Empresa:</label>
                            <input type="text" name="ENombreEncargado" id="ENombreEncargado">
                        </td>
                        <td>
                            <label for="puestoEncargado">Puesto:</label>
                            <input type="text" name="puestoEncargado" id="puestoEncargado">
                        </td>
                    </tr>
                </table>
            </section>

            <h4>Datos del Resindente</h4><br>

            <section id = "datosResidente">
                <table class='form'>
                    <tr>
                        <td>
                            <label for="nombreResidente">Nombre:</label>
                            <input type="text" id="nombreResidente" name="nombreResidente" value="<?php echo 'Maria De Todos los Angeles' ?>" disabled='disabled'>
                        </td>
                        <td>
                            <label for="carrera">Carrera:</label>
                            <input type="text" id="carrera" name="carrera" value="<?php echo 'Ing. en Sistemas' ?>" disabled='disabled'>
                        </td>
                        <td>
                            <label for="numControl">Numero de Control:</label>
                            <input type="text" id="numControl" name="numControl" value="<?php echo '20152255' ?>" disabled='disabled'>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <label for="numSemestre">Semestre a cursar:</label>
                            <input type="number" id="numSemestre" name="numSemestre" min="8" max="15" value="8">
                        </td>
                        <td>
                            <label for="domicilio">Domicilio:</label>
                            <input type="text" id="domicilio" name="domicilio" value="<?php echo '#254' ?>" disabled='disabled'>
                        </td>
                        <td>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo 'l20152255@chetumal.tecnm.mx' ?>" disabled = 'disabled'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="numeroSeguro">Para seguridad social acudir:</label>
                            <input type="text" name="numeroSeguro" placeholder="Numero"><br>
                            <input type="radio" id="imss" name="tipoSeguro" value="IMSS">
                            <label for="imss">IMSS</label>
                            <input type="radio" id="issste" name="tipoSeguro" value="ISSSTE">
                            <label for="issste">ISSSTE</label>
                            <input type="radio" id="otro" name="tipoSeguro" value="OTROS">
                            <label for="otro">OTROS</label>
                        </td>
                        <td>
                            <label for="cuidad">Ciudad:</label>
                            <input type="text" id="cuidad" name="cuidad" value="<?php echo 'Chetumal' ?>" disabled ='disabled'>
                        </td>
                        <td>
                            <label for="telefono">Teléfono:</label>
                            <input type="tel" name="telAlumno" id="telefono"placeholder="983-445-6778">
                        </td>
                    </tr>
                </table>
            </section>
            <section class='btn-sr'>
                <div id="firma">
                    <div>
                        <label for="firma">Firma del Estudiante</label>
                    </div><br><br>
                    <div class= 'btn-sl'>
                        <input type="file" id="firma" name="firma">
                    </div>
                </div>
                <div class="tb-th-asp">
                    <input type="submit" value="Enviar Solicitud">
                </div>
                <div id="antepro">
                    <div>
                        <label for="SRAnteProyecto">Anteproyecto</label>
                    </div><br><br>
                    <div class= 'btn-sl'>
                        <input type="file" id="SRAnteProyecto" name="SRAnteProyecto">
                    </div>
                </div>
            </section>
        </form>
    </article>
    <footer></footer>
</body>
</html>
