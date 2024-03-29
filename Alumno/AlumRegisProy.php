<?php
    include '../InicioSessionSeg.php';
    include ('Alumfunciones.php');
    $link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query= "SELECT * FROM Empresas";
    $result = mysqli_query($link, $query);
    $IDUser=$_SESSION['id'];
    $query2="SELECT Alumnos.NombreCompleto FROM Alumnos INNER JOIN Alumno_Usuarios ON Alumnos.NumeroControl=Alumno_Usuarios.NumeroControl INNER JOIN Usuarios ON Alumno_Usuarios.UID=Usuarios.UID WHERE Usuarios.UID='$IDUser'";
    $result2 = mysqli_query($link, $query2);
    $DID = mysqli_fetch_array(DID($IDUser));
    $docentes = listaDocentes($DID[0], ''); 
include 'headAlumnos.php';
?>
<div class="col ms-sm-auto px-4" id="principalRegisProy">
    <div class="container col-9">


        <form action="inserts/insertAlumRegisProy.php" method="POST" class="mt-5 mb-5 shadow-lg" style="background-color: #E9ECEF;">

            <div class="alert alert-warning alert-dismissible fade show">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong>Recordatorio:</strong> Ponerse en contacto con el maestro responsable antes de asignarle un proyecto.
            </div>
            <div class="p-2 rounded-top" style=" background-color: #384970; color: white;">
               <h2 class="text-center text-white">Proponer Proyecto</h2>
            </div>
            <input type="hidden" name="idAlumno" value="<?php echo $_SESSION['id'];?>">
            <div class="mt-3 p-3">
                <label for="nombreProyecto" class="form-label h6">Nombre del Proyecto:</label>
                <input type="text" class="form-control" name="nombreProy">
            </div>

            <div class="p-3">
                <label for="objetivoProyecto" class="form-label h6">Objetivo del Proyecto:</label>
                <textarea class="form-control" name="objetivo" rows="4"></textarea>
            </div>

            <div class="p-3">
                <label for="descripcionProyecto" class="form-label h6">Descripción del Proyecto:</label>
                <textarea class="form-control" name="descripcion" rows="4"></textarea>
            </div>

            <div class="p-3" id="">
                <label for="impactoProyecto" class="form-label h6">Impacto del Proyecto:</label>
                <p class="text-muted">Establecer la importancia y aporte de la investigación propuesta en
                    función de la generación de conocimiento, el desarrollo tecnológico, la innovación y la
                    solución de problemas locales, nacionales o internacionales.</p>
                <textarea class="form-control" name="impacto" rows="4"></textarea>
            </div>

            <div class="p-3" id="LugarDesarrollo">
                <label for="lugarDesarrollo" class="form-label h6" >Lugar donde se va a desarrollar:</label>
                <input type="text" class="form-control" name="lugar" id="LugarDesarrollo2">
            </div>

            <div class="container p-3" id="datosRegisProy">
                <div class="row">
                    <div class="col">
                        <label for="cantidadEstudiantes" class="form-label h6">Cantidad de estudiantes:</label>
                        <input type="number" class="form-control" name="numEstudiantes" min="0" placeholder="0">
                    </div>
                    <div class="col">
                        <label for="tiempoProyecto" class="form-label h6">Tiempo estimado de proyecto:</label>
                        <div class="input-group" id="datosRegisProy1">
                            <input type="number" class="form-control" name="tiempoProy" min="0" placeholder="0">
                            <span class="input-group-text">MES(ES)</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="tipoPropuesta" class="form-label h6">Tipo de propuesta:</label>
                        <select class="form-select form-select-sm" name="tipoProp">
                            <option value="INTERNO">INTERNO</option>
                            <option value="EXTERNO">EXTERNO</option>
                            <option value="DUAL">DUAL</option>
                            <option value="CIIE">CIIE</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="docenteResponsable" class="form-label h6">Docente Responsable:</label>
                        <select class="form-select" name="uidResp">
                            <?php //RFC
                                while ($profesor = mysqli_fetch_array($docentes)){
                            ?>
                                <option value="<?php echo $profesor[0]; ?>"> <?php echo $profesor[1] ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="p-3" id="carrerasElegidas">
                <label for="lineaInvestigacion" class="form-label h6">Línea de investigación que beneficia:</label>
                <input type="text" class="form-control" name="lineaInv">
            </div>

            <div class="p-3" id="referenciasEsenciales">
                <label for="referencias" class="form-label h6">Incluya las referencias esenciales para enmarcar el contenido de su propuesta:</label>
                <textarea class="form-control" name="refEsenciales" rows="4"></textarea>
            </div>

            <div class="p-3">
                <label for="nombreEmpresa" class="form-label h6">Nombre de la Empresa:</label>
                <select class="form-select" name="Empresas">
                    <?php

                            // Ciclo para mostrar los resultados en el combobox
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='".$row['ERFC']."'>".$row['ENombre']."</option>";
                            }
                            ?>
                </select>
            </div>

            <div class="mb-3 p-3">
                <label class="form-label h6">Carrera Requerida de los estudiantes:</label>
                
                <div class="form-check" >
                    <?php
                            #$row2 = mysqli_fetch_array($result4)
                            $query = getCarreras();
                            

                            while($consulta = mysqli_fetch_array($query)){
                                $idCarrera = $consulta['CID'];
                                $nombreCarrera = $consulta['Nombre'];
                        ?>


                            <input type="checkbox" name="carreraReq[]" value="<?php echo $idCarrera; ?>" 
                            ><?php echo $nombreCarrera; ?><br>
                            
                            
                        <?php } #end while?>                    
                </div>
            </div>
            <div class="d-flex justify-content-around p-4 rounded-bottom" style="background-color: #384970;">
                <button type="submit" class="btn btn-success btn-lg" name="enviar" value="Enviar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg> Enviar
                </button>
                <a href="AlumListadoProyecto.php" class="btn btn-secondary btn-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                       <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg> Cancelar
              </a>  
            </div>
            

        </form>
    </div>
</div>

<?php
include 'footer.php';
?>
