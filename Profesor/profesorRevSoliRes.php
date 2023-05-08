<?php 
    include ('funcProfesor.php');
    //ID del proyecto
    $SRID = $_POST['SRID'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Solicitudes de Residencia</title>
    <link rel="stylesheet" type="text/css" href="../style/styleAlumno.css" title="styleSolicRes">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="margin: 0;">
    <div class="container">
        <div class="row">
            <div class="left-column">
                <a class="home-btn" href="index.php">
                    <h2><span style="margin-right: 10px;">Profesor</span></h2>
                    <img src="../img/sombrero.png" width="50px">
                </a>
            </div>
            <div class="center-column">
                <h1>Solicitudes de Proyectos</h1>
            </div>
            <div class="right-column">
                <a href="index.php"><img src="../img/logout.png" width="40px"></a>
            </div>
        </div>
		<?php
		include 'MenuProfesor.html';
		?>
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
                    <input type="text" id="" name="" value="<?php echo '' ?>" required disabled>
                </div>
                <div class="form-row">
                <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>" required disabled>
                </div>
                <div class="form-row">
                    <label for="NombreProyecto">Nombre del Proyecto:</label>
                    <input type="text" id="NombreProyecto" name="NombreProyecto" value="<?php echo $residencia['spnombreproyecto']; ?>" disabled='disabled' required>
                </div>
            </div>
            <div class="columnaR">
                <div class="form-row">
                    <label for="tipoProyecto">Tipo Proyecto:</label>
                    <select id="tipoProyecto" name="tipoProyecto" disabled>
                        <option value="interno" <?php if($residencia['sptipo'] == 'INTERNO') echo 'selected'; ?>>Interno</option>
                        <option value="externo" <?php if($residencia['sptipo'] == 'EXTERNO') echo 'selected'; ?>>Externo</option>
                        <option value="dual" <?php if($residencia['sptipo'] == 'DUAL') echo 'selected'; ?>>Dual</option>
                        <option value="CIIE" <?php if($residencia['sptipo'] == 'CIIE') echo 'selected'; ?>>CIIE</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="opcionElegida">Opcion Elegida:</label>
                    <select id="opcionElegida" name="opcionElegida" disabled>
                        <option value="Propuesta Propia">Propuesta Propia</option>
                        <option value="Trabajador">Trabajador</option>
                        <option value="bancoProyectos">Banco de Proyectos</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="periodoProyect">Periodo proyectado:</label>
                    <input type="text" name="periodoProyect" id="periodoProyect" value="<?php echo $residencia['sdtiempoestimado'] . ' meses'; ?>" required disabled/>
                </div>
                <div class="form-row">
                    <label for="nomAsesorInterno">Nombre Asesor Interno:</label>
                    <input type="text" name="nomAsesorInterno" id="nomAsesorInterno" value="<?php echo $asesorI['nombreasesor'] ?>" disabled='disabled' required>
                </div>
                <div class="form-row">
                    <label for="SPVacantes">Numero Residentes:</label>
                    <input type="number" name="SPVacantes" id="SPVacantes" min="1" max="4" placeholder="0" value="<?php echo $residencia['spestudiantesrequeridos']; ?>" required disabled>
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
                    <input type="text" id="ENombre" name="ENombre" value="<?php echo $empresa['nombre'] ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="Eramo">Ramo:</label>
                        <select id="Eramo" name="Eramo" disabled>
                            <option value="Industrial" <?php if($empresa['ramo'] == 'Industrial') echo 'selected'; ?>>Industrial</option>
                            <option value="Servicios" <?php if($empresa['ramo'] == 'Servicios') echo 'selected'; ?>>Servicios</option>
                            <option value="Escolar" <?php if($empresa['ramo'] == 'Escolar') echo 'selected'; ?>>Escolar</option>
                            <option value="Otro" <?php if(empty($empresa['ramo']) || $empresa['ramo'] == 'Otro' || ($empresa['ramo'] != 'Industrial' && $empresa['ramo'] != 'Servicios' && $empresa['ramo'] != 'Escolar')) echo 'selected'; ?>>Otro</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="ERFC">RFC:</label>
                        <input type="text" id="ERFC" name="ERFC" value="<?php echo $empresa['erfc'] ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="ESector">Sector:</label>
                        <select id="ESector" name="ESector" disabled>
                            <option value="Publico" <?php if($empresa['esector'] == 'Publico') echo 'selected'; ?>>Publico</option>
                            <option value="Privado" <?php if($empresa['esector'] == 'Privado') echo 'selected'; ?>>Privado</option>
                            <option value="Otro" <?php if(empty($empresa['esector']) || $empresa['esector'] == 'Otro' || ($empresa['esector'] != 'Publico' && $empresa['esector'] != 'Privado')) echo 'selected'; ?>>Otro</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="EActPrincipal">Actividad principal de la empresa:</label>
                        <input type="text" id="EActPrincipal" name="EActPrincipal" value="<?php echo $empresa['eactprincipal'] ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="EDomicilio">Domicilio:</label>
                        <input type="text" id="EDomicilio" name="EDomicilio" value="<?php echo $empresa['edomicilio'] ?>" disabled='disabled'>
                    </div>
                </div>

                <div class="columnaC">
                    <div class="form-row">
                        <label for="EColonia">Colonia:</label>
                        <input type="text" id="EColonia" name="EColonia" value="<?php echo $empresa['ecolonia'] ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="ECp">CP:</label>
                        <input type="text" id="ECp" name="ECp" value="<?php echo $empresa['ecp'] ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="EFax">FAX:</label>
                        <input type="text" id="EFax" name="EFax" value="<?php echo $empresa['efax'] ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="ECiudad">Ciudad:</label>
                        <input type="text" id="ECiudad" name="ECiudad" value="<?php echo $empresa['eciudad'] ?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="ETelefono">Teléfono:</label>
                        <input type="tel" id="ETelefono" name="ETelefono" value="<?php echo $empresa['etelefono'] ?>" disabled required>
                    </div>
                    <!-- <div class="form-row">
                        <label for="ETelefonoDos">Segundo Telefono:</label>
                        <input type="tel" id="ETelefonoDos" name="ETelefonoDos" placeholder="983-445-6778" required>
                    </div> -->
                </div>
                
                <div class="columnaR">
                    <div class="form-row">
                        <label for="nombreTitular">Nombre del titular de la empresa:</label>
                        <input type="text" id="nombreTitular" name="nombreTitular" value="<?php echo $empresa['enombretitular']?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="puestoTitular">Puesto:</label>
                        <input type="text" name="puestoTitular" id="puestoTitular" value="<?php echo $empresa['epuestotitular']?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="nomAsesorExterno">Nombre del Asesor externo:</label>
                        <input type="text" name="nomAsesorExterno" id="nomAsesorExterno" value="<?php echo $empresa['enombreacuerdo']?>" disabled='disabled' required>
                    </div>
                    <div class="form-row">
                        <label for="puestoAsesor">Puesto:</label>
                        <input type="text" name="puestoAsesor" id="puestoAsesor" value="<?php echo $empresa['epuestoacuerdo']?>" required disabled>
                    </div>
                    <div class="form-row">
                        <label for="ENombreEncargado">Nombre de la persona que firmará el acuerdo de trabajo. Estudiante- Escuela-Empresa:</label>
                        <input type="text" name="ENombreEncargado" id="ENombreEncargado" required disabled>
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
                    <input type="text" id="nombreResidente" name="nombreResidente" value="<?php echo $residente['nombre'] ?>" disabled='disabled' required>
                </div>
                <div class="form-row">
                    <label for="carrera">Carrera:</label>
                    <input type="text" id="carrera" name="carrera" value="<?php echo $residente['nomcarrera'] ?>" disabled='disabled' required>
                </div>
                <div class="form-row">
                    <label for="numControl">Numero de Control:</label>
                    <input type="text" id="numControl" name="numControl" value="<?php echo $residente['numcontrol'] ?>" disabled='disabled' required>
                </div>
                <div class="form-row">
                    <label for="numSemestre">Semestre a cursar:</label>
                    <input type="text" id="numSemestre" name="numSemestre" value="<?php echo $residente['semestre'] ?>" required disabled>
                </div>
                <div class="form-row">
                    <label for="domicilio">Domicilio:</label>
                    <input type="text" id="domicilio" name="domicilio" value="<?php echo $residente['domicilio'] ?>" disabled='disabled' required>
                </div>
                <div class="form-row">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $residente['email'] ?>" disabled='disabled' required>
                </div>
            </div>

            <div class="columnaR">
                <div class="form-row">
                    <label for="numeroSeguro">Para seguridad social acudir:</label>
                    <input type="text" name="numeroSeguro" value="<?php echo $residente['seguro_social'] ?>" required disabled>
                </div>
                <div class="form-row">
                    <input type="radio" id="imss" name="tipoSeguro" value="IMSS" <?php if($residente['institucionseguro'] == 'IMSS') echo 'checked'; ?> required disabled>
                    <label for="imss">IMSS</label>
                    <input type="radio" id="issste" name="tipoSeguro" value="ISSSTE" <?php if($residente['institucionseguro'] == 'ISSSTE') echo 'checked'; ?> required disabled>
                    <label for="issste">ISSSTE</label>
                    <input type="radio" id="otro" name="tipoSeguro" value="OTROS" <?php if(empty($residente['institucionseguro']) || $residente['institucionseguro'] == 'Otro' || ($residente['institucionseguro'] != 'IMSS' && $residente['institucionseguro'] != 'ISSSTE')) echo 'checked'; ?> required disabled>
                    <label for="otro">OTROS</label>
                </div>
                <div class="form-row">
                    <label for="cuidad">Ciudad:</label>
                    <input type="text" id="cuidad" name="cuidad" value="<?php echo $residente['ciudad'] ?>" disabled ='disabled' required>
                </div>
                <div class="form-row">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telAlumno" id="telefono" value="<?php echo $residente['tel'] ?>" required disabled>
                </div>

            </div>                  
        </div>

            <div class="caja-tb-th-asp" align="center">
                    <center>
                        <input type="submit" value="Enviar Solicitud">
                    </center>
                </div>
            </form>
        </section>
        <div align="left">
                    <label for="SRAnteProyecto">Firma del estudiante: </label>
                        <div class="form-group" align="left">
                            <label for="file-input">
                            <img src="../img/archivo.jpg" width="70px"/>
                            </label>
                            <input id="file-input" type="file" />
                        </div>
                    </div>
    </article>
    <div align="right">
                    <label for="SRAnteProyecto">Anteproyecto: </label>
                        <div class="form-group" align="right">
                            <label for="file-input">
                            <img src="../img/archivo.jpg" width="70px"/>
                            </label>
                            <input id="file-input" type="file" />
                        </div>
                    </div>
    </fieldset>
    <footer></footer>
</body>
</html>
