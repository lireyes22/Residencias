<?php
include 'headprofesores.php';
?>
            <!-- Contenido principal -->
			<form method="POST" action="#">
                <input type="hidden" name="#" value="#">
                <fieldset class="container">
                    <h2>Proyecto</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Jefe(a) de la Div. de Estudios Profesionales:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Coord. de la Carrera de:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">AT'N C:</label>
                            <input type="text" >
                        </div>
                        <div class="col-md-6 mb-3" >
                            <label >Fecha:</label>
                            <input type="date">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nombre del Proyecto:</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Tipo Proyecto:</label>
                            <select>
                                <option>Escoge una opción..</option>
                                <option value="">Interno</option>
                                <option value="">Externo</option>
                                <option value="">Dual</option>
                                <option value="">CIIE</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Opción elegida:</label>
                            <select>
                                <option>Escoge una opción..</option>
                                <option value="">Propuesta Propia</option>
                                <option value="">Trabajador</option>
                                <option value="">Banco de Proyectos</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Periodo proyectado:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Nombre Asesor Interno:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Numero Residentes:</label>
                            <input type="text">
                        </div>
                    </div>
                </fieldset>
                
                <fieldset class="container mb-3">
                    <h2>Datos de la empresa</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Nombre:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Ramo:</label>
                            <select>
                                <option>Escoge una opción...</option>
                                <option value="">Industrial</option>
                                <option value="">Servicios</option>
                                <option value="">Escolar</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">RFC:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Sector:</label>
                            <select>
                                <option>Escoge una opción...</option>
                                <option value="Publico">Publico</option>
                                <option value="Privado">Privado</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Actividad principal de la empresa:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Domicilio:</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Colonia:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">CP:</label>
                            <input type="text" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">FAX:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Ciudad:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ETelefono">Teléfono:</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Nombre del titular de la empresa:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Puesto:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Nombre del Asesor externo:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Puesto:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Nombre de la persona que firmará el acuerdo de trabajo. Estudiante- Escuela-Empresa:</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </fieldset>
            
                <fieldset class="container mb-3">
                    <h2>Datos del residente</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Nombre:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="carrera">Carrera:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Número de Control:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Semestre a cursar:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Domicilio:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email:</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Para seguridad social acudir:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Tipo seguro:</label>
                            <select>
                                <option>Escoge una opción...</option>
                                <option value="">ISSSTE</option>
                                <option value="">IMSS</option>
                                <option value="">OTRO</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Ciudad:</label>
                            <input type="text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telAlumno">Teléfono:</label>
                            <input type="teXT">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Anteproyecto:</label>
                            <a href="#" target="_blank">DESCARGAR</a>
                        </div>
                    </div>
                </fieldset>
            </form>
            <form method="POST" action="#">
                <div class="container bg-primary">
                    <div style="margin-bottom: 10px;" align="center">
                        <textarea name="observaciones" style="width: 60%; margin-top: 10px; margin-bottom: 10px;" rows="4" cols="50" placeholder="Observaciones:"></textarea>
                    </div>
                    <div style="text-align: center;">
                        <input type="submit" name="aceptar" value="Aprobar" class="btn btn-success">
                        <input type="submit" name="rechazar" value="Rechazar" class="btn btn-danger">
                    </div>
                </div>
            </form>


 <?php
  include 'footer.php';
 ?>
